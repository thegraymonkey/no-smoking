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
			$reply->content = $input['content'];
			$reply->user_id = Auth::user()->id;
			$reply->save();
			
			$url = route('threads.show', [$input['thread_id']]);
			return redirect($url)->with('message', 'Odgovor poslat!');
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
			if ($reply->isDeletable(Auth::user()))
			{
				$reply->delete();

				return redirect($redirectTo)->with('message', 'Odgovor obrisan!');
			}
			else
			{
				return redirect($redirectTo)->with('message', 'Nemate prava da obrišete ovaj odgovor!');
			}
		}
		else
		{
			return redirect($redirectTo)->with('message', 'Odgovor ne postoji!');
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

				return redirect($redirectTo)->withMessage('Odgovor izmenjen!');
			}
			
			return redirect($redirectTo)->withMessage('Nemate prava da menjate taj odgovor!');
		}

		return redirect($redirectTo)->withErrors($validation);
	}

}


