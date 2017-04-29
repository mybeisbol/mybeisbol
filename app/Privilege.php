<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use DB;

class Privilege extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * @var static array list of privileges
     */
    static $list;

    static function getPrivileges(){
       Privilege::$list = DB::table('user__roles')
            ->join('role__privileges','user__roles.id_role','=','role__privileges.id_role')
            ->where('user__roles.id_user',Auth::user()->id)
            ->select('role__privileges.id_privilege')
            ->get();
    }
}
