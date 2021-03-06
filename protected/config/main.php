<?php
/**
 * 系统配置
 * 
 * @author        shuguang <5565907@qq.com>
 * @copyright     Copyright (c) 2007-2013 bagesoft. All rights reserved.
 * @link          http://www.bagecms.com
 * @package       BageCMS.Config
 * @license       http://www.bagecms.com/license
 * @version       v3.1.0
 */

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'preload'=>array('log'),
	'name'=>'风之都',
    'language'=>'zh_cn',
//	'theme'=>'default',
    'theme'=>'house',
    'timeZone'=>'Asia/Shanghai',
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.extensions.*',
	),
    'modules'=>array(
		'gii'=>array(
            		'class'=>'system.gii.GiiModule',
            		'password'=>'root19701029',
            		'ipFilters'=>array('127.0.0.1','::1','99.229.68.154','24.226.71.178'),
        	),

		'admini'=>array(
		     'class'=>'application.modules.admini.AdminiModule',
		),
		'account'=>array(
		     'class'=>'application.modules.account.AccountModule',
		)
	),
	'components'=>array(
		 'myClass' => array(
            	'class' => 'ext.MyClass',
        	),
      		'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning',
                ),
            ),
        ),
        'cache'=>array(
           'class'=>'CFileCache',
        ),
	'googleAnalytics' => array(
			'class' =>'ext.TPGoogleAnalytics.components.TPGoogleAnalytics',
			'account' => 'UA-71771242-1',
			'autoRender' => true,
	),
	'db'=>array(
			'connectionString' => 'mysql:host=127.0.0.1;dbname=hdm106787551_db',
			'emulatePrepare' => true,
			'enableParamLogging' => true,
			'enableProfiling'=>true,
			'username' => 'hdm106787551',
			'password' => 'MaplemYsql100',
			'charset' => 'utf8',
			'tablePrefix' => 'h_',
		),
		'errorHandler'=>array(
            'errorAction'=>'error/index',
        ), 
        'urlManager'=>array(
        	//'urlFormat'=>'path',
        	//'urlSuffix'=>'.html',
        	'showScriptName'=>true,
        	'rules'=>array(
        		'post/<id:\d+>/*'=>'post/show',
        		'post/<id:\d+>_<title:\w+>/*'=>'post/show',
        		'post/catalog/<catalog:[\w-_]+>/*'=>'post/index',
        		'page/show/<name:\w+>/*'=>'page/show',
        		'special/show/<name:[\w-_]+>/*'=>'special/show',
        		'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
        	),
        ),
		'mailer' => array(
			'class' => 'application.extensions.mailer.EMailer',
			'pathViews' => 'application.views.email',
			'pathLayouts' => 'application.views.email.layouts'
		),
	),
	'params'=> require(dirname(__FILE__).DS.'params.php'),
);
