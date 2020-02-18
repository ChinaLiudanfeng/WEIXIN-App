<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class send extends Model
{
    protected $table = 'send';
    protected $primaryKey = 'send_id';
    public $timestamps = false;
    protected $guarded = [];//批量添加需要的指定属性
}
