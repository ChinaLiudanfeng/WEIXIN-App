<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
//非对称加密
class Rsa extends Model
{
    private static $_privkey = '-----BEGIN PRIVATE KEY-----
MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQCYw4a40U+AvKKk
d4qqbfP8oWjPbugIMAG4QG1h8gB6mnV+qmXq730XkGYZeaNe4ZmnOFb88cyE4IgA
+dRsrOJunCUkAIhPbDgDnkiue9DSruyYMtecp6NZlZYqYwdHal9lG5QYGm11soDW
AEVJQYMiHy+PIIJ7kV/0RqsAnxGNcxczHeUH0aqlbEWf3/WhwcYSFjzpf8Z18yr3
iFMRl3/eDOffFzCeAtoSM2sI2l7fQKoONdCUKmad4tJKXfUeY1xVnfXVGtkhebZl
yiC3uRmj5x3j11a5PfRyNf4ClSAtREGf0GztY1KUpqSqR0FqivZYWTrvv8/j/Or6
uvpCADLvAgMBAAECggEBAJQIxcDLdJN4ONPP09wb+NfTQlHhU5C7lK8MH/NOJBCr
JTi9v03PDhWLpKUDLsF/NPrKqeEsH9iUDLeFYch+MF6niYY9zdnJMO6wsBYFffLr
9/H1MuNnv+/L+VzR4ffeqNq9wuEomvH3LMo0MPAwP/cM6XV1N3yu/6Ej6goMG2JJ
qeLh0rLmbvzqb1IzKf8zIK9hkQ0eRxSytl504e9BN1Y9yBAYxqorPuEuuE0bcdev
NPLJs0oCv5Vqq28nQir232mh/MfSBF9ZnVZIgVAmr9kdGT9NTGTdKrc/75aumOZW
+Q2NDLOO+uKAlMMtImLCu4bJ1bb73xWEB6HbV6iIKiECgYEAx7ithEZO1k94XkdJ
sF+4b2bdkSkFBK1HqpYA8UUDI8JjPzmoNjh2B01dVGbZbm1nJ8shPj87KPVqZrYu
H4c9BwpyD0RLfF4WR6/M7/zKq6VlUvuVAnad9hNLSLCT6tXglK18yYWmwTzTaPrI
5AIruGT5WI2mffzXh4rP36OWeBUCgYEAw892NV0Jw2BADmEryYNh4CnuMU/XHToY
PsSUz8vTO5aWVT7dnAsmyWYupru47xPkIcjNPzrm+p0wz3F6LTLziHwy44LNmqQ2
eeKc2fLNBVWa0tawmiH72n5IicqOASDTj+e9rSyDvLHERei52yBoBTRQ+9bxWz/M
krR7Rzv6G/MCgYEAsU90xPVCcqN1IoY5lps0e7qgRIpdSSypbnnj9k8lnW6re+st
Oo3fw1Xc4Ny6dn4sUbjWF5Q9anyO7QcaZaVD+ec9Ie6o8Y36S8R4tisAp2icTxLJ
1LkIPfodITia6abdzkFDgwnj5LSioBXdmgePVxJWCFchk8KQemYzbMGoCY0CgYBP
RBKUM5+aKcKEj62MG9VpS1ATQkDQog3iiu262MYf3yvoQlSvsIv5B5ZnBKMulRzK
2GDN8ehDF5MExukwlumjHLP1CaR1r3gmCyh3yiRYvni4VRSUsKElp+1xaj/mEQXT
wXo1Oknx/vx3WGi0Xf/961nFORPnXoJP+SPWiF8NJQKBgFGyjIEivL5WlSSvBXSg
wEPmreqac0ZOd8N0JWUUUWqFhk+Z48XNdlUZYrwoqYawUTwh/ihXqiKjFHKxwXJ1
86UWgGTo00Ng7XmjmBnjhdBRN5mcNZ8ptDRxgPrFqhTDGcQBS2NHSNsLIY4jaJ9l
Y1t235PBnmnZo7pz49XJoH8X
-----END PRIVATE KEY-----';
    private static $_pubkey = '-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAmMOGuNFPgLyipHeKqm3z
/KFoz27oCDABuEBtYfIAepp1fqpl6u99F5BmGXmjXuGZpzhW/PHMhOCIAPnUbKzi
bpwlJACIT2w4A55IrnvQ0q7smDLXnKejWZWWKmMHR2pfZRuUGBptdbKA1gBFSUGD
Ih8vjyCCe5Ff9EarAJ8RjXMXMx3lB9GqpWxFn9/1ocHGEhY86X/GdfMq94hTEZd/
3gzn3xcwngLaEjNrCNpe30CqDjXQlCpmneLSSl31HmNcVZ311RrZIXm2Zcogt7kZ
o+cd49dWuT30cjX+ApUgLURBn9Bs7WNSlKakqkdBaor2WFk677/P4/zq+rr6QgAy
7wIDAQAB
-----END PUBLIC KEY-----';
    private static $_isbase64 = false;
    /**
     * 初始化key值
     * @param  string  $privkey  私钥
     * @param  string  $pubkey   公钥
     * @param  boolean $isbase64 是否base64编码
     * @return null
     */
    public  function init($privkey, $pubkey, $isbase64=false){
        self::$_privkey = $privkey;
        self::$_pubkey = $pubkey;
        self::$_isbase64 = $isbase64;
    }
    /**
     * 私钥加密
     * @param  string $data 原文
     * @return string       密文
     */
    public  function priv_encode($data){
        $outval = '';
        $res = openssl_pkey_get_private(self::$_privkey);//获取私钥
        openssl_private_encrypt($data, $outval, $res);//私钥加密
        if(self::$_isbase64){
            $outval = base64_encode($outval);
        }
        return $outval;
    }

