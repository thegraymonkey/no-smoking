<?php namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Requests\RegisterRequest;
use Redirect;
use App\User;
use App\SocialUser;
use Hash;
use View;
use Laravel\Socialite\Contracts\Factory as SocialiteFactory;
use App;

class AuthController extends Controller {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		parent:: __construct();
		
		$this->auth = $auth;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

	/**
	 * Show the application registration form.
	 *
	 * @return Response
	 */
	public function getRegister()
	{
		return view('auth.register', ['current_page' => 'auth.register']);
	}

	/**
	 * Handle a registration request for the application.
	 *
	 * @param  RegisterRequest  $request
	 * @return Response
	 */
	public function postRegister(RegisterRequest $request)
	{
		// Registration form is valid, create user...
		$user = new User;
		$user->email = $request->get('email');
		$user->username = $request->get('username');
		$user->password = Hash::make($request->get('password'));
		$user->save();
		
		$this->auth->login($user);

		return redirect('/');
	}

	/**
	 * Show the application login form.
	 *
	 * @return Response
	 */
	public function getLogin()
	{
		return view('auth.login', ['current_page' => 'auth.login']);
	}

	/**
	 * Handle a login request to the application.
	 *
	 * @param  LoginRequest  $request
	 * @return Response
	 */
	public function postLogin(LoginRequest $request)
	{
		if ($this->auth->attempt($request->only('email', 'password')))
		{
			return Redirect::back();
		}

		return redirect('/auth/login')->withErrors([
			'email' => 'These credentials do not match our records.',
		]);
	}

	/**
	 * Log the user out of the application.
	 *
	 * @return Response
	 */
	public function getLogout()
	{
		$this->auth->logout();

		return redirect('/');
	}

	public function getSocial(SocialiteFactory $socialite)
	{
		return $socialite->driver('facebook')->redirect();
	}

	public function getSocialCallback(SocialiteFactory $socialite)
	{
		$socialUser = $socialite->driver('facebook')->user();

		if ($socialUser)
		{
			$user = User::where('email', $socialUser->email)->first();

			if (!$user)
			{
				$user = new User;
				$user->email = $socialUser->email;
				$user->username = $this->makeUsername($socialUser);
				$user->password = Hash::make(rand(999, 9999));
				$user->save();
			}

			// user postoji u ovom momentu
			$social = $user->social;

			if (is_null($social))
			{
				$social = new SocialUser;

				$social->user_id = $user->getKey();
				$social->provider_id = $socialUser->id;
				$social->token = $socialUser->token;

				$social->save();
			}

			// i user i social

			if ($socialUser->id == $social->provider_id)
			{
				$this->auth->login($user);
			}

			return redirect('/');
		}

		App::abort(400);
	}

	public function makeUsername($fbData)
	{
		return $fbData->nickname ? 
			Str::slug($fbData->nickname . '-' . Str::quickRandom(4)) : 
			'fb_' . $fbData->id;
	}

	

}
