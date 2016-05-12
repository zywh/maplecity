<?php
/**
 * Created by PhpStorm.
 * User: p-shenghui
 * Date: 2015/1/13
 * Time: 20:17
 */
class ColumnController extends XFrontBase
{
    public function actionIndex(){
        Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/css/column.css');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/template-native.js');
		
 

       //$this->render('index', $data);
	   $this->render('index', $data);

    }
	
	
	


    public function actionSuccess(){
        $this->layout = ' ';
        Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/css/success.css');
        $link_list = Link::model()->findAll();
        $this->render('success', array('link_list' => $link_list));
    }
	
    public function actionSchool(){

        $this->render('school');

    }
	
	
	 public function actionMap(){

        $this->render('map');

    }
	 public function actionSchoolMap(){

        $this->render('schoolmap');

    }

	
    public function actionGetSchoolList() {
		ini_set("log_errors", 1);
		ini_set("error_log", "/tmp/php-error.log");
		
		$maxmarkers = 5000;  
        $result = array();
		$result['SchoolList'] = array();
			
        if (empty($_POST)) {
            $result['IsError'] = true;
            $result['Message'] = '数据接收失败';
        } 
		else 
		{
            $result['IsError'] = false;

            //type
            $criteria = new CDbCriteria();
			
			if($_POST['type'] == 's' ) {
				$criteria->addCondition('type =1');
			} 
			
			if($_POST['type'] == 'e' ) {
				$criteria->addCondition('type =0');
			} 
			
						
			if(!empty($_POST['province'])) {
				$criteria->addCondition('province="'.$_POST['province'].'"');
			} 
			
			$chinese = preg_match("/\p{Han}+/u", $_POST['xingzhi']);
			//XingZhi
			if(!empty($_POST['xingzhi']) && !($chinese)) {
				$criteria->addCondition("xingzhi like '".$_POST['xingzhi']."%'");
			}
			
			//Pingfen
			if(!empty($_POST['pingfen']) && intval($_POST['pingfen']) > 0) {
				$criteria->addCondition("pingfen >='".$_POST['pingfen']."'");
			} 
			
			//Rank
			if(!empty($_POST['rank'])&& intval($_POST['rank']) > 0) {
				//$criteria->order = "paiming ASC";
				$criteria->addCondition("paiming <='".$_POST['rank']."'");
						
			} 		

			
			//End of Condition
			
			$count = School::model()->count($criteria);
			

			
			//Display school list if maxmarker is less
		
			
				$criteria->order = "paiming";
				$school = School::model()->findAll($criteria);
				foreach ($school as $val) {
					$paiming = !empty( $val->paiming)?  $val->paiming :'无';
					$rating = !empty( $val->pingfen)?  $val->pingfen :'无';
					$result["SchoolList"][] = array($paiming,$val->school,$val->grade,$val->address,$val->city,$val->tel);
				}
 
       		
		}
		
		echo json_encode($result);
    }
	
	

    public function actionAjaxGetDistricts(){
        $city_id = Yii::app()->request->getPost('city_id');
        $district_list = array();
        if(!empty($city_id)){
            $district_list = District::model()->findAll('city_id=:city_id', array(':city_id'=>$city_id));
        }else{
            $district_list = District::model()->findAll();
        }
        echo CJSON::encode(array('data' => $district_list));
    }

    public function actionAjaxRequirementCreate(){
        $city_id           = Yii::app()->request->getPost('city_id');
        $district_id       = Yii::app()->request->getPost('district_id');
        $investType_id     = Yii::app()->request->getPost('investType_id');
        $propertyType_id   = Yii::app()->request->getPost('propertyType_id');
        $total_price       = Yii::app()->request->getPost('total_price');
        $house_area        = Yii::app()->request->getPost('house_area');
        $land_area         = Yii::app()->request->getPost('land_area');
        $bedroom_num       = Yii::app()->request->getPost('bedroom_num');
        $construction_year = Yii::app()->request->getPost('construction_year');

        if(!empty($this->_account['userId'])){
            $user = User::model()->findByPk($this->_account['userId']);

            $model = new Requirement();
            $model->city_id           = $city_id;
            $model->district_id       = $district_id;
            $model->investType_id     = $investType_id;
            $model->propertyType_id   = $propertyType_id;
            $model->total_price       = $total_price;
            $model->house_area        = $house_area;
            $model->land_area         = $land_area;
            $model->bedroom_num       = $bedroom_num;
            $model->construction_year = $construction_year;
            $model->phone             = $user->phone;
            $model->email             = $user->email;

            if($model->save()){
                $url = Yii::app()->createUrl('column/success');
                echo CJSON::encode(array('status'=>'success', 'url'=>$url, 'msg'=>'提交成功'));
            }else{
                echo CJSON::encode(array('status'=>'failed', 'url'=>'', 'msg'=>'提交失败，请稍候重试'));
            }
        }else{
            echo CJSON::encode(array('status'=>'failed', 'url'=>'', 'msg'=>'您还未登录，请先登录'));
        }
    }
}