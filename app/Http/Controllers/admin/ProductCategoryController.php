<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_category = CategoryProduct::latest()->get()->where('status', true)->where('trash', false);
        return view('backend.pages.admin.products.category.index', [
            'product_category' => $product_category,
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
        $request->validate([
            'name' => 'required|unique:category_products',
        ]);


        //manage portfolio featured image by intervention image///////////////////////////////
        if ($request->hasFile('featured_img')) {
            $file = $request->File('featured_img');
            $file_name = 'category_' . md5(time() . rand()) . '.' . $file->clientExtension();

            $image = Image::make($file->getRealPath());
            $image->save(storage_path('app/public/category_photo/') . $file_name);
        } else {
            $file_name = 'empty';
        }

        /**
         * Now Here we gonna store data to database
         */
        CategoryProduct::create([
            'name'              => $request->name,
            'slug'              => $this->Slugmake($request->name),
            'featured_Photo'    => $file_name
        ]);

        /**
         * Now Let's Return back 
         */
        return back()->with('success', 'Category Created success');
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
        $category = CategoryProduct::findOrFail($id);
        $product_category = CategoryProduct::latest()->get()->where('status', true)->where('trash', false);
        return view('backend.pages.admin.products.category.index', [
            'form_type'             => 'edit_form',
            'product_category'      => $product_category,
            'category'              => $category
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
        $category_id = CategoryProduct::findOrFail($id);
        $previous_photo =  $category_id->featured_Photo;
        //validate
        $this->validate($request, [
            'name' => 'required',
            'featured_img' => 'required',
        ]);

        //image upload
        //manage portfolio featured image by intervention image///////////////////////////////
        if ($request->hasFile('featured_img')) {
            $file = $request->File('featured_img');
            $file_name = 'category_' . md5(time() . rand()) . '.' . $file->clientExtension();

            $image = Image::make($file->getRealPath());
            /**
             * here we gonna remove previous image from app folder
            */
            unlink(storage_path('app/public/category_photo/') . $previous_photo);
            $image->save(storage_path('app/public/category_photo/') . $file_name);
        } else {
            $file_name = 'empty';
        }


        //Data Update
        $category_id->update([
            'name' => $request->name,
            'featured_photo' => $file_name,
        ]);
        return back()->with('success', 'Updated Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category_id = CategoryProduct::findOrFail($id);
        $featured_photo = $category_id->featured_Photo;
          /**
          * here we gonna remove previous image from app folder
          */
        unlink(storage_path('app/public/category_photo/') . $featured_photo);
        $category_id->delete();

        return back()->with('success-main', 'Deleted Success');
    }
}
