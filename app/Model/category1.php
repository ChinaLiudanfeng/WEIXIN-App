<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class category1 extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'cate_id';
    public $timestamps = false;
    protected $guarded = [];//批量添加需要的指定属性
}
