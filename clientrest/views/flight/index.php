<?php
/**
 * 51book机票
 * User: yhf
 * Date: 2018/6/6
 * Time: 9:22
 */
	session_start();
    header("Content-type:text/html;charset=utf-8");
	/***
     * 这里是授权跳转页，主要用作两处：
     * 1. 由您的平台跳转到51book时，做一个中转，该页面负责组织51book的接口参数，并提交
     * 2. 51book登录超时，跳转到该页面，重新获取授权
     */
    $loginUrl		= "http://aio.51book.com/partner/cooperate.in";		//登录接口地址
    $service = "user_login";  // 外部接口名称，如：user_login
    $partner = "HAPPYTOO";  // 合作伙伴的标志代码。此代码请向５１Ｂｏｏｋ技术人员索取。
    $outer_app_token = "happytoo"; // 用于标志用户来自合作伙伴的哪一个应用。此token请于51Book技术人员事先约定
    $outer_login_name = "XT".$user['memberinfo']['username']; // 用户在合作伙伴网站的登录名，最多20个字符
    $user_name = $user['memberinfo']['realname']?:$user['memberinfo']['username']; //用户的真实姓名，最多10个字符
//    $email = $user['memberinfo']['email']; // 用户的email
//    $phone = $user['memberinfo']['tel']; //用户的联系电话
    $mobilePhone = $user['memberinfo']['mobile']; //用户的手机
    $user_type = "AGENCY_SINGLE_USER"; //COMMON_USER:以合作伙伴公司的普通用户登录 AGENCY_SINGLE_USER:以合作伙伴公司下属二级代理单用户帐号登录。
    $group_id = ""; //权限组的ID，用于指定将此用户加入到哪个权限组。此字段和user_type结合使用，仅当user_type为“COMMON_USER”时有效。
    $goto_url = $_GET["gourl"]?:"http://caigou.51book.com/caigou/manage/newBuyerFromB2BListPolicyFlight.in"; //用于指定用户完成自动登录之后，首先访问51Book网站的哪个页面. 如果不传此参数，51Book自动定位到查询航班页面。
    $return_url = 'http://'.$_SERVER['HTTP_HOST']."/flight.html"; //合作伙伴网站用于重新登录的URL。当用户在51Book网站登录过期时，51Book将调用此URL返回合作伙伴网站，进行重新登录
    $time_stamp = time()*1000; //为了保证接口的安全性，对接口做了时效限制。此字段为一个long型整数，从 1970-01-01 00:00:00GMT为止至今的毫秒数。接口调用的有效时限是10分钟
    $input_charset = "utf-8";

	//生成签名
	$tosign	= "goto_url=$goto_url&input_charset=$input_charset&mobilePhone=$mobilePhone&outer_app_token=$outer_app_token&outer_login_name=$outer_login_name&partner=$partner&return_url=$return_url&service=$service&time_stamp=$time_stamp&user_name=$user_name&user_type=$user_type"."m^#U~AkJ";
    $sign	= md5($tosign);
//    $sign = md5("email=123456qq.com&input_charset=utf-8&mobilePhone=13166307590&outer_app_token=happytoo&outer_login_name=cytrip&partner=HAPPYTOO&phone=02133582125232&return_url=http://www.baidu.com&service=user_login&user_name=cytrip&user_type=AGENCY_SINGLE_USERm^#U~AkJ");
    $sign_type = "MD5";

	//这里记录一下已经跳转到签证系统了[例子中用session来记录，您可以采用您自己的方式]
	//下次再进入签证系统时，就可以直接点击连接进入，而不需要在从改页面提交授权了
	$_SESSION["IS_51BOOK_AUTHED"]	= 1;

    //用户过期提示
    if(empty($user)) {
        echo "<div style=\"MARGIN-RIGHT: auto; MARGIN-LEFT: auto; margin-top: 100px; width: 200px;\"><p style=\"text-align: center\">登陆过期，请重新登录！</p></div>";
        die;
    }
 ?>

<!DOCTYPE html>
<html>
<head>
    <title>授权跳转</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf8"/>

</head>
<body>
<!--<div style="MARGIN-RIGHT: auto; MARGIN-LEFT: auto; margin-top: 100px; width: 200px;"><p style="text-align: center"><img src="/passportlogin.gif" style="MARGIN-RIGHT: auto; MARGIN-LEFT: auto;"><br />登陆中，请稍候……</p></div>-->

<form action="<?php echo $loginUrl; ?>" id="myform" method="post">
<!--    <input type="hidden" name="email" value="--><?php //echo $email ?><!--" />-->
    <input type="hidden" name="input_charset" value="<?php echo $input_charset ?>" />
    <input type="hidden" name="goto_url" value="<?php echo $goto_url ?>" />
    <input type="hidden" name="mobilePhone" value="<?php echo $mobilePhone ?>" />
    <input type="hidden" name="outer_app_token" value="<?php echo $outer_app_token ?>" />
    <input type="hidden" name="outer_login_name" value="<?php echo $outer_login_name ?>" />
    <input type="hidden" name="partner" value="<?php echo $partner ?>" />
<!--    <input type="hidden" name="phone" value="--><?php //echo $phone ?><!--" />-->
    <input type="hidden" name="return_url" value="<?php echo $return_url ?>" />
    <input type="hidden" name="service" value="<?php echo $service ?>" />
    <input type="hidden" name="time_stamp" value="<?php echo $time_stamp ?>" />
    <input type="hidden" name="user_name" value="<?php echo $user_name ?>" />
    <input type="hidden" name="user_type" value="<?php echo $user_type ?>" />
	<input type="hidden" name="sign" value="<?php echo $sign ?>" />
	<input type="hidden" name="sign_type" value="<?php echo $sign_type ?>" />
</form>
<script type="text/javascript">
  document.getElementById("myform").submit();
</script>

</body>
</html>



