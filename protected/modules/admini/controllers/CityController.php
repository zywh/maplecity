<?php
/**
 * 内容管理
 *
 * @author        ShengHui
 * @copyright     Copyright (c) 2007-2013 bagesoft. All rights reserved.
 * @link          http://www.bagecms.com
 * @package       BageCMS.admini.Controller
 * @license       http://www.bagecms.com/license
 * @version       v3.1.0
 */

class CityController extends XAdminiBase
{
    /**
     * 首页
     *
     */
    public function actionIndex() {

        parent::_acl('city_index');
        $model = new City();
        $criteria = new CDbCriteria();
        $criteria->order = 'id ASC';
        $count = $model->count( $criteria );
        $pages = new CPagination( $count );
        $pages->pageSize = 10;
        $criteria->limit = $pages->pageSize;
        $criteria->offset = $pages->currentPage * $pages->pageSize;
        $result = $model->findAll( $criteria );
        $this->render( 'index',array('datalist'=>$result, 'pagebar' => $pages));
    }

    /**
     * 录入
     *
     */
    public function actionCreate() {
        parent::_acl('city_create');
        $model = new City();
        if ( isset( $_POST['City'] ) ) {
            $model->attributes = $_POST['City'];
            if ($model->save()) {
                AdminLogger::_create( array ( 'catalog' => 'create' , 'intro' => '录入城市,ID:' . $model->id ) );
                $this->redirect( array ( 'index' ) );
            }
        }
        $this->render( 'create', array ( 'model' => $model ) );
    }

    /**
     * 更新
     *
     * @param  $id
     */
    public function actionUpdate( $id ) {
        parent::_acl('city_update');
        $model = parent::_dataLoad( new City(), $id );
        if ( isset( $_POST['City'] ) ) {
            $model->attributes = $_POST['City'];
            if ($model->save()) {
                AdminLogger::_create( array ( 'catalog' => 'create' , 'intro' => '录入城市,ID:' . $model->id ) );
                $this->redirect( array ( 'index' ) );
            }
        }
        $this->render( 'update', array ( 'model' => $model ) );

    }

    /**
     * 批量操作
     *
     */
    public function actionBatch() {
        if ( XUtils::method() == 'GET' ) {
            $command = trim( $_GET['command'] );
            $ids = intval( $_GET['id'] );
        } elseif ( XUtils::method() == 'POST' ) {
            $command = trim( $_POST['command'] );
            $ids = $_POST['id'];
            is_array( $ids ) && $ids = implode( ',', $ids );
        } else {
            XUtils::message( 'errorBack', '只支持POST,GET数据' );
        }
        empty( $ids ) && XUtils::message( 'error', '未选择记录' );

        switch ( $command ) {
            case 'delete':
                parent::_acl( 'city_delete' );
                AdminLogger::_create( array ( 'catalog' => 'delete' , 'intro' => '删除城市，ID:' . $ids ) );
                parent::_delete( new City(), $ids, array ( 'index' ));
                break;
            default:
                throw new CHttpException(404, '错误的操作类型:' . $command);
                break;
        }
    }
}
