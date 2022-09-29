<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use function PHPUnit\Framework\countOf;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $category = Category::latest() -> get();
        $portfolio = Portfolio::latest() -> get();
        return view('backend.pages.admin.portfolios.index',[
        'portfolio' => $portfolio,
        'form_type'  => 'create_form',
        'category'   => $category,
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
          //Validation/////////////////////////////////////////////////////////////////////
       $this -> validate($request,[
                'title'              =>'required',
                'featured_img'      =>'required',
                'p_category'      =>'required',
        ]); 

        //Manage Project Steps/////////////////////////////////////////
        $steps = [];
        if($request -> step_title){
            for($i = 0; $i < count($request -> step_title); $i++){
               
                array_push($steps,[
                     'title' => $request -> step_title[$i],
                    'description' => $request -> step_desc[$i],
                ]);
            }
        }
     //manage portfolio featured image by intervention image///////////////////////////////

        if($request ->hasFile('featured_img')){
            $featured = $request ->file('featured_img');
            $file_name = time().rand().'.'.$featured -> clientExtension();

            $image = Image::make($featured -> getRealPath());
            $image -> save(storage_path('app/public/portfolio_img/featured_img/').$file_name);
        }else{
            $file_name = 'avater.png';
        }
        
    // manage portfolio gallery image gallery/////////////////////////////////////////////

        $gallery_files = [];
      if($request -> hasFile('gallery_img')){
        $gallery = $request -> file('gallery_img');
        foreach($gallery as $item){
            $item_name = rand().time().'.'.$item ->clientExtension();
            $image = Image::make($item -> getRealPath());
            $image -> save(storage_path('app/public/portfolio_img/gallery_img/').$item_name);
            array_push($gallery_files, $item_name);
        } 
     }else{
        $file_name = 'avater.png';
     }
     
//data store to database ///////////////////////////////////////////////////////
  $portfolios =   Portfolio::create([
        'title'              => $request -> title,
        'slug'               => Str::slug($request -> title),
        'type'               => $request -> type,
        'featured_img'       => $file_name,
        'gallery_img'        => json_encode($gallery_files ),
        'steps'              => json_encode($steps),
        'client'             => $request -> client,
        'sub_date'           => $request -> sub_date,
        'p_link'             => $request -> p_link,
        'p_desc'             => $request -> p_desc,
    ]);

    ////attachemt for relation table//////////////////////////////////
    $portfolios ->category()->attach($request ->p_category);


//////////return back ///////////////////////////////////////////////////
        return  back() -> with('success','Portfolio added successfully');
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
       $portfolio = portfolio::findOrFail($id);
       $portfolio->delete();
       return back() -> with('success_main', 'Successfully deleted');
    }
}