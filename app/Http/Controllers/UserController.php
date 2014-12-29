<?php namespace App\Http\Controllers;


use Request;
use Auth;
use Validator;
use App\User;
use Redirect;
use App\Post;
use App\Message;
use App\Reply;
use App\Thread;
use App\Profile;


class UserController extends Controller {	
	
	public function getIndex()
	{
		$users = User::all();

		if (Auth::check() and Auth::user()->isAdmin())
		{
		return view('users.index', ['current_page' => 'users.index', 'users' => $users]);
		}
		return redirect('/')->with('message', 'Samo Administrator može videti listu korisnika!');
	}

	public function postRemove($userId)
	{
		if ($user = User::find($userId))
		{		
			if (Auth::check() and Auth::user()->isAdmin())
			{
				$post = Post::where('user_id', $userId)->delete();
				$message = Message::where('user_id', $userId)->delete();
				$reply = Reply::where('user_id', $userId)->delete();
				$thread = Thread::where('user_id', $userId)->delete();
				$profile = Profile::where('user_id', $userId)->delete();
				$user->delete();

				Redirect::back()->with('message', 'Korisnik obrisan!');
			}			
				Redirect::back()->with('message', 'Korisnik ne postoji!');			
		}

		App::abort(404);
	}

	public function postUpdate()
	{
		$input = Request::all();

		$rules = [
			'username' => 'unique:users|alpha_num|min:2'
				
		];

		$validation = Validator::make($input, $rules);


		if ($validation->passes())
		{
			$user = Auth::user();

			if ($user instanceof User)
			{

				$user->fill($input);

				
				$user->save();
			}

			return redirect('profile/show');
		}

		return redirect('profile/show')->withErrors($validation);
	}

}