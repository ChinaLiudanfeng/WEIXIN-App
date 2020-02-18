<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class title extends Model
{
    protected $table = 'title';
    protected $primaryKey = 'title_id';
    public $timestamps = false;
    protected $guarded = [];//批量添加需要的指定属性
}
