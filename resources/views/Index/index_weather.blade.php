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
		<p>
			城市：
			<input type="text"  name="city"><button id="btn">搜索今日天气</button>
		</p>
   </div>
</body>
</html>
<script type="text/javascript">
   $('#btn').on('click',function(){
   	 var city=$('[name="city"]').val();//namex属性 获取标签属性
        if(city ==""){
        	alert('请填写城市');
        }
      $.ajax({
      	   url:"{{asset('index_doweather')}}",
      	   data:{city:city},
      	   dataType:"json",
      	   success:function(res){
                 weather(res.result)
      	   }
      });

   });

 function weather(res)
 {
     // alert(1);
     var categories = [];//X轴日期
     var data = [];//x轴日期对应时间轴的最高日期和最低日期
     $.each(res,function(i,v){
       categories.push(v.days);  
       var arr = [parseInt(v.temp_low),parseInt(v.temp_high)];
       data.push(arr)
     })


     var chart = Highcharts.chart('container', {
	chart: {
		type: 'columnrange', // columnrange 依赖 highcharts-more.js
		inverted: true
	},
	title: {
		text: '当天天气情况'
	},
	subtitle: {
		text: res[0]['days']
	},
	xAxis: {
		categories:categories
	},
	yAxis: {
		title: {
			text: '温度 ( °C )'
		}
	},
	tooltip: {
		valueSuffix: '°C'
	},
	plotOptions: {
		columnrange: {
			dataLabels: {
				enabled: true,
				formatter: function () {
					return this.y + '°C';
				}
			}
		}
	},
	legend: {
		enabled: false
	},
	series: [{
		name: '温度',
		data: data
	}]
});


 }


</script>
        