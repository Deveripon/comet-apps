<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TagProduct;
use Illuminate\Http\Request;

class ProductTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $tags = TagProduct::latest() -> get()->where('status', true)->where('trash', false);
        return view('backend.pages.admin.products.tags.index',[
            'tags' => $tags,
            'form_type'  => 'create_form',
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
        $request -> validate([
            'name' =>'required',
        ]);
        /**
         * here we gonna store data to the database
        */
        TagProduct::create([
            'name' => $request->name,
            'slug' => $this -> Slugmake($request->name)
        ]);

        /**
         * return back
        */
        return back()->with('success', 'Tag added!');

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
        $tags_id = TagProduct::findOrFail($id);
        $tags = TagProduct::latest() -> get()->where('status', true)->where('trash', false);
        return view('backend.pages.admin.products.tags.index',[
        'tags' => $tags,
        'form_type' => 'edit_form',
        'tags_id' => $tags_id,
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
        /**
         * validate the request
        */
        $request -> validate([
            'name' =>'required',
        ]);

        /**
         * here we gonna find data form the database
        */
        TagProduct::find($id) -> update([
            'name' => $request->name,
           'slug' => $this -> Slugmake($request->name)
        ]);
        
        /**
         * lets return back 
        */
        return back()->with('success', 'Tag updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TagProduct::findOrFail($id) -> delete();
        return back()-> with('success-main','Tag Deleted Success');
    }
}
