<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class mass extends Model
{
    protected $table = 'mass';
    protected $primaryKey = 'mass_id';
    public $timestamps = false;
    protected $guarded = [];//批量添加需要的指定属性
}
