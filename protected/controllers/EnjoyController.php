<?php

class EnjoyController extends XFrontBase
{
    public function actionIndex(){
        Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/css/enjoy.css');
        Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/css/lanrenzhijia.css');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jquery.roundabout.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/lanrenzhijia.js');

        Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/css/enjoy.css');
        $city_id = Yii::app()->request->getQuery('city', 0);
        $time_sort = Yii::app()->request->getQuery('pix_updt', 'DESC');
        $price_sort = Yii::app()->request->getQuery('lp_dol');

        $criteria = new CDbCriteria();
        $criteria->order = 'id DESC';
        if(!empty($city_id)){
            $criteria->addCondition('city_id='.$city_id);
        }
        if(!empty($time_sort)){
            $criteria->order = 'pix_updt '.$time_sort;
        }
        if(!empty($price_sort)){
            $criteria->order = 'lp_dol '.$price_sort;
        }
        $criteria->addCondition('lp_dol>3000000');
        $count = House::model()->count($criteria);
        $pager = new CPagination($count);
        $pager->pageSize = 6;
        $pager->applyLimit($criteria);
        $house_list = House::model()->findAll($criteria);

        $subject_list = Subject::model()->findAll(array(
            'order'     => 'pix_updt DESC',
        ));

        $cur_city = City::model()->findByPk($city_id);

        $data = array(
            'house_list'   => $house_list,
            'subject_list' => $subject_list,
            'cur_city'     => $cur_city,
            'count'        => $count,
            'time_sort'    => $time_sort,
            'price_sort'   => $price_sort,
            'pages'        => $pager
        );



        $this->render('index', $data);
    }

    public function actionMore(){
        Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/css/enjoy.css');
        $city_id = Yii::app()->request->getQuery('city', 0);
        $time_sort = Yii::app()->request->getQuery('time_sort', 'DESC');
        $price_sort = Yii::app()->request->getQuery('lp_dol');

        $criteria = new CDbCriteria();
        $criteria->order = 'id DESC';
        if(!empty($city_id)){
            $criteria->addCondition('city_id='.$city_id);
        }
        if(!empty($time_sort)){
            $criteria->order = 'accessDate '.$time_sort;
        }
        if(!empty($price_sort)){
            $criteria->order = 'lp_dol '.$price_sort;
        }
        $criteria->addCondition('lp_dol>3000000');
        $count = House::model()->count($criteria);
        $pager = new CPagination($count);
        $pager->pageSize = 10;
        $pager->applyLimit($criteria);
        $house_list = House::model()->findAll($criteria);

        $subject_list = Subject::model()->findAll(array(
            'order'     => 'id DESC',
        ));

        $cur_city = City::model()->findByPk($city_id);

        $data = array(
            'house_list'   => $house_list,
            'subject_list' => $subject_list,
            'cur_city'     => $cur_city,
            'count'        => $count,
            'time_sort'    => $time_sort,
            'price_sort'   => $price_sort,
            'pages'        => $pager
        );

        $this->render('more', $data);
    }
}
?>