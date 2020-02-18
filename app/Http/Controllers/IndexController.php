<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    //搜页面
    public function index_weather()
    {
    	return view('Index.index_weather');
    }

    //处理搜索
    public function index_doweather(Request $request)
    {
          
    	if(request()->ajax()){
    		$city = request('city');

    		$cache_name= 'weacherData_'.$city; 
            $data = Cache::get($cache_name);
            if(empty($data)){
    		        //天气接口
         $url = 'http://api.k780.com/?app=weather.future&weaid='.$city.'&&appkey=10003&sign=b59bc3ef6191eb9f747dd4e83c99f2a4&format=json';
    
         $data = file_get_contents($url);
         //86400 24小时时间戳、
         $time24 = strtotime(date("Y-m-d H:i:s"))+86400;
         $second = $time24 - time();
         Cache::put($cache_name,$data,$second);
         }
	
	   
		     echo $data;die;
	     }
 
        
    }


}
