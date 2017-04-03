<?php

namespace App\Http\Controllers;

use App\Privilege;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = category::all();
        Privilege::$list;
        return view('admin/category/show_category')->with(['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->slug);
        $this->validate($request, [

            'name' => 'required',
            'parent' => 'required',
            'order' => 'required',
            'type' => 'required',
        ]);

        $categoria = new Category();
        $categoria->name = $request->name;
        $categoria->description = $request->description;
        $categoria->parent = $request->parent;
        $categoria->update_by = Auth::user()->firt_name." ".Auth::user()->last_name;
        $categoria->is_active = true;
        $categoria->order = $request->order;
        $categoria->cat_type = 1;

        if($categoria->save()){
            $categories = category::all();
            return view('admin/category/show_category')->with(['categories' => $categories]);
        }

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

        $categories = category::find($id);
       // dd($categories->name);
        return view('admin/category/show_category')->with(['edit' => true, 'categories' => $categories]);
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
        $this->validate($request, [

            'name' => 'required',
            'parent' => 'required',
            'order' => 'required',
            'type' => 'required',
        ]);

        $categoria = category::find($id);
        $categoria->name = $request->name;
        $categoria->description = $request->description;
        $categoria->parent = $request->parent;
        $categoria->update_by = Auth::user()->firt_name." ".Auth::user()->last_name;
        $categoria->is_active = true;
        $categoria->order = $request->order;
        $categoria->cat_type = 1;

        if($categoria->save()){
            $categories = category::all();
            return view('admin/category/show_category')->with(['categories' => $categories]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = category::find($id);
        if($categories->is_active)
            $categories->is_active = false;
        else
            $categories->is_active = true;

        if($categories->save())
             return view('admin/category/show_category')->with(['categories' => $categories]);
    }
}
