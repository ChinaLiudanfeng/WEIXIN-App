<?php

namespace App\Http\Middleware;

use Closure;

class handlr
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
      //不能和底层代码_方法名一样
    public function handle($request, Closure $next)
    {

        header("Access-Control-Allow-Origin:*");
        header('Access-Control-Allow-Methods:POST');
        header('Access-Control-Allow-Headers:x-requested-with, content-type');
        return $next($request);
    }
}
