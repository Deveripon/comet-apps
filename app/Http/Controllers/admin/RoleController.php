<?php

namespace App\Http\Controllers\admin;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        // Show Role Index File and send data to index
        $role_data = Role::get();
       $permission_data =  Permission::latest()->get();
        return view('backend.pages.admin.role.index',[
          'permission_data'  => $permission_data,
          'role_data'        => $role_data,
           'form_type'      => 'create_form'
          
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
        // validate

        $this -> validate($request,[
            'name'    => 'required|unique:roles',  
        ]);
        //data store to database
        Role::create([
            'name'           => $request-> name,
            'permissions'    => json_encode($request -> permissions),
            'slug'           => Str::slug($request-> name),

        ]);
        return back() -> with('success','Role Added Success');
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
        //edit data
        $role_id = Role::findOrFail($id);
        $role_data = Role::get();
        $permission_data =  Permission::latest()->get();
        return view('backend.pages.admin.role.index',[
          'permission_data'  => $permission_data,
          'role_data'        => $role_data,
          'form_type'      => 'edit_form',
          'role_id'         => $role_id
          
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
        //update role data
       
        Role::findOrFail($id)-> update([
            'name'  => $request -> name,
            'slug'  => Str::slug($request -> name),
            'permissions' => json_encode($request-> permissions),
        ]);
        return  redirect() -> route('role.index') -> with('success','Role Updated Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::findOrFail($id) -> delete();
        return back() -> with('success-main','data delete success');
    }
}
