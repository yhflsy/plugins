<?php

return array(
    'default' => array(
        'enablesitefilter' => 1, // 过滤不可用站点
        'enablesitedup' => 1, // 启用站点同步
        'grade' => array(
            0 => '跟团游',
            1 => '自由行',
            2 => '自驾游'
        ),
        'traffictool' => array(
            9 => '待定',
            1 => '飞机',
            2 => '火车',
            3 => '高铁',
            4 => '动车',
            5 => '巴士',
            6 => '飞机+火车',
            7 => '飞机+巴士',
            8 => '邮轮',
        ),
        'trafficcategory' => array(
            '0' => '飞机',
            '1' => '汽车',
            '2' => '火车',
            '3' => '其他',
        ),
        'routetag' => array(
            '1' => '景点',
            '2' => '酒店',
            '3' => '用餐',
            '4' => '住宿',
            '5' => '其他',
            '6' => '自由活动',
        ),
        'category' => array(
            0 => 'New',
            1 => '热销',
            2 => '推荐',
            3 => '特价',
            4 => '豪华',
            5 => '纯玩',
            6 => '预约',
            15 => '品质',
        ),
        'columnflags' => array(
            91 => array(
                'name' => '甘青宁',
                'id' => 91,
                'list' => array(
                    array(
                        'name' => '甘肃',
                        'destinationId' => '100457',
                    ),
                    array(
                        'name' => '青海',
                        'destinationId' => '100472',
                    ),
                    array(
                        'name' => '宁夏',
                        'destinationId' => '100478',
                    ),
                ),
            ),
            92 => array(
                'name' => '东北',
                'id' => 92,
                'list' => array(
                    array(
                        'name' => '吉林',
                        'destinationId' => '100110',
                    ),
                    array(
                        'name' => '辽宁',
                        'destinationId' => '100095',
                    ),
                    array(
                        'name' => '黑龙江',
                        'destinationId' => '100121',
                    ),
                ),
            ),
            93 => array(
                'name' => '华东',
                'id' => 93,
                'list' => array(
                    array(
                        'name' => '上海',
                        'destinationId' => '102778',
                    ),
                    array(
                        'name' => '浙江',
                        'destinationId' => '100169',
                    ),
                    array(
                        'name' => '江苏',
                        'destinationId' => '100155',
                    ),
                ),
            ),
        ),
    ),
);
