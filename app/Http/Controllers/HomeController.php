<?php namespace App\Http\Controllers;

use App\Post;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	$router->get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		$posts = Post::orderBy('created_at', 'desc')->paginate(10);

		return view('home.index', [
			'posts' => $posts,
			'current_page' => 'home.index'
		]);
	}

}
