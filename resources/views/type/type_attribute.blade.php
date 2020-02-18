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
    <form action="{{url('tyAttrInfo_delete')}}" method="post">
     <table class="table table table-striped table-bordered table-hover Column content" >
          <h2>{{$type_name}}</h2>
            <tr>
                <td><input type="checkbox" name="checkId" size="10" ></td>
                <td><font style="color:red">属性名称</font></td>
             
            </tr>
            @foreach($info as $v)
                <tr>
                    <td><input type="checkbox" name="id[]"  value="{{$v['goods_attr_id']}}" ></td>
                    <td class="cate_id">{{$v['attr_name']}}</td>  
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
 
            //反选
            $('input[name="id[]"]').each(function(){
                    $(this).attr("checked",!$(this).attr("checked"))
                })

        });

         
</script>
