<?php

namespace App\Http\Controllers\Media;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Wechat;
use DB;
class mediaController extends Controller
{
    //素材添加页面
    public function media_add()
    {
        return view('Media/media_add');
    }

    //处理素材入库
    public function media_doadd(Request $request)
    {
       $info=$request->all();
 
        $m_format=request('m_format');
        $file = $request->file('m_path');
        if( !$request->hasFile('m_path') || ! $request->file('m_path')->isValid()){
            echo "<script>alert('图片上传失败').location.href='media_add';</script>";die;
        }
        $filename = md5(time().rand(1000,9999)).".".$file->getClientOriginalExtension();
        $path = $file->storeAs('uploads',$filename);
        $mediaPath = public_path($path);
        $access_token = Wechat::getToken();
        //temporary 临时
        if($info['m_type'] == "temporary"){
         $url = "https://api.weixin.qq.com/cgi-bin/media/upload?access_token={$access_token}&type={$m_format}";
           $postData['media']= new \CURLFile($mediaPath);
            $img_id = Wechat::curlPost($url,$postData);
            $img_id=json_decode($img_id,true);
            if(!isset($img_id['media_id'])){
                echo "<script>alert('接口验证失败'),location.href='media_add';</script>";
            }

            $res=DB::table('media')->insert([
                'm_name'=>$info['m_name'],
                'm_path'=>$path,
                'm_type'=>$info['m_type'],
                'wechat_media_id'=>$img_id['media_id'],
                'm_addtime'=>time(),
                'm_format'=>$m_format,
            ]);


        }else{
         $url = "https://api.weixin.qq.com/cgi-bin/material/add_material?access_token={$access_token}&type={$m_format}";

           $postData['media']= new \CURLFile($mediaPath);
            $img_id = Wechat::curlPost($url,$postData);

            $img_id=json_decode($img_id,true);
            if(!isset($img_id['media_id'])){
                echo "<script>alert('接口验证失败'),location.href='media_add';</script>";
            }

            $res=DB::table('media')->insert([
                'm_name'=>$info['m_name'],
                'm_path'=>$path,
                'm_type'=>$info['m_type'],
                'wechat_media_id'=>$img_id['media_id'],
                'm_addtime'=>time(),
                'm_format'=>$m_format,
            ]); 


        }
       
        

        if(!empty($res)){
           return redirect('media_index');
         }
     }



    //图片列表展示页
    public function media_index(Request $request)
    {
        $media_type=request('type');
        if(!empty($media_type)){
            $info=DB::table('media')->where(['m_format'=>$media_type])->get();
        }else{
            $info=DB::table('media')->get();
        }

        //处理搜索
        return view('Media/media_index',['info'=>$info]);
    }


   //删除
   public function media_delete(Request $request)
   {
     $info=$request->all();
     $res=DB::table('media')->where('m_id',$info['m_id'])->delete();
     if($res){
        return redirect('media_index');
     }

   }







}
