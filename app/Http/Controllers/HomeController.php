<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function getHomePage()
    {
        if (Auth::check()) {
             $user = str_replace(" ", "-", strtolower(Auth::user()->name));
             return view('home', compact('user'));
         }
         return view('home', compact('topics'));
    }
}
