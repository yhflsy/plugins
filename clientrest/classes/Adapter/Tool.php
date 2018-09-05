<?php

class Adapter_Tool {

    public static function dump($str = null, $export = false, $sort = false){
        if (is_null($str)) {
            $str = 'receiveGuestId=111&isTemplate=0&companyId=11&companyName=公司名称&title=线路标题&category=1&categoryIds=[{"categoryId":14},{"categoryId":17},{"categoryId":22}]&grade=1&isTakeAdult=1&isTakeChild=1&isTakeBaby=1&departureId={"state":"100001","province":"102778","city":"100135"}&departure={"state":"中国","province":"上海","city":"上海"}&cityId=[{"state":"100001","province":"100420","city":"100421"}]&destination={"state":"中国","province":"上海","city":"上海"}&destPlace=国内&traffictool=1&dipei=送团人&groupTel=送团电话&together=集合地&togetherTime=集合时间&receive=接团人&receiveTel=接团人电话&receiveMark=接团标志&flag=送团标志&emergencyPeople=紧急联系人&emergencyTel=联系人电话&applicationNote=报名须知&detail=备注说明&fileId=&lineDutyman=线路负责人&managerRecommended=店长推荐&lineId=&delCategoryIds=&photo=/upload/img/asasa.img&photoIds=23,52&isStruct=1&days=2&routeJson=[{"title":"交通工具","hotel":"住","photo":"12,25","breakfast":"1","breakfastnote":"早餐备注","lunch":"1","lunchnote":"中餐备注","supper":"1","suppernote":"晚餐备注","detail":"备注","structs":[{"begintime":"开始时间","endtime":"结束时间","notes":"说明","hotel":"酒店信息","scenery":"景点信息","playhour":"游玩小时","playminute":"游玩分钟","go":"出发","arrive":"抵达","photoids":"图片","traffic":"交通"},{"begintime":"开始时间2","endtime":"结束时间2","notes":"说明2","hotel":"酒店信息2","scenery":"景点信息2","playhour":"游玩小时2","playminute":"游玩分钟2","go":"出发2","arrive":"抵达2","photoids":"图片2","traffic":"交通2"}]}]&delRouteIds=&delStructsIds=&attention=注意事项&include=包含项目&exclude=不包含项目&selffinance=自费项目&shopping=购物安排&child=儿童安排&reminder=温馨提示&other=其他事项&isPay=1&trafficJson=[{"isBack":"0","category":"0","flight":"MH375","go":"始发地","goPort":"始发机场","goTime":"10,30","end":"到达地","endPort":"到达机场","endTime":"12.30","directtransferStop":"直达","transferStopPlace":"经停地"},{"isBack":"0","category":"2","flight":"T77","go":"始发地","goPort":"始发高铁站","goTime":"10,30","end":"到达地","endPort":"到达高铁站","endTime":"12.30","directtransferStop":"直达2","transferStopPlace":"经停地2"},{"isBack":"1","category":"0","flight":"MH375","go":"始发地","goPort":"始发机场","goTime":"10,30","end":"到达地","endPort":"到达机场","endTime":"12.30","directtransferStop":"直达","transferStopPlace":"经停地"},{"isBack":"1","category":"2","flight":"T77","go":"始发地","goPort":"始发高铁站","goTime":"10,30","end":"到达地","endPort":"到达高铁站","endTime":"12.30","directtransferStop":"直达2","transferStopPlace":"经停地2"}]&dataJson=[{"goTime":"2015-12-10","endTime":"2","person":"20","adultPrice":"1000","adultPriceMarket":"1500","childPrice":"1500","childPriceMarket":"2000","babyPrice":"2000","babyPriceMarket":"2500","singleRoom":"100","singleRoomMarket":"150"},{"goTime":"2015-12-15","endTime":"3","person":"22","adultPrice":"1002","adultPriceMarket":"1502","childPrice":"1502","childPriceMarket":"2002","babyPrice":"2002","babyPriceMarket":"2502","singleRoom":"102","singleRoomMarket":"152"}]&delTrafficJson=&delDataIdJson=';
        }

        parse_str($str, $params);

        if (is_array($params)) {
            $params = self::jsonDecode($params);
        }

        if ($sort) {
            ksort($params);
        }

        if ($export) {
            $str = preg_replace("~=>\s*array~isx", '=> array', var_export($params, true));
            echo highlight_string('<?php' . "\r\n" . $str, true);
        } else {
            print_r($params);
        }
    }

    public static function export($str = null){
        self::dump($str, true, false);
    }

    public static function jsonDecode($arr){
        foreach ($arr as $k => $v) {
            if (is_array($v)) {
                $arr[$k] = self::jsonDecode($v);
            } else {
                if (strpos($v, '{') !== false){
                    $arr[$k . '__Array'] = json_decode($v, true);
                }
            }
        }

        return $arr;
    }
}