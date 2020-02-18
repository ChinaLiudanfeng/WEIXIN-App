@extends('Index.index')
   <script type="text/javascript" src="{{asset('./jquery.js')}}"></script>
@section('body')
<h3>货品添加</h3>
<form action="{{url('sku_doadd')}}" method="post">
<table width="100%" id="table_list" class='table table-bordered'>
    <tbody>
    <tr>
      @foreach($goodsInfo as $v)
       <input type="hidden" name="goods_id" value="{{$v['goods_id']}}">
      <th colspan="20" scope="col">商品名称：{{$v['goods_name']}}&nbsp;&nbsp;&nbsp;&nbsp;货号：{{$v['goods_No']}}</th>
      @endforeach  
    </tr>
    <div>
    <tr>
        @foreach($spec as $value)
      <td scope="col"><div align="center"><strong>{{$value[0]['attr_name']}}</strong></div></td> 
        @endforeach
      <td class="label_2">货号</td>
      <td class="label_2">库存</td>
      <td class="label_2">&nbsp;</td>
    </tr>
    
    <tr id="attr_row">
	    <!-- start for specifications_value -->
      @foreach($spec as $value)
		<td align="center" style="background-color: rgb(255, 255, 255);">
			<select name="g_attr_id[]">
				<option value="" selected="">请选择...</option>
        @foreach($value as $val)
				<option value="{{$val['attr_id_list']}}">{{$val['attribute_value']}}</option>
        @endforeach	
			</select>
		</td>
    @endforeach
 
		<td class="label_2" style="background-color: rgb(255, 255, 255);"><input type="text" name="" value="" size="20"></td>
		<td class="label_2" style="background-color: rgb(255, 255, 255);"><input type="text" name="sku_number[]"  size="10"></td>
		<td style="background-color: rgb(255, 255, 255);"><input type="button" class="button addRow" value="+" ></td>
    </tr>
  </div>
    <tr>
      <td align="center" colspan="5" style="background-color: rgb(255, 255, 255);">
        <input type="submit" class="button" value=" 保存 ">
      </td>
    </tr>
  </tbody>
</table>
</form>
@endsection
<script type="text/javascript">
  $(document).on('click','.addRow',function(){
    var _this=$(this);
     var val=_this.val();
     if(val =="+"){
      _this.val(' - ');
      var Row=_this.parent().parent();
      var Row_clone=Row.clone();
       _this.val('+');
      Row.after(Row_clone);   
     }else{
      _this.parent().parent().remove();
     }
  });
  
</script>