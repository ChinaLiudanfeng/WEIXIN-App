<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Wechat;
use App\Model\reply;
use App\Model\media;

class attention extends Controller //关注控制器
{
    //添加页面展示
    public function attention_add(Request $request)
    {
         $type=request('type');
         
       if( $type !== null){
         $res=reply::where('content','like',"%$type%")->orderBy('id','desc')->limit(1)->first()->toArray();
          
         $content=$res['content'];
           if($type=="image"){
             $content=json_decode($content);
               $image=$content->path;
              echo json_encode($image);
            
           }else{
              $content=json_decode($content);
                 $text=$content->content;
                  echo json_encode($text,JSON_UNESCAPED_UNICODE);
                  // echo json_encode(['content'=>$text,'icon'=>6,'code'=>1],JSON_UNESCAPED_UNICODE);
           }
       }else{
          return view('attention.attention_add');
       }
       
     
    }

    //处理页面添加
    public function attention_doadd(Request $request)
    {
    	$info=$request->all();
    	$file=$request->file('img');

    	if(!empty($file)){	
        		$filename = md5(time().rand(1000,9999)).".".$file->getClientOriginalExtension();
        		$path = $file->storeAs('uploads',$filename);
		        $mediaPath = public_path($path);
		        //h获取图片id--然后存入库中
		        $access_token = Wechat::getToken();
		        $url = "https://api.weixin.qq.com/cgi-bin/media/upload?access_token={$access_token}&type=image";
		        $postData['media']= new \CURLFile($mediaPath);
		        $img_id = Wechat::curlPost($url,$postData);
		        $img_id=json_decode($img_id,true);
		        if(!isset($img_id['media_id'])){
		            echo "<script>alert('接口验证失败'),location.href='media_add';</script>";
		        }
		        $model = new reply;
		        $model->content = json_encode(['path'=>$path,'media_id'=>$img_id['media_id'],'type'=>$info['type']]);
            $res= $model->save();
      	}

          if($info['type'] = 'text'){
              unset($info['s']);
              $model = new reply;
		          $model->content = json_encode($info);
              $res= $model->save();
          }

    }


    //设置默认显示
    public function isdefault(Request $request)
    {
       $info=$request->all();
       $type=$info['type'];
       $res=reply::where('content','like',"%$type%")->orderBy('id','desc')->limit(1)->first()->toArray();
       $content=$res['content'];
      
       if($type=="image"){
         $content=json_decode($content);
           $image=$content->path;
           return view('attention_add')->with('image',$image);
       }else{
          $content=json_decode($content);
             $text=$content->content;
          return view('attention_add')->with('text',$text);
       }
      
      
    }



    public function attention_list()
    {
       $data = media::where('m_format','image')->get()->toArray();
       echo json_encode($data);die;

    }


}
