@extends('Index.index')
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <title>Document</title>
</head>
<body>
@section('body')
    <form action="{{url('category_doadd')}}" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">分类名称</label>
            <input type="text" id="name" name="cate_name" class="form-control" id="exampleInputEmail1" placeholder="请输入分类名称">
        </div>

       <div class="form-group">
            <label for="exampleInputEmail1">请选择分类</label>
                    <select class="form-control" name="p_id">
                          <option value="">顶级分类</option>
                           @foreach($info as $v)
                          <option value="{{$v['cate_id']}}">{{str_repeat("❤",$v['level']).$v['cate_name']}}</option>
                         @endforeach
                        </select>
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
    </form>

</body>
</html>
<script type="text/javascript">
  $(document).on('blur','#name',function(){
       var name=$(this).val();
        $.ajax({
           url:"{{asset('nameOnly')}}",
           data:{name:name},
           dataType:"json",
           success:function(res){
              if(res.font == 2){
               alert('该分类名可以使用');
              }else{
                alert('该分类名已被占用');
                  $('.btn-default').prop('disabled','true');
              }        
           }
  });
  });
</script>
@endsection
