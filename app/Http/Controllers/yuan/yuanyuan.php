<?php

namespace App\Http\Controllers\yuan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Wechat;
use App\Model\yuan;
use App\Model\login;
use Illuminate\Support\Facades\Redis;
class yuanyuan extends Controller
{
    //调用解析接口
    public function analysis()
   {
   	$url="http://api.avatardata.cn/ActNews/Query?key=d655e377003649c383cb69578fb58511&keyword=奥巴马";
   	// var_dump($url);die;
   	$urlData=Wechat::curlGet($url);
   	$Data=json_decode($urlData,true);
   	// var_dump($Data['result']);die;
     
     foreach ($Data['result'] as $key => $value) {
     	 $resInfo=[
           'title'=>$value['title'],
           'full_title'=>$value['full_title'],
           'pdate_src'=>$value['pdate_src'],
           'src'=>$value['src'],
           'content'=>$value['content'],
     	 ];
     $res=yuan::insert($resInfo);

     }
      var_dump($res);die;

   }



   //处理注册
   public function dologin(Request $request)
   {
      $login_name=request('login_name');
      $login_pwd=request('login_pwd');
      if(empty($login_pwd) || empty($login_name)){
         echo json_encode(['error'=>40002,'msg'=>'账号或者密码不能为空'],JSON_UNESCAPED_UNICODE);die;
      }

      $loginRes=login::insert([
         'login_name'=>$login_name,
         'login_pwd'=>$login_pwd,
      ]);

      if($loginRes){
            echo json_encode(['success'=>2000,'msg'=>'注册成功'],JSON_UNESCAPED_UNICODE);die;
      }
   }



   //处理登录接口
   public function doregister(Request $request)
   {

   	  $login_name=request('login_name');
      $login_pwd=request('login_pwd');
        if(empty($login_pwd) || empty($login_name)){
         echo json_encode(['error'=>40002,'msg'=>'账号或者密码不能为空'],JSON_UNESCAPED_UNICODE);die;
      }
      
      $select=login::where('login_name',$login_name)->first();
      
      if(empty($select)){
            echo json_encode(['error'=>40003,'msg'=>'无此用户'],JSON_UNESCAPED_UNICODE);die;  
      }else{
      	  $selectPwd=login::where('login_pwd',$login_pwd)->first();
      	   // var_dump($login_pwd);die;
           if(empty($selectPwd)){
           	  echo json_encode(['error'=>40003,'msg'=>'密码不正确'],JSON_UNESCAPED_UNICODE);die;  
           }else{
           	 $update=login::where('login_name',$login_name)->update(['is_deng'=>1]);
           	 if($update){
                   echo json_encode(['success'=>2001,'msg'=>'登录成功'],JSON_UNESCAPED_UNICODE);die;
           	 }else{
           	 	echo json_encode(['error'=>40004,'msg'=>'你已登录过'],JSON_UNESCAPED_UNICODE);die;  
           	 }
           }
      }

   }



   public function content_show()
   {

   	  $ip=$_SERVER['REMOTE_ADDR'];
      $num=Redis::get("pass_num_".$ip);
      if(!$num){
        $num=1;
      }
      if($num>500){//每天超过10次 报错
          echo json_encode(['error'=>40005,'msg'=>'每天最多调用接口10次'],JSON_UNESCAPED_UNICODE);die;  ;
      }
      Redis::set("pass_num_".$ip,$num+1,3600);

        
       $data=Redis::get("pageres");
      if(!empty($data)){
        $contentInfo=yuan::paginate(1);
        $content=$contentInfo->toArray(); 
        $Res=json_encode($content,true);  
    
        Redis::set('pageres',$Res,86400);
       }
       $res=json_decode($data,true);
        var_dump($res);die;
   }

}
