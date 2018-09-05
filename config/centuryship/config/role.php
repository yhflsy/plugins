<?php   defined('SYSPATH') OR die('No direct script access.');
//rolecode数组的键值（路由不能相同,键值全小写）
    return array(
        'rolecode' => array(
            'line|list|index' => 1000201,               //线路列表
            'line|add|index' => 1000202,                //创建线路
            'line|edit|price' => 1000203,               //线路修改
            'line|edit|index' => 1000204,               //线路另存
            'line|print|guest' => 1000205,              //游客名单
            'line|list|ajaxdel' => 1000206,             //删除线路
            'line|list|log' => 1000207,                 //操作日志
            'line|list|ajaxup' => 100028,               //正常
            'line|list|ajaxdown' => 1000209,            //停止
            'order|book|index' => 1000210,              // 订单代订

            'line|list|draft' => 1000301,               //线路草稿列表
            'line|edit|price' => 1000302,               //线路草稿修改
            'line|list|ajaxdraftdel' => 1000303,        //线路草稿删除

            'line|template|list' => 1000401,            //线路模板列表
            'line|template|add' => 1000402,             //创建线路模板
            'line|template|edit' => 1000403,            //编辑线路模板
            'line|template|ajaxdel' => 1000404,         //删除线路模板
            'line|template|save' => 1000405,            //复制线路模板
            'line|template|preview' => 1000406,         //预览线路模板

            'line|traffic|list' => 1000501,             //交通管理列表
            'line|traffic|add' => 1000502,              //创建交通模板
            'line|traffic|edit' => 1000503,             //编辑交通模板
            'line|traffic|delete' => 1000504,           //删除交通模板
            'line|plan|list' => 1000505,                //交通控位列表
            'line|plan|add' => 1000506,                 //创建控位模板
            'line|plan|edit' => 1000507,                //编辑控位模板
            'line|plan|delete' => 1000508,              //删除控位模板
            'line|plan|update' => 1000509,              //更新控位状态
            'line|plan|statistics' => 1000510,          //控位统计列表
            'line|plan|save' => 1000511,                //复制控位模板
            'line|print|trafficplan.' => 1000512,       //控位游客名单


            'line|take|index' => 1000601,               //接送管理列表
            'line|take|add' => 1000602,                 //创建接送模板
            'line|take|edit' => 1000603,                //编辑接送模板
            'line|take|delete' => 1000604,              //删除接送模板
            'line|take|look' => 1000605,                //查看接送模板
            'line|take|status' => 1000606,              //更新模板状态

            'line|photo|index' => 1000701,              //图片管理列表
            'line|photo|addphoto' => 1000702,           //创建相册管理
            'line|photo|editphoto' => 1000703,          //编辑相册管理
            'line|photo|ajaxdelphoto' => 1000704,       //删除相册管理

            'line|brand|index' => 1000801,              //线路品牌列表
            'line|brand|add' => 1000802,                //创建品牌模板
            'line|brand|edit' => 1000803,               //编辑品牌模板
            'line|brand|delete' => 1000804,             //删除品牌模板

            'line|file|index' => 1000901,               //文档管理列表
            'line|file|add' => 1000902,                 //创建文档模板
            'line|file|ajaxadd' => 1000902,             //创建文档模板
            'line|file|findcontent' => 1000903,         //查看文档模板
            'line|file|ajaxdel' => 1000904,             //删除文档模版

            'line|recover|list' => 1001001,             //回收站管理列表
            'line|recover|ajaxuse' => 1001002,          //使用回收站模板
            'line|recover|ajaxdel' => 1001003,          //删除回收站模板

            'order|index|index' => 2000101,             //散客订单列表
            'order|index|detail' => 2000102,            //查看订单详情
            'line|print|confirm' => 2000103,            //生成确认单
            'line|print|single' => 2000104,             //导出出团单(线路出团单)
            'order|index|ajaxaddprice' => 2000105,      // 订单调价
            'order|index|ajaximportguest' => 2000106,   // 导入游客模板
            'order|index|ajaxconfirm' => 2000107,       // 订单确认
            'order|index|cancel' => 2000108,            // 订单取消
            'order|index|ajaxcancel' => 2000109,        // 订单取消
            'order|index|ajaxcancelmode' => 2000110,    // 查询订单取消原因
            'order|index|ajaxdelete' => 2000111,        // 订单删除
            'order|index|delete' => 2000112,            // 订单删除
            'order|index|ajaxticket' => 2000113,        // 订单出票
            'order|index|ajaxcancelticket' => 2000114,  // 订单取消出票
            'order|index|confirmreserve' => 2000115,    // 订单确认预留
            'order|index|cancelreserve' => 2000116,     // 订单取消预留
            'order|index|confirmaddseat' => 2000117,    // 订单确认加位
            'order|index|canceladdseat' => 2000118,     // 订单取消加位
            'order|index|down' => 2000119,              // 下载导入游客模板
            'order|index|ajaxrefund' => 2000120,        // 订单退款详情查看
            'order|index|ajaxconfirmrefund' => 2000121, // 订单退款操作
            'order|line|index' => 2000122,              //线路订单列表
            'line|print|route' => 2000123,              //导出行程

            'order|index|reservation' => 2000201,       //预留订单管理列表
            'order|index|reservedetail' => 2000202,     //查看预留订单详情

            'order|index|addseat' => 2000301,           //加位订单列表
            'order|index|addseatdetail' => 2000302,     //查看加位订单详情

            'order|appraise|index' => 2000401,          //评论管理列表
            'order|appraise|look' => 2000402,           //查看评论详情
            'order|appraise|receive' => 2000403,        //回复评论
            'order|appraise|photo' => 2000404,          //评论图片查看

            'order|customer|index' => 2000501,          //客户管理

            'finance|index|index' => 3000101,           //客户账单列表
            'finance|index|edit' => 3000102,            //客户账单审核
            'finance|index|credit' => 3000103,          //客户账单收款
            'finance|index|prompt' => 3000104,          //客户账单催款
            'finance|index|record' => 3000105,          //客户账单记录
            'finance|index|collected' => 3000106,       //客户账单待收款
            'finance|index|editrecord' => 3000107,      //记录修改
            'finance|index|recorddelete' => 3000108,    //记录删除

            'finance|platform|index' => 3000201,        //平台账单列表

            'finance|total|index' => 3000301,           //账单统计列表
            'finance|total|detail' => 3000302,          //账单统计查看       

            'push|index|index' => 4000101,              //红包管理列表
            'push|index|ajaxhdetail' => 4000102,        //查看红包详情
            'push|index|edit' => 4000103,               //编辑红包

            'push|index|addqf' => 4000201,              //创建群发红包

            'push|index|adddx' => 4000301,              //创建定向红包

            'push|index|tjxj' => 4000401,               //红包统计列表
            'push|index|tjdk' => 4000402,               //支付红包奖金

            'push|seckill|index' => 4000501,            //促销管理列表
            'push|seckill|addsec' => 4000502,           //创建促销活动
            'push|seckill|editsec' => 4000503,          //编辑促销活动
            'push|seckill|delsec' => 4000504,           //删除促销活动

            'push|seckill|record' => 4000601,           //促销记录列表
            'push|seckill|details' => 4000602,          //查看促销详情

            'push|integral|index' => 4000701,           //积分管理列表

            'system|news|index' => 5000101,             //公司新闻管理列表
            'system|news|addnews' => 5000102,           //创建公司新闻
            'system|news|editnews' => 5000103,          //编辑公司新闻
            'system|news|ajaxdelnews' => 5000104,       //删除公司新闻
            'system|news|ajaxchangenormal' => 5000105,  //更新新闻状态正常
            'system|news|ajaxchangestop' => 5000106,    //更新新闻状态停止
            
            'system|company|index' => 5000201,          //查看公司信息
            'system|company|editcompany' => 5000202,    //编辑公司信息

            'system|member|index' => 5000301,           //员工管理列表
            'system|member|addmember' => 5000302,       //创建员工
            'system|member|editmember' => 5000303,      //编辑员工
            'system|member|ajaxdelmember' => 5000304,   //删除员工
            'system|member|ajaxchangenormal' => 5000305,//更新员工值班正常
            'system|member|ajaxchangestop' => 5000306,  //更新员工值班停止

            'system|role|index' => 5000401,             //角色管理列表
            'system|role|addrole' => 5000402,           //创建角色
            'system|role|editrole' => 5000403,          //编辑员工
            'system|role|ajaxdelrole' => 5000404,       //删除角色
            'system|role|detailrole' => 5000405,        //查看角色

            'system|company|person' => 5000501,         //编辑个人信息
            'system|company|editperson' => 5000502,   //编辑个人信息

            'system|callcenter|index' => 5000601,       //在线客服管理列表
            'system|callcenter|addcallcenter' => 5000602,//创建客服
            'system|callcenter|editcallcenter' => 5000603,//编辑客服
            'system|callcenter|ajaxdelcallcenter' => 5000604,//删除客服

            'system|notice|index' => 5000701,           //公告信息列表
            'system|notice|seenotice' => 5000702,       //查看公告详情

            'statistics|index|index' => 6000101,        //收客统计列表
            ),
    );
?>

