<?php

namespace App\Http\Controllers\admin;

use App\Models\Expertise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExpertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        
         $expertise = Expertise::latest()->get()->where('status', '=', true );
        return view('backend.pages.admin.expertise.index',[
            'expertise' => $expertise,
            'form_type' => 'create_form'
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
        //data validate
        $this -> validate($request,[
            'title'               => 'required',
            'description'         => 'required',
            'icon'                => 'required'
        ]);

        //data store
        Expertise::create([
            'title'               => $request -> title,
            'desc'                => $request -> description,
            'icon'                => $request -> icon,  
        ]);

        //return back
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
    {
        $expertise_id = Expertise::findOrFail($id);
        $expertise = Expertise::latest()->get()->where('status', '=', true );
        return view('backend.pages.admin.expertise.index',[
            'expertise'         => $expertise,
            'form_type'         => 'edit_form',
            'expertise_id'      => $expertise_id
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
        //destroy
        $expertise_id = Expertise::findOrFail($id) -> delete();
        //return back
        return back() -> with('success-main','deleted success');
    }
}
