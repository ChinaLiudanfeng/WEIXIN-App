<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class weather extends Model
{
    protected $table = 'weather';
    protected $primaryKey = 'weather_id';
    public $timestamps = false;
    protected $guarded = [];//批量添加需要的指定属性
}
