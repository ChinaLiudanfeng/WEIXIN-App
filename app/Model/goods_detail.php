<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class goods_detail extends Model
{
    protected $table = 'goods_attribute';
    protected $primaryKey = 'g_attr_id';
    public $timestamps = false;
    protected $guarded = [];//批量添加需要的指定属性
}
