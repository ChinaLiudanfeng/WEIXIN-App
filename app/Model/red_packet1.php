<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class red_packet1 extends Model
{
    protected $table = 'red_packet';
    protected $primaryKey = 'red_id';
    public $timestamps = false;
    protected $guarded = [];//批量添加需要的指定属性
}
