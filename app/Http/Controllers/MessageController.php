<?php namespace App\Http\Controllers;

use Request;
use Auth;
use Validator;
use App\Message;
use App\User;
use App\Profile;


class MessageController extends Controller {

	public function __construct()
	{
		parent:: __construct();
		
		$this->middleware('auth', ['only' => 'store']);
	}

	public function create()
	{
		return view('messages.create');
	}
	
	public function store()
	{
		$input = Request::all();
	
		$rules = [
		'profile_id' => 'required|integer',
		'user_id' => 'required|integer',
		'content' => 'required',
		];

		$validation = Validator::make($input, $rules);

		if ($validation->passes())
		{
			$message = new Message;
			$message->fill($input);
			$message->user_id = Auth::user()->id;
			$username = $message->user->username;
			$message->profile_id = User::where('username', $username)->first()->profile->id;
			$message->save();
			
			$url = route('profiles.public_show', [$input['profile_id']]);
			return redirect($url)->with('message', 'Poruka Poslata!');
		}

		$url = route('profiles.public_show', [$input['profile_id']]);

		return redirect($url)->withErrors($validation);
	}

	public function destroy($messageId)
	{
		$profileId = Request::get('profile_id');
		$redirectTo = route('profile.show', [$profileId]);

		if ($message = Message::find($messageId))
		{
			if ($message->profile_id === Auth::user()->profile->profile_id)
			{
				$reply->delete();

				return redirect($redirectTo)->with('message', 'Poruka obrisana!');
			}
			else
			{
				return redirect($redirectTo)->with('message', 'Nemate prava da obrisete ovu poruku!');
			}
		}
		else
		{
			return redirect($redirectTo)->with('message', 'Poruka ne postoji!');
		}
	}
}