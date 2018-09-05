<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('SYSPATH') or die('No direct script access.');
return array(
    'website' => array(1 => '馨·驰誉', 2 => '馨·欢途', 4 => '美程'),
    'websitevalue' => array('tripb2b' => 1, 'happytoo' => 2, 'mconline' => 4),
    'key' => 'fjrbbb4xk3w0cacccpvjo0yx866vaa3d',//支付回调加密码Key
    'host' => array(//默认三个网站的二级域名不同，每个平台买卖首页三个域名的二级域名需一致
        'index' => array(
            'tripb2b' => DOMAIN_CY,
            'happytoo' => DOMAIN_HT,
            'mconline' => DOMAIN_MC,
        ),
        'buyer' => array(//要求买家域名中需含有buyer，与buyer/webconfig中的路由一致
            'tripb2b' => 'buyer.' . DOMAIN_CY,
            'happytoo' => 'buyer.' . DOMAIN_HT,
            'mconline' => 'buyer.' . DOMAIN_MC,
        ),
        'seller' => array(
            'tripb2b' => 'seller.' . DOMAIN_CY,
            'happytoo' => 'seller.' . DOMAIN_HT,
            'mconline' => 'seller.' . DOMAIN_MC,
        ),
        //wap 暂时没分配
        'wap' => array(
            'tripb2b' => 'wap.cy.etu6.org',
            'happytoo' => 'wap.ht.etu6.org',
            'mconline' => 'wap.mc.etu6.org',
        ),
        'shop' => array(
            'tripb2b' => 'test.wei.cy.etu6.org',
            'happytoo' => 'test.wei.ht.etu6.org',
            'mconline' => 'test.wei.mc.etu6.org',
        ),
        'flagship' => array(
            'tripb2b' => 'ship.tripb2b.org',
        ),
        'flagshipweb' => array(
            'tripb2b' => 'shipweb.tripb2b.org'
        ),
        'flagshipwap' => array(
            'tripb2b' => 'shipwap.tripb2b.org'
        ),
        'pay' => array(
            'tripb2b' => 'pay.' . DOMAIN_CY,
            'happytoo' => 'pay.' . DOMAIN_CY,
            'mconline' => 'pay.' . DOMAIN_CY,
        ),
        'buyershopwebsite' => array(
             'shopwebsite.d.etu6.org',
        ),
        'fleet' => array(
            'fleet.d.etu6.org',
        ),
        'take' => array(
            'take.d.etu6.org',
        ),
        'centuryshipweb' => array(
            'tripb2b' => 'censhipweb.tripb2b.org'
        ),
	
        'centuryship' => array(
            'tripb2b' => 'centuryship.etu6.org'
        ),
         'ground' => array(
            'ground.d.etu6.org',
        ),
         'zhuanti' => array(
            'test.zhuanti.etu6.org'
        ),
        'wei' => array(
            'tripb2bwap.cy.tb.yake.net'
        ),
    ),

    'baidu_stats' => array(
        'tripb2b' => '88425eaa269837e12ecbf2f7be95c9b1',
        'happytoo' => '83e4ff4400bbc68a913c87dbcc87db9d',
        'mconline' => 'eaca974e17de1e021febc6ee17fef36f',
    ),
    'charge' => array(
		'id' => '1000000007',
		'account' => '100000000000007',
		'url' => 'http://112.95.172.89:7080/recvcdkey.php',
		'key' => 'I5oCbrolpr4=',
	),
    'alipay'=>array(
        'companyid'=>array(95249,87103,71031,102783,28168,305692),
        'istranss'=>1
    ),
);
