<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class blii extends Model
{
    protected $table = 'blii';
    protected $primaryKey = 'b_id';
    public $timestamps = false;
    protected $guarded = [];//批量添加需要的指定属性
}
