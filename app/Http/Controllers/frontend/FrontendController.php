<?php

namespace App\Http\Controllers\frontend;

use App\Models\Settings;
use App\Models\portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    

    //Show Home Page

    public function ShowHomePage()
    {
        $site_details = Settings::latest()->get();
       return view('frontend.pages.home',[
        'site_details'  => $site_details
       ]);
    }

    
   //show Home Pages
    public function ShowSinglePortfolioPage($slug)
    {
    $portfolio = portfolio::where('slug', $slug) -> first();
    return view('frontend.pages.single',[
        'portfolio'   => $portfolio
    ]);
    }

 
}