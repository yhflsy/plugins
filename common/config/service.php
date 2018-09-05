<?php

return array(
    Kohana::DEVELOPMENT => array(
        'order' => 'http://order.service.d.etu6.org/', //订单
        'line' => 'http://line.service.d.etu6.org/', // 线路
        'insurance' => 'http://test.insurance.service.tripb2b.com/', // 保险
        'pays' => 'http://test.pay.service.etu6.org/',  // C++支付
        'favorite' => 'http://service.d.etu6.org/', // 收藏
        'note' => 'http://service.d.etu6.org/', // 记事本
        'integral' => 'http://service.d.etu6.org/', // 积分
        'finance' => 'http://service.d.etu6.org/',  //财务
        'sekill' => 'http://service.d.etu6.org/', //秒杀
        'hongbao' => 'http://service.d.etu6.org/',    // 红包
        'promote' => 'http://service.d.etu6.org/',    // 红包
        'web' => 'http://service.d.etu6.org/',  // 收客通
        'ad' => 'http://test.ad.service.etu6.org/',  // 广告
        'pay' => 'http://service.d.etu6.org/', // 支付
        'news' => 'http://service.d.etu6.org/',  // 资讯
        'inex' => 'http://service.d.etu6.org/',   // 指数
        'sms' => 'http://test.sms.service.etu6.org/', // 短信
        'other' => 'http://service.d.etu6.org/',   // 其他
        'default' => 'http://service.d.etu6.org/', // 总域
        'base' => 'http://test.base.service.etu6.org/',
        'notice' => 'http://news.service.tripb2b.com/',  // 公告
        'message' => 'http://test.message.service.etu6.org/',  // 订单消息
        'push' => 'http://test.push.service.etu6.org/',  //推送消息
        'member' => 'http://test.uc.service.etu6.org/',  // 用户公司
        'passport' => 'http://test.passport.etu6.org/',  //passport地址
        'mail' => 'http://test.mail.service.etu6.org/', //邮件发送
        'site' => 'http://test.base.service.etu6.org/',  // 基础
        'invoice' => 'http://test.invoice.service.etu6.org/',//发票服务
        'invoiceorder' => 'http://test.order.invoice.service.etu6.org/',
        'hotels' => 'http://test.base.service.etu6.org/',  // 酒店景点
        'fleet' => 'http://test.take.service.tripb2b.com/', //公司车队接送
    ),
    Kohana::TESTING => array(

    ),
    Kohana::STAGING => array(

    ),
    Kohana::PRODUCTION => array(

    ),
);