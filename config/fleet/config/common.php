<?php

defined('SYSPATH') or die('No direct script access.');
return array(
    'submenu' => array(//子菜单设置
        'main' => array(
            '0' => ['url' => '/take/', 'name' => '接送列表'],
        ),
        'systemson' => array(//系统管理下子菜单
            '0' => ['url' => '/system/company.html', 'name' => '公司信息'],
            '1' => ['url' => '/system/person.html', 'name' => '个人信息'],
        ),
        'take' => array(//系统管理下子菜单
            '0' => ['url' => '/take/list.html', 'name' => '接送列表'],
           
        ),
    ),
    'pagesize' => array(0 =>'10',1 =>'20', 2 => '30', 3 => '50', 4 => '100'), 
);
