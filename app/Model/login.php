<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class login extends Model
{
    protected $table = 'login';
    protected $primaryKey = 'login_id';
    public $timestamps = false;
    protected $guarded = [];//批量添加需要的指定属性
}
