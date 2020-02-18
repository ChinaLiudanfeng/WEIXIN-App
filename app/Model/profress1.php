<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class profress1 extends Model
{
    protected $table = 'profess';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];//批量添加需要的指定属性
}
