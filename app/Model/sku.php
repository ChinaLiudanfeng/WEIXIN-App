<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class sku extends Model
{
    protected $table = 'sku';
    protected $primaryKey = 'sku_id';
    public $timestamps = false;
    protected $guarded = [];//批量添加需要的指定属性
}
