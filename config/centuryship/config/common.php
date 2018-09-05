<?php
defined('SYSPATH') or die('No direct script access.');
return array(
    'linequery' =>array(
        'linegrade' => array(0 => '跟团游',1 => '自由行', 2 => '自驾游', 3 => '邮轮'),
        'lineday' => array(0 =>'不限', 1 => '1天', 2 => '2天', 3 => '3天', 4 => '4天', 5 => '5天', 6 => '6天', 7 => '7天', 8 => '8天', 9 => '9天', 10 => '10天及10天以上'),
        'lineauditstate' => array(0 =>'不限',1 =>'通过', 2 => '待审核', 3 => '拒绝', 4 => '未提交'),
        'linestate' => array('-1'=>'不限',0 =>'正常', 1 => '停止', 2 => '客满', 3 => '截止'),
        'lineprice' => array(0 =>'不限',1 => '500以下',2 => '500-1000',3 => '1000-2000', 4 => '2000-4000', 5 => '4000-6000', 6 => '6000以上'),
        'linetraffictool' => array(0 =>'不限', 9=>'待定', 1 =>'飞机', 2 => '火车', 3 => '高铁', 4 => '动车', 5 => '巴士', 6 => '飞机+火车', 7 => '飞机+巴士', 8 => '邮轮'),
        'linehdong' => array(0 =>'不限',1 =>'含积分', 2 => '无积分', 3 => '含红包', 4 => '无红包'),    
        'linetake' => array(0 =>'不限',1 =>'含接送', 2 => '无接送'),   
        'linetype' => array(0 => 'New', 1=>'热销', 2 => '推荐', 3 => '特价', 4 => '豪华', 5 => '纯玩', 6 => '预约', 15 => '品质'),
        'linecategory' => array(0 =>'周边短线',1 => '国内长线',2 => '出境旅游'),
    ),
    'statistics' => array(
        'ispay' => array(1 =>'已完成', 2 =>'已支付'),
        'statisday' => array( 1 => '一周', 2 => '一月', 3 => '三月', 4 => '自定义'),
        'statistype' => array( 1 => '产品分类', 5 => '省份分析', 6 => '客户统计', ),
    ),
    'linecategory' => array(0 =>'周边短线',1 => '国内长线',2 => '出境旅游'),
    'website' => array(1 =>'馨·驰誉',2 => '馨·欢途',4 => '美程'),
    'pagesize' => array(0 =>'10',1 =>'20', 2 => '30', 3 => '50', 4 => '100'), 
    'traffic' => array(
        'trafficisback' => array(0 =>'不限',1 =>'往', 2 => '返', 3 => '往返'),
        'traffictype' => array(0 =>'飞机', 1 => '汽车', 2 => '火车', 3 => '高铁', 4 => '动车', 5 => '游轮'),
    ), 
    'paytype' => array(0=>'支票',1=>'现金',2=>'电汇',3=>'其他',11=>'上门收款',12 =>'对公汇款' ,13 =>'对私汇款' ,14 =>'现金支票' ,15=>'转账支票'),
    'photo' => array(1 => '景点',2 => '酒店', 3 => '餐饮'),
    'takecategory' => array(0 => '接送', 1 => '单接', 2 => '单送'),
    'takecartype' => array(0 => '不限',1 => '10座小巴', 2 => '20座中巴', 3 => '35座大巴', 4 => '45座大巴', 5 => '舒适型', 6 => '商务型', 7 => '豪华型', 8 => '经济型'),
    'order' => array(
        'state' => array('未确认', '已确认', '取消', '名单不全', '已出票'),
        'statecolor' => array('red', 'green', 'gray', 'orange', ' blue'),
        'addseatstate' => array('申请加位', '加位成功', '取消加位'),
        'reservestate' => array('申请预留', '预留成功', '取消预留'),
        'msg' => array( 0 => '新订单',  2 => '取消订单', 8 => '支付订单', '16' => '退款订单'),
        'guestcategory' => array('成人', '儿童', '婴儿'),        
        'cardcategory' => array(1 => '身份证', 2 => '护照', 3 => '港澳通行证', 4 => '军官证', 5 => '其他'), //1身份证,2护照,3港澳通行证,4军官证,5其他
        'gender' => array('保密', '男', '女'),
        'paystate' => array( 1 => '线上已支付', 4 => '线下已支付', 2=> '未支付',  3 => '预付', -2 =>'待退款', -3 => '已退款'),
        'datetype' => array('出团日期', '回团日期', '下单日期', '确认日期', '支付日期', '结算日期'),
        'ltype' => array('周边短线', '国内长线', '国际线路'),
        'ordersite' => array(1 => "馨·驰誉",2 => '馨·欢途',4 => "美程"),
        'operator' => array( 2 => "操作计调", 1 => "供应商计调", 0 => "采购商计调"),
        'paystyle' => array( 1 => '线上支付', 2=>'线下支付'),
        'taketype' => array('接送', '单接', '单送'),
    ),
	'integraltype'=>array(0=>'请选择',1 => '充值',2 => '赠送',3 => '解冻',11 => '结算',12 => '冻结',13 => '充值计调',14 => '平台清除'),//积分类型
        'appraise' => array(0 => '全部',1 => '不满意', 2 => '一般', 3 => '满意'),
        'trafficcat' => array(1=>'不用安排',2=>'飞机',3=>'火车',4=>'汽车'),
        'hoteltype' => array(1=>'不用安排',2=>'经济型',3=>'三星级',4=>'四星级',5=>'五星级'),
        'dinnertype'=> array(1=>'不用安排',2=>'20~30元/人/餐',3=>'30~40元/人/餐',4=>'40~50元/人/餐',5=>'50元以上/人/餐'),
        'tmproute' =>array('1-2天','3-5天','6-10天','10天以上') ,
         'days' => array(1=>'1天',2=>'2天',3=>'3天',4=>'4天',5=>'5天',6=>'6天',7=>'7天',8=>'8天',9=>'9天',10=>'10天及以上'),
);