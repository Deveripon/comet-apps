<?php

namespace App\Http\Controllers\frontend;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Product;
use App\Models\Settings;
use App\Models\portfolio;
use App\Models\Categorypost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use App\Models\TagProduct;

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

        /**
         * lets show shop page
        */
        public function showProductPage()
        { $product = Product::latest()->get();
            return view('frontend.pages.shop',[
              "product" => $product
            ]);
        }

        /**
         * Show Products by category
        */
        public function showProductByCategory($slug)
        {
          $category = CategoryProduct::where('slug', $slug)->first();
          $product = $category->product;

            return view('frontend.pages.shop',[
                "product" =>   $product
            ]);
        }

        /**
         * Show Products by tag
         * 
        */
        public function showProductByTag($slug)
        {
           $tags = TagProduct::where('slug', $slug)->first();
            $product = $tags->product;
               return view('frontend.pages.shop',[
               "product" => $product
               ]);
        }

        /**
         * Show Single Product
         * 
        */
        public function showSingleProduct($slug)
        {
            $product = Product::get()->where('slug', $slug);
            return view('frontend.pages.product',[
                'product' =>    $product
            ]);
        }





}
