<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class attribute1 extends Model
{
    protected $table = 'attribute';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];//批量添加需要的指定属性
}
