<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use app\Model\userInfo;

class userInfo extends Model
{
    protected $table = 'userInfo';
    protected $primaryKey = 'user_id';
    public $timestamps = false;
    protected $guarded = [];//批量添加需要的指定属性
}
