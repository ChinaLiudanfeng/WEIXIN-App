<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class menu2 extends Model
{
    protected $table = 'menu1';
    protected $primaryKey = 'menu_id';
    public $timestamps = false;
    protected $guarded = [];//批量添加需要的指定属性
}
