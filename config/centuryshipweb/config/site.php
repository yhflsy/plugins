<?php

defined('PIC_PATH') or define('PIC_PATH', "E:/webroot/i.tripb2b.com/i5.tripb2b.com/"); // E:/webroot/i.tripb2b.com/i5.tripb2b.com/    

return array(
    'cookie_salt' => '8e0c1y2', //cookie签名
    'serverhost' => array(
        'order' => 'http://test.order.service.etu6.org/', //订单  http://t.service.order.etu6.org/
        'insurance' => 'http://test.service.etu6.org/', // 保险 http://t.service.insurance.etu6.org/
        'favorite' => 'http://test.service.etu6.org/', // 收藏 http://t.service.favorite.etu6.org/
        'note' => 'http://test.service.etu6.org/', // 记事本 http://t.service.note.etu6.org/
        'integral' => 'http://test.service.etu6.org/', // 积分 http://t.service.integral.etu6.org/

        'line' => 'http://test.line.service.etu6.org/', // 线路 http://t.service.line.etu6.org/

         'sms' => 'http://t.sms.service.etu6.org/', // 短信
        
        'other' => 'http://test.service.etu6.org/',   // 其他 http://t.service.other.etu6.org/
        
        'base' => 'http://test.service.etu6.org',  // 总域,   // 其他 http://t.service.other.etu6.org/
        
        'news' => 'http://test.company.news.service.etu6.org/',  // 会员新闻
        'notice' => 'http://test.news.service.etu6.org/',  // 公告
        'message' => 'http://test.message.service.etu6.org/',  // 订单消息
        'pushapp' => 'http://t.push.service.etu6.org/',
        'mail' => 'http://test.mail.service.etu6.org/',  // 邮件
        'member' => 'http://test.uc.service.tripb2b.com/',  // 用户公司
        'flagship' => 'http://test.flagship.service.tripb2b.com/',  // 旗舰店
        'site' => 'http://test.base.service.etu6.org/',  // 基础
        'buyercy' => 'http://test.cy.buyer.etu6.org/',//旗舰店用户中心地址
        'websitecy' => 'http://test.centuryship.etu6.org/', //游轮后台官网地址
        'brand' => 'http://test.brand.service.tripb2b.com/',//品牌馆
    ),
    'service'=>array(
    	'passport' => 'http://test.passport.etu6.org/',  //passport地址
    ),
      
    'params' => array(
        'host' => array('sitename' => 'XXX',
            'web' => 'http://' . $_SERVER['SERVER_NAME'] . '/',
            'images' => 'http://img.etu6.org/',
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
