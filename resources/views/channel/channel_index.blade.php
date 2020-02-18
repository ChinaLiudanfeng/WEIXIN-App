<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script type="text/javascript" src="{{asset('jquery.js')}}"></script>
    <title>Document</title>
</head>
<body style='margin-top:2%'>
<div class="container">
    <form action="">

        <table class="table table table-striped table-bordered table-hover Column content" >

            <tr>
                <td>渠道编号</td>
                <td>渠道名称</td>
                <td>渠道标识</td>
                <td>二维码图片</td>
                <td>关注人数</td>
                <td>取关人数</td>
                <td>生成时间</td>
                <td>操作</td>
            </tr>
            @foreach($info as $v)
                <tr>
                    <td>{{$v->c_id}}</td>
                    <td>{{$v->c_name}}</td>
                    <td>{{$v->c_80}}</td>
                    <td><img src="/{{$v->jpg_path}}" class="click_img" alt="" width="50" class="content"></td>
                    <td>{{$v->channl_num}}</td>
                    <td></td>
                    <td>{{date('Y-m-d H:i:s',$v->add_time)}}</td>
                    <td><a href="" class="btn btn-danger">删除</a></td>
                </tr>

            @endforeach
        </table>
           <div class="bg_div" style="display: none;background: #ccc;width:100%;height: 100%;position: absolute;top:0;left: 0;opacity: 0.8;text-align: center;padding-top:10%">
               <img src="">
           </div>
           <div class="close_div" style="padding-left:80%">
                <b>关闭</b>
           </div>
    </form>

  <script type="text/javascript">
    $('.click_img').on('click',function(){

        $('.bg_div').show();
        var src = $(this).attr("src");
        $(".bg_div img").attr("src",src);

    });

    $(".close_div").on('click',function(){
        $(".bg_div").hide()
    });

  </script>

</body>
</html>