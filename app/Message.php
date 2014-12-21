<?php namespace App;

use Illuminate\Database\Eloquent\Model;

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

}