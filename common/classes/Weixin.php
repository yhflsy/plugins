<?php

class Weixin {

    public $appid = '';
    public $appSecret = '';
    public $token = ''; // token
    public $debug = false; // 是否debug的状态标示,方便我们在调试的时候记录一些中间数据
    public $setFlag = false;
    public $msgtype = '';
    public $msg = array();

    //
    public function __construct($token = '', $debug = false) {
        $this->token = $token;
        $this->debug = $debug;
    }

    // 获得用户发过来的消息(消息内容和消息类型 )
    public function getMsg() {
        $postStr = $GLOBALS ["HTTP_RAW_POST_DATA"];
        if ($this->debug) {
            $this->write_log($postStr);
        }
        if (!empty($postStr)) {
            $this->msg = (array) simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $this->msgtype = strtolower($this->msg ['MsgType']);
        }
    }

    //
    public function responseMsg() {
        $postStr = $GLOBALS ["HTTP_RAW_POST_DATA"];
        if (!empty($postStr)) {
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $keyword = trim($postObj->Content);
            $time = time();
            $textTpl = "<xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[%s]]></MsgType>
						<Content><![CDATA[%s]]></Content>
						<FuncFlag>0</FuncFlag>
						</xml>";
            if (!empty($keyword)) {
                $msgType = "text";
                $contentStr = "Welcome to wechat world!";
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            } else {
                echo "Input something...";
            }
        } else {
            exit("");
        }
    }

    // 回复文本消息
    public function makeText($text = '') {
        $CreateTime = time();
        $FuncFlag = $this->setFlag ? 1 : 0;
        $textTpl = "<xml>
				<ToUserName><![CDATA[{$this->msg['FromUserName']}]]></ToUserName>
				<FromUserName><![CDATA[{$this->msg['ToUserName']}]]></FromUserName>
				<CreateTime>{$CreateTime}</CreateTime>
				<MsgType><![CDATA[text]]></MsgType>
				<Content><![CDATA[%s]]></Content>
				<FuncFlag>%s</FuncFlag></xml>";
        return sprintf($textTpl, $text, $FuncFlag);
    }

    // 链接信息
    public function makeLink($title, $detail, $url) {
        $CreateTime = time();
        $FuncFlag = $this->setFlag ? 1 : 0;
        $newTplHeader = "<xml>
				<ToUserName><![CDATA[{$this->msg['FromUserName']}]]></ToUserName>
				<FromUserName><![CDATA[{$this->msg['ToUserName']}]]></FromUserName>
				<CreateTime>{$CreateTime}</CreateTime>
				<MsgType><![CDATA[link]]></MsgType>
				<Title><![CDATA[%s]]></Title>
				<Description><![CDATA[%s]]></Description>
				<Url><![CDATA[%s]]>
				<FuncFlag>%s</FuncFlag></Url>
				</item></xml>";
        return sprintf($title, $detail, $url, $FuncFlag);
    }

    // 根据数组参数回复图文消息
    public function makeNews($newsData = array()) {
        $CreateTime = time();
        $FuncFlag = $this->setFlag ? 1 : 0;
        $newTplHeader = "<xml>
				<ToUserName><![CDATA[{$this->msg['FromUserName']}]]></ToUserName>
				<FromUserName><![CDATA[{$this->msg['ToUserName']}]]></FromUserName>
				<CreateTime>{$CreateTime}</CreateTime>
				<MsgType><![CDATA[news]]></MsgType>
				<Content><![CDATA[%s]]></Content>
				<ArticleCount>%s</ArticleCount>
				<Articles>";
        $newTplItem = "<item>
				<Title><![CDATA[%s]]></Title>
				<Description><![CDATA[%s]]></Description>
				<PicUrl><![CDATA[%s]]></PicUrl>
				<Url><![CDATA[%s]]></Url>
				</item>";
        $newTplFoot = "</Articles><FuncFlag>%s</FuncFlag></xml>";
        $Content = '';
        $itemsCount = count($newsData);
        $itemsCount = $itemsCount < 10 ? $itemsCount : 10;

        // 微信公众平台图文回复的消息一次最多10条
        if ($itemsCount) {
            foreach ($newsData as $key => $item) {
                if ($key <= 9) {
                    $Content .= sprintf($newTplItem, $item ['title'], $item ['description'], $item ['picurl'], $item ['url']);
                }
            }
        }
        $header = sprintf($newTplHeader, $newsData ['content'], $itemsCount);
        $footer = sprintf($newTplFoot, $FuncFlag);
        return $header . $Content . $footer;
    }

    //
    public function setMenu($menus) {
        $token = $this->getToken($this->appid, $this->appSecret);
        $url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=" . $token;
        $result = $this->httpsRequest($url, $menus);
        return $result;
    }

    //
    public function getMenu() {
        $token = $this->getToken($this->appid, $this->appSecret);
        $url = "https://api.weixin.qq.com/cgi-bin/menu/get?access_token=" . $token;
        $result = $this->httpsRequest($url);
        return $result;
    }

    //
    public function delMenu() {
        $token = $this->getToken($this->appid, $this->appSecret);
        $url = "https://api.weixin.qq.com/cgi-bin/menu/delete?access_token=" . $token;
        $result = $this->httpsRequest($url);
        return $result;
    }
    
    // 获取二维码
    public function getQR($scene = 1, $expire = 0) {
        $token = $this->getToken($this->appid, $this->appSecret);
    	$url = "https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=" . $token;
    	$json = $this->_getQRJson($scene, $expire);
    	$result = $this->httpsRequest($url, $json);
    	return json_decode($result);
    }
    
