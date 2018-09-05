<?php

defined('PIC_PATH') or define('PIC_PATH', "E:/webroot/i.tripb2b.com/i5.tripb2b.com/"); // E:/webroot/i.tripb2b.com/i5.tripb2b.com/    

return array(
    'cookie_salt' => '8e0c1y2', //cookie签名
    'serverhost' => array(
        'line' => 'http://test.line.service.etu6.org/', // 线路 http://t.service.line.etu6.org/
        'member' => 'http://test.uc.service.tripb2b.com/',  // 用户公司
        'brand' => 'http://test.brand.service.tripb2b.com/',//品牌馆
        'homehost'=>'http://test.centuryshipweb.etu6.org/',//品牌馆前台域名
        
        'message' => 'http://test.message.service.etu6.org/',  // 订单消息
        'finance' => 'http://test.service.etu6.org/',  //财务(订单支付
        'orderdetail' => 'http://test.order.service.etu6.org/', //订单详情 
        'site' => 'http://test.base.service.etu6.org',  //基础服务
    ),
    'service'=>array(
    	'passport' => 'http://test.passport.etu6.org/',  //passport地址
        
    ),
      
    'params' => array(
        'host' => array('sitename' => 'XXX',
            'web' => 'http://' . $_SERVER['SERVER_NAME'] . '/',
            'images' => 'http://img.d.etu6.org/',
        ),
        'upload' => PIC_PATH,
    ),

);
