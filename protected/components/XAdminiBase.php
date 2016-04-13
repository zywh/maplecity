<?php
/**
 * 后台管理基础类，后台控制器必须继承此类
 * 
 * @author        shuguang <5565907@qq.com>
 * @copyright     Copyright (c) 2007-2013 bagesoft. All rights reserved.
 * @link          http://www.bagecms.com
 * @package       BageCMS.Admini.Controller
 * @license       http://www.bagecms.com/license
 * @version       v3.1.0
 */

class XAdminiBase extends Controller
{
    protected $_admini;
    protected $_catalog;
    public function init ()
    {
        parent::init();
        if (isset($_POST['sessionId'])) {
            $session = Yii::app()->getSession();
            $session->close();
            $session->sessionID = $_POST['sessionId'];
            $session->open();
        }
        $this->_admini = parent::_sessionGet('_admini');
        if (empty($this->_admini['userId']))
            $this->redirect(array ('public/login' ));
        //栏目
        $this->_catalog = Catalog::model()->findAll();
    }

    /**
     * 配置文件中参数检测
     */
    protected function _configParams($params){
        if(Yii::app()->params[$params['action']] != $params['val'] && $params['response'] =='json'){
            exit(CJSON::encode(array('state'=>'error', 'message'=>$params['message'])));
        }elseif(Yii::app()->params[$params['action']] != $params['val']&& $params['response'] =='text'){
            exit($params['message']);
        }elseif(Yii::app()->params[$params['action']] != $params['val']){
            $tplVar = array(
                'code'=>'访问受限',
                'message'=>$params['message'],
                'redirect'=>$params['redirect'] ? $params['redirect'] : Yii::app()->request->urlReferrer ,
            );
            exit($this->render('/_include/_error', $tplVar));
        }
    }

    /**
     * 自动获取关键词(调用第三方插件)
     * @return [type] [description]
     */
    public function actionKeyword()
    {
        $string = trim($this->_gets->getParam('string'));
        $return  = XAutoKeyword::discuz($string);
        if($return  == 'empty'){
            $data['state'] = 'error';
            $data['message'] = '未成功获取';
        }else{
            $data['state'] = 'success';
            $data['message'] = '成功获取';
            $data['datas'] = $return;
        }
        exit(CJSON::encode($data)); 
    }

    /**
     * 更新基类
     *
     * @param $model 模块
     * @param $field 字段
     * @param $redirect 跳转
     * @param $tpl 模板
     * @param $pkField 主键id
     */
    protected function _update ($model, $redirect = 'index', $tpl = '', $id = 0, $pkField = 'id', $field = '')
    {
        $modelName = ! $field ? get_class($model) : $field;
        $data = $model->findByPk($id);
        $data === null && XUtils::message('error', '记录不存在');
        if (isset($_POST[$modelName])) {
            $data->attributes = $_POST[$modelName];
            if ($data->save()) {
                self::_adminiLogger(array ('catalog' => 'update' , 'intro' => '调用基类更新数据，来自模块：' . $this->id . '，方法：' . $this->action->id )); //日志
                $this->redirect($redirect);
            }
        }
        $this->render($tpl, array ('model' => $data ));
    }

    /**
     * 录入基类
     *
     * @param $model 模块
     * @param $field 字段
     * @param $redirect 跳转
     * @param $tpl  模板
     */
    protected function _create ($model, $redirect = 'index', $tpl = '', $field = false)
    {
        $modelName = ! $field ? get_class($model) : $field;
        
        if (isset($_POST[$modelName])) {
            $model->attributes = $_POST[$modelName];
            $id = $model->save();
            if ($id) {
                self::_adminiLogger(array ('catalog' => 'update' , 'intro' => '调用基类录入数据，来自模块：' . $this->id . '，方法：' . $this->action->id . ',ID:' . $id )); //日志
                $this->redirect($redirect);
            }
        }
        $this->render($tpl, array ('model' => $model ));
    }

