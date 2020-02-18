<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\goods1;
use App\Model\type1;
use App\Model\attribute1;
use App\Model\category1;
use App\Model\gattr;
use App\Model\goods_detail;
use App\Model\sku;

class goods extends Controller
{
    //分类添加页面
    public function goods_add()
    {
     //类型表
     $info = type1::get()->toArray();
     //分类表
     $category=category1::get()->toArray();
      $data=$this->hierarchy($category);
       return view('goods.goods_add',['info'=>$info,'cateInfo'=>$data]);
    }

    //处理分类添加
    public function goods_doadd(Request $request)
    {
      $info = $request->all();
      $file= request('goods_img');  
      // var_dump($file);die;

         if( !$request->hasFile('goods_img') || ! $request->file('goods_img')->isValid()){
            echo "<script>alert('图片上传失败').location.href='goods_add';</script>";die;
        }
        $filename = md5(time().rand(1000,9999)).".".$file->getClientOriginalExtension();
        
        $path = $file->storeAs('uploads',$filename);
         // var_dump($path);die;
      
      //获取商品表最大id
      $maxId=goods1::max('goods_id');
      $goods_No='1812'.str_repeat('0', 6-strlen($maxId)).$maxId;
      $goodsData=[
         'goods_name'=>$info['goods_name'],
         'cate_id'=>$info['cate_id'],
         'goods_price'=>$info['goods_price'],
         'type_id'=>$info['type_id'],
         'goods_No'=>$goods_No,
         'is_on_sale'=>$info['is_on_sale'],
         'goods_img'=>$path,
      ];
      $goodsRes=goods1::create($goodsData);
    
      $goods_id=$goodsRes->goods_id;

      foreach ($info['attr_id_list'] as $key => $value) {
      
      	  $attrData=[
             'goods_id'=>$goods_id,
             'type_id'=>$info['type_id'],
             'attribute_value'=>$info["attr_value"][$key],
             'attr_id_list'=>$value,
             'attribute_price'=>$info["attr_price_list"][$key],
      	  ];
      	   $goodattrsRes=gattr::insert($attrData);
      }

     if($goodattrsRes){
     	echo "商品库存";
       return redirect('goods_index');
     }

    }


    public function goods_index(Request $request)
    {
        
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
    	return view('goods.goods_index',['info'=>$goodsinfo,'cateSelect'=>$cateSelect]);
    }


      //搜搜
      public function goods_soso(Request $request){
           
           $info=$request->all();  
          $goods_name=request('goods_name');
          $goods_id=request('goods_id');
          $nameRes=goods1::where('goods_id',$goods_id)->update(['goods_name'=>$goods_name]);
    
          if($nameRes){
            echo json_encode(['font'=>1]);die;
          }else{
            echo json_encode(['font'=>2]);die;
          }


        
        
      }


      public function goods_sale(Request $request)
      {
          $sale=request('sale');
          if($sale == "√"){
            $sale=2;
          }else{
            $sale=1;
          }

          $goods_id=request('sale_id');
          // dd($goods_id);
          $saleRes=goods1::where('goods_id',$goods_id)->update(['is_on_sale'=>$sale]);

           if($saleRes){
            echo json_encode(['info'=>3]);die;
          }else{
            echo json_encode(['info'=>4]);die;
          }

      }


    public function goods_search(Request $request)
    {
       $info=$request->all();  
       if(!empty($info['cate_id'])){
            $where['cate_id']=$info['cate_id'];
          }

          if(!empty($info['is_on_sale'])){
            $where['is_on_sale']=$info['is_on_sale'];
          }

            if(!empty($info['goods_name'])){
              $where['goods_name']=$info['goods_name'];
          }
            
         $goodsinfo =goods1::where($where)->paginate(4);
        $cateInfo=category1::get()->toArray();
   
          foreach ($goodsinfo as $key => $value) {
             foreach ($cateInfo as $k => $v) {
              if($value['cate_id'] == $v['cate_id']){
               $goodsinfo[$key]['cate_id']=$v['cate_name'];
              }
             }
          }
        // var_dump($goodsinfo);die;
      //所有分类
      $cateSelect=category1::get()->toArray();
      echo json_encode($goodsinfo);
      // return view('goods.goods_index',['info'=>$goodsinfo,'cateSelect'=>$cateSelect]);
    }

    //及点及改
    public function name_change(Request $request)
    {
      echo "35";die;
      $info=$request->all();
      $goods_name=request('goods_name');
      $goods_id=request('goods_id');
      $res=goods1::where('goods_id',$goods_id)->update(['goods_name'=>$goods_name]);
      // dd($res);
      if($res){
        echo json_encode(['font'=>1]);
      }else{
        echo json_encode(['font'=>2]);
      }
    }

    //获取类型表内容
    public function goods_type(Request $request)
    {

        $type_id=request('type_id');
        $info=attribute1::where('type_id',$type_id)->get()->toArray();
        echo json_encode($info);
      
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

   
   //货品详情页
   public function goods_detail(Request $request)
   {
    $goods_id=request('goods_id');
    $goodsInfo=goods1::where('goods_id',$goods_id)->get()->toArray();
    $attrInfo=attribute1::join('goods_attribute','attribute.goods_attr_id','=','goods_attribute.attr_id_list')->where(['goods_id'=>$goods_id,'attr_radio'=>1])->get()->toArray();
    
    foreach ($attrInfo as $key => $value) {
      $attr_id=$value['goods_attr_id'];
      $spec[$attr_id][] = $value;
    }
   
      return view('goods.goods_detail',['goodsInfo'=>$goodsInfo,'spec'=>$spec]);
   }


   
  //获取库存
  public function sku_doadd(Request $request)
  {
    $info=$request->all();
    $size=count($info['g_attr_id'])/count($info['sku_number']);
    $g_attr_id=array_chunk($info['g_attr_id'],$size); 
        foreach ($info['sku_number'] as $key => $value) {
            $skuDate[]=[
           'goods_id'=>$info['goods_id'],
           'g_attr_id'=>implode(',',$g_attr_id[$key]),
           'sku_number'=>$value,
          ];    
       }
          $skuRes=sku::insert($skuDate);  
        if($sluRes){ echo "添加成功";};   
  }

}
