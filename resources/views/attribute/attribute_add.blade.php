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
    <form action="{{url('attribute_doadd')}}" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">属性名称</label>
            <input type="text" name="attr_name" class="form-control" id="exampleInputEmail1" >
        </div>
           <div class="form-group">
               <label for="exampleInputEmail1">所属商品类型</label>
                    <select class="form-control" name="type_id">
                          <option value="">请选择</option>         
                           @foreach($info as $v)
                            <option value="{{$v['type_id']}}">{{$v['type_name']}}</option>
                           @endforeach                       
                    </select>
            </div>



        <div class="radio">
		  <label>
		    <input type="radio" name="attr_radio" id="optionsRadios1" value="1" checked>
		  可选
		  </label>
		</div>
       <div class="radio">
		  <label>
		    <input type="radio" name="attr_radio" id="optionsRadios1" value="2" >
		   不可选
		  </label>
		</div>
        
        <button type="submit" class="btn btn-default">Submit</button>
    </form>

</body>
</html>
@endsection