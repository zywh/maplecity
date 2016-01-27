<?php

class StatsController extends XFrontBase
{
    public function actionIndex(){
        Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/css/stats.css');
        //Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jquery.roundabout.js');
	//$year_stats = StatsYear:model()->findAll();
        //$statsyear = StatsYear::model()->findAll(array(
         //   'order'     => 'date DESC',
       // ));

        //$data = array( 'statsyear' => $statsyear);

        $this->render('index');
    }
	
	public function actionCurrent(){
	Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/css/stats.css');
	
	$this->render('current');
    }

    public function actionGetData(){

	$result = array();
	$criteria = new CDbCriteria();
        $criteria->select = 'unix_timestamp(date)*1000 as date,avg_price,sale';


        $statsyear = StatsYear::model()->findAll($criteria);
	foreach ($statsyear as $val) {	
		$yeardata = array();
		$yeardata['Date'] = $val->date;	
		$yeardata['AvgPrice'] = $val->avg_price;	
		$yeardata['Sale'] = $val->sale;	
		$result['YearData'][] = $yeardata;	
	}
	//Wrap callback argument and () for JSONP
	//	Yii doesn't handle callback
	//echo $_GET["callback"];	
	//echo "(";
	
	echo json_encode($result);
	
	//echo ");";

    }

    public function actionGetMlsData(){

        $result = array();
        $criteria = new CDbCriteria();
        $criteria->select = 'unix_timestamp(date)*1000 as date,
				sales,dollar/1000000 as dallor,avg_price,
				new_list,snlr*100 as snlr,active_list,
				moi,avg_dom,avg_splp*100 as avg_splp,type';
	

        $data = MlsHist::model()->findAll($criteria);
        foreach ($data as $val) {


                $result['mlsdata'][$val->type]['avgprice'][] = array($val->date,$val->avg_price);
                $result['mlsdata'][$val->type]['avgdom'][] = array($val->date,$val->avg_dom);
                $result['mlsdata'][$val->type]['avgsplp'][] = array($val->date,$val->avg_splp);
                $result['mlsdata'][$val->type]['sales'][] = array($val->date,$val->sales);
                $result['mlsdata'][$val->type]['newlist'][] = array($val->date,$val->new_list);
                $result['mlsdata'][$val->type]['moi'][] = array($val->date,$val->moi);
        }


        echo json_encode($result);

        //echo ");";

    }

	public function actionGetHouseStats(){
		$db = Yii::app()->db;
		$result = array();
		//
		//Generate Count by municipality
		$sql = "
			SELECT m.municipality_cname as cname, h.municipality as ename, count(*) as count
			FROM h_house h,h_mname m
			WHERE h.municipality = m.municipality 
			GROUP BY h.municipality
			ORDER BY count DESC
			LIMIT 20;
		";
		$resultsql = $db->createCommand($sql)->query();
		//
		foreach($resultsql as $row){
		  $result["city"][] = array($row["count"],$row["cname"],$row["ename"]); 
		}
		
		//Generate Count by community
		$sql = "
			SELECT community, count(*) as count
			FROM h_house
			GROUP BY community
			ORDER BY count DESC
			LIMIT 20;
		";
		$resultsql = $db->createCommand($sql)->query();
		//
		foreach($resultsql as $row){
		  $result["community"][] = array($row["count"],$row["community"]); 
		}
     
     

		//房价分布图
		$sql = "
		select lp_dol/10000 as price 
		from h_house 
		where s_r='Sale' ;";
		$resultsql = $db->createCommand($sql)->query();
		//
		foreach($resultsql as $row){
		 $result["price"][] = $row["price"]; 
		}
       
		//Generate count by property_type
		$sql = "
			SELECT count(*) as count,p.name as cname 
			FROM h_house h,h_property_type p 
			WHERE h.propertytype_id = p.id group by h.propertytype_id ;
		";
		$resultsql = $db->createCommand($sql)->query();
		foreach($resultsql as $row){
		 $result["property_type"][] = array($row["count"],$row["cname"]); 
		}
       	//End of count by property_type	   
       echo json_encode($result);

      
    }

	
}
