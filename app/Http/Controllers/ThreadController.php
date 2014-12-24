<?php namespace App\Http\Controllers;

use App\Thread;
use Request;
use Auth;
use Validator;
use View;
use Str;


class ThreadController extends Controller {	
	
	public function __construct()
	{
		parent:: __construct();

		$this->middleware('auth', ['only' => ['store', 'create']]);
		
		View::share('current_page', 'forums.index');
	}

	public function show($id)
	{
		$thread = Thread::find($id);

		return view('threads.show', ['thread' => $thread]);
	}

	public function create()
	{
		return view('replies.create');
	}

	public function store()
	{
		$input = Request::all();

		$rules = [
			'forum_id' => 'required|integer',
			'title' => 'required|min:4',
			'content' => 'required|min:10',
			];

		$validation = Validator::make($input, $rules);

		if ($validation->passes())
		{

			$thread = new Thread;			
			$thread->fill($input);
			$thread->content = $input['content'];
			$thread->user_id = Auth::user()->id;
			
			$thread->save();
			
			$url = route('forums.show', [$input['forum_id']]);

			return redirect($url)->with('message', 'Tema kreirana!');
		}

		$url = route('forums.show', [$input['forum_id']]);

		return redirect($url)->withErrors($validation);
	}

	public function destroy($threadId)
	{
		$forumId = Request::get('forum_id');

		$redirectTo = route('forums.show', [$forumId]);

		if ($thread = Thread::find($threadId))
		{
			if ($thread->isDeletable(Auth::user()))
			{
				$thread->delete();

				return redirect($redirectTo)->with('message', 'Tema obrisana!');
			}
			else
			{
				return redirect($redirectTo)->with('message', 'Nemate prava da obrišete ovu temu!');
			}
		}
		else
		{
			return redirect($redirectTo)->with('message', 'Tema ne postoji!');
		}
	}

	public function edit($id)
	{
		$thread = Thread::find($id);
		return view('threads.edit')->with('thread', $thread);
	}

	public function update($id)
	{		
		$input = Request::all();
		
		$threadId = array_get($input, 'thread_id');
		$redirectTo = route('threads.show', [$threadId]);

		$rules = [
			'content' => 'required|min:4',
			'title' => 'required|min:2'
		];

		$validation = Validator::make($input, $rules);

		if ($validation->passes())
		{

			$thread = Thread::find($id);
			
			if ($thread instanceof Thread)
			{
				$thread->fill($input);
				$thread->content = strip_tags($input['content'], '<a><p><b>');
				$thread->save();

				return redirect($redirectTo)->withMessage('Tema izmenjena!');
			}
			
			return redirect($redirectTo)->withMessage('Nemate prava da menjate ovu temu!');
		}

		return redirect($redirectTo)->withErrors($validation);
	}

}