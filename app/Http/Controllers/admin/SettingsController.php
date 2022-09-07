<?php

namespace App\Http\Controllers\admin;

use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $site_details = Settings::latest()->get();
       return view('backend.pages.admin.settings.index',[
        'site_details'  => $site_details
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

        // logo upload  system

        if($request->hasFile('logo')){
            $logo = $request -> file('logo');
            $logo_name = md5(time().rand()).'.'.$logo -> clientExtension();
            $logo -> move(storage_path('app/public/logo'),$logo_name);
        }else{
            $logo_name = 'Logo';
        };


          //favicon upload  system

          if($request->hasFile('favicon')){
            $favicon = $request -> file('favicon');
            $favicon_name = md5(time().rand()).'.'.$favicon -> clientExtension();
            $favicon -> move(storage_path('app/public/logo'),$favicon_name);
        }else{
            $favicon_name = 'favicon';
        };

        Settings::create([
            'name'      	 => $request -> name, 
            'tagline'        => $request -> tagline, 
            'logo'           => $logo_name,
            'favicon'        => $favicon_name,
            'facebook'       => $request -> facebook,
            'twitter'        => $request -> twitter,
            'linkedin'       => $request -> linkedin,
            'github'         => $request -> github,
            'dribble'        => $request -> dribble,
            'behance'        => $request -> behance,
        ]);

        return back()-> with('success','Saved');
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
        //
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
    public function destroy($id)
    {
        //
    }
}
