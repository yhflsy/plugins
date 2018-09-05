<?php

return array(
    'default' => array(
        'enable' => true,

        /* redis 相关*/
        'redis_host' => '172.17.9.29',
        'redis_port' => 6379,
        'connect_timeout' => 1,

        /* 微信配置 */
        'weixin' => [
            'app_id' => 'wxcf2e9813893f85fb',
            'app_secret' => 'd4624c36b6795d1d99dcf0547af5443d',
            'templateid' => "szySdm-neflosUFk3UFJh13ubiNn9-jKpXVHIjAcnHA",
        ],
    ),

    'dev' => array(
        'enable' => true,

        /* redis 相关*/
        'redis_host' => '172.17.9.29',
        'redis_port' => 6379,
        'connect_timeout' => 1,

        /* 微信配置 */
        'weixin' => [
            'app_id' => 'wxcf2e9813893f85fb',
            'app_secret' => 'd4624c36b6795d1d99dcf0547af5443d',
            'templateid' => "szySdm-neflosUFk3UFJh13ubiNn9-jKpXVHIjAcnHA",
        ],
    ),

    'test' => array(
        'enable' => true,

        /* redis 相关*/
        'redis_host' => '172.17.9.29',
        'redis_port' => 6379,
        'connect_timeout' => 1,

        /* 微信配置 */
        'weixin' => [
            'app_id' => 'wxcf2e9813893f85fb',
            'app_secret' => 'd4624c36b6795d1d99dcf0547af5443d',
            'templateid' => "szySdm-neflosUFk3UFJh13ubiNn9-jKpXVHIjAcnHA",
        ],
    ),

    'pre' => array(
        'enable' => true,

        /* redis 相关*/
        'redis_host' => '10.0.1.177',
        'redis_port' => 6379,
        'connect_timeout' => 1,
        'redis_auth' => 'tripb2b',

        /* 微信配置 */
        'weixin' => [
            'app_id' => 'wxcf2e9813893f85fb',
            'app_secret' => 'd4624c36b6795d1d99dcf0547af5443d',
            'templateid' => "szySdm-neflosUFk3UFJh13ubiNn9-jKpXVHIjAcnHA",
        ],
    ),

    'product' => array(
        'enable' => true,

        /* redis 相关*/
        'redis_host' => '10.0.0.23',
        'redis_port' => 6379,
        'connect_timeout' => 0.3,

        /* 微信配置 */
        'weixin' => [
            'app_id' => 'wxcf2e9813893f85fb',
            'app_secret' => 'd4624c36b6795d1d99dcf0547af5443d',
            'templateid' => "szySdm-neflosUFk3UFJh13ubiNn9-jKpXVHIjAcnHA",
        ],
    ),
);