<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    //与模型关联的adminuser表
    protected $table= 'admin_users';
    public $timestamps = false;

}
