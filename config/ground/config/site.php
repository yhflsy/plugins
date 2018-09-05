<?php

defined('PIC_PATH') or define('PIC_PATH', "E:/webroot/i.tripb2b.com/"); // E:/webroot/i.tripb2b.com/i5.tripb2b.com/

return array(
    'cookie_salt' => '8e0c1y2', //cookie签名
    'serverhost' => array(
        'default' => 'http://service.'.DOMAIN_SERVICE.'/', // 总域
        'member' => 'http://test.uc.service.etu6.org/', // 用户公司
        'ground' => 'http://test.localtravel.service.tripb2b.com/', //地接
        'site' => 'http://test.base.service.etu6.org/', // 基础
        'mail' => 'http://test.mail.service.etu6.org/',
        'notice' => 'http://test.notice.service.tripb2b.com', //站内信
        'pay' => 'http://test.pay.service.etu6.org/', // 支付
    ),
    'params' => array(
        'host' => array('sitename' => 'XXX',
            'web' => 'http://' . $_SERVER['SERVER_NAME'] . '/',
            'images' => 'http://img.d.etu6.org/',
        ),
        'upload' => PIC_PATH,
    ),
);
