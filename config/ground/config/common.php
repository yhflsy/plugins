<?php

defined('SYSPATH') or die('No direct script access.');
return array(
    'submenu' => array(//子菜单设置
        'main' => array(
            '0' => ['url' => '/take/list.html?status=-1', 'name' => '接送列表'],
            '1' => ['url' => '/take/index.html', 'name' => '订单列表'],
        ),
        'systemson' => array(//系统管理下子菜单
            '0' => ['url' => '/system/company.html', 'name' => '公司信息'],
            '1' => ['url' => '/system/person.html', 'name' => '个人信息'],
        ),
     
        
    ),
    'pagesize' => array(0 =>'10',1 =>'20', 2 => '30', 3 => '50', 4 => '100'), 
    'categrory' => array('创建订单','确认订单','卖家取消订单','支付订单','申请退款','已退款','拒绝退款','订单总价调整','游客信息变动','订单变动','删除订单','买家取消订单'),
);
