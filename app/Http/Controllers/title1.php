<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\title;

class title1 extends Controller
{
      //添加视图页面
    public function title_add()
    {
    	return view('title.title_add');
    }

    public function title_doadd(Request $request)
    {
       $data=$request->all();
       unset($data['s']);
       $res=title::insert($data);
       if($res){
            echo "添加成功";
       }

    }

    
}
