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
                <td>分类编号</td>
                <td>分类名称</td>
                <td>商品数量</td>
                <td>操作</td>
            </tr>
         
            @foreach($info as $v)
                <tr>
                    <td class="cate_id">{{$v['cate_id']}}</td>
                    <td>{{str_repeat("---",$v['level']).$v['cate_name']}}</td>      
                    <td>{{$v['count']}}</td>
                    <td cate_id="{{$v['cate_id']}}"  is_show="{{$v['is_show']}}"><a href="" class="btn btn-danger">删除</a>
                      @if($v['is_show'] == 1)
                     <button type="button" class="btn btn-default aa">显示</button>
                    @else
                      <button type="button" class="btn btn-default aa">隐藏</button>   
                     @endif
                    </td>
                </tr>
            @endforeach
                
        </table>
    </form>
</body>
</html>
<script type="text/javascript">
    $('.aa').on('click',function(){
      var cate_id=$(this).parent('td').attr('cate_id');
       var is_show=$(this).parent('td').attr('is_show');
       var _this=$(this);
    
        $.ajax({
           url:"{{asset('category_show')}}",
           data:{cate_id:cate_id,is_show:is_show},
           dataType:"json",
           success:function(res){
                 history.go(0) 
                 var content=_this.text();
                 if(content = '显示'){
                  _this.text('隐藏');
                 }else if(content = '隐藏'){
                  _this.text('显示');
               }
           }
      });
    });
</script>