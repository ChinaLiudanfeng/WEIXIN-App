<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>二维码</title>
	<script type="text/javascript" src="{{asset('jquery.js')}}"></script>
     <script type="text/javascript" src="{{asset('layui/layui.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
	<center style="margin-top:10%">
	<img src="{{$redirect_url}}">
    </center>
    <input type="hidden" name="id" value="{{$id}}">
</body>
</html>
<script type="text/javascript">		
    
    var t = setInterval("check();",2000);
    var id= $('[name=id]').val();
    // console.log(id);
    function check()
	{
		 $.post(
         "{{url('chenkWechatLogin')}}",
         {id:id},
         function(data){          
              if(data.code==1){
              	clearInterval(t);
              	alert(data.content);
                 location.href="{{url('title_add')}}";
               };  
           },
           'json'
         );
	};

       
</script>