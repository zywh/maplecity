<?php
/**
 * Created by PhpStorm.
 * User: p-shenghui
 * Date: 2015/2/11
 * Time: 11:07
 */
class Link extends XBaseModel
{
    /**
     * @return string 相关的数据库表的名称
     */
    public function tableName()
    {
        return '{{link}}';
    }

    /**
     * @return array 对模型的属性验证规则.
     */
    public function rules()
    {
        return array(
            array('title, url', 'required'),
            array('title, url', 'length', 'max'=>255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, url', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array 关联规则.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array();
    }

    /**
     * @return array 自定义属性标签 (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'title' => '链接名称',
            'url' => '链接路径',
        );
    }


    /**
     * 返回指定的AR类的静态模型.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Post the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}