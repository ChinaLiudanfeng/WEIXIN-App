@extends('Index.index')
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
@section('body')
   <h1><b>商品添加</b></h1><br>
  <ul class="nav nav-tabs">
     <li role="presentation" class="active"><a name="basic" href="#">基本信息</a></li>
     <li role="presentation" class=""><a href="#" name="attr">商品属性</a></li>
     <li role="presentation" class=""><a href="#" name="content">商品详情</a></li>
  </ul>
    <form action="{{url('api_dogoods')}}" method="post" enctype="multipart/form-data">
      <div class="div_form div_basic">
        <!-- 基本信息 -->
        <div class="form-group ">
                <label for="exampleInputEmail1">商品名称</label>
                <input type="text" name="goods_name" required="required" class="form-control" id="exampleInputEmail1" placeholder="请输入商品名称">
        </div>

        <div class="radio disabled">
          <label>
            <input type="radio" name="is_on_sale"  value="1" >上架 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="is_on_sale" value="2" checked >下架
          </label>
        </div>
      
         <div class="form-group">
                <label for="exampleInputEmail1">商品分类</label>
            <select class="form-control" name="cate_id">
              
                 @foreach($cateInfo as $v)
                 <option  value="{{$v['cate_id']}}">{{str_repeat("❤",$v['level']).$v['cate_name']}}</option>
                @endforeach      
            </select>
        </div>
       <!--    <div class="form-group">
                <label for="exampleInputEmail1">商品货号</label>
                <input type="text" name="goods_No" class="form-control" >
        </div> -->
          <div class="form-group">
                <label for="exampleInputEmail1">商品价钱</label>
                <input type="text" required="required" placeholder="请输入商品价钱" name="goods_price" class="form-control">
        </div>

        <div class="form-group">
          <label for="exampleInputFile">商品图片</label>
          <input type="file" id="exampleInputFile" name="goods_img">
        </div>

      </div>


     <!-- 商品属性 -->
      <div class="div_form div_attr" style="display: none">
          <div class="form-group">
            <label for="exampleInputEmail1">商品类型</label>
                 <select class="form-control change" name="type_id" >
                    <option value="0" > 请选择</option>
                     @foreach($info as $v)
                      <option value="{{$v['type_id']}}">{{$v['type_name']}}</option>
                      @endforeach      
                </select>
          </div>
           <table width="100%" id="attrTable" class='table table-bordered'>
              </table>
      </div>


       <!-- 商品详情 -->
      <div class="div_form div_content" style="display: none">
          <div class="form-group">
            <label for="exampleInputEmail1">商品详情</label>
              <textarea class="form-control" rows="3"></textarea>
          </div>
           <table width="100%" id="attrTable" class='table table-bordered'>
              </table>
      </div>

      <button type="submit" class="btn btn-default">添加</button>
    </form>

</body>
</html>
<!-- .nav-tabs a -->
<!-- 空格是下面的意思 a是标签，a链接 -->
<script type="text/javascript">
    $('.nav-tabs a').click(function(){
      $(this).parent().siblings('li').removeClass('active');
      $(this).parent().addClass('active');
       var name=$(this).attr('name');
         $('.div_form').hide();
         $('.div_'+name).show();
    });


    $('.change').change(function(){
      $('#attrTable').empty();
          var type_id=$(this).val();
          $.ajax({
                url:"{{url('goods_type')}}",
                data:{type_id:type_id},
                dataType:'json',
                success:function(res){ 
                        $.each(res,function(i,v){
                          //1为可选 为[+]
                            if (v.attr_radio==2){
                               var tr ='<tr>\
                                        <td>'+v.attr_name+'</td>\
                                        <td>\
                                        <input type="hidden" name="attr_id_list[]" value='+v.goods_attr_id+'>\
                                            <input name="attr_value[]" type="text" value="" size="20">\
                                            <input type="hidden" name="attr_price_list[]" >\
                                        </td>\
                                    </tr>';
                            }else{
                                var tr ='<tr>\
                                            <td><a href="javascript:;" class="addRow">[+]</a>'+v.attr_name+'</td>\
                                            <td>\
                                            <input type="hidden" name="attr_id_list[]" value='+v.goods_attr_id+'>\
                                            <input name="attr_value[]" type="text" value="" size="20">\
                                    属性价格 <input type="text" name="attr_price_list[]"  size="5" maxlength="10">\
                                            </td>\
                                        </tr>';
                            }

                           $('#attrTable').append(tr);
                        })   
                }
          

          });
    });

    $(document).on('click','.addRow',function(){
      var val = $(this).html();
     if(val == "[+]"){
       $(this).html("[-]");
       var tr= $(this).parent().parent();
       var tr_clone = tr.clone();
       $(this).html("[+]");
       tr.after(tr_clone);
     }else{
        $(this).parent().parent().remove();
     }
    });


</script>

@endsection