    /**
     * 删除数据及附件
     *
     * @param $model  模型
     * @param $id  要删除的数据id
     * @param $redirect 跳转地址
     * @param $attach 附件字段
     * @param $conditionField 条件id
     */
    protected function _delete ($model = null, $id = '', $redirect = 'index', $attach = null, $pkField = 'id')
    {
        if ($attach) {
            $data = $model->findAll($pkField . ' IN(:id)', array (':id' => $id ));
            foreach ((array) $data as $row) {
                foreach ((array) $attach as $value) {
                    if (! empty($row[$value])) {
                        @unlink($row[$value]);
                    }
                }
            }
        }
        $result = $model->deleteAll(array ('condition' => 'id IN(' . $id . ')' ));
        //刷新缓存
        self::_refreshCache($model);
        $this->redirect($redirect);
    }

    /**
     * 审核基础类
     *
     * @param $model
     * @param $type
     * @param $id
     * @param $redirect
     * @param $attach
     * @param $pkField
     */
    protected function _verify ($model = null, $type = 'verify', $id = '', $redirect = 'index', $cdField = 'status_is', $pkField = 'id')
    {
        $criteria = new CDbCriteria();
        $criteria->condition = $pkField . ' IN(' . $id . ')';
        $showStatus = $type == 'verify' ? 'Y' : 'N';
        $result = $model->updateAll(array ($cdField => $showStatus ), $criteria);
        //刷新缓存
        self::_refreshCache($model);
        $this->redirect($redirect);
    }

    /**
     * 推荐基础类
     *
     * @param $model
     * @param $type
     * @param $id
     * @param $redirect
     * @param $attach
     * @param $pkField
     */
    protected function _commend ($model = null, $type = 'commend', $id = '', $redirect = 'index', $pkField = 'id')
    {
        $criteria = new CDbCriteria();
        $criteria->condition = $pkField . ' IN(' . $id . ')';
        $commend = $type == 'commend' ? 'Y' : 'N';
        $result = $model->updateAll(array ('commend' => $commend ), $criteria);
        //刷新缓存
        self::_refreshCache($model);
        $this->redirect($redirect);
    }

    /**
     * 自定义推荐基础类
     *
     * @param $model
     * @param $type
     * @param $id
     * @param $redirect
     * @param $attach
     * @param $pkField
     */
    protected function _recommend ($model = null, $type = 'recommend', $id = '', $redirect = 'index', $pkField = 'id')
    {
        $criteria = new CDbCriteria();
        $criteria->condition = $pkField . ' IN(' . $id . ')';
        $recommend = $type == 'recommend' ? 1 : 0;
        $result = $model->updateAll(array ('recommend' => $recommend ), $criteria);
        //刷新缓存
        self::_refreshCache($model);
        $this->redirect($redirect);
    }

     /**
     * 刷新内置缓存
     * @param  $model
     */
    protected function _refreshCache ($model)
    {
        if (is_object($model)) {
            $modelx = get_class($model);
        } else {
            $modelx = $model;
        }
        switch (strtolower($modelx)) {
            case 'link':
                XXcache::refresh('_link', 86400);
                break;
            case 'ad':
                XXcache::refresh('_ad', 86400);
                break;
            case 'catalog':
                XXcache::refresh('_catalog', 86400);
                break;
            case 'UserGroup':
                XXcache::refresh('_userGroup', 86400);
                break;
        }
    }

    /**
     * 系统组禁止操作
     * @param $group
     * @throws CHttpException
     */
    protected function _groupPrivate ($groupId = 0, $noAccess = array('1', '2'))
    {
        if(is_array($groupId)){
            foreach ($group as $value) {
               if (in_array($groupId, $noAccess))
                throw new CHttpException(404, '系统组不允许进行此操作');
            }
        }else{
             if (in_array($groupId, $noAccess))
                throw new CHttpException(404, '系统组不允许进行此操作');
        }
    }

    /**
     * 取用户组列表
     * @param $type
     */
    protected function _groupList ($type = 'user')
    {
        switch ($type) {
            case 'user':
                return AdminGroup::model()->findAll();
                break;
            case 'subject':
                return Subject::model()->findAll();
                break;
            case 'city':
                return City::model()->findAll();
                break;
            case 'district':
                return District::model()->findAll();
                break;
            case 'investType':
                return InvestType::model()->findAll();
                break;
            case 'propertyType':
                return PropertyType::model()->findAll();
                break;
            case 'house':
                return House::model()->findAll();
                break;
            case 'match':
                return Match::model()->findAll();
                break;
        }
    }

