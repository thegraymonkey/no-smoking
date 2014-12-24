<?php namespace App\Http\Controllers;

use Request;
use Auth;
use App;
use Validator;
use App\Message;
use App\User;
use App\Profile;


class MessageController extends Controller {

	
	

	public function create()
	{
		return view('messages.create');
	}
	
	public function store()
	{
		$input = Request::all();
	
		$rules = [
		'profile_id' => 'required|integer',
		'content' => 'required|min:1',
		];

		$validation = Validator::make($input, $rules);

		if ($validation->passes())
		{
			if ($profile = Profile::find($input['profile_id']))
			{
				$message = new Message;

				$message->content = $input['content'];
				$message->user_id = Auth::user()->id;
				$message->profile_id = $profile->getKey();

				$message->save();

				$url = url('profile/public/' . $profile->user->username);

				return redirect($url)->with('message', 'Poruka poslata!');				
			}

			App::abort(400);

		}

		$url = url('profile/public/' . Profile::find($input['profile_id'])->user->username);

		return redirect($url)->withErrors($validation);
	}

	public function destroy($messageId)
	{


		if ($message = Message::find($messageId))
		{

			$url = url('profile/public/' . $message->profile->user->username);

			if ($message->profile_id === Auth::user()->profile->id || Auth::user()->isAdmin() || $message->user_id === Auth::user()->id)
			{
				

				$message->delete();

				
				return redirect($url)->with('message', 'Poruka obrisana!');	
			}
			else
			{
				
				return redirect($url)->with('message', 'Nemate prava da obrišete ovu poruku!');
			}
		}
		else
		{
			App::abort(400);
		}
	}
		
}