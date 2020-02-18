<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script type="text/javascript" src="{{asset('jquery.js')}}"></script>
    <title>Document</title>
</head>
<body style='margin-top:2%'>
<div class="container">
    <form action="">
     <table class="table table table-striped table-bordered table-hover Column content" >

            <tr>
                <td>编号</td>
                <td>类型名称</td>
                <td>属性数</td>
                <td>商品类型</td>
            </tr>
            @foreach($info as $v)
                <tr>
                    <td class="cate_id">{{$v['type_id']}}</td>
                    <td>{{$v['type_name']}}</td>
                    <td>{{$v['count']}}</td>
                    <td><a href="{{url('type_attribute')}}?type_id={{$v['type_id']}}">属性列表</a></td>
                </tr>
            @endforeach
        </table>
 
    </form>


</body>
</html>
