<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	const ROLE_ADMIN = 'admin';
	const ROLE_MODERATOR = 'moderator';

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	protected $fillable = ['email', 'username'];

	public function social()
	{
		return $this->hasOne('App\SocialUser');
	}

	public function profile()
	{
		return $this->hasOne('App\Profile');
	}

	public function posts()
	{
		return $this->hasMany('App\Post');
	}

	public function photos()
	{
		return $this->hasMany('App\Photo');
	}

	public function isAdmin()
	{
		return $this->role === self::ROLE_ADMIN;
	}
	public function isModerator()
	{
		return $this->role === self::ROLE_MODERATOR;
	}

}
