<?php

namespace App\Http\Controllers\admin;

use App\Models\Client;
use App\Models\clientsmodel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $clients_data = clientsmodel::latest()->get();
        return view('backend.pages.admin.client.index',[
            "clients_data"       => $clients_data,
            "form_type"      => "create_form",
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
        //validate
        $this ->validate($request,[
            'photo'     => 'required',
        ]);
        //image upload
        if($request->hasFile('photo')){
            $photo  = $request->file('photo');
            $file_name = md5(time().rand()).'.'.$photo -> clientExtension();
            $photo -> move(storage_path('app/public/client'),$file_name);
        }else{
            $file_name = "Client Logo";
        }

        //data Store
        clientsmodel::create([
            'name'  => $request -> name,
            'company'  => $request -> company,
            'logo'  => $file_name,
        ]);

        return back() -> with('success','Success');
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
    {   $client_data = clientsmodel::findOrFail($id);
        $clients_data = clientsmodel::latest()->get();
        return view('backend.pages.admin.client.index',[
            "clients_data"       => $clients_data,
            "client_data"         => $client_data,
            "form_type"      => "edit_form",
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
         $this ->validate($request,[
            'photo'     => 'required',
        ]);
        //image upload
        if($request->hasFile('photo')){
            $photo  = $request->file('photo');
            $file_name = md5(time().rand()).'.'.$photo -> clientExtension();
            $photo -> move(storage_path('app/public/client'),$file_name);
        }else{
            $file_name = "Client Logo";
        };

        //Data Update
        clientsmodel::findOrFail($id)->update([
            'name'      => $request -> name,
            'company'   => $request -> company,
            'logo'      => $file_name,
        ]);
        return back()->with('success','Updated Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_data = clientsmodel::findOrFail($id);
        $delete_data -> delete();
        return back() -> with('success-main','Deleted Success');
    }
}
