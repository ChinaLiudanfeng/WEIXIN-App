<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Wechat extends Model
{
    //model 常量属性
    const appid = "wx099976155bdb303b";
    const secret = "20a4f8cf9c61a4da527d01a70658de44";

    //接入校验
    public static function validate()
    {
    	// $echostr = request('echostr');
		// echo $echostr;exit;
    	$echostr = request("echostr");
    	if(!empty($echostr) && Wechat::checkSignature()){
              echo $echostr;die;
    	}
    }

   /**
	 * 接入来源校验
	 * @return [type] [description]
	 */
	public static function checkSignature()
	{
	    // 1）将token、timestamp、nonce三个参数进行字典序排序 
	    // 2）将三个参数字符串拼接成一个字符串进行sha1加密 
	    // 3）开发者获得加密后的字符串可与signature对比，标识该请求来源于微信
	    $signature = $_GET["signature"];
	    $timestamp = $_GET["timestamp"];
	    $nonce = $_GET["nonce"];
	    //1）将token、timestamp、nonce三个参数进行字典序排序
		$tmpArr = array("ccc",$timestamp,$nonce);
		sort($tmpArr, SORT_STRING);
		//2）将三个参数字符串拼接成一个字符串进行sha1加密 
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		//3)开发者获得加密后的字符串可与signature对比，标识该请求来源于微信
		if( $signature == $tmpStr ){
			return true;
		}else{
			return false;
		}
	}
	

	//上传素材-调用微信接口上传生成唯一签名id。
    public static function uploadMedia($path,$m_format)
    {
        $mediaPath = public_path().'\\'.$path;//存入微信。使用绝对路径
        //h获取图片id--然后存入库中
        $access_token = self::getToken();
        $url = "https://api.weixin.qq.com/cgi-bin/media/upload?access_token={$access_token}&type={$m_format}";
        $postData['media']= new \CURLFile($mediaPath);
        $img_id = self::curlPost($url,$postData);
        $img_id=json_decode($img_id,true);
        if(!isset($img_id['media_id'])){
            echo "<script>alert('接口验证失败'),location.href='media_add';</script>";
        }
        return $img_id;

    }


    //生成二维码并存入到本地
    public static function two_WMa($c_80)
    {
       $access_token=Wechat::getToken();//获Token值
        $url = "https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token={$access_token}";
        $postData=[
             "action_name"=>"QR_LIMIT_SCENE",
             "action_info"=>[
                    "scene"=>[
                        "scene_id"=>$c_80
                    ]
             ],
        ]; 
         $postData=json_encode($postData);
        $data=Wechat::curlPost($url,$postData);//生成为ticket   
        $data=json_decode($data,true);       
        $ticket=$data['ticket'];
        $QR_URL = "https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket={$ticket}";
         $img = file_get_contents($QR_URL);
        // $filename = md5(time().rand(1000,9999)).'.jpg';
        return  $img;
    }

		 //获取token
	public static function getToken()
	{
	    //判断缓存中是否有数据
	     // $access_token = Cache::get('access_token');
	     // if(empty($access_token)){//过期时间
              $url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx099976155bdb303b&secret=20a4f8cf9c61a4da527d01a70658de44";
		    $data=file_get_contents($url);
		    $data=json_decode($data,true);
		    $access_token=$data['access_token'];
		    // Cache::put('access_token',$access_token,7000);
	     // }
	
		 return  $access_token;

	}

	//获取用户信息
	public static function getUserInfo($xmlobj)
	{
        
	   $_token=Wechat::getToken();//获取Token值
       $openid=$xmlobj->FromUserName;//获取用户id       
	   $url="https://api.weixin.qq.com/cgi-bin/user/info?access_token={$_token}&openid={$openid}&lang=zh_CN";
	   $info=file_get_contents($url);
	   $data=json_decode($info,true);
	   return $data;//返回用户信息
	}


	//回复文本信息
	public static function reson($xmlobj,$msg)
	{
      
        echo "<xml>
		  <ToUserName><![CDATA[".$xmlobj->FromUserName."]]></ToUserName>
		  <FromUserName><![CDATA[".$xmlobj->ToUserName."]]></FromUserName>
		  <CreateTime>".time()."</CreateTime>
		  <MsgType><![CDATA[text]]></MsgType>
		  <Content><![CDATA[".$msg."]]></Content>
		</xml>";die;

	}







	//获取天气信息
	
   	public static function getWether($content)
	{
		$n = mb_strpos($content,"天气");
		$city = '北京';
		if($n>0){
			$city = mb_substr($content,0,$n);
		}
		$url = "http://api.k780.com/?app=weather.future&weaid={$city}&&appkey=10003&sign=b59bc3ef6191eb9f747dd4e83c99f2a4&format=json";
		$data = file_get_contents($url);
		$data = json_decode($data,true);
		//var_dump($data);die;
		if($data['success'] == 1){
			$msg = "";
			foreach ($data['result'] as $key => $value) {
				$msg .= $value['citynm']."-".$value['days']."-".$value['week']."-".$value['temperature']."\r\n";
			}
		}else{
			//报错
			$msg = "暂时获取不到该城市天气数据";
		}
		return $msg;
	}



      public static function curlPost($url,$postData)
    {
        //1初始化
        $ch = curl_init();
        //2设置
        curl_setopt($ch,CURLOPT_URL,$url); //访问地址
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); //返回格式
        curl_setopt($ch,CURLOPT_POSTFIELDS,$postData);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false); // 对认证证书来源的检查
        //3执行
        $content = curl_exec($ch);
        //4关闭
        curl_close($ch);     
        return $content;
    }


    /**
     * curl get请求
     */
    public static function curlGet($url)
    {
        //1初始化
        $ch = curl_init();
        //2设置
        curl_setopt($ch,CURLOPT_URL,$url); //访问地址
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); //返回格式 
        //请求网址是https
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false); // 对认证证书来源的检查
        //3执行
        $content = curl_exec($ch);
        //4关闭 
        curl_close($ch);
        return $content;    
    }

    
    //网页授权，获取openid 获取用户信息
     public static function getOpent()
    {

        $appid = "wx099976155bdb303b";
      $secret = "20a4f8cf9c61a4da527d01a70658de44";
    	$openid = Session('openid');
    	if(!empty($openid)){
            return $openid;die;
    	}

    	//接收code
    	$code = request()->input('code');
    	 if(empty($code)){
           $host = $_SERVER['HTTP_HOST'];

           $uri = $_SERVER['REQUEST_URI'];
           $redirect_uri = urlencode("http://".$host.$uri);
           //第三方程序通过网关，获取个人code
           $url="https://open.weixin.qq.com/connect/oauth2/authorize?appid={$appid}&redirect_uri={$redirect_uri}&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect";
           header("location:".$url);
    	 }else{
    	 	// 存入code后 curl解析，获取用户assect_token  和openid 
    	 	$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid={$appid}&secret={$secret}&code={$code}&grant_type=authorization_code";
            // var_dump($url);die;
    	 	$data=file_get_contents($url);//相当curlGet
    	 	$data=json_decode($data,true);
    	 	$openid=$data['openid'];
    	 	// $access_token=$data['access_token'];
    	 	Session(['openid'=>$openid]); 
            return $openid; 
    	 }
    	 //返回openid 获取用户信息  
    }


   //获取apiTicket
  public static function getJsApiTicket()
  {
    $ticket = Cache::get('ticket');
    if(empty($ticket)){
         $access_token=Self::getToken();
         $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token={$access_token}&type=jsapi";
         $data = file_get_contents($url);
         $data = json_decode($data,true);
         $ticket = $data['ticket'];
         Cache::put('ticket',$ticket,7200);
    }
    file_put_contents("ticket", $ticket);
    return $ticket;
  }




    /**
     * 验证签名
     */

    //随机生成字符串
   



  

}
