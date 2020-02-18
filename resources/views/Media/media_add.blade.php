@extends('Index.index')
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
<body>
@section('body')

    <form action="{{url('media_doadd')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">素材名称</label>
            <input type="text" class="form-control" name="m_name" id="exampleInputEmail1" placeholder="请输入素材名称">
        </div>
        <div class="form-group">
            <label >请选择素材</label>
            <input type="file" name="m_path" >
        </div>


        <div class="form-group">
            <label for="exampleInputEmail1">请选择素材</label>
            <select class="form-control" name="m_format">
                <option value="">请选择素材</option>
                <option value="image">图片</option>
                <option value="video">视频</option>
                <option value="voice">语音</option>
            </select>
        </div>

         <div class="form-group">
            <label for="exampleInputEmail1">临时/永久</label>
            <select class="form-control" name="m_type">
                <option value="">请选择素材</option>
                <option value="temporary">临时素材</option>
                <option value="perpetual">永久素材</option>
          
            </select>
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
    </form>




</body>
</html>
@endsection