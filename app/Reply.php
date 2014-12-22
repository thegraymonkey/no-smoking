<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model {

	protected $fillable = [
		'thread_id',
		'content',
		'user_id'
	];

	public function thread()
	{
		return $this->belongsTo('App\Thread');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	protected function setContentAttribute($value)
	{
		$this->attributes['content'] = strip_tags($value, '<a><p><b><strong>');
	}
	
	public function isDeletable(User $user)
	{
		return ($this->user->id === $user->id || $user->isAdmin());
	}

	public function isEditable(User $user)
	{
		return ($this->user->id === $user->id || $user->isAdmin());
	}
}