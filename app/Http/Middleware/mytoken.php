<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\login;

class mytoken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        header("Access-Control-Allow-Origin:*");
        header('Access-Control-Allow-Methods:POST');
        header('Access-Control-Allow-Headers:x-requested-with, content-type');
      
        $info=$request->all();
        $token=request('token');
        $goods_id=request('goods_id');     
        $res=login::where('access_token',$token)->value('over_time');   
        $login_id=login::where('access_token',$token)->value('login_id');
    
        if($res>time()){
            $mid_parmas = ['user_id'=>$login_id];
            $request->attributes->add($mid_parmas);
             return $next($request);
        }else{
              echo json_encode(['code'=>40001,"font"=>'登录过期'],JSON_UNESCAPED_UNICODE);die;
        }
       
    }
}
