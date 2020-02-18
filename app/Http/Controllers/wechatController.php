<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Wechat;
use App\Model\channel;
use App\Model\user as User;
use App\Model\media as media;
use App\Model\suggest;
use App\Model\title;
use App\Model\title_reply;
use App\Model\geography;
use App\Model\red_packet1;
use App\Model\profress1;
use App\Model\receipt;

//微信控制器
class wechatController extends Controller
{
  
   // protected：受保护的 该修饰符修饰的成员属性和方法可以在本类和该类的子类中使用（子类即为继承该类的类）
	protected $Arr = ['袁袁1','袁袁2','袁袁3'];

    public function index()
    {
      //$echostr=$_GET['echostr'];
     //echo $echostr;
     //     {php://input 是个可以访问请求的原始数据的只读流。
         // 整个文件读入一个字符串
        $XML=file_get_contents("php://input");
        // 将字符串写入文件
        file_put_contents("1.text", $XML);        
        $xmlobj = simplexml_load_string($XML);
      // simplexml_load_string() 函数转换形式良好的 XML 字符串为 SimpleXMLElement 对象。
 
		//关注后的留言
		if ($xmlobj->MsgType == 'event' && $xmlobj->Event == 'subscribe' ) {
	
		     $this->doSubscribe($xmlobj);
        }elseif($xmlobj->MsgType == 'event' && $xmlobj->Event == 'unsubscribe'){
        
        	User::unsubscribe($xmlobj);
        }


       //处理用户的留言
       if($xmlobj->MsgType == 'text'){
           $this->doText($xmlobj);
       }

       //菜单生成
       if($xmlobj->MsgType == 'event'  && $xmlobj->EventKey == '888' ){
          $res=title::inRandomOrder()->first()->toArray();
           $oppid=wechat::getUserInfo($xmlobj);
		  $openid=$oppid['openid'];
 
          $title_res=title_reply::insert([
               'title_id'=>$res['title_id'],
               'title_correct'=>$res['title_correct'],
               'openid'=>$openid,
          ]);
         
	        $content=$res['title_name'];
	        $A=$res['title_A'];
	        $B=$res['title_B'];
            $msg="{$content}A:{$A}B:{$B}";
		   	Wechat::reson($xmlobj,$msg);
       }

       if($xmlobj->MsgType == 'event'  && $xmlobj->EventKey == '777')
       {
       	  $oppid=wechat::getUserInfo($xmlobj);
		  $openid=$oppid['openid'];
          $req=title_reply::where('openid',$openid)->count();//共答题几道
            $rcc=title_reply::where('openid',$openid)->get()->toArray();
          $num=array_column($rcc,'num');
          $count=array_sum($num);
          $error=$req-$count;
 
            $msg="你一共做了{$req}道,答对{$count}道,答错{$error}道";
			   Wechat::reson($xmlobj,$msg);

              
       }


       if($xmlobj->MsgType == 'event'  && $xmlobj->EventKey == '883'){
       	  $msg="查人品请输入:人品#姓名";
			Wechat::reson($xmlobj,$msg);
       }


       if($xmlobj->MsgType == 'event'  && $xmlobj->Event == 'LOCATION'){
       	$data=Wechat::getUserInfo($xmlobj);
       		$res=geography::insert([
              'openid'=>$xmlobj->FromUserName,
              'Latitude'=>$xmlobj->Latitude,
              'Longitude'=>$xmlobj->Longitude,
              'headimgurl'=>$data['headimgurl'],
              'nickname'=>$data['nickname'],
       		]);		
       }


   }

   
         
