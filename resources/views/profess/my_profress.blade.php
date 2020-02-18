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
     <form action="{{url('profress_mass')}}" method="post">
    <!--     <a  id="button" class="btn btn-success">发送消息</a> -->
        <button>发送消息</button>
        <table class="table table table-striped table-bordered table-hover Column content" >
      
            <tr>
            	<td>用户名openid</td>
                <td>收到内容</td>  
                <td>操作</td>
             
            </tr>
             @foreach($data as $v)

            <tr>
                
            	<td>{{$v['openid']}}</td>
                 <td>{{$v['receipt_show']}}</td>
               
                <td><a href="" class="btn btn-danger">删除</a></td>
            </tr>
             @endforeach
      
        </table>
        </form>

   
</div>
</body>
</html>
