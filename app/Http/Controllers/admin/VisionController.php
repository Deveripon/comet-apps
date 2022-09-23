<?php

namespace App\Http\Controllers\admin;

use App\Models\Vision;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visions = Vision::latest()-> get()->where('status', true)->where('trash',false)->take(4);
        return view('backend.pages.admin.vision.index',[
            'visions'  => $visions,
            'form_type' => 'create_form',
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
        //validate the request
        $this -> validate($request,[
        'title'         =>'required',
        'desc'          =>'required',
        ]);
        //data stored in database  
        Vision::create([
            'title'         =>$request->title,
            'desc'          =>$request->desc,
        ]);
        //return
        return back() -> with('success','Vision added successfully');
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