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
    <form action="{{url('type_doadd')}}" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">商品类型名称</label>
            <input type="text" name="type_name" class="form-control" id="exampleInputEmail1" >
        </div>

     

        
        <button type="submit" class="btn btn-default">Submit</button>
    </form>

</body>
</html>
@endsection