      //处理用户留言
        function doText($xmlobj)
      {
	      	$content = trim($xmlobj->Content);
			if ($content == '1') {
				$Arr = ['袁袁1','袁袁2','袁袁3'];
				$msg = implode(",", $Arr);
				Wechat::reson($xmlobj, $msg); 
			}else if ($content == '2') {
				$Arr = ['袁袁1','袁袁2','袁袁3'];
				$num = rand(0,count($Arr)-1);
				$msg = $Arr[$num];
				Wechat::reson($xmlobj,$msg);
			}else if (mb_strpos($content, "天气") !== false) {
				// $msg="天气";
				$msg = Wechat::getWether($content);
				Wechat::reson($xmlobj, $msg);
			}else if($content == '新闻'){
                     $title="七月,你好";
			        $description1="六月匆匆过，七月将来临，2018年已经过去了一半，你的愿望实现了吗？你的计划完成了吗？那么抓紧时间，一年还有一半时间。六月你或许失去了一些人，又或者你获得了新的一些，那么请抓紧手中的礼物，不要亏欠，不要怀念。盛夏的果实等你去采摘。六月再见，七月你好。再见，荒唐不羁的六月；你好，炽热的七月。";
			        $picurl="http://upload.mnw.cn/2018/0629/1530261578965.jpg";
			        $url="http://upload.mnw.cn/2018/0629/1530261578965.jpg";
			       echo "<xml>
			                  <ToUserName><![CDATA[$xmlobj->FromUserName]]></ToUserName>
			                  <FromUserName><![CDATA[$xmlobj->ToUserName]]></FromUserName>
			                  <CreateTime>".time()."</CreateTime>
			                  <MsgType><![CDATA[news]]></MsgType>
			                  <ArticleCount>1</ArticleCount>
			                  <Articles>
			                    <item>
			                      <Title><![CDATA[$title]]></Title>
			                      <Description><![CDATA[$description1]]></Description>
			                      <PicUrl><![CDATA[$picurl]]></PicUrl>
			                      <Url><![CDATA[$url]]></Url>
			                    </item>
			                  </Articles>
			                </xml>"; 
			 }else if($content == '斗图'){  

               //从素材表中取出media_id
                $media=media::where('m_format','image')->get()->toArray();
                $column=array_column($media,'wechat_media_id');
                $rand=rand(0,count($column)-1);
                $media_id=$column[$rand];
                echo "<xml>
						  <ToUserName><![CDATA[$xmlobj->FromUserName]]></ToUserName>
						  <FromUserName><![CDATA[$xmlobj->ToUserName]]></FromUserName>
						  <CreateTime>12345678</CreateTime>
						  <MsgType><![CDATA[image]]></MsgType>
						  <Image>
						    <MediaId><![CDATA[".$media_id."]]></MediaId>
						  </Image>
						</xml>";die;

			}elseif(mb_strpos($content, "建议+") !== false){
				//用户信息--获取用户opp id 
				$oppid=wechat::getUserInfo($xmlobj);
				$openid=$oppid['openid'];
             
                //留言内容
				$content= mb_substr($content,3);
				 suggest::create($openid,$content);
			
			     $msg="已收到建议";
                Wechat::reson($xmlobj,$msg);

            }elseif($content == "A" || $content == "B"){
                $res=title_reply::orderBy('id','desc')->limit(1)->first()->toArray(); 
                $res_create=title_reply::where('id',$res['id'])->update([
                     'title_reply'=>$content
                ]);


                $res_last=title_reply::orderBy('id','desc')->limit(1)->first()->toArray(); 
                  if($res_last['title_reply'] == $res_last['title_correct']){
                  	 $res=title_reply::orderBy('id','desc')->limit(1)->first()->toArray(); 
                  	$rss=title_reply::where('id',$res['id'])->update(['num'=>1 ]);
		                  	 $msg='答案正确';
				        		Wechat::reson($xmlobj,$msg);
			       
                  }else{
                  	   $res=title_reply::orderBy('id','desc')->limit(1)->first()->toArray(); 
                     	$rss=title_reply::where('id',$res['id'])->update(['num'=>0 ]);
                  	     $msg='答案错误';
					          	Wechat::reson($xmlobj,$msg);
                  }



           }elseif(mb_strpos($content, "人品#") !== false){   
                  $name=mb_substr($content,3);
                  $str=base64_encode($name);
                  $num=0;
                  for ($i=0,$len=strlen($str); $i <$len ; $i++) { 
                    $ord = ord($str[$i]);
                    $num +=$ord;
                  }
                  $score= $num % 100;
                 $msg='姓名：'.$name."\r\n人品:".$score;
				Wechat::reson($xmlobj,$msg);

      
			}else{
        $info=receipt::insert([
          'receipt_show'=>trim($xmlobj->Content),
          'openid'=>$xmlobj->FromUserName,
        ]);
        if($info){
           $msg='收到表白';
          Wechat::reson($xmlobj,$msg);
        };

			  
         $msg='收到';
          Wechat::reson($xmlobj,$msg);

			 } 


      }


      //关注后响应的方法
      function doSubscribe($xmlobj)
      {

            $data=Wechat::getUserInfo($xmlobj);//获取用户
            $channelStatus=1;
		   if(!empty($xmlobj->EventKey)){
		   	  $c_num = substr($xmlobj->EventKey,8);

		   	  channel::chanNumber($c_num);
		   }

		   //用户信息添加入库
		   // User::getUserInfo($data,$channelStatus);
           
		   $name=$data['nickname'];  
		   $sex=$data['sex']==1?'先生':'女士';
		   // $msg="欢迎{$name}{$sex}关注";
		   $msg="欢迎使用本公司提供的油价查询功能";
			Wechat::reson($xmlobj,$msg);
      }

   






}
              