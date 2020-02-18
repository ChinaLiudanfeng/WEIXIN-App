<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Model\Wechat;

class user extends Model
{
     protected $table = 'user';
    protected $primaryKey = 'user_id';
    public $timestamps = false;
    protected $guarded = [];//批量添加需要的指定属性


    //获取获取用户信息 -入库
    public static function getUserInfo($data,$channelStatus)
    {


     $c_stic=DB::table('user')->where(['openid'=>$data['openid']])->first();
     if($c_stic){
           echo "该用户已关注";die;
      }
    	$dataInfo = [
            'openid'=>$data['openid'],
            'nickname'=>$data['nickname'],
            'sex'=>$data['sex'],
            'headimgurl'=>$data['headimgurl'],
            'city'=>$data['city'],
            'status'=>1,
            'subscribe_time'=>time(),
            'channel_status'=>$channelStatus,
    	];
    	$res =Self::create($dataInfo);
    	
    }


   public static function unsubscribe($xmlobj)
   {
     
        $ticket = substr($xmlobj->EventKey,8);
       
        $openid=$xmlobj->FromUserName;
        var_dump($openid);die;
    	// $c_stic=DB::table('user')->where(['openid'=>$openid])->get('status');
    	// $c_stic=json_decode($c_stic,true);
    	// $c_stic=$c_stic[0]['status'];
    	       DB::table('user')->where(['openid'=>$openid])->update(['status'=>2]);
    	  $res=DB::table('channl')->where(['c_80'=>$ticket])->decrement('channl_num');
          
        



   }

}
