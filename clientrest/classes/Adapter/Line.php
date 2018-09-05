<?php

class Adapter_Line {

    public static function get($in){
        $out = [];
        $out['id'] = $in['id'];
        $out['webid'] = $in['receive_guest_id'];
        $out['title'] = $in['title'];
        $out['subtitle'] = $in['sub_title'];
        //$out['brand'] = $in['brand_name'];//新收客通无
        $out['category'] = $in['category'];
        $out['grade'] = $in['grade'];
        $out['days'] = $in['days'];
        $out['traffictool'] = $in['traffictool'];
        $out['cityids'] = $in['city_id'];
        $out['destination'] = $in['destination'];
        $out['departure'] = $in['departure'];
        $out['departureids'] = $in['departure_id'];
        $out['cityidsarray'] = json_decode($in['city_id'], true);
        $out['destinationarray'] = json_decode($in['destination'], true);
        $out['departurearray'] = json_decode($in['departure'], true);
        $out['departureidsarray'] = json_decode($in['departure_id'], true);
        $out['linedutyman'] = $in['line_dutyman'];//线路负责人-计调(旧版收客通无)
        $out['managerrecommended'] = explode(',', $in['manager_recommended']);//店长推荐（逗号分隔 0=New；1=热销；2=推荐；3=特价；4=豪华；5=纯玩；6=预约；15=预约）
        $out['recommendeddetail'] = $in['recommended_detail'];//店长推荐理由
        $out['isrealtime'] = $in['is_pay']; //是否实时库存
        $out['istakeadult'] = $in['is_take_adult'];//线路是否收成人 0：否 1：是
        $out['istakebaby'] = $in['is_take_baby'];
        $out['istakechild'] = $in['is_take_child'];
        $out['isstruct'] = $in['is_struct'] ? 2 : 1;
        $out['fileids'] = $in['file_id'];
        $out['photo'] = $in['photo'];
        $out['photoids'] = $in['photo_id'];
        $out['isb2c'] = $in['is_receive'];//是否是收客通 0=收客通；1=b2b
        $out['categoryids'] = self::changeCategoryIds($in);
        $out['oldcategoryids'] = self::oldCategoryIds($in);

        // 详情
        if (is_array($in['detail'])) {
            $out['togethertime'] = $in['detail']['together_time'];
            $out['together'] = $in['detail']['together'];
            $out['flag'] = $in['detail']['flag'];
            $out['dipei'] = $in['detail']['dipei'];
            $out['grouptel'] = $in['detail']['group_tel'];
            $out['receive'] = $in['detail']['receive'];
            $out['receivetel'] = $in['detail']['receive_tel'];
            $out['receivemark'] = $in['detail']['receive_mark'];
            $out['emergencypeople'] = $in['detail']['emergency_people'];
            $out['emergencytel'] = $in['detail']['emergency_tel'];
            $out['detail'] = $in['detail']['detail'];
            $out['internaldetail'] = $in['detail']['internal_detail'];
            $out['include'] = $in['detail']['include'];
            $out['exclude'] = $in['detail']['exclude'];
            $out['child'] = $in['detail']['child'];
            $out['shopping'] = $in['detail']['shopping'];
            $out['selffinance'] = $in['detail']['self_finance'];
            $out['present'] = $in['detail']['present'];
            $out['attention'] = $in['detail']['attention'];
            $out['other'] = $in['detail']['other'];
            $out['reminder'] = $in['detail']['reminder'];
            $out['content'] = $in['detail']['content'];
            $out['applicationnote'] = $in['detail']['application_note'];
            $out['feature'] = $in['detail']['feature'];
            $out['standard'] = $in['detail']['standard'];
        }

        // 行程
        if (is_array($in['routes'])) {
            $out['routelist'] = array_map('Adapter_LineRoute::get', $in['routes']);
        }

        // 团期
        if (is_array($in['dates'])) {
            $out['datelist'] = array_map('Adapter_Line::getDate', $in['dates']);
        }

        // 团期
        if (is_array($in['traffics'])) {
            $out['trafficlist'] = array_map('Adapter_Line::getTraffic', $in['traffics']);
        }

        // 相册
        if (is_array($in['photoUrl']) && is_array($in['photoUrl']['list'])) {
            $out['photolist'] = array_map('Adapter_Line::getPhoto', $in['photoUrl']['list']);
        }

        return $out;
    }
    
    //detas java返回数组
    public static function getDate($in){
        $out = [];
        $out['id'] = $in['id'];
        $out['lineid'] = $in['line_id'];
        $out['godate'] = $in['go_time'];
        $out['gotime'] = strtotime($in['go_time']);
        $out['enddays'] = $in['end_time'];
        $out['person'] = $in['person'];
        $out['personorder'] = $in['person_order'];
        $out['adultprice'] = $in['adult_price'];
        $out['adultpricemarket'] = $in['adult_price_market'];
        $out['childprice'] = $in['child_price'];
        $out['childpricemarket'] = $in['child_price_market'];
        $out['babyprice'] = $in['baby_price'];
        $out['babypricemarket'] = $in['baby_price_market'];
        $out['singleroom'] = $in['single_room'];
        $out['singleroommarket'] = $in['single_room_market'];
        return $out;
    }

    // 交通
    public static function getTraffic($in) {
        $out = [];
        $out['id'] = $in['id'];
        $out['isback'] = $in['is_back'];
        $out['category'] = $in['category'];
        $out['flight'] = $in['flight'];
        $out['go'] = $in['go'];
        $out['goport'] = $in['go_port'];
        $out['gotime'] = $in['go_time'];
        $out['end'] = $in['end'];
        $out['endport'] = $in['end_port'];
        $out['endtime'] = $in['end_time'];
        $out['directtransferstop'] = $in['directtransfer_stop'];
        $out['transferstopplace'] = $in['transfer_stop_place'];
        return $out;
    }

    // 图片
    public static function getPhoto($in) {
        if (! isset($in['photo'])) {
            $in['photo'] = $in['image_url'];
        }
        return $in;
    }
    
    private static function changeCategoryIds($in) {
        $cartegory = $in['listCategorys'];
        if(!is_array($cartegory) || empty($cartegory)) {
            return [];
        }
        $categoeyIds = [];
        foreach($cartegory as $k => $v) {
              $categoeyIds[] = $v['category_id'];
        }
        return $categoeyIds;
    }

    private static function oldCategoryIds($in) {
        $cartegory = $in['listCategorys'];
        if(!is_array($cartegory) || empty($cartegory)) {
            return [];
        }
        $categoeyIds = [];
        foreach($cartegory as $k => $v) {
              $categoeyIds[] = $v['id'];
        }
        return $categoeyIds;
    }
}