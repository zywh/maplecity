<?php

/**
 * Map控制器
 *
 * @author       yang jing
 *  201512 Add relation table for city name
 */

class MapController extends XFrontBase {

    /**
     * 首页
     */
    public function actionIndex() {
        $housetype = PropertyType::model()->findAll();
        $this->render('index', array('houseType' => $housetype));
    }

    public function actionIndexsb() {
        $housetype = PropertyType::model()->findAll();
        $this->render('indexsb', array('houseType' => $housetype));
    }



    public function actionGetMapHouse() {
	ini_set("log_errors", 1);
	ini_set("error_log", "/tmp/php-error.log");
	

        $result = array();
        if (empty($_POST)) {
            $result['IsError'] = true;
            $result['Message'] = '数据接收失败';
        } else {
            $result['IsError'] = false;

            //根据条件查询地图
            $criteria = new CDbCriteria();
            $criteria->select = 'id,municipality,lp_dol,num_kit,construction_year,depth,front_ft,br,addr,house_image,longitude,latitude,area,bath_tot';

            /* 排序
             * <span data-value="1">价格：从高到低</span>
              <span data-value="2">价格：从低到高</span>
              <span data-value="3">日期：从后到前</span>
              <span data-value="4">日期：从前到后</span>
             */
            if ($_POST['orderby'] == 1) {
                $criteria->order = 't.lp_dol desc';
            } else if ($_POST['orderby'] == 2) {
                $criteria->order = 't.lp_dol asc';
            } else if ($_POST['orderby'] == 3) {
                $criteria->order = 't.construction_year asc';
            } else if ($_POST['orderby'] == 4) {
                $criteria->order = 't.construction_year desc';
            } else {
                $criteria->order = 't.id desc';
            }

            //city_id
            if (!empty($_POST['country']) && trim($_POST['country']) != 'undefined') {
			
                $criteria->addCondition("t.city_id = :city_id");
                $criteria->params += array(':city_id' => intval($_POST['country']));
            }
            
            //district_id
            if (!empty($_POST['district']) && trim($_POST['district']) != 'undefined') {
                $criteria->addCondition("t.district_id = :district_id");
                $criteria->params += array(':district_id' => intval($_POST['district']));
            }

            //卫生间数量 1-5
            if (!empty($_POST['housebaths']) && intval($_POST['housebaths']) > 0) {
                $criteria->addCondition("t.bath_tot = :bath_tot");
                $criteria->params += array(':bath_tot' => intval($_POST['housebaths']));
            }

            //土地面积
            if (!empty($_POST['houseground'])) {
                $ground = explode(',', $_POST['houseground']);
                $minGround = intval($ground[0]);
                $maxGround = intval($ground[1]);
                if ($minGround != 0 || $maxGround != 0) {
                    if ($maxGround > $minGround) {
                        $criteria->addCondition("t.depth*t.front_ft <= :maxGround");
                        $criteria->params += array(':maxGround' => $maxGround);
                    }
                    $criteria->addCondition("t.depth*t.front_ft >= :minGround");
                    $criteria->params += array(':minGround' => $minGround);
                }
            }

            //价格区间
            if (!empty($_POST['houseprice'])) {
                $price = explode(',', $_POST['houseprice']);
                $minPrice = intval($price[0]) *10000;
                $maxPrice = intval($price[1]) *10000;
                if ($maxPrice != 0 || $minPrice != 0) {
                    if ($maxPrice > $minPrice) {
                        $criteria->addCondition("t.lp_dol <= :maxPrice");
                        $criteria->params += array(':maxPrice' => $maxPrice);
                    }
                    $criteria->addCondition("t.lp_dol >= :minPrice");
                    $criteria->params += array(':minPrice' => $minPrice);
                }
            }

            //房型
            if (!empty($_POST['houseroom']) && intval($_POST['houseroom']) > 0) {
                $houseroom = intval($_POST['houseroom']);
                if ($houseroom == '6') {
                    $criteria->addCondition("t.br >= :br");
                } else if ($houseroom > 0) {
                    $criteria->addCondition("t.br = :br");
                }
                $criteria->params += array(':br' => $houseroom);
            }

            //房屋类型
            if (!empty($_POST['housetype']) && intval($_POST['housetype']) != 0) {
 				$criteria->addSearchCondition('propertyType_id',$_POST['housetype']);
            }

            //根据地区名字搜索
            if (!empty($_POST['city']) && trim($_POST['city']) != '州名/市名(中英)') {
                $city = trim($_POST['city']);
                $criteria->addCondition("t.addr like '%" . $city . "%' OR b.pinyin like '%" . $city . "%' OR b.englishName like '%" . $city . "%'");
            }

            //建造年份
           if (!empty($_POST['houseyear'])) {
                //$year = explode(',', $_POST['houseyear']);
				$year=$_POST['houseyear'];
                //$minYear = intval($year[0]);
               // $maxYear = intval($year[1]);
				$criteria->addCondition("t.yr_built = :year");
				$criteria->params += array(':year' => $year);
    
            }
			//lat and long selection
            if (!empty($_POST['bounds'])) {
                $latlon = explode(',', $_POST['bounds']);
                $minLat = floatval($latlon[0]);
                $maxLat = floatval($latlon[2]);
                $minLon = floatval($latlon[1]);
                $maxLon = floatval($latlon[3]);
                $criteria->addCondition("t.latitude <= :maxLat");
                $criteria->params += array(':maxLat' => $maxLat);
                $criteria->addCondition("t.latitude >= :minLat");
                $criteria->params += array(':minLat' => $minLat);
                $criteria->addCondition("t.longitude <= :maxLon");
                $criteria->params += array(':maxLon' => $maxLon);
                $criteria->addCondition("t.longitude >= :minLon");
                $criteria->params += array(':minLon' => $minLon);
		


            }

			$criteria->with = array('mname','propertyType');
			//$criteria->with = array('municipality'=>array('select'=>array('municipality_cname')),'propertyType');


            $house = House::model()->findAll($criteria);

			$maxmarkers = 2000;
			$totalcount = count($house);
			$result['Data']['Total'] = $totalcount;
			//error_log(count($house));
            //数据重组
			$result['Data']['AreaHouseCount'] = array();
            $result['Data']['MapHouseList'] = array();
            if (!empty($house) && $totalcount < $maxmarkers) {
				error_log("HouseList Start:".$totalcount);
			    $result['Message'] = '成功';
                $result['Data']['AreaHouseCount'] = array();
                $result['Data']['MapHouseList'] = array();
                foreach ($house as $val) {
                    $mapHouseList = array();
                    $mapHouseList['Beds'] = $val->br;
                    $mapHouseList['Baths'] = $val->bath_tot;
                    $mapHouseList['Kitchen'] = $val->num_kit;
                    $mapHouseList['GeocodeLat'] = $val->latitude;
                    $mapHouseList['GeocodeLng'] = $val->longitude;
                    $mapHouseList['Address'] = $val->addr; 
                    $mapHouseList['sqft'] = $val->sqft;
                    $mapHouseList['Price'] = $val->lp_dol/10000;
                    $mapHouseList['Id'] = $val->id;
                    $mapHouseList['HouseType'] = !empty($val->propertyType->name) ? $val->propertyType->name : '其他';
					$mapHouseList['MunicipalityName'] = !empty($val->mname->municipality_cname)? ($val->mname->municipality_cname):"其他";
                    $mapHouseList['CountryName'] = $val->municipality;
                    $mapHouseList['Country'] = $val->city_id;
                    $mapHouseList['Money'] = 'CAD';
                    //$area2Name = District::model()->findByPk($val->district_id);
                    $mapHouseList['Area2Name'] = !empty($area2Name) ? $area2Name->name : '';
                    $mapHouseList['CoverImg'] = !empty($val->house_image) ? $val->house_image : 'uploads/201501/29cd77e5f187df554a1ff9facdc190e2.jpg';
                    $mapHouseList['BuildYear'] = $val->yr_built;
                    $result['Data']['MapHouseList'][] = $mapHouseList;

                    //数据总数拼装
                    if (!empty($countryInfo)) {
                        $provinceInfo = Province::model()->findByPk($countryInfo->province_id);
                    }
                    if (intval($_POST['zoom']) < 14 && intval($_POST['zoom']) >= 6) {
                        $result['Data']['AreaHouseCount'][$val->municipality]['Count'] ['NameCn'] = !empty($val->mname->municipality_cname)? ($val->mname->municipality_cname):"其他";
                        $result['Data']['AreaHouseCount'][$val->municipality]['Count'] ['HouseCount'] += 1;
                        //$result['Data']['AreaHouseCount'][$val->city_id]['Count'] ['GeocodeLat'] = !empty($countryInfo) ? $countryInfo->lat : '';
                        $result['Data']['AreaHouseCount'][$val->municipality]['Count'] ['GeocodeLat'] = !empty($val->mname->lat)? ($val->mname->lat):"";
                        $result['Data']['AreaHouseCount'][$val->municipality]['Count'] ['GeocodeLng'] = !empty($val->mname->lng)? ($val->mname->lng):""; 
                        $result['Data']['AreaHouseCount'][$val->municipality]['Count'] ['MaxZoom'] = 2;
                        $result['Data']['AreaHouseCount'][$val->municipality]['List'][] = $mapHouseList;
                    } else if (intval($_POST['zoom']) < 6) {
                        if (!empty($provinceInfo)) {
                            $result['Data']['AreaHouseCount'][$provinceInfo->id]['Count'] ['NameCn'] = $val['name'];
                            $result['Data']['AreaHouseCount'][$provinceInfo->id]['Count'] ['HouseCount'] += 1;
                            $result['Data']['AreaHouseCount'][$provinceInfo->id]['Count'] ['GeocodeLat'] = $provinceInfo->lat;
                            $result['Data']['AreaHouseCount'][$provinceInfo->id]['Count'] ['GeocodeLng'] = $provinceInfo->lnt;
                            $result['Data']['AreaHouseCount'][$provinceInfo->id]['Count'] ['MaxZoom'] = 2;
                            $result['Data']['AreaHouseCount'][$provinceInfo->id]['List'][] = $mapHouseList;
                        }
                    }
                }
            //} else {
            //    $result['IsError'] = true;
            //    $result['Message'] = '无数据';
            }
			
			if (!empty($house) && $totalcount >= $maxmarkers) {
				error_log("City Count Start:".$totalcount);
				
				$result['Message'] = '成功';
                
                foreach ($house as $val) {
				        $result['Data']['AreaHouseCount'][$val->municipality]['Count'] ['NameCn'] = !empty($val->mname->municipality_cname)? ($val->mname->municipality_cname):"其他";
                        $result['Data']['AreaHouseCount'][$val->municipality]['Count'] ['HouseCount'] += 1;
                        //$result['Data']['AreaHouseCount'][$val->city_id]['Count'] ['GeocodeLat'] = !empty($countryInfo) ? $countryInfo->lat : '';
                        $result['Data']['AreaHouseCount'][$val->municipality]['Count'] ['GeocodeLat'] = !empty($val->mname->lat)? ($val->mname->lat):"";
                        $result['Data']['AreaHouseCount'][$val->municipality]['Count'] ['GeocodeLng'] = !empty($val->mname->lng)? ($val->mname->lng):""; 
                        $result['Data']['AreaHouseCount'][$val->municipality]['Count'] ['MaxZoom'] = 2;
                        $result['Data']['AreaHouseCount'][$val->municipality]['List'][] = $mapHouseList;
				}
			}
		//error_log(json_encode($result))	;
		
		}
		//error_log(json_encode($result))	;
		echo json_encode($result);
    }


}
