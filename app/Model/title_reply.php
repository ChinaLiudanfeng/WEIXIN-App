<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class title_reply extends Model
{
    protected $table = 'title_reply';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];//批量添加需要的指定属性
}
