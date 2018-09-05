<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('SYSPATH') or die('No direct script access.');
return array(
    'cssHost' => 'http://' . DOMAIN_STATIC, //'http://static.etu6.org/t',
    'dir' => array(
        'web' =>'web',
        'buyer' =>array(    
            'tripb2b' => 'buyer/web.tripb2b.v3',
            'happytoo' => 'buyer/web.happytoo.v3',
            'mconline' => 'buyer/web.mconline.v2',
            'zhuanti' => 'buyer/zhuanti',
            'center' => 'buyer/member.center.v1',
            'centerto'=>'buyer/member.center.v2',
            'home'=>'buyer/home',
        ),
        'seller' =>'seller',
        //wap 暂时没分配
        'wap'=>array(
            'tripb2b' => 'wap/web.tripb2b.v1',
            'happytoo' => 'wap/web.happytoo.v1',
            'mconline' => 'wap/web.mconline.v1',
        ),
        'pay'=>'pay',
        'flagship'=>'flagship',
        'flagshipweb'=>'flagshipweb',
        'pinztour'=>'pinztour',
        'flagshipwap'=>'flagshipwap',
        'buyershop'=>'buyer.shop',
        'buyershopweb'=>'buyer.shopweb',
        'brandship'=>'centuryship',
        'brandweb'=>'centuryshipweb',
        'fleet' =>'fleet',
        'brand'=>'brand',
        'shopwebsite'=>'shopwebsite',
        'take' =>'take',
        'ground' =>'ground',
    ),
    'commonUrl'=>'common',
    'versions'=>'',
);
