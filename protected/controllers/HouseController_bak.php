<?php
/**
 * 房源控制器
 *
 * @author        shuguang <5565907@qq.com>
 * @copyright     Copyright (c) 2007-2013 bagesoft. All rights reserved.
 * @link          http://www.bagecms.com
 * @package       BageCMS.Controller
 * @license       http://www.bagecms.com/license
 * @version       v3.1.0
 */
class HouseController extends XFrontBase
{
    static $searchData = array(
        'cd5' => array(
            1 => array('min'=>0, 'max'=>30),
            2 => array('min'=>30, 'max'=>50),
            3 => array('min'=>50, 'max'=>100),
            4 => array('min'=>100, 'max'=>150),
            5 => array('min'=>150, 'max'=>300),
            6 => array('min'=>300, 'max'=>''),
        ),
        'cd6' => array(
            1 => array('min'=>0, 'max'=>700),
            2 => array('min'=>700, 'max'=>1100),
            3 => array('min'=>1100, 'max'=>1500),
            4 => array('min'=>1500, 'max'=>2000),
            5 => array('min'=>2000, 'max'=>2500),
			6 => array('min'=>2500, 'max'=>3000),
			7 => array('min'=>3000, 'max'=>3500),
			8 => array('min'=>3500, 'max'=>4000),
			9 => array('min'=>4000, 'max'=>''),
        ),
        'cd7' => array(
            1 => array('min'=>0, 'max'=>1000),
            2 => array('min'=>1000, 'max'=>2000),
            3 => array('min'=>2000, 'max'=>3000),
            4 => array('min'=>3000, 'max'=>4000),
            5 => array('min'=>4000, 'max'=>5000),
            6 => array('min'=>5000, 'max'=>6000),
            7 => array('min'=>6000, 'max'=>''),
        ),
        'cd9' => array(
            1 => array('min'=>0, 'max'=>1970),
            2 => array('min'=>1970, 'max'=>1980),
            3 => array('min'=>1980, 'max'=>1990),
            4 => array('min'=>1990, 'max'=>2000),
            5 => array('min'=>2000, 'max'=>2005),
            6 => array('min'=>2005, 'max'=>2010),
            7 => array('min'=>2010, 'max'=>''),
        ),
    );

