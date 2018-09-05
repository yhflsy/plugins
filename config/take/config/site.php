<?php

defined('PIC_PATH') or define('PIC_PATH', "/img.happytoo.cn/"); // E:/webroot/i.tripb2b.com/i5.tripb2b.com/    

return array(
    'cookie_salt' => '8e0c1y2', //cookie签名
    'serverhost' => array(
        'member' => 'http://test.uc.service.etu6.org/', // 用户公司
        'fleet' => 'http://test.take.service.tripb2b.com/', //接送
        'site' => 'http://test.base.service.etu6.org/', // 基础
    ),
    'params' => array(
        'host' => array('sitename' => 'XXX',
            'web' => 'http://' . $_SERVER['SERVER_NAME'] . '/',
            'images' => 'http://img.etu6.org/',
        ),
        'upload' => PIC_PATH,
    ),
);
