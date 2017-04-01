<?php
/**
 * Created by PhpStorm.
 * User: rrofes
 * Date: 3/27/17
 * Time: 7:22 PM
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\User;

class DashboardController extends Controller
{

    /**
     * this function will show the dashboard to an specific user
     *
     * @params int | $id
     * @return View
     *
     * @author: rafael.rofes@mybeisbol.com
     */

    function index($id=null){
        $usr = User::find($id);
        $data["name"] = $usr->first_name." ".$usr->last_name;
        return view('admin/index',$data);
    }
}