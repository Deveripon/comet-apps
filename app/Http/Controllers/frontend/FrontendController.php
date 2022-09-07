<?php

namespace App\Http\Controllers\frontend;

use App\Models\Settings;
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
}
