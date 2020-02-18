<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Wechat;
use App\Model\userInfo;
use App\Model\blii;
use App\Model\mass;
use App\Model\send;

class massController extends Controller
{
    //添加页面
    public function mass_add()
    {
         $info=blii::get()->toArray();
      
    	return view('mass.mass_add',['info'=>$info]);
    }

    //处理添加
    public function mass_doadd(Request $request)
    {
         $info=$request->all();
            $content=$info['content'];
         // dd($info);
         //往标签用户发送消息
         if($info['send_way']=="blii"){
             $id=(int)$info['tag_id'];
          
             $access_token=Wechat::getToken();
             $url="https://api.weixin.qq.com/cgi-bin/message/mass/sendall?access_token={$access_token}";
       
             $postData=[
                    "filter"=>[
                     "is_to_all"=>true,
                     "tag_id"=>$id
                        ],
                      "text"=>["content"=>$content],
                    "msgtype"=>"text"
             ];
           
               $postData=json_encode($postData,JSON_UNESCAPED_UNICODE);
               $data=Wechat::curlPost($url,$postData);
               $data=json_decode($data,true);
               if($data['errcode']==0){
                     $res=send::insert([
                           'send_way'=>$info['send_way'],
                           'tag_id'=>$id,
                           'content'=>$content,
                           'time'=>time(),

                       ]);
                       if($res){
                        echo "消息展示列表";
                       }
               }else{
                 echo "接口失败";
               }
              
              
           };



             if($info['send_way']=="all"){
                  $access_token=Wechat::getToken();
                  $url="https://api.weixin.qq.com/cgi-bin/message/mass/send?access_token={$access_token}";
                  //获取关注用户的openid
                  $openidUrl="https://api.weixin.qq.com/cgi-bin/user/get?access_token={$access_token}";
                  $data = file_get_contents($openidUrl);
                  $data=json_decode($data,true);
                  $openid=$data['data']['openid'];

                  $postData=[
                          "touser"=>$openid,
                          "msgtype"=>"text",
                          "text"=>[
                               "content"=>$content
                          ],
                   
                       ];

                  
                    $postData=json_encode($postData,JSON_UNESCAPED_UNICODE);
                    $data=Wechat::curlPost($url,$postData);//生成为ticket
                    $data=json_decode($data,true);
                   if($data['errcode'] ==0){
                       $res=send::insert([
                           'send_way'=>$info['send_way'],
                           'openid'=>json_encode($openid),
                           'content'=>$content,
                           'time'=>time(),
                       ]);
                       if($res){
                            echo "<script>alert('接口成功,并成功入库');location.href='mass_add';</script>";
                       }

                   }else{
                       echo "<script>alert('接口失败');location.href='mass_add';</script>";
                   }

                  }//if 标签结束符-$info['send_way']=="all"




             if($info['send_way']=="part"){
                       $info=userInfo::get()->toArray();   
                      // $info=array_push($info,$content);
                     return view('mass.mass_index',['info'=>$info,'content'=>$content]);
                   
             }
    }



     
     //部分用户发送消息---用户信息展示列表--获取openid
     public function mass_product(Request $request)
     {

         $info=$request->all();
         $openid=$info['b_id'];
          $content=$info['id'];
          $access_token=Wechat::getToken();
          $url="https://api.weixin.qq.com/cgi-bin/message/mass/send?access_token={$access_token}";
                  $postData=[
                          "touser"=>$openid,
                          "msgtype"=>"text",
                          "text"=>[
                               "content"=>$content
                          ],
                   
                       ];

                  
                    $postData=json_encode($postData,JSON_UNESCAPED_UNICODE);
                    $data=Wechat::curlPost($url,$postData);//生成为ticket
                    $data=json_decode($data,true);

                   if($data['errcode'] ==0){
                       $res=send::insert([
                           'send_way'=>'part',
                           'openid'=>json_encode($openid),
                           'content'=>$content,
                           'time'=>time(),
                       ]);
                       if($res){
                     echo json_encode(['content'=>'恭喜,消息发送成功','icon'=>6,'code'=>1]);
                       }

                   }else{
                      echo json_encode(['content'=>'接口失败','icon'=>5,'code'=>2]);
                   }


         
     }





