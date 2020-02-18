<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">

    <title> hAdmin- 主页</title>

    <meta name="keywords" content="">
    <meta name="description" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->

    <link rel="shortcut icon" href="favicon.ico"> <link href="{{asset('css/bootstrap.min.css')}}?v=3.3.6" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}?v=4.4.0" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}?v=4.1.0" rel="stylesheet">
    <link rel="icon" href="https://jscdn.com.cn/highcharts/images/favicon.ico">
        
        <script type="text/javascript" src="{{asset('jquery.js')}}"></script>
        <script src="https://code.highcharts.com.cn/highcharts/highcharts.js"></script>
        <script src="https://code.highcharts.com.cn/highcharts/highcharts-more.js"></script>
        <script src="https://code.highcharts.com.cn/highcharts/modules/exporting.js"></script>
        <script src="https://img.hcharts.cn/highcharts-plugins/highcharts-zh_CN.js"></script>
        <script src="https://code.highcharts.com.cn/highcharts/themes/grid-light.js"></script>
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
    <div id="wrapper">
        <!--左侧导航开始-->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="nav-close"><i class="fa fa-times-circle"></i>
            </div>
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                                    <span class="block m-t-xs" style="font-size:20px;">
                                        <i class="fa fa-area-chart"></i>
                                        <strong class="font-bold">hAdmin</strong>
                                    </span>
                                </span>
                            </a>
                        </div>
                        <div class="logo-element">hAdmin
                        </div>
                    </li>
                    <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                        <span class="ng-scope"></span>
                    </li>
                  <!--   <li>
                        <a class="J_menuItem" href="{{URL::asset('index_weather')}}">
                            <i class="fa fa-home"></i>
                            <span class="nav-label">主页</span>
                        </a>
                    </li> -->
                    <!-- <li>
                        <a href="#">
                            <i class="fa fa fa-bar-chart-o"></i>
                            <span class="nav-label">素材管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="{{URL::asset('media_add')}}">素材添加</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="{{URL::asset('media_index')}}">素材列表展示</a>
                            </li>

                        </ul>
                    </li> -->
          <!--  --><!--           <li class="line dk"></li>
                    <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                        <span class="ng-scope"></span>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fa fa fa-bar-chart-o"></i>
                            <span class="nav-label">渠道管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="{{URL::asset('channel_add')}}">渠道添加</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="{{URL::asset('channel_index')}}">素材列表展示</a>
                            </li>
                              <li>
                              <a class="J_menuItem" href="{{URL::asset('channel_write')}}">关注人数趋势</a>
                            </li>

                        </ul>
                    </li>
 -->
             <!--        <li>
                        <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">首次关注回复</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="{{URL::asset('attention_add')}}">回复内容添加</a>
                            </li>
                            <li><a class="J_menuItem" href="{{URL::asset('attention_index')}}">内容列表展示</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">菜单</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="{{URL::asset('menu_add')}}">菜单添加</a>
                            </li>
                            <li><a class="J_menuItem" href="{{URL::asset('menu_index')}}">菜单列表展示</a>
                            </li>
                        </ul>
                    </li>
                            -->       
                  
                 <!--    <li class="line dk"></li>
                    <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                        <span class="ng-scope"></span>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-picture-o"></i> <span class="nav-label">消息管理</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="{{URL::asset('mass_add')}}">发送消息</a>
                            </li>
                           
                        </ul>
                    </li>
 -->
                   
                   <!--  <li>
                        <a href="#"><i class="fa fa-cutlery"></i> <span class="nav-label">微信粉丝管理 </span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="{{URL::asset('blii_add')}}">创建标签</a>
                            </li>
                            <li><a class="J_menuItem" href="{{URL::asset('blii_list')}}">展示标签</a>
                            </li>
                            <li><a class="J_menuItem" href="{{URL::asset('blii')}}">粉丝列表</a>
                            </li>
                        </ul>
                    </li> -->

                 <!--    <li>
                        <a href="#"><i class="fa fa-cutlery"></i> <span class="nav-label">答题菜单 </span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="{{URL::asset('title_add')}}">添加题目</a>
                            </li>
                            <li><a class="J_menuItem" href="">展示标签</a>
                            </li>
                            <li><a class="J_menuItem" href="">粉丝列表</a>
                            </li>
                        </ul>
                    </li> -->

            <!--         <li>
                        <a href="#"><i class="fa fa-cutlery"></i> <span class="nav-label">A卷 </span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="{{URL::asset('wish_add')}}">许愿墙添加</a>
                            </li>
                            <li><a class="J_menuItem" href="{{URL::asset('wish_index')}}">许愿墙列表展示</a>
                            </li>
                            <li><a class="J_menuItem" href=""></a>
                            </li>
                        </ul>
                    </li>


                      <li>
                        <a href="#"><i class="fa fa-picture-o"></i> <span class="nav-label">B卷</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="{{URL::asset('red_add')}}">红包生成</a>
                            </li>
                            <li><a class="J_menuItem" href="{{URL::asset('red_index')}}">发送消息</a>
                            </li>
                            <li><a class="J_menuItem" href="{{URL::asset('geography')}}">我的位置</a>
                            </li>
                           
                        </ul>
                    </li> -->

