<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Message extends Model {

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function profile()
	{
		return $this->belongsTo('App\Profile');
	}

	protected $fillable = 
	[
		'content'
	];

	protected function setContentAttribute($value)
	{
		$this->attributes['content'] = strip_tags($value, '<a><p><b><strong>');
	}

	public function isDeletable(User $user)
	{
		if ($user)
		{
			return $this->user->id === $user->id || $user->isAdmin() || $this->profile_id === $user->profile->id;
		}

		return false;
	}

}