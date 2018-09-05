<?php

class JSON {

    const CODE_OK = 200; // 成功
    const CODE_PARAMS_ERROR = 400; // 参数错误
    const CODE_AUTH_ERROR = 401; // 未授权
    const CODE_DENIED = 403; // 拒绝访问
    const CODE_NOT_FOUND = 404; // 找不到
    const CODE_SYSTEM_ERROR = 500; // 程序错误

    // 输出json数据
    public static function output($result, $code = self::CODE_OK, $message = '', $header = array()){
        $data = compact('result', 'code', 'message', 'header');
        self::debuginfo($data);
        $content = json_encode($data, JSON_UNESCAPED_UNICODE);
        header("Content-type: application/json; charset=utf-8", true);
        header("Content-length: " . strlen($content));
        exit($content);
    }

    // 调试信息
    public static function debuginfo(&$data){
        if (Kohana::$environment != Kohana::DEVELOPMENT
            && Kohana::$environment != Kohana::TESTING
        ){
            return ;
        }

        $profiling = array();
        foreach (Profiler::groups() as $group => $benchmarks) {
            $profiling[$group] = array();
            $count = 0;
            foreach ($benchmarks as $name => $tokens) {
                $stats = Profiler::stats($tokens);
                $profiling[$group][$count]['name'] = $name;
                $profiling[$group][$count]['count'] = count($tokens);
                foreach (array('min', 'max', 'average', 'total') as $key) {
                    $profiling[$group][$count]['time'][$key] = number_format($stats[$key]['time'], 6);
                }
                $count ++;
            }
        }

        $data['debug'] = $profiling;
    }
}
