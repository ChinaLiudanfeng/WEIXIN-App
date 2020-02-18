<!DOCTYPE HTML>
<html>
  <head>
        <meta charset="utf-8"><link rel="icon" href="https://jscdn.com.cn/highcharts/images/favicon.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="{{asset('jquery.js')}}"></script>
        <script src="https://code.highcharts.com.cn/highcharts/highcharts.js"></script>
        <script src="https://code.highcharts.com.cn/highcharts/highcharts-more.js"></script>
        <script src="https://code.highcharts.com.cn/highcharts/modules/exporting.js"></script>
        <script src="https://img.hcharts.cn/highcharts-plugins/highcharts-zh_CN.js"></script>
        <script src="https://code.highcharts.com.cn/highcharts/themes/grid-light.js"></script>
   </head>
 <body>
   <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
      <div class="container" style='margin-left:20%'>
      	<div class="list">
      		
      	</div>
		<p>
			油价——城市：
			<input type="text"  name="oil_name"><button id="btn">搜索最近油价</button>
		</p>
   </div>
</body>
</html>
<script type="text/javascript">
 $('#list').hide();
   $('#btn').on('click',function(){
   	$('#list').hide();
   	 var city=$('[name="oil_name"]').val();//namex属性 获取标签属性
        if(city ==""){
        	alert('请填写城市');
        }
      $.ajax({
      	   url:"{{asset('oil_soso')}}",
      	   data:{city:city},
      	   dataType:"json",
      	   success:function(res){
      	   	  $('#list').empty();
         $('#list').html(res)
      	     $.each(res,function(i,v){
                  var tr = $("<tr></tr>");
                 
                  tr.append('<td>'+v+'<td>');
                 
                  $(".list").append(tr);
                })
                $('#list').show();
      	   	}
      });

   });

 // function weather(res)
 // {
     

 //     $(document).on('click','#btn',function(){
 //     	$('.list').hide();
 //            $.ajax({
 //              url:"{{url('oil_soso')}}",
 //              dataType:"json",
 //              success:function(res){
 //                console.log(res);
 //                $.each(res,function(i,v){
 //                  var tr = $("<tr></tr>");
                 
 //                  tr.append('<td>'+v+'<td>');
                 
 //                  $(".list").append(tr);
 //                })
 //                $('#list').show();
 //              }
 //            });


 //         });

// }
   


</script>
        