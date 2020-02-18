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
    <div class="list">
         <select name="cate_id">
              <option value="">所有分类</option>
              @foreach($cateSelect as $val)
              <option value="{{$val['cate_id']}}">{{$val['cate_name']}}</option>
               @endforeach
          </select>
         <select name="is_on_sale">
              <option value="">全部</option>
              <option value="1">上架</option> 
              <option value="2">下架</option> 
          </select>
          &nbsp;&nbsp;&nbsp;&nbsp;商品名 <input type="text" name="goods_name" > <button id="btn">搜索</button>
          <hr/>
        <table class="table table table-striped table-bordered table-hover Column content" >

            <tr>
                <td>商品id</td>
                <td>商品名称</td>
                <td>所属分类</td>
                <td>商品价格</td>
                <td>商品图片</td>
                <td>商品编号</td>
                <td>所属类型</td>
                <td>上架</td>
                <td>操作</td>
            </tr>
            <tbody id="tbody">
            @foreach($info as $v)
                <tr>
                    <td>{{$v['goods_id']}}</td>
                    <td class="goods_name" goods_id="{{$v['goods_id']}}">{{$v['goods_name']}}</td>
                    <td>{{$v['cate_id']}}</td>

                    @if($v['is_on_sale'] == 1)
                        <td class="goods_price"  goods_id="{{$v['goods_id']}}">{{$v['goods_price']}}</td>
                    @else
                        <td>{{$v['goods_price']}}</td>
                    @endif

                   
                    <td><img src="/{{$v['goods_img']}}" alt="暂无图片" width="50" class="content"></td>
                    <td>{{$v['goods_No']}}</td>       
                    <td>{{$v['type_id']}}</td>
                    <td class="sale" goods_id="{{$v['goods_id']}}">
                        
                     @if($v['is_on_sale'] == 1)
                          √
                     @else
                          ×
                     @endif

                    </td>
                    <td><a href="{{url('goods_detail')}}?goods_id={{$v['goods_id']}}" class="btn btn-danger">货品详情</a></td>
                </tr>

             @endforeach
            </tbody>
        </table>
         <table align="center">
           <tr >
            <td>{{$info->links()}}</td>
          </tr>
        
      </table>
 </div>       
</div>  
</body>
</html>
<script type="text/javascript">
    $('.goods_name').click(function(){
           var _this=$(this);
           if(_this.children('input').length>0){
                 return false;
           };
           //获取商品id
           var goods_id=_this.attr('goods_id');
           console.log(goods_id);
           //获取商品名称
           var goods_text=_this.text();
           _this.empty();
           var ipt=$("<input type='text' />").css({'border-width':'0','background-color':_this.css('background-color')}).val(goods_text);
           _this.append(ipt);
           ipt.focus().select();
        
           ipt.blur(function(){
                $.post(
                      "{{asset('goods_soso')}}",
                      {goods_id:goods_id,goods_name:ipt.val()},
                      function(data){
                        if(data.font == 1){
                            history.go(0) 
                        }
                      },

                    'json'
                    );
           });
   });

    $(document).on('click','.sale',function(){

          var s_this=$(this);
        var sale=s_this.text();
        if(sale == "√"){
            sale == "1";
        }else{
            sale == "2";
        }
         var sale_id=s_this.attr('goods_id');

          $.post(
                      "{{asset('goods_sale')}}",
                      {sale_id:sale_id,sale:sale},
                      function(data){
                        if(data.info == 3){
                            history.go(0) 
                        }
                      },

                    'json'
                    );
        
    });


  $(document).on('click','#btn',function(){
   var cate_id=$('[name="cate_id"]').val();
   var is_on_sale=$('[name="is_on_sale"]').val();
   var goods_name=$('[name="goods_name"]').val();
           $.post(
                      "{{asset('goods_search')}}",
                      {cate_id:cate_id,is_on_sale:is_on_sale,goods_name:goods_name},
                      function(data){
                            // console.log(data.info.data);
                            // history.go(0);

                          $('#tbody').children().html('');
                          console.log(data.data);
                              $.each(data.data,function(i,v){
                               
                                var tr = $("<tr style='text-align:center;'></tr>");
                                tr.append("<td>"+v.goods_id+"</td>");
                                tr.append("<td>"+v.goods_name+"</td>");
                                 tr.append("<td>"+v.cate_id+"</td>");
                                tr.append("<td>"+v.goods_price+"</td>");
                                tr.append('<td><img src='+v.goods_img+'alt="暂无图片" width="50" class="content"></td>');
                                tr.append("<td>"+v.goods_No+"</td>");
                                tr.append("<td>"+v.type_id+"</td>");
                                tr.append("<td>"+v.is_on_sale+"</td>");
                                 tr.append("<td><a href='{{url('goods_detail')}}?goods_id="+v.goods_id+" class='btn btn-danger'>货品详情</a></td>");
                                $('#tbody').append(tr);
                            })

                        
                      },

                    'json'
                    );

  })




    
</script>

