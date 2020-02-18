<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\login;
use App\Model\goods1;
use App\Model\category1;

class exam extends Controller
{
    //登录接口
    public function exam_login(Request $request)
    {
     header("Access-Control-Allow-Origin:*");
     header('Access-Control-Allow-Methods:POST');
     header('Access-Control-Allow-Headers:x-requested-with, content-type');

      $info=$request->all();
      $loginRes=login::where(['login_name'=>$info['name']])->where(['login_pwd'=>$info['pwd']])->get()->toArray();
       // var_dump($loginRes);die;
      if($loginRes){      
            $access_token=rand(1000,9999).time().$loginRes[0]['login_id'];
            $over_time=time()+3600;
            $_tokenUpdate=login::where('login_id',$loginRes[0]['login_id'])->update(['access_token'=>$access_token,'over_time'=>$over_time]);
            if($_tokenUpdate){
            	  echo json_encode(['font'=>1,'token'=>$access_token]);
            }else{
            	 echo json_encode(['font'=>2,'token'=>$access_token]);
            }
           
     
      }else{
      	  echo  "<script>alert('登录失败');location.href='http://127.0.0.1/login.html';</script>";
      }


    }


    public function exam_aaa(Request $request)
    {
    	$token=request('_token');
    	if(empty($token)){
            echo  "<script>alert('token不存在');location.href='http://127.0.0.1/login.html';</script>";
    	}
    	$selectTime=login::where('access_token',$token)->value('over_time');
    	if($selectTime <time()){
            echo  "<script>alert('登录时间过长，请重新登录');location.href='http://127.0.0.1/login.html';</script>";
    	}else{
    	    echo  "<script>alert('正在获取商品.....');location.href='http://127.0.0.1/goodsInfo.html';</script>";
    	}


    }
  

    //商品列表页
    public function getGoodsinfo(Request $request)
    {
	     header("Access-Control-Allow-Origin:*");
       header('Access-Control-Allow-Methods:POST');
       header('Access-Control-Allow-Headers:x-requested-with, content-type');

 


        $goodsinfo =goods1::paginate(4);
        $cateInfo=category1::get()->toArray();
      foreach ($goodsinfo as $key => $value) {
         foreach ($cateInfo as $k => $v) {
          if($value['cate_id'] == $v['cate_id']){
           $goodsinfo[$key]['cate_id']=$v['cate_name'];
          }
         }
      }
      //所有分类
      $cateSelect=category1::get()->toArray();
      $goodsinfo=$goodsinfo->toArray();
     
       echo json_encode($goodsinfo,JSON_UNESCAPED_UNICODE);
    
    }

}
