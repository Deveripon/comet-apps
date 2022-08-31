<?php

namespace App\Http\Controllers\admin;

use App\Models\Role;
use App\Models\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Notifications\UserAccountNotification;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role_data = Role::latest() -> get();
        $user_data = admin::latest()-> get() ->whereNotIn('name','Super Admin');
        return view('backend.pages.admin.user.index',[
            'role_data'  => $role_data,
            'user_data'  => $user_data,
            'form_type'  => 'create_form'

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

        // validate form
        $this -> validate($request,[
            'name'           => 'required', 
            'email'          => 'required|unique:admins', 
            'cell'           => 'required|unique:admins', 
            'username'       => 'required|unique:admins', 
            'user_role'      => 'required', 
        ]);


        //generate random passwords

        $random_string_pass =  str_shuffle("abcdefghijklmnopqrstuvwxyz1234567890!@#$%^&*()_+");
        $password = substr($random_string_pass, 10,8);

       $admin_user =  admin::create([
            'name'        => $request -> name,
            'email'       => $request -> email,
            'cell'        => $request -> cell,
            'username'    => $request -> username,
            'role_id'     => $request -> user_role,
            'password'    =>Hash::make($password),
        ]);
        

        //getting User Info
        $data = [
            'name'  => $admin_user->name,
            'email'  => $admin_user->email,
            'cell'  => $admin_user->cell,
            'username'  => $admin_user->username,
            'password'  => $password,
        ];


        // send notification to user
        $admin_user -> notify(new UserAccountNotification($data));

        return back()-> with('success','User Added Success');





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
    {
        $edit_data = admin::findOrFail($id);
        $role_data = Role::latest() -> get();
        $user_data = admin::latest()-> get() ->whereNotIn('name','Super Admin');
        return view('backend.pages.admin.user.index',[
            'edit_data'  =>$edit_data,
            'role_data'  => $role_data,
            'user_data'  => $user_data,
            'form_type'  => 'edit_form'
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

        // //validate the update
        // $this -> validate($request,[
        //     'name'           => 'required', 
        //     'email'          => 'required', 
        //     'cell'           => 'required', 
        //     'username'       => 'required', 
        //     'user_role'      => 'required' 
        // ]);

        // $update_data = admin::findOrFail($id);
        // $update_data -> update([
        //     'name'        => $request -> name,
        //     'email'       => $request -> email,
        //     'cell'        => $request -> cell,
        //     'username'    => $request -> username,
        //     'role_id'     => $request -> user_role,
        // ]);
        // return back() -> with('success','data updated success');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_data = admin::findOrFail($id);
        $user_data -> delete();
        return back() -> with('success-main','Deleted Success');
    }



    /**
     * 
     *    //user status update
    */
    public function stausUpdate($id)
    {
        $user_data = admin::latest()-> get() ->whereNotIn('name','Super Admin',);
        $user = admin::findOrFail($id);

        if($user -> status){
            $user -> update([
                'status'    =>  false,
            ]);
        }else{
            $user -> update([
                'status'    =>  true,
            ]);
        }
        return back() -> with('success-main','status updated');
    }

    /**
     * User trash update
    **/
    public function trashUpdate($id)
    {
        $user = admin::findOrFail($id);
        if($user -> trash == false){
            $user -> update([
                'trash'     => true,
                'status'    => false
            ]);
        }
        return back() -> with('success-main','Moved To Trash');
        
    }



    /**
     * User Restrore From Trash
    */
    public function trashRestore($id)
    {
        $user = admin::findOrFail($id);
        if($user -> trash){
            $user -> update([
                'trash'     => false,
                'status'    => true
            ]);
        }
        return back() -> with('success-main','Restore Success');
        
    }

    /***
     * Show Trash Page
    */
    public function ShowTrashPage()
    {
        
          $role_data = Role::latest() -> get();
          $user_data = admin::latest()-> get() ->whereNotIn('name','Super Admin');
        return view('backend.pages.admin.user.trash.index',[
            'role_data'  => $role_data,
            'user_data' => $user_data
        ]);
    }



    /**
     * Show Profile Page
    */
    public function ShowProfilePage()
    {
        return view('backend.pages.admin.profile.index');
    }

/***
 * Update User Profile
*/
    public function UpdateProfile(Request $request, $id)
    {
       $user = admin::findOrFail($id);

        $user -> update([

            'name'                    => $request->name,
            'email'                   => $request->email,
            'date_of_birth'           => $request->date_of_birth,
            'cell'                    => $request->cell,
            'location'                => $request->location,
            'bio'                     => $request ->bio 
            ]); 

        return back() -> with('success','Data updated success');

    }


    /***
 * Update User Profile photo
*/
public function UpdateProfilePic(Request $request, $id)
{
   $user = admin::findOrFail($id);




    //photo change process
    if($request -> hasFile('photo')){

        // unlink('storage/admin_photo/'.$user-> photo);
        $img = $request ->File('photo');
        $file_name = md5(time().'_'.rand()).'.'.$img ->clientExtension();       
        $img -> move(storage_path('app/public/admin_photo/'),$file_name);

        

    }else{
        $file_name = 'avater.png';
    }

    $user -> update([

        'photo'                   => $file_name  
        ]); 

    return back() -> with('success','Data updated success');

}


/**
 * Show Settings Pages
 * 
*/
public function ShowSettingsPage()
{
    return view('backend.pages.admin.settings.index');
}

/**
 * Change Password
*/

public function ChangePassword(Request $request)
{
    $this -> validate($request,[
        'old_pass'      => 'required',
        'pass'          => 'required|confirmed'
    ]);

    // check old password
$user = admin::findOrFail(Auth::guard('admin')-> user()->id);
 $old_pass =  $request -> old_pass;
 $user_pass = Auth::guard('admin')-> user()-> password; 

 if(password_verify($old_pass,$user_pass)){
    $user -> update([
        'password'  =>Hash::make($request-> pass),
    ]);

    return back()-> with('success','password Changed Success');
 }else{
    return back()->with('warning','Password Not Matched');
 }




}




}
