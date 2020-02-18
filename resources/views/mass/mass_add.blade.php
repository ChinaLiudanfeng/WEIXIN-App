@extends('Index.index')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <title>Document</title>
</head>
<body>
@section('body')
<form action="{{url('mass_doadd')}}" method="post">
  <h2><b>消息管理-群发接口</b></h2>
  <div class="form-group">
    <label for="exampleInputEmail1">消息内容</label>
    <textarea class="form-control" rows="3" name="content"></textarea>
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1">消息方式</label>
          <select class="form-control" name="send_way">
            <option value="0"> 请选择发送方式</option>
            <option value="all">给所有用户发送</option>
            <option value="part">给部分用户发送</option>
            <option value="blii">通过标签发送</option>
          </select>
  </div>


  <div class="form-group blii" style="display: none" >
    <label for="exampleInputEmail1">选择标签</label>
          <select class="form-control" name="tag_id">
              <option value="0"> 请选择标签</option>
            @foreach($info as $v)    
            <option value="{{$v['id']}}">{{$v['name']}}</option>
            @endforeach

          </select>
  </div>

  <button type="submit" class="btn btn-default">去找用户</button>
</form>

</body>
</html>
<script type="text/javascript">
     $(document).ready(function(){ 
        $('[name="send_way"]').change(function(){
               var val=$(this).val();
                $(".blii").hide();  
                 if(val=="blii"){
                    $(".blii").show();
                    
                }
          
         });
   });
</script>
@endsection