<!-- 
                     <li>
                        <a href="#"><i class="fa fa-picture-o"></i> <span class="nav-label">profress</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="{{URL::asset('profress_add')}}">添加表白内容</a>
                            </li>
                            <li><a class="J_menuItem" href="{{URL::asset('')}}"></a>
                            </li>
                            <li><a class="J_menuItem" href="{{URL::asset('')}}"></a>
                            </li>
                           
                        </ul>
                    </li> --> 



                 <!--     <li>
                        <a href="#"><i class="fa fa-picture-o"></i> <span class="nav-label">分类模块</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="{{URL::asset('category_add')}}">分类添加</a>
                            </li>
                            <li><a class="J_menuItem" href="{{URL::asset('category_index')}}">分类列表展示</a>
                            </li>
                            <li><a class="J_menuItem" href="{{URL::asset('')}}"></a>
                            </li>
                           
                        </ul>
                    </li> 

                       <li>
                        <a href="#"><i class="fa fa-picture-o"></i> <span class="nav-label">类型模块</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="{{URL::asset('type_add')}}">类型添加</a>
                            </li>
                            <li><a class="J_menuItem" href="{{URL::asset('type_index')}}">类型列表展示</a>
                            </li>
                            <li><a class="J_menuItem" href="{{URL::asset('')}}"></a>
                            </li>
                           
                        </ul>
                    </li>

                       <li>
                        <a href="#"><i class="fa fa-picture-o"></i> <span class="nav-label">属性模块</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="{{URL::asset('attribute_add')}}">属性添加</a>
                            </li>
                            <li><a class="J_menuItem" href="{{URL::asset('attribute_index')}}">属性列表展示</a>
                            </li>
                            <li><a class="J_menuItem" href="{{URL::asset('')}}"></a>
                            </li>
                           
                        </ul>
                    </li>

                        <li>
                        <a href="#"><i class="fa fa-picture-o"></i> <span class="nav-label">商品模块</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="{{URL::asset('goods_add')}}">商品添加</a>
                            </li>
                            <li><a class="J_menuItem" href="{{URL::asset('goods_index')}}">商品列表展示</a>
                            </li>
                             <li><a class="J_menuItem" href="{{URL::asset('goods_detail')}}">货品详情</a>
                            </li>
                           
                        </ul>
                    </li> -->

                     <li>
                        <a href="#"><i class="fa fa-picture-o"></i> <span class="nav-label">8-29考试</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="{{URL::asset('yuan_dologin?login_name=123&login_pwd=456')}}">注册</a>
                            </li>
                            <li><a class="J_menuItem" href="{{URL::asset('yuan_doregister?login_name=123&login_pwd=456')}}">登录</a>
                            </li>
                             <li><a class="J_menuItem" href="{{URL::asset('yuan_content')}}">列表展示</a>
                            </li>
                           
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
        <!--左侧导航结束-->
        <!--右侧部分开始-->
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header"><a class="navbar-minimalize minimalize-styl-2 btn btn-info " href="#"><i class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" method="post" action="search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="请输入您需要查找的内容 …" class="form-control" name="top-search" id="top-search">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-envelope"></i> <span class="label label-warning">16</span>
                            </a>
                            <ul class="dropdown-menu dropdown-messages">
                                <li class="m-t-xs">
                                    <div class="dropdown-messages-box">
                                        <a href="profile.html" class="pull-left">
                                            <img alt="image" class="img-circle" src="img/a7.jpg">
                                        </a>
                                        <div class="media-body">
                                            <small class="pull-right">46小时前</small>
                                            <strong>闫辉</strong> 明早给你带早饭
                                            <br>
                                            <small class="text-muted">3天前 2014.11.8</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a href="profile.html" class="pull-left">
                                            <img alt="image" class="img-circle" src="img/a4.jpg">
                                        </a>
                                        <div class="media-body ">
                                            <small class="pull-right text-navy">25小时前</small>
                                            <strong>孔凡威</strong> 哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈
                                            <br>
                                            <small class="text-muted">昨天</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a class="J_menuItem" href="mailbox.html">
                                            <i class="fa fa-envelope"></i> <strong> 查看所有消息</strong>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell"></i> <span class="label label-primary">8</span>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li>
                                    <a href="mailbox.html">
                                        <div>
                                            <i class="fa fa-envelope fa-fw"></i> 您有16条未读消息
                                            <span class="pull-right text-muted small">4分钟前</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="profile.html">
                                        <div>
                                            <i class="fa fa-qq fa-fw"></i> 3条新回复
                                            <span class="pull-right text-muted small">12分钟钱</span>
                                        </div>
                                    </a>
                                </li>

                                <li class="divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a class="J_menuItem" href="notifications.html">
                                            <strong>查看所有 </strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="row J_mainContent  container" id="content-main" style='margin-top:5%'>

        
      @section('body')
           @show
     <!--  <iframe id="J_iframe" width="100%" height="100%" src="{{URL::asset('index_weather')}}" frameborder="0" data-id="index_v1.html" seamless>      
      </iframe> -->

              




    
   <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
      <div class="container" style='margin-left:20%'>
        <p>
            <!-- 城市： -->
            <!-- <input type="text"  name="city"><button id="btn">搜索今日天气</button> -->
        </p>
   </div>

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
            console.log(res);return;
                 weather(res.result)

           }
      });

   });

 function weather(res)
 {
console.log(res);return;
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












































































            </div>
        </div>

        <!--右侧部分结束-->
    </div>

    <!-- 全局js -->
    <script src="{{asset('js/jquery.min.js')}}?v=2.1.4"></script>
    <script src="{{asset('js/bootstrap.min.js')}}?v=3.3.6"></script>
    <script src="{{asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('js/plugins/layer/layer.min.js')}}"></script>

    <!-- 自定义js -->
    <script src="{{asset('js/hAdmin.js')}}?v=4.1.0"></script>
    <script type="text/javascript" src="{{asset('js/index.js')}}"></script>

    <!-- 第三方插件 -->
    <!-- <script src="{{asset('js/plugins/pace/pace.min.js')}}"></script> -->
<div style="text-align:center;">
<p><a href="http://www.mycodes.net/" target="_blank"></a></p>
</div>
</body>

</html>
