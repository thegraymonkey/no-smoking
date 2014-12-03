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
			$thread->user_id = Auth::user()->id;
			
			$thread->save();
			
			$url = route('forums.show', [$input['forum_id']]);

			return redirect($url)->with('message', 'Post Created!');
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

				return redirect($redirectTo)->with('message', 'Thread deleted!');
			}
			else
			{
				return redirect($redirectTo)->with('message', 'You dont have right to delete this Thread!');
			}
		}
		else
		{
			return redirect($redirectTo)->with('message', 'Thread does not exist!');
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

				return redirect($redirectTo)->withMessage('Thread updated!');
			}
			
			return redirect($redirectTo)->withMessage('You don\'t have right to do that!');
		}

		return redirect($redirectTo)->withErrors($validation);
	}

}