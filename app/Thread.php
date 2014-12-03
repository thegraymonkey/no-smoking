<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\User;

class Thread extends Model {

	protected $fillable = [
			
			'content',
			'user_id',
			'title',
			'forum_id'
		];


	public function forum()
	{
		return $this->belongsTo('App\Forum');
	}

	public function replies()
	{
		return $this->hasMany('App\Reply');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}



	public function isDeletable(User $user)
	{
		return ($this->user->id == $user->id && $this->replies->count() === 0) || $user->isAdmin();
	}

	public function isEditable(User $user)
	{
		return ($this->user->id === $user->id && $this->replies->count() === 0) || $user->isAdmin();
	}

}