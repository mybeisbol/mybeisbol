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
       Privilege::$list = DB::table('user_roles')
            ->join('role_privileges','user_roles.id_role','=','role_privileges.id_role')
            ->where('user_roles.id_user',Auth::user()->id)
            ->select('role_privileges.id_privilege')
            ->get();
    }
}
