<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
class accredic extends Controller
{
    public function accredic_add()
    {	
    	$appid="wx099976155bdb303b";
    	//urlencode 会将url特殊字符进行转义--
    	$redirect_uri = urlencode("http://www.yuanyuanliuliu.com/accredic_auth");//网页授权在跳转地址
    	$url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid={$appid}&redirect_uri={$redirect_uri}&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect";
         // $url 认证服务器。
    	header("location:".$url);die; 
    }
    /*
       1、跳转微信服务器 让用户授权
       2、微信授权成功后，跳转咱们配置的地址(回调地址) 带一个code参数
    
     */

    //授权地址
    public function accredic_auth(Request $reques)
    {
    	$code=request('code');
    	$appid="wx099976155bdb303b";
    	$secret="20a4f8cf9c61a4da527d01a70658de44";
    	$url="https://api.weixin.qq.com/sns/oauth2/access_token?appid={$appid}&secret={$secret}&code={$code}&grant_type=authorization_code";
    	//$url  第三方程序 -获取access_token 值- openid 
    	$data = file_get_contents($url);
    	$data = json_decode($data,true);
    	$openid = $data['openid'];
    	$access_token = $data['access_token'];
    	$userInfo_url="https://api.weixin.qq.com/sns/userinfo?access_token={$access_token}&openid={$openid}&lang=zh_CN";
    	//$userInfo_url  资源服务器 获取用户信息，通过access_token 
    	$data = file_get_contents($userInfo_url);
    	$data = json_decode($data,true);
    	var_dump($data);die;	
    }


    // public static function getOpent()
    // {
    // 	$openid = Session('openid');
    // 	if(!empty($openid)){
    //         return $openid;die;
    // 	}

    // 	//接收code
    // 	$code = request()->input();
    // 	 if(empty($code)){
    //        $host = $_SERVER['HTTP_HOST'];
    //        $uri = $_SERVER['REQUEST_URI'];
    //        $redirect_uri = urlcode("http://".$host.$uri);
    //        //第三方程序通过网关，获取个人code
    //        $url="https://open.weixin.qq.com/connect/oauth2/authorize?appid=".Self::appid."&redirect_uri={$redirect_uri}&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect";
    //        header("location:".$url);die;
    // 	 }else{
    // 	 	//存入code后 curl解析，获取用户assect_token  和openid 
    // 	 	$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".Self::appid."&secret=".Self::secret."&code={$code}&grant_type=authorization_code";
    // 	 	$data=Self::curlPost($url);
    // 	 	$data=json_decode($data,true);
    // 	 	$openid=$data['openid'];
    // 	 	$access_token=$data['access_token'];
    // 	 	Session(['openid'=>$openid]); 
    // 	 }
    // 	 return $openid; 
    // 	 //返回openid 获取用户信息  
    // }
}