    /**
     * 房源列表
     */
    public function actionIndex() {
        Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/css/house.css');
        $city_id           = Yii::app()->request->getQuery('cd1', 0);
        $district_id       = Yii::app()->request->getQuery('cd2', 0);
        $investType_id     = Yii::app()->request->getQuery('cd3', 0);
        $propertyType_id   = Yii::app()->request->getQuery('cd4', 0);
        $total_price       = Yii::app()->request->getQuery('cd5', 0);
        $house_area        = Yii::app()->request->getQuery('cd6', 0);
        $land_area         = Yii::app()->request->getQuery('cd7', 0);
        $bedroom_num       = Yii::app()->request->getQuery('cd8', 0);
        $construction_year = Yii::app()->request->getQuery('cd9', 0);
        $prop_featx_out    = Yii::app()->request->getQuery('cd10', 0);
        $time_sort         = Yii::app()->request->getQuery('time_sort', 'DESC');
        $price_sort        = Yii::app()->request->getQuery('price_sort');
        $diy_word          = null;

        $city_list = City::model()->findAll(array('order'=>'id ASC'));
        if(!empty($city_id)){
            $district_list = District::model()->findAll('city_id=:city_id',array(':city_id'=>$city_id));
        }else{
            $district_list = District::model()->findAll();
        }
        $investType_list = InvestType::model()->findAll();
        $propertyType_list = PropertyType::model()->findAll();
		
        //按搜索条件查询房源信息
        $criteria = new CDbCriteria();
        if(!empty($city_id)) $criteria->addCondition('city_id='.$city_id);
        if(!empty($district_id)) $criteria->addCondition('district_id='.$district_id);
		
        if(!empty($propertyType_id)) {
		
if($propertyType_id==1){
$criteria->addCondition('type_own1_out="Detached"');
}
elseif($propertyType_id==2){
$criteria->addCondition('type_own1_out="Townhouse" or type_own1_out="Att∕Row∕Twnhouse" or type_own1_out="Triplex" or type_own1_out="Fourplex" or type_own1_out="Multiplex"');
}
elseif($propertyType_id==3){
$criteria->addCondition('lp_dol>3000000');
}	
elseif($propertyType_id==4){
$criteria->addCondition('type_own1_out="Semi-Detached" or type_own1_out="Link" or type_own1_out="Duplex"');
}
elseif($propertyType_id==5){
$criteria->addCondition('type_own1_out="Cottage" or type_own1_out="Rural Resid"');
}
elseif($propertyType_id==6){
$criteria->addCondition('type_own1_out="Farm"');
}
elseif($propertyType_id==7){
$criteria->addCondition('type_own1_out="Vacant Land"');
}
elseif($propertyType_id==8){
$criteria->addCondition('type_own1_out="Mobile/Trailer" or type_own1_out="Det W/Com Elements" or type_own1_out="Store W/Apt/offc"');
}
		
		}
		
        if(!empty($total_price)){
            if(!empty(self::$searchData['cd5'][$total_price]['min'])){
                $criteria->addCondition('lp_dol>'.self::$searchData['cd5'][$total_price]['min']);
            }
            if(!empty(self::$searchData['cd5'][$total_price]['max'])){
                $criteria->addCondition('lp_dol<='.self::$searchData['cd5'][$total_price]['max']);
            }
        }
        if(!empty($house_area)){
            if(!empty(self::$searchData['cd6'][$house_area]['min'])){
                $criteria->addCondition('sqft>'.self::$searchData['cd6'][$house_area]['min']);
            }
            if(!empty(self::$searchData['cd6'][$house_area]['max'])){
                $criteria->addCondition('sqft<='.self::$searchData['cd6'][$house_area]['max']);
            }
        }
        if(!empty($land_area)){
            if(!empty(self::$searchData['cd7'][$land_area]['min'])){
                $criteria->addCondition('depth*front_ft>'.self::$searchData['cd7'][$land_area]['min']);
            }
            if(!empty(self::$searchData['cd7'][$land_area]['max'])){
                $criteria->addCondition('depth*front_ft<='.self::$searchData['cd7'][$land_area]['max']);
            }
        }
        if(!empty($bedroom_num)){
            if($bedroom_num <= 5){
                $criteria->addCondition('br_plus='.$bedroom_num);
            }else{
                $criteria->addCondition('br_plus>='.$bedroom_num);
            }
        }
        if(!empty($construction_year)){
            if(!empty(self::$searchData['cd9'][$construction_year]['min'])){
                $criteria->addCondition('yr_built>'.self::$searchData['cd9'][$construction_year]['min']);
            }
            if(!empty(self::$searchData['cd9'][$construction_year]['max'])){
                $criteria->addCondition('yr_built<='.self::$searchData['cd9'][$construction_year]['max']);
            }
        }
        if(!empty($prop_featx_out)){
            $criteria->addCondition('prop_feat1_out="'.$prop_featx_out.'"');

        }
        $criteria->order = 'id DESC';
        if(!empty($time_sort)){
            $criteria->order = 'pix_updt '.$time_sort;
        }
        if(!empty($price_sort)){
            $criteria->order = 'lp_dol '.$price_sort;
        }
        $count = House::model()->count($criteria);
        $pager = new CPagination($count);
        $pager->pageSize = 10;
        $pager->applyLimit($criteria);
        $house_list = House::model()->findAll($criteria);

        $collection_list = array();
        if($this->_account['userId']){
            $collect_model = Collect::model()->find('user_id=:user_id', array(':user_id'=>$this->_account['userId']));
            if(!empty($collect_model)){
                $collection_list = explode(',', $collect_model->collection);
            }
        }

        $data = array(
            'cd1'               => $city_id,
            'cd2'               => $district_id,
            'cd3'               => $investType_id,
            'cd4'               => $propertyType_id,
            'cd5'               => $total_price,
            'cd6'               => $house_area,
            'cd7'               => $land_area,
            'cd8'               => $bedroom_num,
            'cd9'               => $construction_year,
            'cd10'              => $prop_featx_out,
            'time_sort'         => $time_sort,
            'price_sort'        => $price_sort,
            'diy_price'         => json_encode($diy_price),
            'city_list'         => $city_list,
            'district_list'     => $district_list,
            'investType_list'   => $investType_list,
            'propertyType_list' => $propertyType_list,
            'count'             => $count,
            'house_list'        => $house_list,
            'collection_list'   => $collection_list,
            "pages"             => $pager
        );
        $this->render('index',$data);
    }

    /**
     * 房源详情
     */
    public function actionView($id){
        Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/css/house.css');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/flowplayer-3.2.11.min.js');

