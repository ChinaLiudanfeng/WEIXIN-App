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
<body style='margin-top:2%'>
<div class="container">
    <form action="">
       <h2><b>微信许愿墙管理</b></h2>
        <table class="table table table-striped table-bordered table-hover #3Column content" >
        	 @foreach($info as $v)
        	<tbody>
            <tr width="50%">
            	<td>
            	<img src="{{$v['headimgurl']}}" width="100"><br/>
                <font style="color:pink">愿望编号:</font> &ensp;&ensp;{{$v['id']}}<br/>
                <font style="color:pink">许愿者❤:</font> &ensp;&ensp;{{$v['nickname']}}<br/>
               <font style="color:pink">许愿内容:</font><br/><br/>&ensp;&ensp;&ensp;&ensp;{{$v['wish_content']}}<br/><br/>
                </td>
            </tr>
            <br/><br/>
       </tbody>
         
           
         @endforeach
          
        </table>
            
    </form>
</div>
</body>
</html>