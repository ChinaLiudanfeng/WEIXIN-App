<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class type1 extends Model
{
    protected $table = 'type';
    protected $primaryKey = 'type_id';
    public $timestamps = false;
    protected $guarded = [];//批量添加需要的指定属性
}
