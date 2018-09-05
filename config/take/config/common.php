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
            '2' => ['url' => '/system/company.password.html', 'name' => '密码管理'],
            '3' => ['url' => '/system/company.aptitude.html', 'name' => '资质信息']
        ),
        
        
        //take三期导航
        'take' => array(
            'companyList'=>array(),
            'items'=>array(
                'list' => array(
                    'url' => '/take/list.html?status=-1', 
                    'name' => '接送列表',
                    'subNav'=>array(
                        '0'=>array('url' => '/take/list.html?status=-1', 'name' => '城际用车','type'=>'city'),
                        '1'=>array('url' => '/take/list.take.html?status=-1', 'name' => '市区用车（专车）','type'=>'single'),
                    )
                 ),
                 'order' =>array(
                    'url' => '/order/index.html?ordercategory=3', 
                    'name' => '订单列表',
                    'subNav'=>array(
                        '0'=>array('url' => '/order/index.html?ordercategory=3', 'name' => '市区接/送(青岛)','type'=>'3'),
                        '1'=>array('url' => '/order/index.html?ordercategory=5', 'name' => '城际用车(青岛)','type'=>'5'),
                    )
                ),
            ),
        ),

        //take四期导航
        'take4' => array(
            'companyList'=>array("305582","305739","305741","305735","316752"),
            'items'=>array(
                'list' => array(
                    'url' => '/traffic/area.html', 
                    'name' => '接送列表',
                    'subNav'=>array(                
                        '0'=>array('url' => '/traffic/area.html', 'name' => '市区单接单送','type'=>'area'),
                        '1'=>array('url' => '/traffic/receive.html', 'name' => '接机/火车','type'=>'receive'),
                        '2'=>array('url' => '/traffic/send.html?isRelease=-1', 'name' => '送机/火车','type'=>'send'),
                        '3'=>array('url' => '/traffic/hotel.html?isRelease=-1', 'name' => '酒店到迪斯尼套餐','type'=>'hotel'),
                        '4'=>array('url' => '/traffic/airport.html?isRelease=-1', 'name' => '机场酒店到迪斯尼套餐','type'=>'airport'),
                    )
                 ),
                'order' =>array(
                    'url' => '/order/index.html?ordercategory=1', 
                    'name' => '订单列表',
                    'subNav'=>array(
                        '0'=>array('url' => '/order/index.html?ordercategory=1', 'name' => '接机','type'=>'1'),
                        '1'=>array('url' => '/order/index.html?ordercategory=2', 'name' => '送机','type'=>'2'),                 
                        '2'=>array('url' => '/order/index.html?ordercategory=4', 'name' => '市区接/送(上海)','type'=>'4'),                    
                        '3'=>array('url' => '/order/index.html?ordercategory=6', 'name' => '酒店-迪斯尼套餐','type'=>'6'),
                        '4'=>array('url' => '/order/index.html?ordercategory=7', 'name' => '机场-酒店-迪斯尼套餐','type'=>'7'),
                    )
                ),
            ),
        ),
       
        
        
    ),
    'pagesize' => array(0 =>'10',1 =>'20', 2 => '30', 3 => '50', 4 => '100'), 
);
