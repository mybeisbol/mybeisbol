<?php

namespace App\Http\Controllers;

use App\cat_hierarchy;
use App\category_type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\category;

class Categories extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $categories = category::all();
        return view('categories/form_add_categorie')->with(['categories' => $categories]);
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
            'menu' => 'required',
        ]);

        $categoria = new category();
        $categoria->name = $request->name;
        $categoria->description = $request->description;
        $categoria->parent = $request->parent;
        $categoria->update_by = "usuario_login";
        $categoria->is_active = true;
        $categoria->id_cat_types = $request->menu;

            if($categoria->save())
                return view('home');

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
        //dd('edit');
        $categories = category::find($id);
        return view('categories/edit_categories')->with(['edit' => true, 'categories' => $categories]);
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
       // dd('update');
        $this->validate($request, [

            'name' => 'required',
            'parent' => 'required',
            'menu' => 'required',
        ]);

        $categoria = category::find($id);
        $categoria->name = $request->name;
        $categoria->description = $request->description;
        $categoria->parent = $request->parent;
        $categoria->update_by = "usuario_login";
        $categoria->is_active = true;
        $categoria->id_cat_types = $request->menu;

        if($categoria->save())
            return redirect('addcategorie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd('delete');
        $category = category::find($id);
        if($category->is_active)
        $category->is_active = false;
        else
            $category->is_active = true;

        if($category->save())
            return redirect('addcategorie');
    }
}
