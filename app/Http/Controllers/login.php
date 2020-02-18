<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Wechat;
use DB;
use Illuminate\Support\Facades\Cache;
class login extends Controller
{
     //登录
     public function login_add()
     {


        $appid = "wx099976155bdb303b";
        $jsapiTicket = WeChat::getJsApiTicket();
        // 注意 URL 一定要动态获取，不能 hardcode.
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


        $timestamp = time();
        $nonceStr =$this->createNonceStr();


        // 这里参数的顺序要按照 key 值 ASCII 码升序排序
        $string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";


        $signature = sha1($string);


        $signPackage = array(
            "appId"     => $appid,
            "nonceStr"  => $nonceStr,
            "timestamp" => $timestamp,
            "url"       => $url,
            "signature" => $signature,
            "rawString" => $string
        );
  
     	// $openid=Wechat::getOpent();  //自己代码，获取openid
     	return view('login.login_add',['signPackage'=>$signPackage]);
     }



      private function createNonceStr($length = 16) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $str = "";
    for ($i = 0; $i < $length; $i++) {
      $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
    }
    return $str;
    }

     public function login_doadd(Request $request)
     {
        $info=$request->all();
        foreach ($info as $key => $value) {
           if($value==""){
                 echo json_encode(['content'=>'请填写完整信息','icon'=>5,'code'=>2]);die;
           }
        };
        $res=DB::table('admin')->where('username',$info['name'])->first();
            if(!empty($res)){
                if (!empty($info['name'] == $res->username)) {
                    if ($info['pwd'] == $res->password) {
                        // $res_openid=DB::table('admin')->where('username',$info['name'])->update(['openid'=>$info['openid']]);
                        // if($res_openid){
                        // 	   echo json_encode(['content'=>'登录成功','icon'=>6,'code'=>1]);
                        // }
                      echo json_encode(['content'=>'登录成功','icon'=>6,'code'=>1]);
                    } else {
                        echo "<script>alert('密码和用户名不匹配');location.href='login_add';</script>";
                    }

                } else {
                    echo "<script>alert('用户名不存在');location.href='login_add';</script>";
                }
            }else{
                echo "<script>alert('查不到此用户信息');location.href='login_add';</script>";
            }
        


     }



      //生成验证码 控制器
    public function admin_code(Request $request)
    {
       $data=$request->all();  
  
      $res=DB::table('login')->where('login_name',$data['name'])->where('login_pwd',$data['pwd'])->get();
      if(empty($res)){
         echo json_encode(['content'=>'账号或密码不正确','icon'=>5,'code'=>2]);
      }else{
          $access_token = Wechat::getToken();
          $url="https://api.weixin.qq.com/cgi-bin/message/template/send?access_token={$access_token}";
          $rand=rand(1000,9999);
            session(['code'=>$rand]);
         $postData='{
           "touser":"ocsMa5xHL7dvaamWPhpAFC--cyTs",
           "template_id":"ia7qkqYMtm0fyCzFuREFUhcxXt90fJ5_C8w2ytTabgg",          
           "data":{
               "code":{
                    "value":'.$rand.',
                    "color":"#1733177"
                },
                "name":{
                    "value":"可爱小袁袁",
                     "color":"#1733177"
                  },
                "time":{
                  "value":"'.date("Y-m-d H:i:s").'",
                   "color":"#1733177"
                }

               }
             }';
          $data=Wechat::curlPost($url,$postData);//生成为ticket
          $data=json_decode($data,true);
          if($data['errcode'] == 0){
            
              echo json_encode(['content'=>'验证码发送成功','icon'=>6,'code'=>1]);
          }else{
             echo json_encode(['content'=>'验证码发送失败','icon'=>5,'code'=>2]);
          }      
        }
        

    }


     public function login_index()
     {
     	echo "注册列表";
     }



     //生成二维码--展业页面
     public function dimensional()
     {
        $id = rand(1000,9999).time();
        $redirect_url="http://qr.liantu.com/api.php?text=http://www.yuanyuanliuliu.com/mobliescan?id=".$id;
        
        return view('login.dimensional',['redirect_url'=>$redirect_url,'id'=>$id]);
     }

     //手机扫码登录地址
     public function mobliescan(Request $request)
     {
      
      $id=request('id');
       $openid=Wechat::getOpent();  
       Cache::put('openid_'.$id,$openid,180);
       echo "手机扫码";die;
     }

     //处理用户 -微信
     public function chenkWechatLogin()
     {
       $id=request('id');
        $openid = Cache::get('openid_'.$id);
        if($openid){
           echo json_encode(['content'=>'已扫码','icon'=>6,'code'=>1]);
        }else{
          echo json_encode(['content'=>'未扫码','icon'=>5,'code'=>2]);
        }

      }


}
