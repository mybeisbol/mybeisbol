<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password','image_path','age','gender','updated_by','is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    static function GetUserWithRoles(){
        $users =  DB::table('users')
                    ->leftJoin('user__roles','user__roles.id_user','=','users.id')
                    ->leftJoin('roles','roles.id','=','user__roles.id_role')
                    ->select('users.id','users.first_name','users.last_name','users.email',
                        'users.created_at','users.updated_at','users.updated_by','users.is_active',
                        'roles.name as rol','roles.id as id_rol')
                    ->get();

        $usersWithRoles = array();
        foreach ($users as $user){
            if(!isset($usersWithRoles[$user->id])){
                $usersWithRoles[$user->id] = $user;
            }
            $usersWithRoles[$user->id]->roles[$user->id_rol] = $user->rol;
            unset($user->rol);

        }
       return $usersWithRoles;
    }

    static function updated_by($id = null){
        $id = $id ? $id : Auth::user()->id;
        $user = User::find($id);
        return $user->first_name." ".$user->last_name;
    }

    static function UpdateById($id,$array){
        if(empty($id) || empty($array)) return false;
        $row = DB::table('users')
           ->where('id',$id)
           ->update($array);
        return $row;
    }
}
