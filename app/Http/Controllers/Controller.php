<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use View;
use App\Thread;

abstract class Controller extends BaseController {

	use ValidatesRequests;

	public function __construct()
	{
		$lastThreads = Thread::orderBy('created_at', 'desc')->take(5)->get();

		View::share('last_threads', $lastThreads);
		View::share('current_page', 'home.index');
	}

}
