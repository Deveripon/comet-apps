<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view
        $category = Category::latest()->get();
        return view('backend.pages.admin.category.index',[
            'category' => $category,
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
        
        //validate the requests
        $this -> validate($request,[
            'title' => ['required','unique:categories'],
        ]);
        
    
        //data store to database
        Category::create([
            'title' => $request->title,
            'slug'  =>Str::slug($request->title),
        ]);


        //return back
        return back()->with('success','Category added successfully');
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
         $category_id = Category::findOrFail($id);
         $category = Category::latest()->get();
        return view('backend.pages.admin.category.index',[
            'category' => $category,
            'form_type' => 'edit_form',
            'category_id' => $category_id,
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
        $category = Category::findOrFail($id);
          //validate the requests
        $this -> validate($request,[
            'title' => ['required',],
        ]);
        
    
        //data store to database
        $category -> update([
            'title' => $request->title,
            'slug'  =>Str::slug($request->title),
        ]);


        //return back
        return back()->with('success','Category Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Category::findOrFail($id);
        $categories -> delete();
        return back() -> with('success','Deleted');
    }
}