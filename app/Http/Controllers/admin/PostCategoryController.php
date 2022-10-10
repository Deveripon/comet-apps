<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Str;
use App\Models\Categorypost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post_category = Categorypost::latest()->get()->where('status', true)->where('trash', false);
        return view('backend.pages.admin.post.category.index', [
            'post_category'  => $post_category,
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
        $this->validate($request, [
            'name' => 'required|unique:categoryposts',
        ]);

        //Data store in the database
        Categorypost::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        //return back 
        return back()->with('success', 'Post Category added successfully');
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
         $post_category = Categorypost::latest() -> get() -> where('status',true)->where('trash',false);
        $category_id = Categorypost::findOrFail($id);
        return view('backend.pages.admin.post.category.index',[
            'post_category'  => $post_category,
            'category_id'  => $category_id,
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
        $category_id = CategoryPost::findOrFail($id);
        //Data store in the database
        $category_id ->Update([
            'name' => $request-> name,
            'slug' => Str::slug($request-> name),
        ]);

        //return back 
        return back() ->with('success','Post Category Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $post_category = CategoryPost::findOrFail($id);
        $post_category->delete();
        return back() -> with('success_main', 'Successfully deleted'); 
    }
}
