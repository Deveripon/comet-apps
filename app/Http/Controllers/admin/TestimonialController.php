<?php

namespace App\Http\Controllers\admin;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonial_item = Testimonial::latest()->get();
        return view('backend.pages.admin.testimonial.index',[
            "testimonial_item" => $testimonial_item,
            "form_type"         => "create_form"
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
            'testimonial'         => 'required',
            'name'                => 'required',
            'company'             => 'required'
        ]);
        //data to be stored
        Testimonial::create([
            'testimonial'         => $request -> testimonial,
            'name'                => $request -> name,
            'company'             => $request -> company
        ]);
        //return back
        return back()->with('success','saved');
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
        $testimonial = Testimonial::findOrFail($id);
        $testimonial_item = Testimonial::latest()->get();
        return view('backend.pages.admin.testimonial.index',[
            "testimonial_item" => $testimonial_item,
            "form_type"         => "edit_form",
            "testimonial"       => $testimonial,
            
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
        //get id
        $update_item = Testimonial::findOrFail($id);
        //validate  
        $this -> validate($request,[
            'testimonial'    => 'required',
            'name'           => 'required',
            'company'        => 'required',
        ]);
        //update item
        $update_item ->update([
            'testimonial'    => $request -> testimonial,
            'name'           => $request -> name,
            'company'        => $request -> company,
        ]);

        //return back
        return back() ->with('success','Updated Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Testimonial::findOrFail($id)->delete();
        return back()-> with('success-main','deleted Success');
    }
}
