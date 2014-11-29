<?php namespace App\Http\Controllers;

use Request;
use Auth;
use App\Reply;
use Validator;


class ReplyController extends Controller {

	public function __construct()
	{
		parent:: __construct();
		
		$this->middleware('auth', ['only' => 'store']);
	}

	public function create()
	{
		return view('replies.create');
	}
	
	public function store()
	{
		$input = Request::all();
		
		$rules = [
		'thread_id' => 'required|integer',
		'content' => 'required|min:4',
		];

		$validation = Validator::make($input, $rules);

		if ($validation->passes())
		{
			$reply = new Reply;
			$reply->fill($input);
			$reply->user_id = Auth::user()->id;
			$reply->save();
			
			$url = route('threads.show', [$input['thread_id']]);
			return redirect($url)->with('message', 'Reply Posted!');
		}

		$url = route('threads.show', [$input['thread_id']]);

		return redirect($url)->withErrors($validation);
	}

	public function destroy($replyId)
	{
		$threadId = Request::get('thread_id');
		$redirectTo = route('threads.show', [$threadId]);

		if ($reply = Reply::find($replyId))
		{
			if ($reply->user_id === Auth::user()->id)
			{
				$reply->delete();

				return redirect($redirectTo)->with('message', 'Reply deleted!');
			}
			else
			{
				return redirect($redirectTo)->with('message', 'You dont have right to delete this Reply!');
			}
		}
		else
		{
			return redirect($redirectTo)->with('message', 'Reply does not exist!');
		}
	}

	public function edit($id)
	{
		$reply = Reply::find($id);
		return view('replies.edit')->with('reply', $reply);
	}

	public function update($id)
	{		
		$input = Request::all();
		
		$threadId = array_get($input, 'thread_id');
		$redirectTo = route('threads.show', [$threadId]);

		$rules = [
			'content' => 'required|min:4'
		];

		$validation = Validator::make($input, $rules);

		if ($validation->passes())
		{

			$reply = Reply::find($id);
			
			if ($reply instanceof Reply)
			{
				$reply->fill($input);
				$reply->save();

				return redirect($redirectTo)->withMessage('Reply updated!');
			}
			
			return redirect($redirectTo)->withMessage('You don\'t have right to do that!');
		}

		return redirect($redirectTo)->withErrors($validation);
	}

}


