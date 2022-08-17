<?php

namespace App\Http\Controllers\admin;

use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Show Permission page
         $permission_data = Permission::latest() -> get();
        return view('backend.pages.admin.permission.index',[
            "permission_data" => $permission_data,
            "form_type" => "create_form"
            
        ]);
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
        //Validation
        $this -> validate($request,[
            'name'  => 'required|unique:permissions'
        ]);

        //data store to permission table in  database
        Permission::create([
            'name'  => $request->name,
            'slug'  => Str::slug($request->name),
        ]);
        return back() -> with('success','Permission added success');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {     $permission_data = Permission::latest() -> get();
          $permissions_data = Permission::findOrFail($id);
        return view('backend.pages.admin.permission.index',[
            "permission_data" => $permission_data,
            "permissions_data" => $permissions_data,
            "form_type" => "edit_form"
            
        ]);
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
        //validate
        $this -> validate($request,[
            'name'  => 'required'
        ]);
        //permission update
        Permission::findOrFail($id)->update([
            'name'  => $request->name,
            'slug'  => Str::slug($request->name),
        ]);
        return redirect() -> route('permission.index')->with('success-main','Permission Updated successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //delete Permission
      Permission::findOrFail($id)-> delete();
      return back()-> with('success-main',' Permission Delete success');

    }
}
