<?php

namespace App\Http\Controllers\frontend;

use App\Models\Post;
use App\Models\Settings;
use App\Models\portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categorypost;
use App\Models\Tag;

class FrontendController extends Controller
{


    //Show Home Page

    public function ShowHomePage()
    {
        $site_details = Settings::latest()->get();
        return view('frontend.pages.home', [
            'site_details'  => $site_details
        ]);
    }


    //show Home Pages
    public function ShowSinglePortfolioPage($slug)
    {
        $portfolio = portfolio::where('slug', $slug)->first();
        return view('frontend.pages.single', [
            'portfolio'   => $portfolio
        ]);
    }

    /**
     * Show Blog Page
     * --------------------------------
     * Blog Page will appear by this method when you click on the blog menu item
     */
    public function ShowBlogPage()
    {
        $posts = Post::latest()->where('status', true)->where('trash', false)->simplePaginate(4);
        return view('frontend.pages.blog', [
            'posts' => $posts
        ]);
    }


    /**
     * Show Blog post by category search
     * when someone click on the category menu items then related posts will appear in blog page
     */
    public function showBlogPostByCategory($slug)
    {
        $category =  Categorypost::where('slug', $slug)->first();
        $posts = $category->post;
        return view('frontend.pages.blog', [
            'posts' => $posts
        ]);
    }

     /**
     * Show Blog post by tag search
     * when someone click on the tag menu items then related posts will appear in blog page
     */
     public function showBlogPostBytag($slug)
     {
     $tagss = Tag::where('slug', $slug)->first();
     $posts = $tagss->post;
     return view('frontend.pages.blog', [
     'posts' => $posts
     ]);
     }

     /**
      * Show single blog post
     */
        public function showSingleBlogPost($slug)
        {
            $posts = Post::get()-> where('slug', $slug);
              return view('frontend.pages.single-blog', [
              'posts' => $posts
              ]); 
              
        }



}
