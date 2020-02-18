<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class suggest extends Model //图片入库
{
    protected $table = 'suggest';
    protected $primaryKey = 'c_id';
    public $timestamps = false;
    protected $guarded = [];//批量添加需要的指定属性

    //添加入库
    public static function create($openid,$content)
    {
       return  Self::insert([    'openid'=>$openid,   'content'=>$content, ]);
    	
    }

    
}
