<?php

/**
 * 异步调用类[客户端]
 *
 * @since 1.0
 * @access public
 * @author EcaiYing<84808313@qq.com>
 * @copyright (c) 2015, TanJiajun $Id$
 */
final class Asy {

    public static $config;

    /**
     * 发送邮件
     * @param type $params
     */
    public static function sendMail($to,$subject,$content='',$callback='') {
        $evt = 'mail';
        $act = 'send';
        $params = array('to'=>$to,'subject'=>$subject,'content'=>$content,'callback'=>$callback);
        return self::synService($evt, $act, $params);
    }

    /**
     * 发送短信
     * @param type $params
     */
    public static function sendSms($to,$content,$callback='') {
        $evt = 'sms';
        $act = 'send';
        if (strpos($to, ',') == false) {
                $params = array('mobile' => $to, 'content' => $content,'callback'=>$callback);
        } else {
                $params = array('mobile' => explode(',', $to), 'content' =>$content,'callback'=>$callback);
        }
        return self::synService($evt, $act, $params);
    }

    /**
     * 推送消息
     * @param type $params
     */
    public static function pushMsg($params) {
        $evt = 'push';
        $act = 'send';
        return self::synService($evt, $act, $params);
    }
    
   /**
    * 
    * @param type $params
    * @return type
    */
    public static function pushPC($params=NULL){
        $evt = 'msg';
        $act = 'pushpc';
        $params = array('msg'=>$params);
        return self::synService($evt, $act, $params);
    }

        /**
     * 设置消息
     * @param type $msgstate 消息类型
     * @param type $key
     * @param type $value
     * @return boolean
     */
    public static function messageSet($msgstate, $key, $value) {
        $evt = 'msg'; 
        $act = 'add';
        $key = self::getUniqueKey($key);
        $result = self::synService($evt, $act, array('type' => $msgstate, 'key' => $key, 'content' => $value));
        $result['flags'] = base64_encode($msgstate.'�'.$key);
        return $result;
    }

    /**
     * 获取key的唯一编号
     * @param string $key
     * @return string
     */
    public static function getUniqueKey($key){
        $key =$key.uniqid();
        return $key;
    }

    /**
     * 获取消息
     * @param type $msgstate
     * @param type $key
     * @param type $deleted 是否获取后就删除
     * @return type
     */
    public static function messageGetuniq($msgstate, $key, $deleted = false) {
        $evt = 'msg';
        $act = 'get';
        return self::synService($evt, $act, array('type' => $msgstate, 'key' => $key, 'deleted' => $deleted));
    }
    
    /**
     * 将获取消息的唯一标示号拆分为type和key
     * @param type $flags
     * @param type $deleted
     * @return type
     */
    public static function messageGet($flags,$deleted = false){
        $params = base64_decode($flags);
        $type = substr($params,0, strpos($params, '�'));
        $key = substr($params, strpos($params, '�')+1);
        return self::messageGetuniq($type,$key,$deleted);
    }

    /**
     * 删除消息
     * @param string $msgstate
     * @param type $key
     * @return type
     */
    public static function messageDeluniq($msgstate, $key) {
        $evt = 'msg';
        $act = 'del';
        return self::synService($evt, $act, array('key' => $key, 'type' => $msgstate));
    }
    
    /**
     * 将删除消息的唯一标示号拆分为type和key
     * @param type $params
     * @return type
     */
    public static function messageDel($params){
        $params = base64_decode($flags);
        $type = substr($params,0, strpos($params, '�'));
        $key = substr($params, strpos($params, '�')+1);
        return self::messageDeluniq($msgstate, $key);
    }
    /**
     * 获取消息分类数量
     * @param array $msgstates
     * @return array
     */
    public static function messageCategoryStat($msgstates) {
        $evt = 'msg';
        $act = 'stat';
        return self::synService($evt, $act, array('categorys' => $msgstates));
    }

    /**
     * 获取消息的列表IDS
     * @param type $msgstate
     */
    public static function messageIds($msgstate) {
        $evt = 'msg';
        $act = 'ids';
        return self::synService($evt, $act, array('type' => $msgstate));
    }

    /**
     * 获取所有的消息列表
     * @param string $msgstate
     * @return array
     */
    public static function messages($msgstate) {
        $evt = 'msg';
        $act = 'list';
        return self::synService($evt, $act, array('type' => $msgstate));
    }
    
    
    /**
     * 异步SQL队列插入
     * @param type $sql
     * @param type $key
     * @param type $priority 优先级
     */
    public static function sqlQueueAdd($sql, $key = '', $priority = 0, $onschedule = 0, $callback = '') {
        $evt = 'sql';
        $act = 'add';
        return self::synService($evt, $act, array('key' => $key, 'sql' => $sql, 'priority' => $priority, 'onschedule' => $onschedule, 'callback' => $callback));
    }

