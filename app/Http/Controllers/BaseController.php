<?php

namespace App\Http\Controllers;

use App\Topic;
use View;

class BaseController extends Controller {
	public function __construct() {
		$topics = Topic::all();

		View::share('topics', $topics);
	}
}