        $cookies = Yii::app()->request->getCookies();
        if(!empty($cookies['fzd_house'])){
            $house_ids = explode(',', $cookies['fzd_house']->value);
            array_push($house_ids, $id);
            $house_ids = array_unique($house_ids);
            $cookie_str = implode(',', $house_ids);
            $cookie = new CHttpCookie('fzd_house',$cookie_str);
            $cookie->expire = time() + 60 * 60 * 24 * 30;  //有限期30天
            Yii::app()->request->cookies['fzd_house'] = $cookie;
        }else{
            $cookie = new CHttpCookie('fzd_house',$id);
            $cookie->expire = time() + 60 * 60 * 24 * 30;  //有限期30天
            Yii::app()->request->cookies['fzd_house'] = $cookie;
        }

        $house = House::model()->find('id=:id',array(':id'=>$id));
        $layouts = Layout::model()->findAll('house_id=:house_id',array(':house_id'=>$id));
        $matches = Match::model()->findAll();

        $collection_list = array();
        if($this->_account['userId']){
            $collect_model = Collect::model()->find('user_id=:user_id', array(':user_id'=>$this->_account['userId']));
            if(!empty($collect_model)){
                $collection_list = explode(',', $collect_model->collection);
            }
        }

//附件房源
        $criteria=new CDbCriteria;
        $criteria->select='id,addr,lp_dol,house_image';
        $criteria->condition='zip=:zip AND id<>:id';
        $criteria->params=array(':zip'=>$house->zip, ':id'=>$id);
        $criteria->order='id DESC';
        $nearby_houses=House::model()->findAll($criteria);

//浏览记录
        $cookies = Yii::app()->request->getCookies();
        $house_ids = explode(',', $cookies['addr']->value);
        $criteria=new CDbCriteria;
        $criteria->select='id,addr,lp_dol,house_image';
        $criteria->addInCondition('id', $house_ids);
        $view_history=House::model()->findAll($criteria);

        $exchangeRate = 0;
        $exchangeRateList = ExchangeRate::model()->findAll();
        if(!empty($exchangeRateList)){
            $exchangeRate = $exchangeRateList[0]->rate;
        }

        $data = array(
            'house'           => $house,
            'layouts'         => $layouts,
            'matches'         => $matches,
            'collection_list' => $collection_list,
            'nearby_houses'   => $nearby_houses,
            'view_history'    => $view_history,
            'exchangeRate'    => $exchangeRate
        );
        $this->render('view', $data);
    }

    public function actionCollection(){
        $id = Yii::app()->request->getPost('id');
        if(!empty($this->_account['userId'])){
            $collect_model = Collect::model()->find('user_id=:user_id', array(':user_id'=>$this->_account['userId']));
            if(!empty($collect_model)){
                $collection = $collect_model->collection;
                $collection = explode(',', $collection);
                if(in_array($id, $collection)){
                    echo CJSON::encode(array('status'=>500, 'msg'=>'您已收藏过该房源'));
                }else{
                    array_push($collection, $id);
                    $collection = implode(',', $collection);
                    $collect_model->collection = $collection;
                    if($collect_model->save()){
                        echo CJSON::encode(array('status'=>200, 'msg'=>'收藏成功'));
                    }else{
                        echo CJSON::encode(array('status'=>500, 'msg'=>'收藏失败'));
                    }
                }
            }else{
                $collection = array();
                array_push($collection, $id);
                $collection = implode(',', $collection);
                $collect_model = new Collect();
                $collect_model->user_id = $this->_account['userId'];
                $collect_model->collection = $collection;
                if($collect_model->save()){
                    echo CJSON::encode(array('status'=>200, 'msg'=>'收藏成功'));
                }else{
                    echo CJSON::encode(array('status'=>500, 'msg'=>'收藏失败'));
                }
            }
        }else{
            echo CJSON::encode(array('status'=>404, 'msg'=>'您还未登录，请先登录'));
        }
    }

    public function actionCompare(){
        $this->layout = ' ';
        Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/css/compare.css');
        $data = Yii::app()->request->getQuery('id');
        $ids = explode(',',$data);
        $criteria = new CDbCriteria;
        $criteria->addInCondition('id', $ids);
        $house_list = House::model()->findAll($criteria);
        $link_list = Link::model()->findAll();
        $matches = Match::model()->findAll();
        $this->render('compare', array(
            'house_list'=>$house_list,
            'link_list' => $link_list,
            'matches'=>$matches
        ));
    }
}
