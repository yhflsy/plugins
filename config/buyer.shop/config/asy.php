<?php

return array(
    'default' => array(
        'sitename' => 'XXX', // 网站统一标题后缀
        'asyqueue' => 'tcp://192.168.1.202:8091',
        'asyheartbeat' => 0,
        'asyservers' => array(
            'default' => array(
                'host' => '192.168.1.202',
                'port' => 8090
            ),
            'slave' => array(
                'host' => '192.168.1.202',
                'port' => 8092
            )
        )
    ),
);
