<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Wechat;
use App\Model\channel;
use App\Model\user as User;

class media extends Model
{
    protected $table = 'media';
    protected $primaryKey = 'm_id';
    public $timestamps = false;
    protected $guarded = [];//批量添加需要的指定属性



}
