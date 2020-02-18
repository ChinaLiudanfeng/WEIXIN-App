
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript" src="{{asset('jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('layui/layui.js')}}"></script>
    <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.4.0.js"></script>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <title>登录</title>
</head>
<body>

<h2><b>绑定管理员账号</b></h2>
        <input type="hidden" name="openid" value="">
        <div class="form-group">
            <label for="exampleInputEmail1">用户名</label>
            <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="请输入用户名">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">用户密码</label>
            <input type="text" name="password" class="form-control" id="exampleInputPassword1" placeholder="请输入密码">
        </div>
           <div class="form-group">
                    <input type="text"  name="code" class="form-control button" placeholder="验证码" >
           <input  type="button" id="button" value="获取验证码">
                </div>

        <button type="submit"  id="b" class="btn btn-default">Submit</button>
       <a  class="btn btn-default"href="http://www.yuanyuanliuliu.com/dimensional">扫码登录</a>

    


</body>
</html>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script type="text/javascript">
    $(function(){
        layui.use(['jquery','layer'],function(){
             var layer=layui.layer;
                $(document).on('click','#button',function(){
                     setTime();
                       var pwd=$('[name=password]').val();
                       var name=$('[name=username]').val();
                         $.post(
                              "{{url('admin_code')}}",
                              {pwd:pwd,name:name},
                              function(data){          
                                layer.msg(data.content,{icon:data.icon,time:2000});
                              },
                              'json'

                            );



                       
                });

                return false;

        });

      


           

          $(document).on('click','#b',function(){
                   
                       var pwd=$('[name=password]').val();
                       var name=$('[name=username]').val();
                       var openid=$('[name=openid]').val();
                         $.post(
                              "{{url('login_doadd')}}",
                              {pwd:pwd,name:name},
                              function(data){          
                                layer.msg(data.content,{icon:data.icon,time:2000},function(){
                                  if(data.code==1){
                                    location.href="{{url('channel_add')}}";
                                  };
                                });
                              },
                              'json'

                            );

                       
                });





      var second = 3;
    function setTime()
    {
        var input = $('#button').val();
        //倒计时 为0时， 改回按钮状态，可以点击发送
        if(second == 0){
            $('#button').val("重新发送");
             $(".btn").attr('disabled',false)
            $('#button').attr('disabled',false);
             second = 3;
        }else{
          // 倒计时不为0时，按钮状态不可以使用 描述递减
       
          $('#button').attr('disabled',"true");
         $('#button').val(second+"秒后发送");
           setTimeout(function(){
             second--;
             setTime();
           },1000);

           $(".btn").attr('disabled',"true")
          
        }
     
    }
             
        
    })


    /*
     * 注意：
     * 1. 所有的JS接口只能在公众号绑定的域名下调用，公众号开发者需要先登录微信公众平台进入“公众号设置”的“功能设置”里填写“JS接口安全域名”。
     * 2. 如果发现在 Android 不能分享自定义内容，请到官网下载最新的包覆盖安装，Android 自定义分享接口需升级至 6.0.2.58 版本及以上。
     * 3. 常见问题及完整 JS-SDK 文档地址：http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html
     *
     * 开发中遇到问题详见文档“附录5-常见错误及解决办法”解决，如仍未能解决可通过以下渠道反馈：
     * 邮箱地址：weixin-open@qq.com
     * 邮件主题：【微信JS-SDK反馈】具体问题
     * 邮件内容说明：用简明的语言描述问题所在，并交代清楚遇到该问题的场景，可附上截屏图片，微信团队会尽快处理你的反馈。
     */
    wx.config({
        debug: true,
        appId: '<?php echo $signPackage["appId"];?>',
        timestamp: '<?php echo $signPackage["timestamp"];?>',
        nonceStr: '<?php echo $signPackage["nonceStr"];?>',
        signature: '<?php echo $signPackage["signature"];?>',
        jsApiList: [
            // 所有要调用的 API 都要加到这个列表中
            'onMenuShareAppMessage',
            'updateAppMessageShareData'
        ]

    });
    // wx.ready(function () {
    //     // 在这里调用 API
    // });
    wx.ready(function () {   //需在用户可能点击分享按钮前就先调用
            wx.updateAppMessageShareData({ 
                title: '分享测试', // 分享标题
                desc: '孙伟航的分享功能测试', // 分享描述
                link: 'http://www.yuanyuanliuliu.com/login_add', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
                imgUrl: 'https://i0.hdslb.com/bfs/bangumi/d609f727db1cccbe4beb38ccc25ac9c453a3a76b.png@72w_72h.webp', // 分享图标
                success: function () {
                  // 设置成功
                }
            })
        });
</script>

