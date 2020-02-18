<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript" src="./jquery.js"></script>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <title>Document</title>
</head>
<body style='margin-top:2%'>
<div class="container">
    <form action="">

        <table class="table table table-striped table-bordered table-hover Column content" >
            <tr>
                <td>标签编号</td>
                <td>标签名字</td>
                <td>标签标识</td>
                <td>操作</td>
            </tr>
        @foreach($info as $v)
            <tr>
          
                <td>{{$v['b_id']}}</td>
                <td>{{$v['name']}}</td>
                <td>{{$v['id']}}</td>
                <td>
           <a href="{{URL::asset('blii')}}?id={{$v['id']}}" class="btn btn-success">分配用户</a>&nbsp; &nbsp; <a href="" class="btn btn-danger">删除</a></td>
            </tr>

         @endforeach
        </table>

    </form>
</div>
</body>
</html>
