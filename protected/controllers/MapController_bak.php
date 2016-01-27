<?php

/**
 * Map控制器
 *
 * @author       yang jing
 */
class MapController extends XFrontBase {

    /**
     * 首页
     */
    public function actionIndex() {
        $housetype = PropertyType::model()->findAll();
		//var_dump($housetype);
        $this->render('index', array('houseType' => $housetype));
    }

    /**
     * 获取地址所在经纬度
     */
    public function actionGetCodeAddress() {
        $result = array();
        if (!empty($_POST['location'])) {
            $url = 'http://maps.google.cn/maps/api/geocode/json?address=' . trim($_POST['location']) . ',加拿大&sensor=false&language=zh-CN';
            $url = str_replace(' ', '+', $url);
            // header
            $userAgent = array(
                'Mozilla/5.0 (Windows NT 6.1; rv:22.0) Gecko/20100101 Firefox/22.0', // FF 22
                'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', // Chrome 27
                'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Trident/5.0)', // IE 9
                'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Trident/4.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; InfoPath.2; .NET4.0C; .NET4.0E)', // IE 8
                'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.1; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; InfoPath.2; .NET4.0C; .NET4.0E)', // IE 7
                'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.1 (KHTML, like Gecko) Maxthon/4.1.0.4000 Chrome/26.0.1410.43 Safari/537.1', // Maxthon 4
                'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.1; Trident/5.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; InfoPath.2; .NET4.0C; .NET4.0E)', // 2345 2
                'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Trident/5.0; QQBrowser/7.3.11251.400)', // QQ 7
                'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.1; Trident/5.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; InfoPath.2; .NET4.0C; .NET4.0E; SE 2.X MetaSr 1.0)', // Sougo 4
                'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Trident/5.0) LBBROWSER', //  liebao 4
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:22.0) Gecko/20100101 Firefox/22.0");
            curl_setopt($ch, CURLOPT_REFERER, "http://hqn.jschina.com.cn/prop.asp?id=1975");
            curl_setopt($ch, CURLOPT_TIMEOUT, 16);
            curl_setopt($ch, CURLOPT_USERAGENT, $userAgent[rand(0, count($userAgent) - 1)]);
            curl_setopt($ch, CURLOPT_PROXY, null);
            // 伪造IP头
            $ip = rand(27, 64) . "." . rand(100, 200) . "." . rand(2, 200) . "." . rand(2, 200);
            $headerIp = array("X-FORWARDED-FOR:{$ip}", "CLIENT-IP:{$ip}");
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headerIp);
            // 读取数据
            $res = @curl_exec($ch);
            curl_close($ch);
            $addrInfo = json_decode($res, true);
            $result['IsError'] = false;
            $result['lng'] = $addrInfo['results'][0]['geometry']['location']['lng'];
            $result['lat'] = $addrInfo['results'][0]['geometry']['location']['lat'];
        } else {
            $result['IsError'] = true;
            $result['Message'] = '数据接收失败';
        }
        echo json_encode($result);
    }
		
		
		/**
     * 获取地址所在经纬度
     */
    public function actionGetCodeAddress2() {
        $result = array();
				$location = $_GET['location'];
		
        if (!empty($location)) {
            $url = 'http://maps.google.cn/maps/api/geocode/json?address=' . trim($location) . ',加拿大&sensor=false&language=zh-CN';
						//$url = 'http://maps.google.cn/maps/api/geocode/json?address=' . '129 Ulster St,Toronto' . ',加拿大&sensor=false&language=zh-CN';
						//$url = 'http://maps.google.cn/maps/api/geocode/json?address=129 Ulster St Toronto,加拿大&sensor=false&language=zh-CN';
            $url = str_replace(' ', '+', $url);
            // header
            $userAgent = array(
                'Mozilla/5.0 (Windows NT 6.1; rv:22.0) Gecko/20100101 Firefox/22.0', // FF 22
                'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', // Chrome 27
                'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Trident/5.0)', // IE 9
                'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Trident/4.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; InfoPath.2; .NET4.0C; .NET4.0E)', // IE 8
                'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.1; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; InfoPath.2; .NET4.0C; .NET4.0E)', // IE 7
                'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.1 (KHTML, like Gecko) Maxthon/4.1.0.4000 Chrome/26.0.1410.43 Safari/537.1', // Maxthon 4
                'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.1; Trident/5.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; InfoPath.2; .NET4.0C; .NET4.0E)', // 2345 2
                'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Trident/5.0; QQBrowser/7.3.11251.400)', // QQ 7
                'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.1; Trident/5.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; InfoPath.2; .NET4.0C; .NET4.0E; SE 2.X MetaSr 1.0)', // Sougo 4
                'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Trident/5.0) LBBROWSER', //  liebao 4
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:22.0) Gecko/20100101 Firefox/22.0");
            curl_setopt($ch, CURLOPT_REFERER, "http://hqn.jschina.com.cn/prop.asp?id=1975");
            curl_setopt($ch, CURLOPT_TIMEOUT, 16);
            curl_setopt($ch, CURLOPT_USERAGENT, $userAgent[rand(0, count($userAgent) - 1)]);
            curl_setopt($ch, CURLOPT_PROXY, null);
            // 伪造IP头
            $ip = rand(27, 64) . "." . rand(100, 200) . "." . rand(2, 200) . "." . rand(2, 200);
            $headerIp = array("X-FORWARDED-FOR:{$ip}", "CLIENT-IP:{$ip}");
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headerIp);
            // 读取数据
            $res = @curl_exec($ch);
            curl_close($ch);
            $addrInfo = json_decode($res, true);
            $result['IsError'] = false;
            $result['lng'] = $addrInfo['results'][0]['geometry']['location']['lng'];
            $result['lat'] = $addrInfo['results'][0]['geometry']['location']['lat'];
        } else {
            $result['IsError'] = true;
            $result['Message'] = '数据接收失败';
        }
				//var_dump ($result);
        echo $result;
    }

    public function actionGetMapHouse() {
        $result = array();
        if (empty($_POST)) {
            $result['IsError'] = true;
            $result['Message'] = '数据接收失败';
        } else {
            $result['IsError'] = false;

            //根据条件查询地图
            $criteria = new CDbCriteria();
         //   $criteria->join = 'join city_id as b on b.id = t.city_id';
			
           // $criteria->join .= ' join propertyType_id as c on c.id = t.propertyType_id';
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
                $criteria->order = 't.yr_built asc';
            } else if ($_POST['orderby'] == 4) {
                $criteria->order = 't.yr_built desc';
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
                $criteria->addCondition("t.toilet_num = :toilet_num");
                $criteria->params += array(':toilet_num' => intval($_POST['housebaths']));
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
                $minPrice = intval($price[0]);
                $maxPrice = intval($price[1]);
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
                    $criteria->addCondition("t.br_plus >= :bedroom_num");
                } else if ($houseroom > 0) {
                    $criteria->addCondition("t.br_plus = :bedroom_num");
                }
                $criteria->params += array(':br_plus' => $houseroom);
            }

            //房屋类型
            if (!empty($_POST['housetype']) && intval($_POST['housetype']) != 0) {
			
			
if($_POST['housetype']==1){
$criteria->addCondition('type_own1_out="Detached"');
}
elseif($_POST['housetype']==2){
$criteria->addCondition('type_own1_out="Townhouse" or type_own1_out="Att∕Row∕Twnhouse" or type_own1_out="Triplex" or type_own1_out="Fourplex" or type_own1_out="Multiplex"');
}
elseif($_POST['housetype']==3){
$criteria->addCondition('lp_dol>3000000');
}	
elseif($_POST['housetype']==4){
$criteria->addCondition('type_own1_out="Semi-Detached" or type_own1_out="Link" or type_own1_out="Duplex"');
}
elseif($_POST['housetype']==5){
$criteria->addCondition('type_own1_out="Cottage" or type_own1_out="Rural Resid"');
}
elseif($_POST['housetype']==6){
$criteria->addCondition('type_own1_out="Farm"');
}
elseif($_POST['housetype']==7){
$criteria->addCondition('type_own1_out="Vacant Land"');
}
elseif($_POST['housetype']==8){
$criteria->addCondition('type_own1_out="Mobile/Trailer" or type_own1_out="Det W/Com Elements" or type_own1_out="Store W/Apt/offc"');
}
			
               // $criteria->addCondition("t.propertyType_id = :propertyType_id");
             //   $criteria->params += array(':propertyType_id' => intval($_POST['housetype']));
            }

            //根据地区名字搜索
            if (!empty($_POST['city']) && trim($_POST['city']) != '州名/市名(中英)') {
                $city = trim($_POST['city']);
                $criteria->addCondition("t.addr like '%" . $city . "%' OR b.pinyin like '%" . $city . "%' OR b.englishName like '%" . $city . "%'");
            }

            //建造年份
            if (!empty($_POST['houseyear'])) {
                $year = explode(',', $_POST['houseyear']);
                $minYear = intval($year[0]);
                $maxYear = intval($year[1]);
                if ($maxYear != 0 || $minYear != 0) {
                    if ($maxYear > $minYear) {
                        $criteria->addCondition("t.yr <= :maxYear");
                        $criteria->params += array(':maxYear' => $maxYear);
                    }
                    $criteria->addCondition("t.yr >= :minYear");
                    $criteria->params += array(':minYear' => $minYear);
                }
            }

            $house = House::model()->findAll($criteria);


	
            //经纬度范围
            if((empty($_POST['city']) || trim($_POST['city']) == '州名/市名(中英)') && empty($_POST['country']) && !empty($_POST['city'])) {
			
				
                if (!empty($house)) {
                    $bound = explode(',', $_POST['bounds']);
                    foreach ($house as $key => $val) {
					    $jingweidu=actionGetCodeAddress2($val->country.$val->community.$val->addr);
                        if (floatval($val->latitude) >= floatval($bound[0]) && floatval($jingweidu['lat']) <= floatval($bound[2]) && floatval($jingweidu['lng']) >= floatval($bound[1]) && floatval($jingweidu['lng']) <= floatval($bound[3])) {
                            
                        } else {
                            unset($house[$key]);
                        }
                    }
                }
            }
            $count = count($house);

            //数据重组
            if (!empty($house)) {
                $result['Message'] = '成功';
                $result['Data']['AreaHouseCount'] = array();
                $result['Data']['MapHouseList'] = array();
                foreach ($house as $key => $val) {
				    $jingweidu=actionGetCodeAddress2($val->country.$val->community.$val->addr);
					
                    $mapHouseList = array();
                    $mapHouseList['Beds'] = $val->br_plus;
                    $mapHouseList['Baths'] = $val->bath_tot;
                    $mapHouseList['Kitchen'] = $val->kit_plus;
                    $mapHouseList['GeocodeLat'] = $jingweidu['lat'];
                    $mapHouseList['GeocodeLng'] = $jingweidu['lng'];
                    $mapHouseList['Address'] = $val->addr;
                    $mapHouseList['Price'] = $val->lp_dol;
                    $mapHouseList['Id'] = $val->id;
                    $propertyType = PropertyType::model()->findByPk($val->propertyType_id);
                    $mapHouseList['HouseType'] = !empty($propertyType) ? $propertyType->name : '';
                    $countryInfo = City::model()->findByPk($val->city_id);
                    $mapHouseList['CountryName'] = !empty($countryInfo) ? $countryInfo->name : '';
                    $mapHouseList['Country'] = $val->city_id;
                    $mapHouseList['Money'] = 'CAD';
                    $area2Name = District::model()->findByPk($val->district_id);
                    $mapHouseList['Area2Name'] = !empty($area2Name) ? $area2Name->name : '';
                    $mapHouseList['CoverImg'] = !empty($val->house_image) ? $val->house_image : 'uploads/201501/29cd77e5f187df554a1ff9facdc190e2.jpg';
                    $mapHouseList['BuildYear'] = $val->construction_year;
                    $result['Data']['MapHouseList'][] = $mapHouseList;

                    //数据总数拼装
                    if (!empty($countryInfo)) {
                        $provinceInfo = Province::model()->findByPk($countryInfo->province_id);
                    }
                    if (intval($_POST['zoom']) < 10 && intval($_POST['zoom']) >= 6) {
                        $result['Data']['AreaHouseCount'][$val->city_id]['Count'] ['NameCn'] = $val['name'];
                        $result['Data']['AreaHouseCount'][$val->city_id]['Count'] ['HouseCount'] += 1;
                        $result['Data']['AreaHouseCount'][$val->city_id]['Count'] ['GeocodeLat'] = !empty($countryInfo) ? $countryInfo->lat : '';
                        $result['Data']['AreaHouseCount'][$val->city_id]['Count'] ['GeocodeLng'] = !empty($countryInfo) ? $countryInfo->lnt : '';
                        $result['Data']['AreaHouseCount'][$val->city_id]['Count'] ['MaxZoom'] = 2;
                        $result['Data']['AreaHouseCount'][$val->city_id]['List'][] = $mapHouseList;
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
            } else {
                $result['IsError'] = true;
                $result['Message'] = '无数据';
            }
        }
        echo json_encode($result);
    }

    function actionGetMapCity() {
        if (!empty($_POST['cityName'])) {
            $cityName = trim($_POST['cityName']);
            $connection = Yii::app()->db;
            $sql = 'SELECT id, province_id, name, englishName, pinyin, lat, lnt FROM h_city WHERE name like "%' . $cityName . '%" OR englishName like "%' . $cityName . '%" OR pinyin like "%' . $cityName . '%"';
            $command = $connection->createCommand($sql);
            $names = $command->queryAll();
            if (!empty($names)) {
                $result['IsError'] = false;
                $result['Data'] = array();
                foreach ($names as $key => $val) {
                    $city = array();
                    $city['CityId'] = $val['id'];
                    $city['ProvinceId'] = $val['province_id'];
                    $city['NameCn'] = $val['name'];
                    $city['NameEn'] = $val['englishName'];
                    $city['GeocodeLat'] = trim($val['lat']);
                    $city['GeocodeLng'] = trim($val['lnt']);
                    $city['MinZoom'] = 2;
                    $result['Data'][] = $city;
                }
            } else {
                $result['IsError'] = true;
            }
        } else {
            $result['IsError'] = true;
        }
        echo json_encode($result);
    }

}
