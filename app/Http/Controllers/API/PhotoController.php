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

class PhotoController extends Controller
{
    /**
     * //商品接口
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       
        $cache=Cache::get('goods_index');
        if(!empty($cache)){
          $goodsinfo=$cache;
        }else{
           $goodsinfo =goods1::get()->toArray();
          $cateInfo=category1::get()->toArray();
          foreach ($goodsinfo as $key => $value) {
             foreach ($cateInfo as $k => $v) {
              if($value['cate_id'] == $v['cate_id']){
               $goodsinfo[$key]['cate_id']=$v['cate_name'];
              }
             }
          } 

          $cache=Cache::put('goods_index',$goodsinfo);
        }
        
      //所有分类
      $cateSelect=category1::get()->toArray();
       echo json_encode($goodsinfo,JSON_UNESCAPED_UNICODE);

    }



    public function login(Request $request)
    {
       header("Access-Control-Allow-Origin:*");
       header('Access-Control-Allow-Methods:POST');
       header('Access-Control-Allow-Headers:x-requested-with, content-type');
      
         $info=$request->all();
        $loginRes=login::where(['login_name'=>$info['name']])->where(['login_pwd'=>$info['pwd']])->get()->toArray();
      if($loginRes){      
            $access_token=rand(1000,9999).time().$loginRes[0]['login_id'];
            $over_time=time()+3600;
            $_tokenUpdate=login::where('login_id',$loginRes[0]['login_id'])->update(['access_token'=>$access_token,'over_time'=>$over_time]);
            // dd($_tokenUpdate);
            if($_tokenUpdate){
               return ['token'=>$access_token];
                  echo json_encode(['font'=>1,'goods_id'=>$info['goods_id'],'token'=>$access_token]);
            }else{
                 echo json_encode(['font'=>2,'goods_id'=>$info['goods_id'],'token'=>$access_token]);
            }
           
     
      }

    }

    /**
     * //添加商品接口
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function goods_doadd(Request $request)
    {
      
         $info = $request->all();
        $file= request('goods_img');  
         if( !$request->hasFile('goods_img') || ! $request->file('goods_img')->isValid()){
            echo "<script>alert('图片上传失败').location.href='goods_add';</script>";die;
        }
        $filename = md5(time().rand(1000,9999)).".".$file->getClientOriginalExtension();   
        $path = $file->storeAs('uploads',$filename);  
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
         Cache::forget('goods_index');;
     }

    }

    
    public function cate_index()
    {   
        $info = category1::where('p_id',NULL)->where('is_show',1)->get()->toArray();     
        echo json_encode($info,JSON_UNESCAPED_UNICODE);
    }

    public function goods_details(Request $request)
    {
       $cate_id=request('cate_id');
       $cateGoods=goods1::where('cate_id',$cate_id)->get()->toArray();
       echo json_encode($cateGoods,JSON_UNESCAPED_UNICODE);
    }

    //单个商品详情
    public function goods_single(Request $request)
    {
        $goods_id=request('goods_id');
        $goodsRes=goods1::where('goods_id',$goods_id)->get()->toArray();
        echo json_encode($goodsRes,JSON_UNESCAPED_UNICODE);
    }

    //获取商品属性
  public function attribute_goods(Request $request)
  {
    $goods_id=request('goods_id');
    $goodsInfo=goods1::where('goods_id',$goods_id)->get()->toArray();
    $attributeRes=gattr::join('attribute','goods_attribute.attr_id_list','=','attribute.goods_attr_id')->where('goods_id',$goods_id)->get()->toArray();
    foreach ($attributeRes as $key => $value) {
      if ($value['attr_radio'] == 1) {
        $choose[$value['attr_id_list']][]=$value;//可选属性放到相同属性id中。
      }else{
        $noChoose[]=$value;
      }
    }
    echo json_encode(['choose'=>$choose,'noChoose'=>$noChoose,'goodsInfo'=>$goodsInfo],JSON_UNESCAPED_UNICODE);

  }


  //查库-判断过期时间
  public function slelect_time(Request $request)
  {
     $token=request('token');
     $goods_id=request('goods_id');
     $res=login::where('access_token',$token)->value('over_time');
    if($res<time()){
         echo json_encode(['code'=>40001,'font'=>"登录时间过长，请重新登录",'goods_id'=>$goods_id],JSON_UNESCAPED_UNICODE);
    }else{
        echo json_encode(['code'=>20001,'font'=>"ok"],JSON_UNESCAPED_UNICODE);
    }


  }


  //添加购物车
  public function addcart(Request $request)
  {
   
    $user_id=$request->get('user_id');
     $info=$request->all();
      // var_dump($info);die;
     $catrData=[
         'goods_id'=>rtrim($info['goods_id'],'#'),
         'g_attr_id'=>rtrim($info['g_attr_id'],','),
         'attr_id_list'=>rtrim($info['attr_id_list'],','),
         'count_price'=>$info['count_price'],
         'cart_time'=>time(),
         'user_id'=>$user_id,
     ];
    $cartRes=cart::create($catrData);
    echo json_encode(['code'=>20001,'font'=>"ok",'token'=>$info['token'],'goods_id'=>rtrim($info['goods_id'],'#')],JSON_UNESCAPED_UNICODE);
  }


  //展示购物车
  public function showcart(Request $request)
  { 
      $info=$request->all();
     $cartInfo=cart::get()->toArray();
   
     foreach ($cartInfo as $key => $value) {
     
       $goods_img=goods1::where('goods_id',$value['goods_id'])->value('goods_img');//商品图片
       $goods_name=goods1::where('goods_id',$value['goods_id'])->value('goods_name');//商品名称
       $gattrData=gattr::whereIn('g_attr_id',explode(',',$value['g_attr_id']))->get()->toArray();//商品属性值-数组
       $attributeData=attribute1::whereIn('goods_attr_id',explode(',',$value['attr_id_list']))->get()->toArray();//属性值-数组-名称
       $cartInfo[$key]['g_attr_id']=$gattrData;
       $cartInfo[$key]['attr_id_list']=$attributeData;
       $cartInfo[$key]['goods_img']=$goods_img;
       $cartInfo[$key]['goods_name']=$goods_name;
     }
  
       echo json_encode($cartInfo,JSON_UNESCAPED_UNICODE); 
     
  }


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
      }

  }


  //查询天气
  public function check_weather(Request $request)
  {

     $ip=$_SERVER['REMOTE_ADDR'];
      $num=Redis::get("pass_num_".$ip);
      if(!$num){
        $num=1;
      }
      if($num>500){//每小时最多使用接口2次。
          echo "报错";
      }
      Redis::set("pass_num_".$ip,$num+1,3600);

      $city = request('city');
      $data = Cache::get($city);
      if(empty($data)){
       $cityInfo=weather::where('city',$city)->value("weather"); 
       Cache::put($city,$cityInfo,3600);
       }
       // echo $data;die;

       //对称加密
     $obj = new Aes('1234567890123456');
     echo $eStr = $obj->encrypt($data);//加密
     echo "<hr/>";
    echo $obj->decrypt($eStr);//解密
  }
  
  
    

}
