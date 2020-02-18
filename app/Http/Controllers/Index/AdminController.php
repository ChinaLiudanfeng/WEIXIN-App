<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Wechat;
use Illuminate\Support\Facades\Redis;
class AdminController extends Controller
{
    //后台主页面
       public function index()
        {
            return view('Index/index');
        }


        //后台登录页面
        public function login()
        {
        	return view('Index/login');
        }
        //处理登录页面
       public function dologin(Request $request)
       {
        $name=request('login_name');
        $pwd=request('login_pwd');
        $select=DB::table('login')->where('login_name',$name)->where('login_pwd',$pwd)->first();
        if($select){
            $login_id=$select->login_id;
            $accesst_token=md5(time().rand(10000,99999).$login_id);
        
            $over_time=time()+3600;
            $Res=DB::table('login')->where('login_id',$login_id)->update(['access_token'=>$accesst_token,'over_time'=>$over_time]);
            if($Res){
              echo "<script>alert('登录成功'),location.href='menu_add';</script>";
            }else{
              echo "<script>alert('登录失败'),location.href='login';</script>";
            }
            
        }


        die;
           $info=$request->all();
           $res=DB::table('login')->where('login_name',$info['login_name'])->first();
            if(!empty($res)){
                if (!empty($info['login_name'] == $res->login_name)) {
                    if ($info['login_pwd'] == $res->login_pwd) {
                        // session(['login' => $info['login_name']]);
                        // $code=session('code');
                        //   if($info['code'] != $code){
                        //      echo "<script>alert('验证码不正确');location.href='login';</script>";
                        //   }
                        
                        // $accesst_token=base64_encode($res->login_id.rand(1000,9999).time()).sha1($res->login_pwd,$res->login_name);
                       
                        // echo  $accesst_token;die;

                        echo "<script>alert('登录成功');location.href='Index';</script>";
                    } else {
                        echo "<script>alert('密码和用户名不匹配');location.href='login';</script>";
                    }

                } else {
                    echo "<script>alert('用户名不存在');location.href='login';</script>";
                }
            }else{
                echo "<script>alert('查不到此用户信息');location.href='login';</script>";
            }

       }




       //获取assect_token
       public function getaccess_token(Request $request)
       {
         //防止盗刷
        $ip=$_SERVER['REMOTE_ADDR'];
      
        dd($request->route()->getActionName());//获取方法名
        $num= Redis::get("pass_num_".$ip);
        if($num >100){
         echo "滚";die;
        }
        // set 存入   get取出
        $aa=Redis::set("pass_num_".$ip,$num+1);
        echo $num;
        die;

          $accesst_token=request('access_token');
        
           $time=DB::table('login')->where('access_token',"db173f57898e0b4720fa5441c6d711b5")->value('over_time');
     
           if($time<time()){
               echo "<script>alert('登录过期，请重新登录');location.href='login';</script>";
           }else{
            echo "可以登录";
           }

       }



       

       //注册账号
     public function register()
     {
         return view('Index\register');
     }

     //处理一个注册登录
    public function do_register(Request $request)
    {
        $info=$request->all();
        if($info['login_pwd'] != $info['login_pwd2']){
            echo "<script>alert('两次密码输入不一致，请输入一致的密码');location.href='register';</script>";die;
        }
       $res=DB::table('login')->insert([
           'login_name'=>$info['login_name'],
           'login_pwd'=>$info['login_pwd'],
       ]);

        if($res){
            echo "<script>alert('注册成功，咱们去登录');location.href='login';</script>";
        }

    }


    //生成验证码 控制器
    public function login_code(Request $request)
    {
       $data=$request->all();  

      
      // if($data['code'] == session('code')){
      //    echo "<script>alert('验证码不正确');location.href='login';</script>";
      // }   
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
      

}
