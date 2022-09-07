<?php

namespace App\Http\Controllers\admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider_item = Slider::latest()-> get();
        return view('backend.pages.admin.slider.index',[
            'form_type'         => 'create_form',
            'slider_item'       => $slider_item,
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


        $buttons = [];

        for($i = 0; $i < count($request -> btn_name); $i++ ){
            array_push($buttons,[
                'btn_name'  =>      $request -> btn_name[$i],
                'btn_link'  =>      $request -> btn_link[$i],
                'btn_type'  =>      $request -> btn_type[$i]
            ]);
        }
    

        $this -> validate($request,[           
            'photo'      => 'required',
        ]);

        // photo management 
        if($request-> hasFile('photo')){
            $image = $request->File('photo');
            $file_name = md5(time().rand()).'.'.$image ->clientExtension();
            // $intervention = Image::make($image -> getRealPath());
            // $intervention -> save(storage_path('app\public\slider_image\slide_').$file_name);
            $image->move(storage_path('app/public/slider_image/'), $file_name);
        }
        // data store to database

        Slider::create([
            'title'     => $request ->title,
            'subtile'     => $request ->subtitle,
            'photo'     => $file_name,
            'buttons'   => json_encode($buttons)
        ]);
        return back() -> with('success','Saved');

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
        $slide = Slider::findOrFail($id);
        $slider_item = Slider::latest()-> get();
        return view('backend.pages.admin.slider.index',[
            'form_type'         => 'edit_form',
            'slider_item'       => $slider_item,
            'slide'             => $slide,
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
        $slide = Slider::findOrFail($id);


        //buttons management
        $buttons = [];

        for($i = 0; $i < count($request -> btn_name); $i++ ){
            array_push($buttons,[
                'btn_name'  =>      $request -> btn_name[$i],
                'btn_link'  =>      $request -> btn_link[$i],
                'btn_type'  =>      $request -> btn_type[$i]
            ]);
        }
    
        //validate
        $this -> validate($request,[           
            'photo'      => 'required',
        ]);

        // photo management 
        if($request-> hasFile('photo')){
            $image = $request->File('photo');
            $file_name = md5(time().rand()).'.'.$image ->clientExtension();
            // $intervention = Image::make($image -> getRealPath());
            // $intervention -> save(storage_path('app\public\slider_image\slide_').$file_name);
            $image->move(storage_path('app/public/slider_image/'), $file_name);
        }
        // data store to database


        $slide -> update([
            'title'     => $request ->title,
            'subtile'   => $request ->subtitle,
            'photo'     => $file_name,
            'buttons'   => json_encode($buttons)
        ]);
        return back() -> with('success','Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide_id = Slider::findOrFail($id);
        $slide_id -> delete();
        return back() -> with('success-main','Deleted Success');
    }
}
