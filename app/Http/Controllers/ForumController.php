<?php namespace App\Http\Controllers;

use App\Forum;
use View;

class ForumController extends Controller {

	public function __construct()
	{
		parent:: __construct();
		
		View::share('current_page', 'forums.index');
	}

	public function index()
	{
		$forums = Forum::all();

		return view('forums.index', compact('forums'));
	}

	public function show($id)
	{
		$forum = Forum::find($id);

		return view('forums.show', compact('forum'));
	}

}