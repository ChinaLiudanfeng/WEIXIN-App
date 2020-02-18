<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class yuan extends Model
{
    protected $table = 'yuan';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];//批量添加需要的指定属性
}
