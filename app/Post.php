<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

	public function user()
	{
		return $this->belongsTo('App\User');
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
		return ($this->user->id == $user->id || $user->isAdmin());
	}

	public function isEditable(User $user)
	{
		return ($this->user->id === $user->id || $user->isAdmin());
	}
}