<?php
//$config = array(
//
//	/* 项目信息设置 */
//	'DEVELOP'            => 'ZJWLGR', //开发者 昵称
//	'WEB_URL'            => 'http://www.XXXX.com',     // 项目域名
//	'WEB_TITLE'          => 'WEB_TITLE',     // 项目名称
//	'ADMIN_NAME'		 => '网站后台管理系统',// 后台管理 名称
//	'ADMIN_VERSION'      => 'ZJWLGR.TP2.0', //后台框架版本
//
//	/* URL设置 */
//	'URL_HTML_SUFFIX'       => 'html',  // URL伪静态后缀设置
//    'URL_CASE_INSENSITIVE'  =>  true,   // 默认false 表示URL区分大小写 true则表示不区分大小写
//    'URL_MODEL'             =>  2,       // URL访问模式,可选参数0、1、2、3,代表以下四种模式：
//    // 0 (普通模式); 1 (PATHINFO 模式); 2 (REWRITE  模式); 3 (兼容模式)  默认为PATHINFO 模式
//
//	/* 子域名设置 */
//	'APP_SUB_DOMAIN_DEPLOY' =>  false,   // 是否开启子域名部署
//    'APP_SUB_DOMAIN_RULES'  =>  array(
//		'admin'        => 'Admin',  // admin子域名指向Admin模块
//		'admin.domain1.com'  => 'Admin'  // admin.domain1.com域名指向Admin模块
//	), // 子域名部署规则
//
//	'MODULE_ALLOW_LIST'  => array('Home','adminindex','Api'),//要访问的模块
//	'MODULE_DENY_LIST'   => array('Common','Runtime'),//禁止访问的模块
//	'DEFAULT_MODULE'     => 'Home',//默认模块
//	'URL_DENY_SUFFIX'    => 'ico|png|gif|jpg', // URL禁止访问的后缀设置
//	'CONTROLLER_LEVEL'   =>  1,//设置控制器的分级层次
//	'URL_MODULE_MAP'     =>  array('adminindex'=>'admin'),//设置了模块映射后，原来的Admin模块将不能访问，只能访问test模块。
//
//
//	/* 数据库设置 */
//    'DB_TYPE'               =>  'mysql',     // 数据库类型
//    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
//    'DB_NAME'               =>  'yufenxiang',          // 数据库名
//    'DB_USER'               =>  'yufenxiang',      // 用户名
//    'DB_PWD'                =>  '1qaz2wsx',          // 密码
//    'DB_PORT'               =>  '3306',        // 端口
//    'DB_PREFIX'             =>  'wl_',    // 数据库表前缀
//    'DB_FIELDTYPE_CHECK'    =>  false,       // 是否进行字段类型检查
//    'DB_FIELDS_CACHE'       =>  true,        // 启用字段缓存
//    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
//    'DB_DEPLOY_TYPE'        =>  0, // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
//    'DB_RW_SEPARATE'        =>  false,       // 数据库读写是否分离 主从式有效
//    'DB_MASTER_NUM'         =>  1, // 读写分离后 主服务器数量
//    'DB_SLAVE_NO'           =>  '', // 指定从服务器序号
//    'DB_SQL_BUILD_CACHE'    =>  false, // 数据库查询的SQL创建缓存
//    'DB_SQL_BUILD_QUEUE'    =>  'file',   // SQL缓存队列的缓存方式 支持 file xcache和apc
//    'DB_SQL_BUILD_LENGTH'   =>  20, // SQL缓存的队列长度
//    'DB_SQL_LOG'            =>  false, // SQL执行日志记录
//    'DB_BIND_PARAM'         =>  false, // 数据库写入数据自动参数绑定
//
//	//$Admin->getlastsql();//打印sql语句
//    'APITYPE'       =>  array(
//        '1' => '美术空间API 域名-http://www.meishuroom.com/',
//		'2' => '帖子相关API'
//
//    ),
//
//	'WXPAYSTR'  =>  array(//微信app支付，所需信息
//			'MCHID'     => '1386190402',// 微信支付商户号 PartnerID 通过微信支付商户资料审核后邮件发送
//			'APPID'     => 'wxf8c494e4e419cd18',// 公众号APPID 通过微信支付商户资料审核后邮件发送
//			'SECRETKEY' => 'qweasdzxcrfvbgtyhn654321wsxcderf',// https://pay.weixin.qq.com 帐户设置-安全设置-API安全-API密钥-设置API密钥
//			'NOTIFYURL'    =>  'http://www.meishuroom.com/Api/Pay/notify_wx', //微信APP支付 回调地址
//	)
//
//);
//return array_merge($config, require($_SERVER['DOCUMENT_ROOT'].'/db.inc.php'));