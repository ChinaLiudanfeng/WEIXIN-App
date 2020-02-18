<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class goods1 extends Model
{
    protected $table = 'goods';
    protected $primaryKey = 'goods_id';
    public $timestamps = false;
    protected $guarded = [];//批量添加需要的指定属性
}