    /**
     * 设置缓存多个值
     * @param array $keyvals
     * @return array
     */
    public static function cacheSets($keyvals) {
        $evt = 'cache';
        $act = 'sets';
        return self::synService($evt, $act,array('vals' => $keyvals));
    }
    
    /**
     * 设置缓存单Key值
     * @param array $key
     * @return true
     */
    public static function cacheSet($key, $val, $lifetime = NULL) {
        $evt = 'cache';
        $act = 'set';
        return self::synService($evt, $act,array('id' => $key, 'data' => $val, 'lifetime' => $lifetime));
    }    
    
    /**
     * 获取缓存多个值
     * @param array $keyvals
     * @return array
     */
    public static function cacheGets($keys) {
        $evt = 'cache';
        $act = 'gets';
        return self::synService($evt, $act, array('keys' => $keys));
    }
    
    /**
     * 获取缓存Key值
     * @param array $keyvals
     * @return mix
     */
    public static function cacheGet($key, $default = NULL) {
        $evt = 'cache';
        $act = 'get';
        return self::synService($evt, $act, array('id' => $key, 'default' => $default));
    }
    
    /**
     * 删除缓存Key值
     * @param array $keyvals
     * @return mix
     */
    public static function cacheDel($key) {
        $evt = 'cache';
        $act = 'delete';
        return self::synService($evt, $act, array('id' => $key));
    }
    
    /**
     * 减少原子标量值
     * @param type $key
     * @param type $base 指定原子基数
     * @return int
     */
    public static function cacheDecr($key, $base = 0) {
        $evt = 'cache';
        $act = 'decr';
        return self::synService($evt, $act, array('id' => $key, 'step' => $base));
    }
    
    /**
     * 添加原子标量值
     * @param type $key
     * @param type $base 指定原子基数
     * @return int
     */
    public static function cacheIncr($key, $base = 0) {
        $evt = 'cache';
        $act = 'incr';
        return self::synService($evt, $act, array('id' => $key, 'step' => $base));
    }
    
    /**
     * 异步业务请求
     * @param type $evt
     * @param type $method
     * @param type $params
     */
    private static function synService($evt, $act, $params, $type = 'POST') {
        if (! isset(self::$config)) {
            self::$config = Kohana::$config->load('asy')->default;
        }

        $postparams['act'] = $act;
        $postparams['evt'] = $evt;
        $postparams['params'] = $params;
        $data = http_build_query($postparams);

        $opts = array(
            'http' => array(
                'method' => 'POST',
                'header' => "Content-type: application/x-www-form-urlencoded\r\n" .
                "Content-Length: " . strlen($data) . "\r\n",
                'content' => $data
            )
        );

        $context = stream_context_create($opts);
        // 获取有效服务器列表
        $servers = self::getAsyServers();
        
        if (isset(self::$config['asyheartbeat']) && self::$config['asyheartbeat'] == 0) {
            $hostport = array_shift($servers); // 取第一组
        } else {
            $hostport = array_rand($servers); // 随机选择
        }

        $result = file_get_contents("http://{$hostport['host']}:{$hostport['port']}", false, $context);
        return $result ? igbinary_unserialize($result) : NULL;
    } 
    
    /**
     * 根据请求时间和传入id生成序列号
     */
    public static function getSerialNO($id){
        $data = $_SERVER ['REQUEST_TIME'];
        $data .= $id;
        return $data;
    }
    
    /**
     * 生成唯一序列
     * @param type $id
     */
    public static function id2SeqNo($msgid, $key) {
        return Encrypt::instance()->encode($msgid  . '』'. $key . '』' . uniqid());
    }
    
    /**
     * 获取可用的服务器列表 
     */
    private static function getAsyServers() {
        $timeout = 2;
        $errno = $errstr = '';
        $servers = array();

        if (!isset(self::$config['asyservers']) || empty(self::$config['asyservers'])) {
            throw new Kohana_Exception('异步服务器组参数未配置！');
        }
        
        foreach (self::$config['asyservers'] as $v) {
            try {
//                原生方式 
                if ($fd = stream_socket_client("tcp://{$v['host']}:{$v['port']}", $errno, $errstr, $timeout)) {
                    array_push($servers, $v);
                    fclose($fd);
                }
            } catch (Exception $ex) {
                
            }
        }

        if (count($servers) < 1) {
            throw  new Kohana_Exception('没有可用的异步服务器');
        }
        
        return $servers;
    }    
}