    /**
     * 权限检测
     * 超级用户组跳过检测
     * 附加 index_index 后台首页,防止重复验证权限
     * @param $action
     */
    
    protected function _acl ($action = false, $params = array('response'=>false, 'append'=>',default_index,default_home'))
    {
        $actionFormat = empty($action) ? strtolower($this->id . '_' . $this->action->id) : strtolower($action);
        if (empty($this->_admini['super'])) {
            $aclDb = AdminGroup::model()->findByPk($this->_admini['groupId']);
            try {
                if (! in_array($actionFormat, explode(',', strtolower($aclDb->acl) . $params['append']))){
                    throw new Exception('当前角色组无权限进行此操作，请联系管理员授权');
                }
            } catch (Exception $e) {
                if($params['response'] == 'text'){
                    exit($e->getMessage()); 
                }elseif($params['response'] == 'json'){
                    $var['state'] = 'error';
                    $var['message'] = $e->getMessage();
                    exit(CJSON::encode($var)); 
                }else{
                    $referrer = Yii::app()->request->urlReferrer? Yii::app()->request->urlReferrer : $this->createUrl('default/home') ;
                    if(preg_match("/default\/index/i", $referrer))
                        $referrer =  $this->createUrl('default/home') ;
                    $tplVar = array(
                        'code'=>'访问受限',
                        'message'=>$e->getMessage(),
                        'redirect'=>$params['redirect'] ? $params['redirect'] : $referrer ,
                    );
                    exit($this->render('/_include/_error', $tplVar));
                }
            }
        }
    }

    protected function _ajax_acl ($action = false, $params = array('response'=>false, 'append'=>',default_index,default_home'))
    {
        $actionFormat = empty($action) ? strtolower($this->id . '_' . $this->action->id) : strtolower($action);
        if (empty($this->_admini['super'])) {
            $aclDb = AdminGroup::model()->findByPk($this->_admini['groupId']);
            try {
                if (in_array($actionFormat, explode(',', strtolower($aclDb->acl) . $params['append']))){
                    return true;
                }else{
                    return false;
                }
            } catch (Exception $e) {
                if($params['response'] == 'text'){
                    exit($e->getMessage());
                }elseif($params['response'] == 'json'){
                    $var['state'] = 'error';
                    $var['message'] = $e->getMessage();
                    exit(CJSON::encode($var));
                }else{
                    $referrer = Yii::app()->request->urlReferrer? Yii::app()->request->urlReferrer : $this->createUrl('default/home') ;
                    if(preg_match("/default\/index/i", $referrer))
                        $referrer =  $this->createUrl('default/home') ;
                    $tplVar = array(
                        'code'=>'访问受限',
                        'message'=>$e->getMessage(),
                        'redirect'=>$params['redirect'] ? $params['redirect'] : $referrer ,
                    );
                    exit($this->render('/_include/_error', $tplVar));
                }
            }
        }else{
            return true;
        }
    }

    /**
     * 编辑器文件上传
     */
    public function actionUpload ()
    {
        if (XUtils::method() == 'POST') {
            $file = XUpload::upload($_FILES['imgFile']);
            if (is_array($file)) {
                $model = new Upload();
                $model->user_id = intval($admini['userId']);
                $model->file_name = CHtml::encode($file['pathname']);
                $model->thumb_name = CHtml::encode($file['paththumbname']);
                $model->real_name = CHtml::encode($file['name']);
                $model->file_ext = $file['extension'];
                $model->file_mime = $file['type'];
                $model->file_size = $file['size'];
                $model->save_path = $file['savepath'];
                $model->hash = $file['hash'];
                $model->save_name = $file['savename'];
                $model->create_time = time();
                if ($model->save()) {
                    exit(CJSON::encode(array ('error' => 0 , 'url' => Yii::app()->baseUrl . '/' . $file['pathname'] )));
                } else {
                    @unlink($file['pathname']);
                    @unlink($file['paththumbname']);
                    exit(CJSON::encode(array ('error' => 1 , 'message' => '上传错误' )));
                }
            
            } else {
                exit(CJSON::encode(array ('error' => 1 , 'message' => '上传错误:'.$file )));
            }
        }
    }
}

?>