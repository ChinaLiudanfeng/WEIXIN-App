<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Wechat;
use App\Model\channel;

class channel extends Model
{
    protected $table = 'channl';
    protected $primaryKey = 'c_id';
    public $timestamps = false;
    protected $guarded = [];//批量添加需要的指定属性


    
   public static function chanNumber($c_num)
   {
   	  return  Self::where(['c_80'=>$c_num])->increment('channl_num');  	  
   }


  
   
    

}
