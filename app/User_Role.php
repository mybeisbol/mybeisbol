<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user','id_role'
    ];

}
