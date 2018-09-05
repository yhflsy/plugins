<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LineRoute
 *
 * @author etu6
 */
class Adapter_LineRoute {
    
    //routelist php 转换 routes java 线路行程信息  
    public static function get($in){
        $out = [];
        $out['id'] = $in['id'];
        $out['lineid'] = $in['lineid'];
        $out['title'] = $in['title'];
        $out['hotel'] = $in['hotel'];
        $out['photo'] = $in['photo'];
        $out['reminder'] = $in['reminder'];
        $out['daytime'] = $in['daytime'];//不确定时间格式
        $out['dayindex'] = $in['dayindex'];
        $out['breakfast'] = $in['breakfast'];
        $out['breakfastnote'] = $in['breakfastnote'];
        $out['lunch'] = $in['lunch'];
        $out['lunchnote'] = $in['lunchnote'];
        $out['supper'] = $in['supper'];
        $out['suppernote'] = $in['suppernote'];
        $out['detail'] = $in['detail'];
        $out['detailshort'] = $in['detailshort'];

        if (is_array($in['structs'])) {
            $list = array_map('Adapter_LineRoute::getStruct', $in['structs']);
            if (empty($list)) {
                $out['structlist'] = [[]]; // 谁让行程添加按钮必须放在行程列表里呢
            } else {
                $out['structlist'] = $list;
            }
        }

        if (is_array($in['photoUrl']) && is_array($in['photoUrl']['list'])) {
            $out['photolist'] = array_map('Adapter_Line::getPhoto', $in['photoUrl']['list']);
        }

        return $out;
    }

    //structlist php 转换 structs java  结构化行程转换
    public static function getStruct($in){
        $out = [];
        $out['id'] = $in['id'];
        $out['routeid'] = $in['routeid'];
        $out['begintime'] = $in['begintime'];//时间格式不确定
        $out['endtime'] = $in['endtime'];//时间格式不确定
        $out['notes'] = $in['notes'];
        $out['hotelarr'] = json_decode($in['hotel'], true);
        $out['sceneryarr'] = json_decode($in['scenery'], true);
        $out['hotel'] = Common::hoteltoArr($in['hotel']);
        $out['scenery'] = Common::hoteltoArr($in['scenery']);
        $out['playhour'] = $in['playhour'];
        $out['playminute'] = $in['playminute'];
        $out['go'] = $in['go'];
        $out['arrive'] = $in['arrive'];
        $out['photoids'] = $in['photoids'];
        $out['photoidsarr'] = explode(',', $in['photoids']);
        $out['traffic'] = $in['traffic'];

        // 结构化行程图片
        if (is_array($in['photoUrl']) && is_array($in['photoUrl']['list'])) {
            $out['photolist'] = array_map('Adapter_Line::getPhoto', $in['photoUrl']['list']);
        }
        return $out;
    }
}
