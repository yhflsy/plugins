<?php

defined('PIC_PATH') or define('PIC_PATH', "/img.happytoo.cn/"); // E:/webroot/i.tripb2b.com/i5.tripb2b.com/

defined('BASEDIR') or define('BASEDIR', realpath(dirname(__FILE__) . '/../../..'));

return array(
    'cookie_salt' => '8e0c1y2', //cookie签名
    'serverhost' => array(
        'receive' => 'http://test.receive.service.tripb2b.com/',  //java服务
        'member' => 'http://test.uc.service.etu6.org/',  //用户公司
        'site' => 'http://test.base.service.etu6.org/',  // 基础
        'message' => 'http://test.message.service.etu6.org/',  // 订单消息
	'operator' => 'http://test.receive.service.operator.tripb2b.com/',  //收客通计调服务
        'line' => 'http://test.line.service.etu6.org/', // 线路
        'site' => 'http://test.base.service.etu6.org/',  // 基础
        'default' => 'http://service.'.DOMAIN_SERVICE.'/', // 总域
        'base' => 'http://service.'.DOMAIN_SERVICE.'/',
        'promotion' => 'http://test.promotion.service.tripb2b.com/', // 营销活动
        'favorite' => 'http://test.favorite.service.etu6.org/', // 收藏 
//        'line' => 'http://service.'.DOMAIN_SERVICE.'/', // 线路
    ),
    'params' => array(
        'host' => array(
            'web' => 'http://' . $_SERVER['SERVER_NAME'] . '/',
            'images' => 'http://img.etu6.org/',
            'pay'=>'test.pay.etu6.org/shop/',
        ),
        'upload' => PIC_PATH,
    ),

);
