<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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



	public function isDeletable($userId)
	{
		

		if ($userId === $this->user_id && $this->replies->count() === 0)
		{
			return true;
		}
		return false;
	}

	public function isEditable($userId)
	{
		if ($userId === $this->user_id && $this->replies->count() === 0)
		{
			return true;
		}
		return false;
	}

}