<?php namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Requests\RegisterRequest;
use Redirect;
use App\User;
use Hash;
use View;

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

}
