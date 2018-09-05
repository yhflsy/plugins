<?php

include_once(DOCROOT . '../plugins/wxhelper/wxBizMsgCrypt.php');

class OpenWeixint {

    public $appid;
    public $appSecret;
    public $encodingAesKey;
    public $token;

    public function __construct() {
        
        $this->appid = "wx9c689f491dbadd1e";
        $this->appsecret = "6eae5baf5a21372dbd7e92c9fcd76857";
        $this->encodingAesKey = "ndXKF4lK82VV8vWXlXivmrgkwZpm1IEVuHyXmPa3wgw";
        $this->token = "34556";
    }

    public function decryptMsg($msg_sign, $timeStamp, $nonce, $from_xml, &$msg) {//消息解密
        $pc = new WXBizMsgCrypt($this->token, $this->encodingAesKey, $this->appid);
        $errCode = $pc->decryptMsg($msg_sign, $timeStamp, $nonce, $from_xml, $msg);
        return $errCode;
    }

    public function encryptMsg($result, $timeStamp, $nonce, &$encryptMsg) {//消息加密
        $pc = new WXBizMsgCrypt($this->token, $this->encodingAesKey, $this->appid);
        $errCode = $pc->encryptMsg($result, $timeStamp, $nonce, $encryptMsg); //加密
        return $errCode;
    }

    public function get_component_access_token($componentVerifyTicket) {//获取令牌接口
        $data = array('component_appid' => $this->appid, 'component_appsecret' => $this->appsecret, 'component_verify_ticket' => $componentVerifyTicket);
        $json = @json_encode($data);
        $result = $this->http_post("https://api.weixin.qq.com/cgi-bin/component/api_component_token", $json);
        return $weixindata = json_decode($result,true);
       // return $weixindata['component_access_token'];
    }

    public function get_authorizer_access_token($componentAccessToken,$code) {//获取授权码
        $data = array('component_appid' => $this->appid, 'authorization_code' => $code);
        $json = @json_encode($data);
        $result = $this->http_post("https://api.weixin.qq.com/cgi-bin/component/api_query_auth?component_access_token=$componentAccessToken", $json);
        return $result = json_decode($result);
        //return  $result['authorization_info']['authorizer_access_token'];
    }

    public function get_pre_auth_code($componentAccessToken) {//获取预授权吗
        $data = array('component_appid' => $this->appid);
        $json = @json_encode($data);
        $result = $this->http_post("https://api.weixin.qq.com/cgi-bin/component/api_create_preauthcode?component_access_token=$componentAccessToken", $json);
        $auth_code = json_decode($result, true);
        return $pre_auth_code = $auth_code['pre_auth_code'];
    }

    //PHP stdClass Object转array  
    public function object_array($array) {
        if (is_object($array)) {
            $array = (array) $array;
        } if (is_array($array)) {
            foreach ($array as $key => $value) {
                $array[$key] = $this->object_array($value);
            }
        }
        return $array;
    }

    public function http_post($url, $data) {//https 接口请求
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url); //url
        curl_setopt($ch, CURLOPT_POST, 1); //POST
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            return "ERROR:" . curl_error($ch);
        }
        curl_close($ch);
        return $result;
    }

    //回复文本消息
    public function transmitText($object, $content) {
        $xmlTpl = "<xml>
    <ToUserName><![CDATA[%s]]></ToUserName>
    <FromUserName><![CDATA[%s]]></FromUserName>
    <CreateTime>%s</CreateTime>
    <MsgType><![CDATA[text]]></MsgType>
    <Content><![CDATA[%s]]></Content>
    </xml>";
        $result = sprintf($xmlTpl, $object['FromUserName'], $object['ToUserName'], time(), $content);
        return $result;
    }

}
