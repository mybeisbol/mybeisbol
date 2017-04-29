<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

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

    static function getOnlyIdbyUserId($id){
        $result = DB::table('user__roles')->where('id_user','=',$id)->get();
        $response = array();
        foreach ($result as $userRole){
            $response[$userRole->id_role] = true;
        }
        return $response;
    }

}
