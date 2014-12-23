<?php namespace App\Http\Controllers;


use Request;
use Auth;
use Validator;
use App\User;




class UserController extends Controller {	
	

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