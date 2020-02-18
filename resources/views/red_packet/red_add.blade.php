
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <title>红包</title>
</head>
<body>

<form action="{{url('red_doadd')}}" method="post">
  <h2><b>红包算法</b></h2>
 
  <div class="form-group">
    <label for="exampleInputEmail1">总金额</label>
    <input type="text" name="red_money"   placeholder="请输入总金额">
    <label for="exampleInputEmail1">人数</label>
    <input type="text" name="red_people"   placeholder="请输入人数">
    <button type="submit" class="btn btn-default">发红包</button>
  </div>

  
</form>

</body>
</html>
