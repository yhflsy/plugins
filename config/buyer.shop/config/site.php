<?php

defined('PIC_PATH') or define('PIC_PATH', "/img.happytoo.cn/"); // E:/webroot/i.tripb2b.com/i5.tripb2b.com/    

defined('BASEDIR') or define('BASEDIR', realpath(dirname(__FILE__) . '/../../..'));

return array(
    'cookie_salt' => '8e0c1y2', //cookie签名
    'serverhost' => array(
        'other' => 'http://test.service.etu6.org/',   // php服务
        'line' => 'http://test.service.etu6.org/',    //php线路服务
        'site' => 'http://test.base.service.etu6.org/',  // 基础java
        'receive' => 'http://test.receive.service.tripb2b.com/', // 收客通java
        'base' => 'http://test.service.etu6.org',
        'mail' => 'http://test.mail.service.etu6.org/',  //邮件发送
        'member' => 'http://test.uc.service.etu6.org/',  // 用户公司java
        'hotels' => 'http://test.base.service.etu6.org/',  // 酒店景点
		'message' => 'http://test.message.service.etu6.org/',  // 订单消息
        'mailnotice' => 'http://test.notice.service.tripb2b.com',//站内信
        'ground' => 'http://test.localtravel.service.tripb2b.com/', // 地接
        'hongbao' => 'http://service.'.DOMAIN_SERVICE.'/',    // 红包
        'integral' => 'http://service.'.DOMAIN_SERVICE.'/', // 积分
        'promotion' => 'http://test.promotion.service.tripb2b.com/', // 营销活动
    ),
      
    'params' => array(
        'host' => array(
            'web' => 'http://' . $_SERVER['SERVER_NAME'] . '/',
            'images' => 'http://img.etu6.org/',
            'shopweb' => 'test.shopweb.etu6.org'
        ),
        'upload' => PIC_PATH,
    ),

);
