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
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <title>Document</title>
</head>
<body style='margin-top:2%'>
<div class="container">
     
        <a  id="button" class="btn btn-success">发送消息</a>
        <table class="table table table-striped table-bordered table-hover Column content" >
         
            <tr>
            	<td>选择</td>
                 <td>用户昵称</td>  
                <td>用户头像</td>
                <td>用户openid</td>
                <td>用户城市</td>           
                <td>关注时间</td>
                <td>操作</td>
            </tr>
        @foreach($info as $v)
            <tr>
                 <input type="hidden" name="content" value="{{$content}}">
            	<td><input type="checkbox"   class="cc" b_id="{{$v['openid']}}" ></td>
                 <td>{{$v['nickname']}}</td>
                 <td><img src="{{$v['headimgurl']}}" width="50"></td>
                 <td>{{$v['openid']}}</td>
                 <td>{{$v['country']}}</td>
                 <td>{{date('Y-m-d H:i:s',$v['subscribe_time'])}}</td>
                <td><a href="" class="btn btn-danger">删除</a></td>
            </tr>

         @endforeach
        </table>

   
</div>
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
                    // alert(55);
                    var b_id=[];//拼接id
                     $(".cc:checked").each(function(index){
                        b_id.push($(this).attr('b_id'));
                     });
                     var id=$('[name=content]').val();
                    
                         $.post(
                              "{{url('mass_product')}}",
                              {b_id:b_id,id:id},
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


        });
             
        
    })

</script>