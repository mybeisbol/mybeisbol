<?php
/**
 * Created by PhpStorm.
 * User: rrofes
 * Date: 3/27/17
 * Time: 7:22 PM
 */

namespace App\Http\Controllers;
use App\Privilege;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


use App\User;

class DashboardController extends Controller
{
    use AuthenticatesUsers;

    /**
     * this function will show the dashboard to an specific user
     *
     * @params int | $id
     * @return View
     *
     * @author: rafael.rofes@mybeisbol.com
     */

    function index(){

        $data = array();
        $data['privileges'] = Privilege::getPrivileges(Auth::user()->id);
        return view('admin/index', $data);
    }
}