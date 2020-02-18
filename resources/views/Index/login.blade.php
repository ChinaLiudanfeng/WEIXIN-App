<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title> - 登录</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
    <link href="{{asset('css/bootstrap.min.css')}}?v=3.3.6" rel="stylesheet">
    <link href="{{asset('css/font-awesome.css')}}?v=4.4.0" rel="stylesheet">
    <script type="text/javascript" src="{{asset('jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('layui/layui.js')}}"></script>
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}?v=4.1.0" rel="stylesheet">
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
   
</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">h</h1>

            </div>
            <h3>欢迎使用 hAdmin</h3>

            <form class="m-t" role="form" action="{{url('dologin')}}" method="post" >

                <div class="form-group">
                    <input type="text" name="login_name" class="form-control" placeholder="用户名" required="">
                </div>
                <div class="form-group">
                    <input type="password"  name="login_pwd" class="form-control" placeholder="密码" required="">
                </div>
              <!--   <div class="form-group">
                    <input type="password"  name="code" class="form-control button" placeholder="验证码" >
                    <input  type="button" id="button" value="获取验证码" >
                </div> -->

                <button type="submit" class="btn btn-primary block full-width m-b">登 录</button>


                <p class="text-muted text-center"> <a href="login.html"><small>忘记密码了？</small></a> | <a href="{{url('register')}}">注册一个新账号</a>
                </p>

            </form>
        </div>
    </div>

    <!-- 全局js -->
    <!-- <script src="{{asset('js/jquery.min.js')}}?v=2.1.4"></script> -->
    <!-- <script src="{{asset('js/bootstrap.min.js')}}?v=3.3.6"></script> -->
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
                       var pwd=$('[name=login_pwd]').val();
                       var name=$('[name=login_name]').val();

                    
                         $.post(
                              "{{url('login_code')}}",
                              {pwd:pwd,name:name},
                              function(data){          
                                layer.msg(data.content,{icon:data.icon,time:2000},function(){
                                  if(data.code==1){
                                    // location.href="{{url('mass_index')}}";
                                  };
                                });
                              },
                              'json'

                            );
                });

             return false;
        });
             
        
    })

    var second = 60;
    function setTime()
    {
        var input = $('#button').val();
        //倒计时 为0时， 改回按钮状态，可以点击发送
        if(second == 0){
            $('#button').val("重新发送");
            $('#button').attr('disabled',false);
             second = 60;
        }else{
          // 倒计时不为0时，按钮状态不可以使用 描述递减
          // var input = $('#button').val();
          $('#button').attr('disabled',"true");
         $('#button').val(second+"秒后发送");
           setTimeout(function(){
             second--;
             setTime();
           },1000);
          
        }
    }

</script>
<script type="text/javascript">
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function(){
    if(xhr.readyState == 4 XXX)
  }
  $.ajax({
     url:"{{asset('getaccess_token')}}",
     type:"post",
     dataType:'json',
     beforeSend:function(xhr){
        xhr.setRequestHeader('token','db173f57898e0b4720fa5441c6d711b5');
     },
     success:function(data){
        console.log("success");
     }

  });
</script>
