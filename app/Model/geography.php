<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class geography extends Model
{
    protected $table = 'geography';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];//批量添加需要的指定属性
}
