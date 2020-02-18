<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use App\Model\goods1;
use App\Model\category1;
use App\Model\login;
use App\Model\gattr;
use App\Model\attribute1;
use App\Model\cart;
use App\Model\Wechat;
use App\Model\weather;
use App\Model\Aes;

class wechatController extends Controller
{
      //查询天气
  public function weather_select()
  {

    $guangZhouurl="http://api.k780.com:88/?app=weather.future&weaid=广州&appkey=43603&sign=4598513bf9c76e0a240bd63fdf6e77b4&format=json";
     $guangZhou = Wechat::curlGet($guangZhouurl);
      if($guangZhou){
          $upGuanzhou=weather::where('city','广州')->update(['weather'=>$guangZhou]);   
      }

      $beiJingurl="http://api.k780.com:88/?app=weather.future&weaid=北京&appkey=43603&sign=4598513bf9c76e0a240bd63fdf6e77b4&format=json";
     $beiJing = Wechat::curlGet($beiJingurl);

      if($beiJing){
          $upbeiJing=weather::where('city','北京')->update(['weather'=>$beiJing]);   
      }
  

      $shengzhenurl="http://api.k780.com:88/?app=weather.future&weaid=深圳&appkey=43603&sign=4598513bf9c76e0a240bd63fdf6e77b4&format=json";
     $shengzhen = Wechat::curlGet($shengzhenurl);
      if($shengzhen){
          $upshengzhen=weather::where('city','深圳')->update(['weather'=>$shengzhen]);  
      }


      $shangHaiurl="http://api.k780.com:88/?app=weather.future&weaid=上海&appkey=43603&sign=4598513bf9c76e0a240bd63fdf6e77b4&format=json";
     $shangHai = Wechat::curlGet($shangHaiurl);
      if($shangHai){
          $upshengzhen=weather::where('city','上海')->update(['weather'=>$shangHai]);;   
      }

       $tianJingurl="http://api.k780.com:88/?app=weather.future&weaid=天津&appkey=43603&sign=4598513bf9c76e0a240bd63fdf6e77b4&format=json";
     $tianJing = Wechat::curlGet($tianJingurl);
      if($tianJing){
          $upshengzhen=weather::where('city','天津')->update(['weather'=>$tianJing]); 
          echo "success";
      }

  }

}
