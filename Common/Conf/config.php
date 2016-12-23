<?php
return array(
	//'配置项'=>'配置值'
	//'配置项'=>'配置值'
	//数据库连接参数
    
    'DB_TYPE'               => 'mysql',     // 数据库类型
    'DB_HOST'               => 'localhost', // 服务器地址
    'DB_NAME'               => 'company',          // 数据库名
    'DB_USER'               => 'root',      // 用户名
    'DB_PWD'                => '123456',          // 密码
    'DB_PORT'               => '3306',        // 端口
    'DB_PREFIX'             => '',    // 数据库表前缀
	

    //点语法默认解析
    'TMPL_VAR_IDENTIFY'=>'array',
    'URL_MODEL'=>1,

    'DEFAULT_FILTER'=>'htmlspecialchars',



    'URL_HTML_SUFIX'=>'HTML',
);

// create table orders(
// id int not null primary key auto_increment,
// routeid int not null,
// userid int not null,
// price int not null,
// daytimes datetime
// )default charset=utf8;

// create table suggest(
// id int not null primary key auto_increment,
// name varchar(128),
// phone varchar(128),
// email varchar(128) not null,
// message text not null,
// daytimes datetime not null
// )default charset=utf8;

