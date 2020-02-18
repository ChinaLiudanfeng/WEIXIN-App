<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\attribute1;
use App\Model\type1;

class attribute extends Controller
{
   //分类添加页面
    public function attribute_add()
    {
     
     $info = type1::get()->toArray();

    
       return view('attribute.attribute_add',['info'=>$info]);
    }

    //处理分类添加
    public function attribute_doadd(Request $request)
    {
      $info = $request->all();

      unset($info['s']);
      $res=attribute1::insert($info);
     if($res){
       return redirect('attribute_index');
     }

    }

    public function attribute_index()
    {

    	$info = attribute1::get()->toArray(); 	
    	return view('attribute.attribute_index',['info'=>$info]);
    }


  //删除
  public function attribute_delete(Request $request)
  {
     $info= $request->all();
     dd($info);
     foreach ($info as $key => $value) {
       $res=attribute1::whereIn('id',$value)->delete();
     }    
    if($res){
       return redirect('attribute_index');
     }
  }

    
   	
   


}
