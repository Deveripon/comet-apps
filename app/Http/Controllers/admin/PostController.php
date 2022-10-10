<?php

namespace App\Http\Controllers\admin;

use App\Models\Tag;
use App\Models\Post;
use App\Models\PostTag;
use Illuminate\Support\Str;
use App\Models\CategoryPost;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::latest()->get()->where('status', true)->where('trash', false);
        $post_category = CategoryPost::latest()->get()->where('status', true)->where('trash', false);
        $posts = Post::latest()->get()->where('status', true)->where('trash', false);
        return view('backend.pages.admin.post.index', [
            'posts' => $posts,
            'form_type' => 'create_form',
            'post_category'    => $post_category,
            'tags' => $tags

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
         //validate request
          $this -> validate($request,[
            'title' =>'required',
            'p_desc' =>'required',
        ]);

        //featured image management
        if ($request->hasFile('featured_img')) {
            $files = $request->file('featured_img');
            $file_name = 'post_' . md5(time() . rand()) . '.' . $files->clientextension();
            $intervention = Image::make($files->getrealpath());
            $intervention->save(storage_path('app/public/post_image/') . $file_name);
        }
        ///////////////////////////////////////////////////////

        //gallery image management
        $gall_array = [];
        if ($request->hasFile('gallery_img')) {
            $gal_files = $request->file('gallery_img');
            foreach ($gal_files as $item) {
                $gall_name = 'gallery_' . md5(time() . rand()) . '.' . $item->clientextension();
                $inter = Image::make($item->getrealpath());
                $inter->save(storage_path('app/public/post_image/') . $gall_name);
                array_push($gall_array, $gall_name);
            }
        }
        ///////////////////////////////////////////////////////

        $featured = [
            'post_type'      => $request->post_type,
            'video_post'     => $this -> embed_link($request -> video),
            'audio_post'     => $request->audio,
            'gallery_post'   => json_encode($gall_array),
            'standard_post'  => $file_name ?? '',

        ];
        //data store to database
        /////////////////////////////////////////////
        $posts =  Post::create([
            'admin_id'       => Auth()->guard('admin')->user()->id,
            'title'          => $request->title,
            'slug'           => Str::slug($request->title),
            'content'        => $request->p_desc,
            'featured'       => json_encode($featured),
            'post_type'      => $request->post_type,
        ]);
        $posts->tag()->attach($request->tags);
        $posts->category()->attach($request->category_post);



        return back()->with('success', 'success');
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
        $posts =  Post::findOrFail($id) -> delete();
        return back()->with('success_main','Deleted success');
    }
}