    // 获取用户基本信息
    public function getUserInfo($openid) {
        $token = $this->getToken($this->appid, $this->appSecret);
    	$url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=" . $token . "&openid=" . $openid . "&lang=zh_CN";
    	$result = $this->httpsRequest($url);
    	return json_decode($result);
    }

    //
    public function reply($data) {
        if ($this->debug) {
            $this->write_log($data);
        }
        echo $data;
    }

    //
    public function valid() {
        if ($this->checkSignature()) {
            echo $_GET ["echostr"];
            exit();
        } else {
            exit('Failed.');
        }
    }

    //
    private function getToken($appid, $appsecret) {
        $key = $appid.'_access_token';
        $data = Cache::instance()->get($key);
        $nowtime = time();
        if(!$data || $nowtime > $data['expiretime'] ){
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret";
            $output = json_decode($this->httpsRequest($url));
            $access_token =  $output->access_token;
            if($access_token){               
                Cache::instance()->set($key, json_encode(array('expiretime' => $nowtime + 7000, 'access_token' => $access_token)));                
            }
        }else{
            $access_token =  $data['access_token'];
        }
        return $access_token;
    }

    public function getJsApiTicket($appid, $appsecret) {
        // jsapi_ticket 应该全局存储与更新，以下代码以写入到文件中做示例 
        $key = $appid.'_jsapi_ticket';
        $data = Cache::instance()->get($key);
        $nowtime = time();
        if (!$data || $nowtime > $data['expiretime']) {
            $accessToken = $this->getToken($appid, $appsecret);
            $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=$accessToken";
            $output = json_decode($this->httpsRequest($url));
            $ticket = $output->ticket;
            if ($ticket) {
                Cache::instance()->set($key, array('expiretime' => $nowtime + 7000, 'jsapi_ticket' => $ticket));
            }
        } else {
            $ticket = $data['jsapi_ticket'];
        }

        return $ticket;
    }

    //
    private function httpsRequest($url, $data = null) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)) {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }

    // 验证
    private function checkSignature() {
        $signature = $_GET ["signature"];
        $timestamp = $_GET ["timestamp"];
        $nonce = $_GET ["nonce"];

        $tmpArr = array(
            $this->token,
            $timestamp,
            $nonce
        );
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);

        if ($tmpStr == $signature) {
            return true;
        } else {
            return false;
        }
    }

   
	//
	private function write_log($log) {
		// 这里是你记录调试信息的地方 请自行完善 以便中间调试
	}
    
     public function getSignPackage($appid, $appsecret, $url = '') {
        $jsapiTicket = $this->getJsApiTicket($appid, $appsecret);
        if ($jsapiTicket) {
            !$url && $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $nonceStr = $this->createNonceStr();
            $nowtime = time();
            // 这里参数的顺序要按照 key 值 ASCII 码升序排序
            $string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$nowtime&url=$url";

            $signature = sha1($string);

            $signPackage = array(
                "appId" => $appid,
                "nonceStr" => $nonceStr,
                "timestamp" => $nowtime,
                "url" => $url,
                "signature" => $signature,
                "rawString" => $string
            );
        }
        return $signPackage;
    }    
    
    private function createNonceStr($length = 16) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $str = "";
        for ($i = 0; $i < $length; $i++) {
            $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }
        return $str;
    }

    public function get_authorize_url($redirect_uri = '', $state = '') {
        $redirect_uri = urlencode($redirect_uri);
        return "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx06b4df0c32a05ef1&redirect_uri={$redirect_uri}&response_type=code&scope=snsapi_userinfo&state={$state}#wechat_redirect";
    }

    public function get_access_token($code = '')
    {
        $token_url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx06b4df0c32a05ef1&secret=e43ea9ce95713c1df4e7b658904f2283&code={$code}&grant_type=authorization_code";
        $token_data = $this->httpsRequest($token_url);
        $token_data = json_decode($token_data,TRUE);
        if($token_data['access_token'])
        {
            return $token_data;
        }
        return false;
    }

    public function get_user_info($access_token = '', $open_id = '')
    {
        if($access_token && $open_id)
        {
            $info_url = "https://api.weixin.qq.com/sns/userinfo?access_token={$access_token}&openid={$open_id}&lang=zh_CN";
            $info_data = $this->http($info_url);

            if($info_data[0] == 200)
            {
                return json_decode($info_data[1], TRUE);
            }
        }

        return FALSE;
    }

    public function get_template_id() {
        $token = $this->getToken('wx06b4df0c32a05ef1', 'e43ea9ce95713c1df4e7b658904f2283');
        $url = "https://api.weixin.qq.com/cgi-bin/template/get_all_private_template?access_token=".$token;
        $result = $this->httpsRequest($url);
        return json_decode($result, TRUE);
    }

    public function send_template_message($data) {
        $token = $this->getToken('wx06b4df0c32a05ef1', 'e43ea9ce95713c1df4e7b658904f2283');

        $url = 'https://api.weixin.qq.com/cgi-bin/message/template/send?access_token='.$token;
        $result = $this->httpsRequest($url, $data);
        return json_decode($result, TRUE);
    }

	private function _getQRJson($scene = 1, $expire = 0) {
		$action = 'QR_';
		if($expire) {
			$strExpire = '"expire_seconds": ' . $expire . ', ';
		} else {
			$strExpire = '';
			$action .= 'LIMIT_';
		}
		if(is_int($scene)){
			$strScene = '"scene_id": "' . $scene . '"';
		} else {
			$strScene = '"scene_str": "' . $scene . '"';
			$action .= 'STR_';
		}
		$action .= 'SCENE';
		
		return '{' . $strExpire . '"action_name": "' . $action . '", "action_info": {"scene": {' . $strScene . '}}}';
	}
}
