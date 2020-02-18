<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\wish;
use App\Model\Wechat;

class Ajuan extends Controller
{

	//愿望添加
    public function wish_add()
    {
        //获取openid
        $openid=Wechat::getOpent();
       return view('ajuan.wish_add',['openid'=>$openid]);
    }

    //处理愿望添加
    public function wish_doadd(Request $request)
    {
        $fo=$request->all();
   // dd($info['wish_content']);
     
        $_token=Wechat::getToken();//获取Token值
       $openid=$fo['openid'];//获取用户id       
       $url="https://api.weixin.qq.com/cgi-bin/user/info?access_token={$_token}&openid={$openid}&lang=zh_CN";
       $info=file_get_contents($url);
       $data=json_decode($info,true);
       $headimgurl=$data['headimgurl'];
       $nickname=$data['nickname'];
      
         $res=wish::insert([
            'wish_content'=>trim($fo['wish_content']),
            'openid'=>$openid,
            'nickname'=>$nickname,
            'headimgurl'=>$headimgurl,
         ]);
         if($res){
            return redirect('wish_index');
         }
    }

     //许愿墙列表展示
     public function wish_index()
     {
        $info=wish::get()->toArray();
     	return view('ajuan.wish_index',['info'=>$info]);
     }


}
