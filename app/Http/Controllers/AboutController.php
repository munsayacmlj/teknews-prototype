<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AboutController extends BaseController
{
    public function getAboutPage()
    {
    	if (Auth::check()) {
			$user = str_replace(" ", "-", strtolower(Auth::user()->name));
			return view('pages/about', compact('user'));
		}
		return view('pages/about');
    }
}
