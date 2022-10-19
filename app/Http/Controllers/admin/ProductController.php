<?php

namespace App\Http\Controllers\admin;

use GuzzleHttp\Utils;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use function GuzzleHttp\json_encode;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->get()->where('status', true)->where('trash', false);
        return view('backend.pages.admin.products.index', [
            'form_type'         => 'create_form',
            'products'          => $products,
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
      
        //featured image management
        if ($request->hasFile('featured_img')) {
            $files = $request->file('featured_img');
            $file_name = 'post_' . md5(time() . rand()) . '.' . $files->clientextension();
            $intervention = Image::make($files->getrealpath());
            $intervention->save(storage_path('app/public/product_image/') . $file_name);
        }
        ///////////////////////////////////////////////////////

        //gallery image management
        $gall_array = [];
        if ($request->hasFile('gallery_img')) {
            $gal_files = $request->file('gallery_img');
            foreach ($gal_files as $item) {
                $gall_name = 'gallery_' . md5(time() . rand()) . '.' . $item->clientextension();
                $inter = Image::make($item->getrealpath());
                $inter->save(storage_path('app/public/product_image/') . $gall_name);
                array_push($gall_array, $gall_name);
            }
        }

        ///////////////////////////////////////////////////////
        /**
         * Size management
         */
 /*        $size = [];
        for ($i = 0; $i < count($request->size); $i++) {
            array_push($size, [
                'size' => $request->size[$i],
                'hips' => $request->hips[$i],
                'bust' => $request->bust[$i],
                'waist' => $request->waist[$i],
            ]);
        }
      */
     
        
    
     $product = Product::create([
            'name' => $request->name,
            'slug' => $this->Slugmake($request->name),
            's_desc' => $request->s_desc,
            'p_desc' => $request->p_desc,
            'feat_image' => $file_name,
            'gallery_image' => Utils::jsonEncode($gall_array),
            'size' => Utils::jsonEncode($request -> size),
            'color' => utils::jsonEncode($request -> color),
            'r_price' => $request -> r_price,
            's_price' => $request -> sell_price,
        ]);
            /* $product->tag()->attach($request->tags); */
            $product->category()->attach($request->product_category);
            $product->tag()->attach($request->tags);

        return back() -> with('success','Product added Success');
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
