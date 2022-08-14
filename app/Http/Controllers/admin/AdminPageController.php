<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    
    //Show Admin login pages
    public function ShowLoginPage()
    {
        return view('backend.pages.login');
    }

    //Show Admin dashboard pages

    public function ShowDashboardPage()
    {
        return view('backend.pages.dashboard');
    }
}
