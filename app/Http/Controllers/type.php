<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\type1;
use App\Model\attribute1;

class type extends Controller
{
    //分类添加页面
    public function type_add()
    {
     
     $info = type1::get()->toArray();
    
       return view('type.type_add');
    }

    //处理分类添加
    public function type_doadd(Request $request)
    {
      $info = $request->all();
      unset($info['s']);
      $res=type1::insert($info);
     if($res){
       return redirect('type_index');
     }

    }

    public function type_index()
    {
    	$info = type1::get()->toArray();
     
        foreach ($info as $key => $value) {
       $info[$key]['count']=attribute1::where('type_id',$value['type_id'])->count();
      }
      
    	return view('type.type_index',['info'=>$info]);
    }


    //两表联查-属性列表
  public function type_attribute(Request $request)
  {
    $type_id=request('type_id');
    $type_name=type1::where('type_id',$type_id)->value('type_name');

    $tyAttrInfo=attribute1::where('type_id',$type_id)->get()->toArray();
    return view('type.type_attribute',['info'=>$tyAttrInfo,'type_name'=>$type_name]);
  }


  //  //删除
  public function  tyAttrInfo_delete(Request $request)
  {
     $info= $request->all();
     foreach ($info as $key => $value) {
       $res=attribute1::whereIn('goods_attr_id',$value)->delete();
     }    
    if($res){
       return redirect('type_index');
     }
  }

}
