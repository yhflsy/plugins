<?php

class Format {
    public static function ids($ids, $default = '0', $sep = ',', $oldsep = ',') {
        if (empty($ids)){
            return $default;
        }

        if (is_array($ids)){
            $ids = array_map('intval', $ids);
            return implode($sep, $ids);
        } else {
            if (preg_match("~^\d+($sep\d+)*$~", (string) $ids)){
                return $ids;
            } else {
                $ids = explode($oldsep, $ids);
                return self::ids($ids, $default, $sep, $oldsep);
            }
        }
    }

    public static function godate($date = null) {
        if (is_null($date)) {
            return date("Ymd");
        }

        if ($date > 1000000000) {
            return date("Ymd", $date);
        } elseif($date > 20150000) {
            $date = trim($date);
            if (strlen($date) === 8) {
                return trim($date);
            }
        }

        return date("Ymd", strtotime($date));
    }

    public static function concatvalues($array, $field = 'id', $sep = ',', $returnArray = false){
        $result = array_reduce((array)$array, function ($carry, $item) use ($field) {
            $carry[] = $item[$field];
            return $carry;
        }, []);

        if ($returnArray) {
            return $result;
        }

        return implode($sep, array_unique($result));
    }

    public static function fieldAsKey($array, $field){
        $result = array();
        foreach ($array as $v){
            $result[$v[$field]] = $v;
        }
        return $result;
    }

    public static function originalUrl($url){
        return preg_replace('~(_\d+x\d+)*~', '', $url);
    }
}
