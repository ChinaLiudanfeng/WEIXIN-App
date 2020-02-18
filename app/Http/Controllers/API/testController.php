<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\JwtAuth;
use App\Model\type1;
use App\Model\rsa;
use App\Model\encrypt;//非对称加密模型类
use App\Model\category1;
use App\Model\goods1;
class testController extends Controller
{

    /**
     * //生成资源jwt token
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index()
    {
        $token="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiIsImp0aSI6IjRmMWcyM2ExMmFhIn0.eyJpc3MiOiJ3d3cuMTgxMi5jb20iLCJhdWQiOiIxODEyLmFwcCIsImp0aSI6IjRmMWcyM2ExMmFhIiwiaWF0IjoxNTY2MzkxNjk2LCJuYmYiOjE1NjYzOTE3NTYsImV4cCI6MTU2NjM5NTI5NiwidWlkIjoxfQ.WUAxQBzgM3Rizol6hL147L4sGIazAjzXN86w9QmC_AY";
        // var_dump(JwtAuth::getInstance());die;
        $JwtAuth = JwtAuth::getInstance();
        echo $JwtAuth->setToken($token)->checkSign();die;
        // $JwtAuth->setToken($token);
        // var_dump($JwtAuth->valid());die;//验证是否$token 是否好使
        // if(!$JwtAuth->valid() || !$JwtAuth->checkSign()){
        //     var_dump("请重新生成$token");;die;
        // }
        //输出加密串
        // echo $JwtAuth->encode()->getToken();die;
        // 输出解密串
       // echo  $JwtAuth->setToken($token)->decode();
         $uid = $JwtAuth->getUid();
         echo $uid;die;

    }

    

   
   /**
     *  七月份 api接口测试 A卷
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    //解密数据接口
     public function unscrambler(Request $request)
     {
        //实例化非对称算法odel
        $info=$request->all();
        $data=$info['data'];
       $Rsa = new rsa();
       $decode=$Rsa->pub_decode($data);//公钥解密
       $decode=json_decode($decode);
       echo json_encode($decode,JSON_UNESCAPED_UNICODE);
     }



    //type表展示-品牌表
    public function type_show()
    {

        $typeInfo=type1::get()->toArray();
        $Rsa = new rsa();
        $typeInfo=json_encode($typeInfo);
        $encrypt= $Rsa->priv_encode($typeInfo);//私钥加密 
        echo json_encode($encrypt,JSON_UNESCAPED_UNICODE);

    }

   //分类名称展示
   public function cate_show()
   {
       $cateInfo=category1::get()->toArray();
       $Rsa = new rsa();
       $cateInfo=json_encode($cateInfo);
       $encrypt= $Rsa->priv_encode($cateInfo);//私钥加密 
       echo json_encode($encrypt,JSON_UNESCAPED_UNICODE);
   }

   // // 商品信息展示
   // public function goods_show()
   // {

       
   //     echo json_encode($encrypt,JSON_UNESCAPED_UNICODE);
   // }


   public function goods_list()
   {
      $goodsInfo =goods1::get()->toArray();
        $cateInfo=category1::get()->toArray();
   
          foreach ($goodsInfo as $key => $value) {
             foreach ($cateInfo as $k => $v) {
              if($value['cate_id'] == $v['cate_id']){
               $goodsinfo[$key]['cate_id']=$v['cate_name'];
              }
             }
          }
   
       $Rsa = new rsa();
       $goodsInfo=json_encode($goodsInfo);
         // var_dump($goodsInfo);die;
       $encrypt= $Rsa->pub_encode($goodsInfo);//私钥加密 
       var_dump($encrypt);die;
   }   

    
}