    /**
     * 私钥解密
     * @param  string $data 密文
     * @return string       原文
     */
    public  function priv_decode($data){
        $outval = '';
        if(self::$_isbase64){
            $data = base64_decode($data);
        }
        $res = openssl_pkey_get_private(self::$_privkey);
        openssl_private_decrypt($data, $outval, $res);
        return $outval;
    }

    /**
     * 公钥解密
     * @param  string $data 密文
     * @return string       原文
     */
    public  function pub_decode($data){
        $outval = '';
        if(self::$_isbase64){
            $data = base64_decode($data);
        }
        $res = openssl_pkey_get_public(self::$_pubkey);
        openssl_public_decrypt($data, $outval, $res);
        return $outval;
    }
    /**
     * 公钥加密
     * @param  string $data 原文
     * @return string       密文
     */
    public  function pub_encode($data){
        $outval = '';
        $res = openssl_pkey_get_public(self::$_pubkey);
        openssl_public_encrypt($data, $outval, $res);
        if(self::$_isbase64){
            $outval = base64_encode($outval);
        }
        return $outval;
    }
    
    /**
     * 创建一组公钥私钥
     * @return array 公钥私钥数组
     */
    public function new_rsa_key(){
        $res = openssl_pkey_new();
        openssl_pkey_export($res, $privkey);
        $d= openssl_pkey_get_details($res);
        $pubkey = $d['key'];
        return array(
            'privkey' => $privkey,
            'pubkey'  => $pubkey
        );
    }
}
 

 
//举个粒子
$Rsa = new Rsa();
// $keys = $Rsa->new_rsa_key(); //生成完key之后应该记录下key值，这里省略
// p($keys);die;
$privkey = "-----BEGIN PRIVATE KEY-----
MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQCYw4a40U+AvKKk
d4qqbfP8oWjPbugIMAG4QG1h8gB6mnV+qmXq730XkGYZeaNe4ZmnOFb88cyE4IgA
+dRsrOJunCUkAIhPbDgDnkiue9DSruyYMtecp6NZlZYqYwdHal9lG5QYGm11soDW
AEVJQYMiHy+PIIJ7kV/0RqsAnxGNcxczHeUH0aqlbEWf3/WhwcYSFjzpf8Z18yr3
iFMRl3/eDOffFzCeAtoSM2sI2l7fQKoONdCUKmad4tJKXfUeY1xVnfXVGtkhebZl
yiC3uRmj5x3j11a5PfRyNf4ClSAtREGf0GztY1KUpqSqR0FqivZYWTrvv8/j/Or6
uvpCADLvAgMBAAECggEBAJQIxcDLdJN4ONPP09wb+NfTQlHhU5C7lK8MH/NOJBCr
JTi9v03PDhWLpKUDLsF/NPrKqeEsH9iUDLeFYch+MF6niYY9zdnJMO6wsBYFffLr
9/H1MuNnv+/L+VzR4ffeqNq9wuEomvH3LMo0MPAwP/cM6XV1N3yu/6Ej6goMG2JJ
qeLh0rLmbvzqb1IzKf8zIK9hkQ0eRxSytl504e9BN1Y9yBAYxqorPuEuuE0bcdev
NPLJs0oCv5Vqq28nQir232mh/MfSBF9ZnVZIgVAmr9kdGT9NTGTdKrc/75aumOZW
+Q2NDLOO+uKAlMMtImLCu4bJ1bb73xWEB6HbV6iIKiECgYEAx7ithEZO1k94XkdJ
sF+4b2bdkSkFBK1HqpYA8UUDI8JjPzmoNjh2B01dVGbZbm1nJ8shPj87KPVqZrYu
H4c9BwpyD0RLfF4WR6/M7/zKq6VlUvuVAnad9hNLSLCT6tXglK18yYWmwTzTaPrI
5AIruGT5WI2mffzXh4rP36OWeBUCgYEAw892NV0Jw2BADmEryYNh4CnuMU/XHToY
PsSUz8vTO5aWVT7dnAsmyWYupru47xPkIcjNPzrm+p0wz3F6LTLziHwy44LNmqQ2
eeKc2fLNBVWa0tawmiH72n5IicqOASDTj+e9rSyDvLHERei52yBoBTRQ+9bxWz/M
krR7Rzv6G/MCgYEAsU90xPVCcqN1IoY5lps0e7qgRIpdSSypbnnj9k8lnW6re+st
Oo3fw1Xc4Ny6dn4sUbjWF5Q9anyO7QcaZaVD+ec9Ie6o8Y36S8R4tisAp2icTxLJ
1LkIPfodITia6abdzkFDgwnj5LSioBXdmgePVxJWCFchk8KQemYzbMGoCY0CgYBP
RBKUM5+aKcKEj62MG9VpS1ATQkDQog3iiu262MYf3yvoQlSvsIv5B5ZnBKMulRzK
2GDN8ehDF5MExukwlumjHLP1CaR1r3gmCyh3yiRYvni4VRSUsKElp+1xaj/mEQXT
wXo1Oknx/vx3WGi0Xf/961nFORPnXoJP+SPWiF8NJQKBgFGyjIEivL5WlSSvBXSg
wEPmreqac0ZOd8N0JWUUUWqFhk+Z48XNdlUZYrwoqYawUTwh/ihXqiKjFHKxwXJ1
86UWgGTo00Ng7XmjmBnjhdBRN5mcNZ8ptDRxgPrFqhTDGcQBS2NHSNsLIY4jaJ9l
Y1t235PBnmnZo7pz49XJoH8X
-----END PRIVATE KEY-----
";//$keys['privkey'];
$pubkey  = "-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAmMOGuNFPgLyipHeKqm3z
/KFoz27oCDABuEBtYfIAepp1fqpl6u99F5BmGXmjXuGZpzhW/PHMhOCIAPnUbKzi
bpwlJACIT2w4A55IrnvQ0q7smDLXnKejWZWWKmMHR2pfZRuUGBptdbKA1gBFSUGD
Ih8vjyCCe5Ff9EarAJ8RjXMXMx3lB9GqpWxFn9/1ocHGEhY86X/GdfMq94hTEZd/
3gzn3xcwngLaEjNrCNpe30CqDjXQlCpmneLSSl31HmNcVZ311RrZIXm2Zcogt7kZ
o+cd49dWuT30cjX+ApUgLURBn9Bs7WNSlKakqkdBaor2WFk677/P4/zq+rr6QgAy
7wIDAQAB
-----END PUBLIC KEY-----";//$keys['pubkey'];
//echo $privkey;die;
//初始化rsaobject
$Rsa->init($privkey, $pubkey,TRUE);
 
//原文
$data = '你妈妈让你回家吃饭了';
 
//私钥加密示例
$encode = $Rsa->priv_encode($data);
// p($encode);
// //公钥 解密
// $ret = $Rsa->pub_decode($encode);
// p($ret);
 
// //公钥加密示例
// $encode = $Rsa->pub_encode($data);
// p($encode);
   //私钥解密
// $ret = $Rsa->priv_decode($encode);
// p($ret);
 
 
 
function p($str){
    echo '<pre>';
    print_r($str);
    echo '</pre>';
}
