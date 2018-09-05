<?php

class Log_File extends Kohana_Log_File
{
    public function __construct($directory, $configKey = 'default') {
        // 注册TCP日志
        if (class_exists('Log_Tcp')
            and isset($_COOKIE['_apilog'])
            and $_COOKIE['_apilog']
            and (Kohana::$environment === Kohana::DEVELOPMENT
                or Kohana::$environment === Kohana::TESTING)
        ) {
            Log_Tcp::getInstance()->selfAttach();
        } else {
            parent::__construct($directory);
        }
    }
}