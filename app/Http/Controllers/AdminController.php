<?php

namespace App\Http\Controllers;

use App\Privilege;
use App\Role;
use App\User;
use App\User_Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use JavaScript;


class AdminController extends Controller
{

    public function javascript(){

        JavaScript::put([
            'testname' => 'bonstutorial'
        ]);

        return view('test');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Privilege::getPrivileges();
        $data = array();
        $data['admins'] = User::GetUserWithRoles();
        $data['msg'] = "Error";

        return view('admin/admin/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Privilege::getPrivileges();
        $data = array();
        $data['action'] = "Adicionar";
        return view('admin/admin/manage',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Privilege::getPrivileges();
        $data = array();

        $toInsert = [
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'email'         => $request->email,
            'age'           =>$request->age,
            'gender'        => $request->gender,
            'updated_by'    => User::updated_by()
        ];

        if(!empty($request->password)){
            $toInsert['password'] = bcrypt($request->password);
        }

        $user = User::create($toInsert);

        foreach ($request->roles as $rol)
            User_Role::create([
                'id_user' => $user->id,
                'id_role' => $rol
            ]);

        $data['admins'] = User::GetUserWithRoles();

        JavaScript::put([
            'full_name'     => $toInsert['first_name']." ". $toInsert['last_name'],
            'type'          => 'added'
        ]);

        return view('admin/admin/index', $data);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Privilege::getPrivileges();
        $data = array();
        $data['action'] = "Editar";
        $data['user'] = User::find($id);
        $data['roles'] = User_Role::getOnlyIdbyUserId($id);
        return view('admin/admin/manage',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $updated = User::UpdateById($id,["is_active" => $request->active == 'true' ? 1 : 0]);
        if(empty($updated))
            return $this->returnAjaxError();
        return $this->returnAjaxSuccess();

    }


}
