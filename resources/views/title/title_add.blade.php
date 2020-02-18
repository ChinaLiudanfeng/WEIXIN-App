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
<form action="{{url('title_doadd')}}" method="post">
  <h2><b>标签管理-添加</b></h2>
 
  <div class="form-group">
    <label for="exampleInputEmail1">题目</label>
    <input type="text" name="title_name" class="form-control" id="exampleInputEmail1" placeholder="请输入标签">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">答案A</label>
    <input type="text" name="title_A" class="form-control" id="exampleInputEmail1" placeholder="请输入标签">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">答案B</label>
    <input type="text" name="title_B" class="form-control" id="exampleInputEmail1" placeholder="请输入标签">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">正确答案</label>
    <input type="text" name="title_correct" class="form-control" id="exampleInputEmail1" placeholder="请输入标签">
  </div>

  <button type="submit" class="btn btn-default">添加</button>
</form>

</body>
</html>
@endsection