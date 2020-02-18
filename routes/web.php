<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
	//后台-首页展示页面
    return view('Index/index');//后台登录页面
});


//8-29 考试
Route::any('/yuan_urlshow','yuan\yuanyuan@analysis');//接口输出
Route::any('/yuan_dologin','yuan\yuanyuan@dologin');//处理注册
Route::any('/yuan_doregister','yuan\yuanyuan@doregister');//处理登录
Route::any('/yuan_content','yuan\yuanyuan@content_show');//处理登录

//前台调用接口，才会触发中间件
//API
Route::group(['middleware'=>['handlr']],function(){//跨域中间件	
  Route::any('/api_goods','API\PhotoController@index');//商品列表接口
  Route::any('/api_dogoods','API\PhotoController@goods_doadd');//商品添加接口
  Route::any('/api_cate','API\PhotoController@cate_index');//分类添加接口
  Route::any('/api_details','API\PhotoController@goods_details');//分类添加接口
  Route::any('/api_single','API\PhotoController@goods_single');//分类添加接口
  Route::any('/api_attribute','API\PhotoController@attribute_goods');//商品属性接口

  Route::any('/api_addcart','API\PhotoController@addcart');//判断过期时间
  Route::any('/api_showcart','API\PhotoController@showcart');//展示购物车
  Route::any('/api_over','API\PhotoController@slelect_time');//判断过期时间
  Route::any('/api_weather','API\PhotoController@weather_select');//天气入库
  Route::any('/api_checkWech','API\PhotoController@check_weather');//查询库里的天气

     Route::middleware(['mytoken'])->group(function(){ 
     
       Route::any('/api_addcart','API\PhotoController@addcart');//判断过期时间
       Route::any('/api_showcart','API\PhotoController@showcart');//展示购物车

   });

    Route::any('/api_Atypeshow','API\testController@type_show');//类型接口展示
    Route::any('/unscrambler','API\testController@unscrambler');//数据解密接口展示
    Route::any('/api_catelist','API\testController@cate_show');//分类名称展示
    Route::any('/api_goodslist','API\testController@goods_list');//分类名称展示
});


 Route::any('/api_selectWechat','API\wechatController@weather_select');//分类名称展示
 Route::any('/api_login','API\PhotoController@login');//登录接口

//jwt
Route::any('/jwt_test','API\testController@index');


//8-19小测试
Route::any('/exam_login','exam@exam_login');//登录接口
Route::any('/exam_goodsInfo','exam@getGoodsinfo');//获取商品接口
Route::any('/exam_aaa','exam@exam_aaa');//获取商品接口

Route::any('/getaccess_token','Index\AdminController@getaccess_token');//分类添加
//分类名称添加
Route::any('/category_add','category@category_add');//分类添加
Route::any('/category_doadd','category@category_doadd');//处理分类添加
Route::any('/category_index','category@category_index');//处理分类添加
Route::any('/category_show','category@category_show');//是否显示
Route::any('/nameOnly','category@nameOnly');//是否显示

Route::any('/attribute_add','attribute@attribute_add');//分类添加
Route::any('/attribute_doadd','attribute@attribute_doadd');//处理分类添加
Route::any('/attribute_index','attribute@attribute_index');//处理分类添加
Route::any('/attribute_delete','attribute@attribute_delete');//处理分类添加


Route::any('/type_add','type@type_add');//分类添加
Route::any('/type_doadd','type@type_doadd');//处理分类添加
Route::any('/type_index','type@type_index');//处理分类添加
Route::any('/type_attribute','type@type_attribute');//属性列表
Route::any('/tyAttrInfo_delete','type@tyAttrInfo_delete');//批删

Route::any('/goods_add','goods@goods_add');//分类添加
Route::any('/goods_doadd','goods@goods_doadd');//处理分类添加
Route::any('/goods_index','goods@goods_index');//处理分类添加
Route::any('/goods_type','goods@goods_type');//商品类型显示
Route::any('/goods_detail','goods@goods_detail');//商品详情
Route::any('/sku_doadd','goods@sku_doadd');//处理货品添加
Route::any('/goods_soso','goods@goods_soso');//处理货品搜搜
Route::any('/name_change','goods@goods_soso');//及点及改
Route::any('/goods_search','goods@goods_search');//及点及改
Route::any('/goods_sale','goods@goods_sale');//及点及改
//微信登录
Route::any('/wechat','wechatController@index');

