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
    <form action="{{url('attribute_delete')}}" method="post">
     <table class="table table table-striped table-bordered table-hover Column content" >

            <tr>
                <td><input type="checkbox" name="checkId"  ></td>
                <td>商品类型名称</td>
                <td>属性名称</td>
                <td>操作</td>
            </tr>
            @foreach($info as $v)
                <tr>
                    <td><input type="checkbox" name="id[]"  value="{{$v['goods_attr_id']}}" ></td>
                    <td class="cate_id">{{$v['attr_name']}}</td>
                    <td>{{$v['type_id']}}</td>
                    <td ><a href="" class="btn btn-create">属性列表</a>
                    </td>
                </tr>

            @endforeach
        </table>
        <button class="btn btn-danger">删除</button>
 
    </form>
</body>
</html>
<script type="text/javascript">
      $('input[name="checkId"]').click(function(){
            if($(this).is(':checked')){
                $('input[name="id[]"]').each(function(){
                    $(this).prop("checked",true);
                });
            }else{
                $('input[name="id[]"]').each(function(){
                    $(this).prop("checked",false);
                });
            }
        });
</script>
