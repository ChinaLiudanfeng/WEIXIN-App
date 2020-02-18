<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <title>Document</title>
</head>
<body style='margin-top:2%'>
<div class="container">
    <form action="">
       <h2><b>微信菜单管理--菜单管理</b></h2>
        <table class="table table table-striped table-bordered table-hover Column content" >
            <tr>
                <td>菜单编号</td>
                <td>菜单名称</td>
                <td>菜单类型</td>
                <td>菜单标识</td>
                <td>操作</td>
            </tr>
        @foreach($info as $v)
            <tr>
                <td> {{$v['menu_id']}}</td>
                <td>{{str_repeat("❤❤",$v['level']).$v['menu_name']}}</td>
                <td>{{$v['menu_type']}}</td>
                <td>{{$v['menu_key']}}</td>
                <td><a href="" class="btn btn-danger">删除</a>
               </td>
            </tr>
           
         @endforeach
          
        </table>
            <a href="{{url('menu_add')}}" class="btn btn-primary">添加菜单</a> &nbsp; &nbsp;
           <a href="{{url('create_menu')}}" class="btn btn-success">一键生成菜单</a>  
    </form>
</div>
</body>
</html>