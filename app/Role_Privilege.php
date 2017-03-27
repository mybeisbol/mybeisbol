<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role_Privilege extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_role','id_privilege'
    ];
}
