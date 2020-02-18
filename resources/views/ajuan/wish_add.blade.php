
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <title>许愿墙</title>
</head>
<body>
	<h2 style="color:pink">添加许愿❤</h2>

    <form action="{{url('wish_doadd')}}" method="post">
    	<input type="hidden" name="openid" value="{{$openid}}">
     
        <div class="form-group">
            <label for="exampleInputPassword1">许愿内容</label>
           <textarea class="form-control" rows="3" name="wish_content"></textarea>
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
    </form>

</body>
</html>
