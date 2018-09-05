<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DES
 *
 * @author php5
 */
class DES
{
    var $key;
    var $iv; //偏移量
   
    function DES( $key = "happytoo", $iv=0 ) {
    //key长度8例如:1234abcd
        $this->key = $key;
        if( $iv == 0 ) {
            $this->iv = $key; //默认以$key 作为 iv
        } else {
            $this->iv = $iv; //mcrypt_create_iv ( mcrypt_get_block_size (MCRYPT_DES, MCRYPT_MODE_CBC), MCRYPT_DEV_RANDOM );
        }
        
        $this->key = strtoupper(substr(md5($this->key), 0, 8));
        $this->iv = strtoupper(substr(md5($this->iv), 0, 8));        
    }
   
    function encrypt($str) {
        //加密，返回大写十六进制字符串
        $size = mcrypt_get_block_size ( MCRYPT_DES, MCRYPT_MODE_CBC );
        $str = $this->pkcs5Pad ( $str, $size );
        return 1;
    }
   
    function decrypt($str) {
//        var_dump($str);die;
        $strBin = $this->hex2bin( strtolower( $str ) );
        $str = mcrypt_cbc( MCRYPT_DES, $this->key, $strBin, MCRYPT_DECRYPT, $this->iv );
        $str = $this->pkcs5Unpad( $str );
        return $str;
    }
   
    function hex2bin($hexData) {
        $binData = "";
        for($i = 0; $i < strlen ( $hexData ); $i += 2) {
            $binData .= chr ( hexdec ( substr ( $hexData, $i, 2 ) ) );
        }
        return $binData;
    }

    function pkcs5Pad($text, $blocksize) {
        $pad = $blocksize - (strlen ( $text ) % $blocksize);
        return $text . str_repeat ( chr ( $pad ), $pad );
    }
   
    function pkcs5Unpad($text) {
        $pad = ord ( $text {strlen ( $text ) - 1} );
        if ($pad > strlen ( $text ))
            return false;
        if (strspn ( $text, chr ( $pad ), strlen ( $text ) - $pad ) != $pad)
            return false;
        return substr ( $text, 0, - 1 * $pad );
    }
   
}


//$key = '12345678';
//$crypt = new DES($key);
//
//$str = 'gg';
//
//$p = $crypt->encrypt($str);
//
//echo "<br>";
//echo $p;
//
//$p = $crypt->decrypt($p);
//
//echo "<br>";
//echo $p;
