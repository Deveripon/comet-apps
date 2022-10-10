<?php

namespace App\Http\Controllers\admin;

use App\Models\Tag;
use App\Models\PostTag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $tags = Tag::latest() -> get() -> where('status',true)->where('trash',false);
        return view('backend.pages.admin.post.tags.index',[
            'tags'  => $tags,
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
         //validate the request
        $this -> validate($request,[
            'name' =>'required|unique:tags',
        ]);

        //Data store in the database
        Tag::create([
            'name' => $request-> name,
            'slug' => Str::slug($request-> name),
        ]);

        //return back 
        return back() ->with('success','Post Category added successfully');
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
        $tags = Tag::latest() -> get() -> where('status',true)->where('trash',false);
        $tags_id = Tag::findOrFail($id);
        return view('backend.pages.admin.post.tags.index',[
            'tags'  => $tags,
            'tags_id'  => $tags_id,
            'form_type'  => 'edit_form',
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
         //validate the request
        $this -> validate($request,[
            'name' =>'required',
        ]);

        //Data find by id
        $tags_id = Tag::findOrFail($id);
        //Data store in the database
        $tags_id ->Update([
            'name' => $request-> name,
            'slug' => Str::slug($request-> name),
        ]);

        //return back 
        return back() ->with('success','Post Tag Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tags = Tag::findOrFail($id);
        $tags->delete();
        return back() -> with('success_main', 'Successfully deleted');
    }
}
