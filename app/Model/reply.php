<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use app\model\Wechat;


//回复 模型
class reply extends Model
{
    protected $table = 'reply';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];//批量添加需要的指定属性


}