    //粉丝列表
    public function blii_index(Request $request)
    {
         $id=$request->all('id');
         // dd($id);
         $info=userInfo::get()->toArray();
         return view('blii.blii_index',['info'=>$info,'id'=>$id]);
             die;
          $access_token=Wechat::getToken();
          $url="https://api.weixin.qq.com/cgi-bin/user/get?access_token={$access_token}";
          $data = file_get_contents($url);
        $data=json_decode($data,true);//获取关注用户的openid
        $openid=$data['data']['openid'];
       
        $userInfo=[];
        foreach ($openid as $key => $value) {
           $userUrl="https://api.weixin.qq.com/cgi-bin/user/info?access_token={$access_token}&openid={$value}&lang=zh_CN";
           $info=file_get_contents($userUrl);
           $userInfo[]=json_decode($info,true);
           $useStr=userInfo::insert([
                'nickname'=>$userInfo[$key]['nickname'],
                'openid'=>$userInfo[$key]['openid'],
                'sex'=>$userInfo[$key]['sex'],
                'headimgurl'=>$userInfo[$key]['headimgurl'],
                'country'=>$userInfo[$key]['country'],
                'subscribe_time'=>$userInfo[$key]['subscribe_time'],
 
           ]);
        }
            
        return view('blii.blii_index',['info'=>$userInfo]);

    }


    //标签添加
    public function blii_add()
    {
        return view('blii.blii_add');
    }

    //处理标签添加
    
    public function blii_doadd(Request $request)
    {
       $name=$request['name'];
       $access_token=Wechat::getToken();
       $url="https://api.weixin.qq.com/cgi-bin/tags/create?access_token={$access_token}";
       // $postData='{"tag" : {"name" : " '.$name.'} }';
       $postData='{   "tag" : {     "name" : "'.$name.'"   } }';
       $data=Wechat::curlPost($url,$postData);//生成为ticket
       $data=json_decode($data,true);
     
       $res=blii::insert([
               'id'=> $data['tag']['id'],
               'name'=>$data['tag']['name']
          ]);
     
         if($res){
             return redirect('blii_list');
         }
    }

    //标签列表
    public function blii_list()
    {
         $info=blii::get()->toArray();
         // dd($info);
       return view('blii.blii_list',['info'=>$info]);
    }

    //生成标签，打上标签
    public function blii_product(Request $request)
    {
        $b_id=$request->all(); 
        $openid=$b_id['b_id'];
        $id=(int)$b_id['id'];

        //var_dump($b_id);die;
        $access_token=Wechat::getToken();
        $url="https://api.weixin.qq.com/cgi-bin/tags/members/batchtagging?access_token={$access_token}";
         // $postData='{   
         //    "openid_list" : [//粉丝列表    
         //    "ocYxcuAEy30bX0NXmGn4ypqx3tI0",    
         //    "ocYxcuBt0mRugKZ7tGAHPnUaOW7Y"   ],   
         //    "tagid" : 134
         //     }';
        $postData=[
            "openid_list"=> $openid,            
            "tagid"=>$id,
        ];     
        $postData=json_encode($postData);
        $data=Wechat::curlPost($url,$postData);//生成为ticket
        $data=json_decode($data,true);
        // var_dump($data);die;
          //当创建接口成功时，errorcode=0,才算创建成功，成功后，存入群发mass表中。
        if($data['errcode']===0){
               $res=mass::insert([
                    'id'=>$id,
                    'openid'=>json_encode($openid),
               ]);
               if($res){

                 echo json_encode(['content'=>'恭喜,标签生成成功','icon'=>6,'code'=>1]);
               }
        }else{
             echo json_encode(['content'=>'恭喜,标签生成失败','icon'=>5,'code'=>2]);
        }
        
    }



    //

}
