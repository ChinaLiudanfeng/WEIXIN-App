<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
//对称加密
class Aes extends Model
{

 
    private $hex_iv = ''; # converted JAVA byte code in to HEX and placed it here
 
    private $key; #Same as in JAVA

    public function __construct($key) {
        $this->key = $key;
        //$this->key = hash('sha256', $this->key, true);
    }
 
 
    public function encrypt($input)
    {
        $data = openssl_encrypt($input, 'AES-128-ECB', $this->key, OPENSSL_RAW_DATA, $this->hexToStr($this->hex_iv));
        //$data = base64_encode($data);
        $data = bin2hex($data);  //普通编码转成16进制
        return $data;
    }
    
    public function decrypt($input)
    {       
        //$input = base64_decode($input);
        $input = hex2bin($input);  //16进制转为普通编码
        $decrypted = openssl_decrypt($input, 'AES-128-ECB', $this->key, OPENSSL_RAW_DATA, $this->hexToStr($this->hex_iv));
        return $decrypted;
    }

 
    function hexToStr($hex)
    {
        $string='';
        for ($i=0; $i < strlen($hex)-1; $i+=2)
        {
            $string .= chr(hexdec($hex[$i].$hex[$i+1]));
        }
        return $string;
    }
 

 
// $obj = new Aes('1234567890123456');
// $url = "你好朋友";
// echo $eStr = $obj->encrypt($url);//加密
// echo "<hr>";
// echo $obj->decrypt($eStr);//解密
}
