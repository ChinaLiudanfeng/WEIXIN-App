<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class receipt extends Model
{
    protected $table = 'receipt';
    protected $primaryKey ='id';
    public $timestamps = false;
    protected $guarded = [];//批量添加需要的指定属性
}
