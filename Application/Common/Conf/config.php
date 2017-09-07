<?php
return array(
		//'配置项'=>'配置值'
		'DEFAULT_V_LAYER'       =>  'View/default', // 默认的视图层名称

		'TMPL_L_DELIM'=>'<{', //修改左定界符
		'TMPL_R_DELIM'=>'}>',//修改右定界符

		//数据库配置

 		'DB_TYPE'   => 'mysql', // 数据库类型
 		'DB_NAME'   => 'tickets', // 数据库名
 		'DB_HOST'   => 'localhost', // 服务器地址
 		'DB_USER'   => 'root', // 用户名
 		'DB_PWD'    => '', // 密码
 		'DB_PORT'   => 3306, // 端口
 		'DB_PREFIX' => 't_', // 数据库表前缀
		'MODULE_ALLOW_LIST'=>array(
				'Home',
				'Admin',
		),
);
