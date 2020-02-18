<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Model\menu;
use App\Model\Wechat;
use App\Model\menu2;

class menu1 extends Controller
{
     //菜单添加页面
    public function menu_add()
    {
          $model = new menu;
          $data=$model::where('p_id',0)->get()->toArray();
          // dd($data);
    	return view('menu.menu_add',['data'=>$data]);
    }

    public function menu_doadd(Request $request)
    {
       
         $data=$request->all();
         
         
         // var_dump($data);die;
         if($data['p_id'] == 0){
            $name_num=mb_strlen($data['menu_name']);//--一级菜单字符个数
            if($name_num>4){
               echo "<script>alert('一级菜单字数最多不能超过4个');location.href='menu_add';</script>";die;
            }
            //查询一级菜单个数，并判断限制不能超过三个。
            $info=menu::where('p_id',0)->get()->toArray();      
             if(count($info) > 3){
               echo "<script>alert('一级菜单个数不能超3个');location.href='menu_add';</script>";die;
             }

         }else if( $data['p_id'] !== 0){//当不是顶级菜单时- 查询二级菜单个数
            $name_num=mb_strlen($data['menu_name']);//--一级菜单字符个数
            if($name_num>7){
               echo "<script>alert('二级菜单字数最多不能超过7个');location.href='menu_add';</script>";die;
            }
             $info=menu::where('p_id',$data['p_id'])->get()->toArray(); 
               if(count($info) > 5){
               echo "<script>alert('二级菜单个数不能超3个');location.href='menu_add';</script>";die;
             }
          

         }
        
         unset($data['s']);
         $res=DB::table('menu')->insert($data);

    }

   //列表展示
    public function menu_index()
    {

          $info=menu2::get()->toArray();     
          $info = Self::hierarchy($info);
         return view('menu.menu_index',['info'=>$info]);
    }


    //一键同步
    public function create_menu()
    {
           $model = new menu;

           $data=menu2::get()->toArray();
           //使用递归     
           $info=Self::getSon($data);
           $access_token=Wechat::getToken();
           $url="https://api.weixin.qq.com/cgi-bin/menu/create?access_token={$access_token}";
           $strArry=[
               'view'=>'url',
               'click'=>'key',
             ];

           $postData =[];

        foreach ($info as $key => $value){  
            if(empty($value['menu_key'])){           
                $postData['button'][$key]['name']=$value['menu_name'];
                foreach ($value['son'] as $k => $v) {
                   $postData['button'][$key]['sub_button'][]=[
                       "type"=>$v['menu_type'],
                       "name"=>$v['menu_name'],
                        $strArry[$v['menu_type']]=>$v['menu_key']
                   ];
                }

            }else{     
              $postData['button'][]=[
                    'type'=>$value['menu_type'],
                    'name'=>$value['menu_name'],
                    $strArry[$value['menu_type']]=>$value['menu_key'],
                ];
            }     
        }
        
        $postData = json_encode($postData,JSON_UNESCAPED_UNICODE);
        $res = Wechat::curlPost($url,$postData);
       $res=json_decode($res);
       if($res->errcode == 0){
           echo "<script>alert('生成成功');location.href='create_menu';</script>";
       }
        
     
    } 



    //封装个递归
    public function getSon($data,$p_id=0)
    {
       $arr=[];
       foreach ($data as $key => $value) {
         if ($value['p_id']==$p_id) {
            $arr[$key]=$value;
            $arr[$key]['son']=Self::getSon($data,$value['menu_id']);
         }
       }

       return $arr;
    }




    //列表层级展示
    public function hierarchy($data,$p_id=0,$level=0)
    {
      static $new_arr = [];
      foreach ($data as $key => $value) {
        if($value['p_id'] == $p_id){
            $value['level'] = $level;
            $new_arr[] = $value;
            Self::hierarchy($data,$value['menu_id'],$level+1);
        }
      }

      return $new_arr;
    }


}
