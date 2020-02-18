<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Wechat;
use App\Model\profress1;
use App\Model\receipt;

class profress extends Controller
{
    //添加页面
   public function profress_add()
   {
   	 // $openid=Wechat::getOpent();
   	  // dd($openid);

   	return view('profess.profess_add');
   }

   //处理添加--被关注的用户
   public function profress_doadd(Request $request)
   {

       $data=$request->all();
        $content=$data['content'];
        $anonymity=$data['anonymity'];
        $access_token=Wechat::getToken();
        $url="https://api.weixin.qq.com/cgi-bin/user/get?access_token={$access_token}";
        $data = file_get_contents($url);
        $data=json_decode($data,true);//获取关注用户的openid
        $openid=$data['data']['openid'];

         $userInfo=[];
        foreach ($openid as $key => $value) {
           $userUrl="https://api.weixin.qq.com/cgi-bin/user/info?access_token={$access_token}&openid={$value}&lang=zh_CN";
           $info=file_get_contents($userUrl);
           $userInfo[]=json_decode($info,true);
        
        }

       return view('profess.profress_doadd',['userInfo'=>$userInfo,'content'=>$content,'anonymity'=>$anonymity]);
      
       
   }




   //发送表白消息
   public function profress_mass(Request $request)
   {
     $info=$request->all();
     $content=$info['content'];
    $access_token=Wechat::getToken();
      $url="https://api.weixin.qq.com/cgi-bin/message/mass/send?access_token={$access_token}";
      //获取关注用户的openid
      $openidUrl="https://api.weixin.qq.com/cgi-bin/user/get?access_token={$access_token}";
      $data = file_get_contents($openidUrl);
      $data=json_decode($data,true);
      $openid=$data['data']['openid'];

      $postData=[
              "touser"=>$openid,
              "msgtype"=>"text",
              "text"=>[
                   "content"=>$content
              ],
       
           ];

      
        $postData=json_encode($postData,JSON_UNESCAPED_UNICODE);
        $data=Wechat::curlPost($url,$postData);//生成为ticket
        $data=json_decode($data,true);
       if($data['errcode'] == 0){
			     $dataInfo=profress1::insert([
			       'content'=>$info['content'],
			       'openid'=>json_encode($info['openid']),
			       'anonymity'=>$info['anonymity'],
			     ]);

			  if($dataInfo){
			          echo "表白成功";
			     }
       }


   }

     
     //我的表白列墙
   public function my_profress()
   {
   	$data=receipt::get()->toArray();
    $info=profress1::where('anonymity','匿名')->get()->toArray();
    $openid=array_column($info,'openid');
    $id=[];
     foreach ($openid as $key => $value) {
     	$id=strpos($value,'["');
     	dd($id);
     }
    
    $hide_user=receipt::whereIn('openid',$openid)->get()->toArray();
    dd($hide_user);
   	 return view('profess.my_profress',['data'=>$data]);
   }

}
