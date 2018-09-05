<?php defined('SYSPATH') OR die('No direct script access.');

return array(

    'default' => array(
        'key' => '8e0c1y2a8e0c1y2a',
        'mode' => MCRYPT_MODE_NOFB,
        'cipher' => MCRYPT_RIJNDAEL_128
    ),

    'relogin' => array(
        'key' => '8e0c1y208e0c1y208e0c1y208e0c1y20',
        'mode' => MCRYPT_MODE_NOFB,
        'cipher' => MCRYPT_RIJNDAEL_128
    ),

);