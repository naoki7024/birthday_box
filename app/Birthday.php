<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Birthday extends Model
{
    // 
    protected $fillable = ['user_id','birthday', 'name','info',];

}
