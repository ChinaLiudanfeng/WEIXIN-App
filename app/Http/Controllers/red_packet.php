<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\red_packet1;
use App\Model\Wechat;
use App\Model\geography;

class red_packet extends Controller
{
    //红包添加页面
    public function red_add()
    {
    	return view('red_packet.red_add');
    }

    //处理添加页面
    public function red_doadd(Request $request)
    {
    	$info=$request->all();
    	$res=red_packet1::insert([
             'red_money'=>$info['red_money'],
             'red_people'=>$info['red_people'],
        ]);

        if($res){
             return redirect('red_index');
        }
    }

    public function red_index()
    {
        return view('red_packet.red_index');
    }


    public function geography()
    {
       
       $openid=Wechat::getOpent();  
      
       $res=geography::where('openid',$openid)->get()->toArray();
       foreach ($res as $key => $value) {
         $Latitude=$res[$key]['Latitude'];
       $Longitude=$res[$key]['Longitude'];
        echo  "<img src=".$res[$key]['headimgurl'].">";  
        echo  "<h2>昵称:" .$res[$key]['nickname']; "</h2><hr/>";
        echo  "<h2>纬度" .$Latitude; "</h2>";
        echo    "<h2>纬度".$Longitude; "</h2>";die;
       }
       
    }
}
