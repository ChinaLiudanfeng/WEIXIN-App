<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class wish extends Model
{
    protected $table = 'wish';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];//批量添加需要的指定属性
}
