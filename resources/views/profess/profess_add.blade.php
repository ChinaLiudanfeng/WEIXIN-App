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
<form action="{{url('profress_doadd')}}" method="post">
  <h2><b></b></h2>
  <div class="form-group">
    <label for="exampleInputEmail1">表白内容</label>
    <textarea class="form-control" rows="3" name="content"></textarea>

  </div>
  
<div class="radio">
  <label>
    <input type="radio" name="anonymity" id="optionsRadios1" value="匿名" >匿名 &ensp;&ensp;&ensp;&ensp;
    <input type="radio" name="anonymity" id="optionsRadios1" value="非匿名" checked >非匿名
  </label>
</div>
  <button type="submit" class="btn btn-default">向谁表白</button>
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
