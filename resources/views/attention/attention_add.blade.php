@extends('Index.index')
@section('body')
<form action="{{asset('attention_doadd')}}" method="post"   enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">首次关注回复设置</label>
         <select class="form-control" name="type">
          <option value="">请选择回复类型</option>
          <option value="text">文本</option>
          <option value="image" id="uploads">图片</option>
        </select>
  </div>

      <div class="form-group btn" style="display: none" >
           <input type="button"  value="前往素材库" id="clickMedia">
      </div>

    <div class="form-group index" style="display: none" >
      <table class="table table table-striped table-bordered table-hover Column content   getlist" border="1" >
                <thead class="ll">
                     <td>选择</td>
                     <td>素材标题</td>
                     <td>素材图片</td> 
                     <td></td>
                </thead>
                <tbody  class="list">
                  
                </tbody>
          
          </table>   
    </div>

      <div class="form-group  text">
        <label for="exampleInputPassword1">文本内容</label>
        <textarea class="form-control" rows="3" name="content" ></textarea>
      </div>


  <div class="form-group file">
    <label for="exampleInputFile">选择文件</label>
    <input type="file" id="exampleInputFile" name="img">
    <img src="" id="img" width="100">
  </div>

  <button type="submit" class=" btn-default">Submit</button>
</form>
<script type="text/javascript">
   $(document).ready(function(){
               $(".text").hide();
                $(".file").hide();
                $(".btn").hide();
                   $(".ll").hide();
         $('[name="type"]').change(function(){
               var val=$(this).val();
                //默认 将所有样式隐藏
                 if(val=="image"){
                  
                   $(".file").show(); $(".text").hide();
                   $(".btn").show();$(".index").show();//素材列表展示
                   var type=$('[name=type]').val();
                         //设置默认显示-图片默认显示
                         $.post(
                              "{{url('attention_add')}}",
                              {type:type},
                              function(data){          
                                $("#img").attr('src',data);
                              
                              },
                              'json'

                            );
                  }

                if(val=="text"){
                    $(".btn").hide(); $(".text").show();
                    $(".file").hide();$(".list").hide();
                         var type=$('[name=type]').val();
                         //设置默认显示-图片默认显示
                         $.post(
                              "{{url('attention_add')}}",
                              {type:type},
                              function(data){  
                              console.log(data);        
                                 $('[name="content"]').text(data);
                              },
                              'json'

                            );
                  }     
                 
           });


         $(document).on('click','#clickMedia',function(){
            $.ajax({
              url:"{{url('attention_list')}}",
              dataType:"json",
              success:function(res){
                // console.log(res);
                $.each(res,function(i,v){
                  var tr = $("<tr></tr>");
                  tr.append('<td><input type="radio" name="media_id" value="'+v.wechat_media_id+'"></td>');
                  tr.append('<td>'+v.m_name+'<td>');
                  tr.append('<td><img width="50px" src="/'+v.m_path+'"></td>');
                  $(".list").append(tr);
                })
                $('#mediaData').show();
              }
            });

         });

   });
</script>

@endsection