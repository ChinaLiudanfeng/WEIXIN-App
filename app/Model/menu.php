<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use app\Model\menu;

class menu extends Model
{
    protected $table = 'menu';
    protected $primaryKey = 'menu_id';
    public $timestamps = false;
    protected $guarded = [];//批量添加需要的指定属性
}
