<?php
/**
 * Created by PhpStorm.
 * User: wangyue
 * Date: 2017/5/24
 * Time: 9:22
 */
	session_start();

	/***
     * 这里是授权跳转页，主要用作两处：
     * 1. 由您的平台跳转到eboly时，做一个中转，该页面负责组织eboly的接口参数，并提交
     * 2. eboly登录超时，跳转到该页面，重新获取授权
     */
 	$loginUrl		= "http://visa.tripb2b.com/coop/login";		//登录接口地址，域名应当替换为您自己的域名
 	$timeStampUrl	= "http://visa.tripb2b.com/coop/timestamp";	//获取时间戳地址，域名应当替换为您自己的域名
 	$site_id		= "25";				//为您分配的系统ID
 	$mer_key		= "HiM5LiRKVaVbWBWv";		//为您分配的接口秘钥
    $name = $user['memberinfo']['realname']?:$user['memberinfo']['username'];
 	//您的商户相关信息
 	$mer_id		= $user['companyinfo']['id']."XT".$user['memberinfo']['id'];			//商户编号：合作平台注册商户的唯一编号，用以区分
 	$mer_name	= $user['companyinfo']['companyname']."-".$name;		//商户名称：合作平台注册商户名称
 	$mobile		= $user['memberinfo']['mobile']?:"";	//手机号码：合作平台的注册手机号码，若有，建议尽量提供
 	$mer_brunch	= "";				//商户分支机构
 	$mer_contact= $user['memberinfo']['realname']?:"";			//商户联系人姓名：若有，建议尽量提供
 	$mer_tel	= $user['memberinfo']['tel']?:"";	//商户联系电话：若有，建议尽量提供
 	$dpt_id		= "";				//部门（门店）编号：适用于合作平台有多部门（门店）的情况。
 	$dpt_name	= "";				//部门（门店）名称
 	$staff_id	= "";				//员工账号：使用于一个商户中有多个子账号的情况，保证唯一
 	$staff_name	= "";				//员工姓名

 	//授权成功后，跳转到的url
 	$gourl		= $_GET["gourl"]?:"";	//这里直接从get参数获取【会话超时后，签证系统跳转回该页面，将会提供gourl参数】

 	//1. 获取时间戳
    $ch = curl_init();
	curl_setopt ($ch, CURLOPT_URL, $timeStampUrl);
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,10);
	$timestamp = curl_exec($ch);

	//2. 生成签名
	$tosign	= "site_id=$mer_id&timestamp=$timestamp&mer_id=$mer_id&mer_name=$mer_name&$mer_key";
	$sign	= md5($tosign);

	//这里记录一下已经跳转到签证系统了[例子中用session来记录，您可以采用您自己的方式]
	//下次再进入签证系统时，就可以直接点击连接进入，而不需要在从改页面提交授权了
	$_SESSION["IS_EBOLY_AUTHED"]	= 1;

 ?>

<!DOCTYPE html>
<html>
<head>
    <title>授权跳转</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf8"/>

</head>
<body>
<div style="MARGIN-RIGHT: auto; MARGIN-LEFT: auto; margin-top: 100px; width: 200px;"><p style="text-align: center"><img src="/passportlogin.gif" style="MARGIN-RIGHT: auto; MARGIN-LEFT: auto;"><br />登陆中，请稍候……</p></div>

<form action="<?php echo $loginUrl; ?>" id="myform" method="post">
    <input type="hidden" name="site_id" value="<?php echo $site_id ?>" />
    <input type="hidden" name="timestamp" value="<?php echo $timestamp ?>" />
    <input type="hidden" name="mer_id" value="<?php echo $mer_id ?>" />
    <input type="hidden" name="mer_name" value="<?php echo $mer_name ?>" />
    <input type="hidden" name="mobile" value="<?php echo $mobile ?>" />
    <input type="hidden" name="mer_brunch" value="<?php echo $mer_brunch ?>" />
    <input type="hidden" name="mer_contact" value="<?php echo $mer_contact ?>" />
    <input type="hidden" name="mer_tel" value="<?php echo $mer_tel ?>" />
    <input type="hidden" name="dpt_id" value="<?php echo $dpt_id ?>" />
    <input type="hidden" name="dpt_name" value="<?php echo $dpt_name ?>" />
    <input type="hidden" name="staff_id" value="<?php echo $staff_id ?>" />
    <input type="hidden" name="staff_name" value="<?php echo $staff_name ?>" />
    <input type="hidden" name="gourl" value="<?php echo $gourl ?>" />
    <input type="hidden" name="sign" value="<?php echo $sign ?>" />
</form>
<script type="text/javascript">
    document.getElementById("myform").submit();
</script>

</body>
</html>



