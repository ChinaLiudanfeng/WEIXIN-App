<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\category1;
use App\Model\goods1;

class category extends Controller
{
    //分类添加页面
    public function category_add()
    {
     
     $info = category1::get()->toArray();
       $data=$this->hierarchy($info);
       
       return view('category.category_add',['info'=>$data]);
    }

    //处理分类添加
    public function category_doadd(Request $request)
    {
      $info = $request->all();
      $cate_name=request('cate_name');
      $nameOnly=category1::where('cate_name',$cate_name)->first();
     if($nameOnly){
         echo "<script>alert('该分类名已占用');location.href='category_add';</script>";die;
     }
      unset($info['s']);
      $res=category1::insert($info);
     if($res){
       return redirect('category_index');
     }

    }

    public function category_index()
    {
    	$info = category1::get()->toArray();       
      foreach ($info as $key => $value) {
       $info[$key]['count']=goods1::where('cate_id',$value['cate_id'])->count();
      }
      
    	$data=$this->hierarchy($info);
    	return view('category.category_index',['info'=>$data]);
    }




        //列表层级展示
    public function hierarchy($data,$p_id=0,$level=0)
    {
      static $new_arr = [];
      foreach ($data as $key => $value) {
        if($value['p_id'] == $p_id){
            $value['level'] = $level;
            $new_arr[] = $value;
            Self::hierarchy($data,$value['cate_id'],$level+1);
        }
      }

      return $new_arr;
    }


   //显示或者隐藏
   public function category_show(Request $request)
   {
   	$info=$request->all();

     if($info['is_show'] != 1){
   	 
       $res=category1::where('cate_id',$info['cate_id'])->update(['is_show'=>'1']);
       echo json_encode('已改为显示',JSON_UNESCAPED_UNICODE);die;
     }
   	if($info['is_show'] = 1){
   	
       $res=category1::where('cate_id',$info['cate_id'])->update(['is_show'=>'2']);
       echo json_encode('已改为隐藏',JSON_UNESCAPED_UNICODE);die;
   	}

   	}

    public function nameOnly(Request $request)
    {
      $info=$request->all();
      $onlyRes=category1::where('cate_name',$info['name'])->first();
      if($onlyRes){
        echo json_encode(['font'=>1]);
      }else{
           echo json_encode(['font'=>2]);
      }
    }


}
