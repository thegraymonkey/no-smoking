<?php namespace App\Http\Controllers;

use Request;
use Auth;
use App\Profile;
use View;
use Image;
use Validator;
use App\User;
use App;

class ProfileController extends Controller {

	public function __construct()
	{
		parent:: __construct();

		$this->middleware('auth', ['except' => 'getPublic']);

		View::share('current_page', 'profiles.index');
	}

	public function getPublic($username)
	{
		$user = User::where('username', $username)->first();
		
		if ($user and $user->profile)
		{
			$profile = $user->profile;
			
			return view('profiles.public_show', compact('profile'));
		}

		return App::abort(404);
	}

	public function getShow()
	{
		$profile = Auth::user()->profile;

		return view('profiles.show', compact('profile'));
	}
	
	
	public function postUpdate()
	{
		$input = Request::all();

		$rules = [
			'start_date' => 'date',
			'quit_date' => 'date',
			'avatar' => 'image|max:2048',
			'daily_amount' => 'integer',
			'daily_expense' => 'numeric'
		];

		$validation = Validator::make($input, $rules);

		if ($validation->passes())
		{
			$profile = Auth::user()->profile;

			$avatar = Request::file('avatar');

			if ($profile instanceof Profile)
			{
				if (data_get($input, 'quit') === null)
				{
					$input['quit'] = 0;
				}

				$profile->fill($input);

				$profile = $this->assignAvatar($profile, $avatar);

				$profile->save();
			}
			else
			{
				$profile = new Profile;
				$profile->fill($input);
				$profile->user_id = Auth::user()->id;

				$profile = $this->assignAvatar($profile, $avatar);
				
				$profile->save();
			}

			return redirect('profile/show');
		}

		return redirect('profile/show')->withErrors($validation);

	}

	protected function assignAvatar(Profile $profile, $file)
	{
		
		if ($file)
		{
			$ext = $file->getClientOriginalExtension();

			$profile->avatar_ext = $ext;

			$path = public_path() . '/upload/profile/';

			$filename = $this->imageNameGenerator($file, time());

			$profile->avatar = $filename;
			
			// original
			Image::make($file)->save($this->imageNameStyleGenerator($path, $filename, $ext, 'original'));

			// thumb
			Image::make($file)->resize(50, null, function($c){ $c->aspectRatio(); })->crop(50, 50)->save($this->imageNameStyleGenerator($path, $filename, $ext, 'thumb'));

			// thumb-grayscale
			Image::make($file)->resize(50, null, function($c){ $c->aspectRatio(); })->crop(50, 50)->greyscale()->save($this->imageNameStyleGenerator($path, $filename, $ext, 'thumb-grayscale'));
			
		}


		return $profile;
	}

	protected function imageNameGenerator($file, $timestamp)
	{
		// 14333456-asdf234twegsg
		return sprintf('%d-%s', $timestamp, md5($file->getClientOriginalName()));
	}

	protected function imageNameStyleGenerator($path, $filename, $ext, $style)
	{
		// 14333456-asdf234twegsg-original
		// 14333456-asdf234twegsg-thumb
		// 14333456-asdf234twegsg-thumb-grayscale

		return sprintf('%s%s-%s.%s', $path, $filename, $style, $ext);
	}


}