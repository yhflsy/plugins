<?php
defined('PIC_PATH') or define('PIC_PATH', "//192.168.1.251/img.happytoo.cn/"); // E:/webroot/i.tripb2b.com/i5.tripb2b.com/    
if (!defined('BASEDIR'))
    define('BASEDIR', realpath(dirname(__FILE__) . '/../../..'));
	
return array(
    'cookie_salt' => '8e0c1y2', //cookie签名

    'service' => array(

        
        'base' => 'http://test.service.etu6.org',  // 总域
		

        'site' => 'http://test.service.etu6.org',  // 基础

		'receive' => 'http://test.receive.service.tripb2b.com/', // 收客通java
    ),
      
    'params' => array(
        'host' => array(
            'web' => 'http://' . $_SERVER['HTTP_HOST'] . '/',
    //host在 plugins/clientrest/config/common.php中设置三网首页域名，买卖家用户中心域名在 plugins/clientrest/config/site.php 中设置 site.params.host
            'images' => 'http://imgtest.happytoo.cn/',

            'zutuan' => 'http://pre.shopweb.tripb2b.com/',
        ),
        'upload' => PIC_PATH,
        'smtpserver' => array(
            'Host' => 'smtp.163.com', // SMTP server
            'SMTPDebug' => FALSE, //Sets SMTP class debugging on or off.
            'SMTPAuth' => TRUE, // Sets SMTP authentication. Utilizes the Username and Password variables.
            'SMTPSecure' => '', // sets the prefix to the servier,Options are "", "ssl" or "tls"
            'Port' => 25, // set the SMTP port for the mail server
            'Username' => 'm15397833753@163.com',
            'Password' => '1690lost',
            'SetFrom' => 'm15397833753@163.com',
            'SetFromName' => '馨·驰誉•馨·欢途',
            'IsHTML' => TRUE
        ),
    ), 
);