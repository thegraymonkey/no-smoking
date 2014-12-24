<?php namespace App\Http\Controllers;

use App\Forum;
use View;
use Request;
use Auth;
use Validator;

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

	public function create()
	{
		return view('forums.create');
	}

	public function store()
	{
		$input = Request::all();

		$rules = [			
			'topic' => 'required|min:4',
			'description' => 'required|min:5',
			];

		$validation = Validator::make($input, $rules);

		if ($validation->passes())
		{
			$forum = new Forum;			
			$forum->topic = $input['topic'];	
			$forum->description = $input['description'];							
			$forum->save();
			
			$url = route('forums.index');

			return redirect($url)->with('message', 'Nova sekcija foruma kreirana!');
		}

		$url = route('forums.index');

		return redirect($url)->withErrors($validation);
	}
	

	public function edit($id)
	{
		$forum = Forum::find($id);
		return view('forums.edit')->with('forum', $forum);
	}

	public function update($id)
	{
		$input = Request::all();
		
		$forumId = array_get($input, 'id');
		
		$redirectTo = route('forums.show', [$forumId]);

		$rules = [
			'topic' => 'required|min:4',
			'description' => 'required|min:5',
		];

		$validation = Validator::make($input, $rules);

		if ($validation->passes())
		{

			$forum = Forum::find($id);
			
			if ($forum instanceof Forum)
			{
				$forum->description = $input['description'];
				$forum->topic = $input['topic'];
				$forum->save();

				return redirect($redirectTo)->withMessage('Sekcija foruma izmenjena!');
			}
			
			return redirect($redirectTo)->withMessage('Nemate prava da menjate ovu sekciju foruma!');
		}

		return redirect($redirectTo)->withErrors($validation);
	}

	public function destroy($forumId)
	{
		
		$redirectTo = route('forums.index');

		if ($forum = Forum::find($forumId))
		{
			if (Auth::user()->isAdmin())
			{
				$forum->delete();

				return redirect($redirectTo)->with('message', 'Sekcija foruma obrisana!');
			}
			else
			{
				return redirect($redirectTo)->with('message', 'Nemate prava da obrišete ovu sekciju foruma!');
			}
		}
		else
		{
			return redirect($redirectTo)->with('message', 'Sekcija foruma ne postoji!');
		}
	}

}