Route::any('/Index','Index\AdminController@index');//后台主页面
Route::any('/login','Index\AdminController@login');//后台登录页面
Route::any('/dologin','Index\AdminController@dologin');//处理登录页面
Route::any('/register','Index\AdminController@register');//注册页面
Route::any('/do_register','Index\AdminController@do_register');//处理注册页面

Route::any('/media_add','Media\mediaController@media_add');//素材参加页面
Route::any('/media_doadd','Media\mediaController@media_doadd');//处理素材参加页面
Route::any('/media_index','Media\mediaController@media_index');//素材展示页面
Route::any('/media_delete','Media\mediaController@media_delete');//素材删除页面

Route::any('/channel_add','channelController@channel_add');//渠道添加页面
Route::any('/channel_doadd','channelController@channel_doadd');//渠道添加页面
Route::any('/channel_index','channelController@channel_index');//渠道列表展示页面
// Route::any('/attentionNumberImg','CodeController@attentionNumberImg');//关注人数趋势图
// 
// 柱状图
Route::any('/channel_write','channelController@channel_write');

Route::any('/index_weather','IndexController@index_weather');//搜索天气
Route::any('/index_doweather','IndexController@index_doweather');//处理搜索天气



// attention
Route::any('/attention_add','attention@attention_add');//关注添加展示页面
Route::any('/attention_doadd','attention@attention_doadd');//处理添加展示页面
Route::any('/attention_list','attention@attention_list');//处理添加展示页面


//菜单
Route::any('/menu_add','menu1@menu_add');//添加
Route::any('/menu_doadd','menu1@menu_doadd');//处理添加
Route::any('/menu_index','menu1@menu_index');//列表展示
Route::any('/create_menu','menu1@create_menu');//一键用户


//群发
Route::any('/mass_add','massController@mass_add');//添加页面
Route::any('/mass_doadd','massController@mass_doadd');//处理添加页面
Route::any('/blii','massController@blii_index');//粉丝列表
Route::any('/blii_add','massController@blii_add');//粉丝添加
Route::any('/blii_doadd','massController@blii_doadd');//处理粉丝添加
Route::any('/blii_list','massController@blii_list');//标签列表展示
Route::any('/blii_product','massController@blii_product');//标签列表展示
Route::any('/mass_index','massController@mass_index');//
Route::any('/mass_product','massController@mass_product');//标签列表展示

Route::any('/login_code','Index\AdminController@login_code');//获取验证码



Route::any('/isdefault',"attention@isdefault");//设置m默认显示


Route::any('/title_add',"title1@title_add");//题目添加页面
Route::any('/title_doadd',"title1@title_doadd");//处理添加页面

Route::any('/accredic_add','accredic@accredic_add');//网页跳转
Route::any('/accredic_auth','accredic@accredic_auth');//授权地址

Route::any('/login_add','login@login_add');//微信绑定页面
Route::any('/login_doadd','login@login_doadd');//处理微信绑定页面
Route::any('/login_index','login@login_index');//处理微信绑定页面
Route::any('/admin_code','login@admin_code');//处理微信绑定页面
Route::any('/admin_code','login@admin_code');//获取验证码


Route::any('/dimensional','login@dimensional');//验证码-链接
Route::any('/mobliescan','login@mobliescan');//处理验证码-链接
Route::any('/chenkWechatLogin','login@chenkWechatLogin');//处理验证码-链接

//微信项目开发 -A卷
Route::any('/wish_add','Ajuan@wish_add');//添加许愿
Route::any('/wish_doadd','Ajuan@wish_doadd');//处理添加许愿
Route::any('/wish_index','Ajuan@wish_index');//添加许愿


Route::any('/red_add','red_packet@red_add');//添加红包
Route::any('/red_doadd','red_packet@red_doadd');//处理添加红包
Route::any('/red_index','red_packet@red_index');//红包列表展示
Route::any('/geography','red_packet@geography');//地理位置



Route::any('/oil','oil@oil');//油价搜搜
Route::any('/oil_soso','oil@oil_soso');//处理油价搜搜



//表白
Route::any('/profress_add','profress@profress_add');//表白展示
Route::any('/profress_doadd','profress@profress_doadd');//处理表白展示
Route::any('/my_profress','profress@my_profress');//我的表白展示
Route::any('/profress_mass','profress@profress_mass');//发送表消息


