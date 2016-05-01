<?php

/**
 * This is the model class for table "{{subject}}".
 *
 * The followings are the available columns in table '{{subject}}':
 * @property integer $id
 * @property string $name
 * @property integer $city_id
 * @property integer $date
 * @property string $summary
 * @property string $point
 * @property string $image_list
 * @property string $developer_intro
 * @property string $room_type_image
 * @property integer $recommend
 * @property string $cityname
 * @property string $layout_list
 */
class Subject extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{subject}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, date, summary, point, image_list, developer_intro, room_type_image, cityname, layout_list', 'required'),
			array('city_id, date, recommend', 'numerical', 'integerOnly'=>true),
			array('name, room_type_image', 'length', 'max'=>255),
			array('cityname', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, city_id, date, summary, point, image_list, developer_intro, room_type_image, recommend, cityname, layout_list', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		 'city'=>array(self::BELONGS_TO, 'City', 'city_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => '项目名称',
			'city_id' => '城市',
			'date' => '项目时间',
			'summary' => '项目概况',
			'point' => '项目重点',
			'image_list' => '项目组图',
			'developer_intro' => '开发商介绍',
			'room_type_image' => '房型图',
			'recommend' => '热点推荐',
			'cityname' => 'Cityname',
			'layout_list' => '布局图片',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('date',$this->date);
		$criteria->compare('summary',$this->summary,true);
		$criteria->compare('point',$this->point,true);
		$criteria->compare('image_list',$this->image_list,true);
		$criteria->compare('developer_intro',$this->developer_intro,true);
		$criteria->compare('room_type_image',$this->room_type_image,true);
		$criteria->compare('recommend',$this->recommend);
		$criteria->compare('cityname',$this->cityname,true);
		$criteria->compare('layout_list',$this->layout_list,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Subject the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
