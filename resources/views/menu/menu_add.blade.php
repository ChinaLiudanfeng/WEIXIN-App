@extends('Index.index')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <title>Document</title>
</head>
<body>
@section('body')
<form action="{{url('menu_doadd')}}" method="post">
  <h2><b>菜单管理-添加菜单</b></h2>
  <div class="form-group">
    <label for="exampleInputEmail1">菜单名称</label>
    <input type="text" name="menu_name" class="form-control" id="exampleInputEmail1" placeholder="请输入菜单">
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1">菜单类型</label>
          <select class="form-control" name="menu_type">
            <option value=""> 选择类型</option>
            <option value="click">点击类型</option>
            <option value="view">跳转类型</option>
          
          </select>
  </div>


   <div class="form-group">
    <label for="exampleInputEmail1">上级菜单</label>
          <select class="form-control" name="p_id">
            <option value="0"> 选择菜单</option>
            @foreach($data as $v)       
            <option value="{{$v['menu_id']}}">{{$v['menu_name']}}</option> 
           @endforeach
          </select>
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">菜单标识</label>
    <input type="text" name="menu_key" class="form-control" id="exampleInputEmail1" placeholder="请输入菜单标识">
  </div>

  <button type="submit" class="btn btn-default">Submit</button>
</form>

</body>
</html>
@endsection