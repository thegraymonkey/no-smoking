<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	protected $fillable = [
		
		'title',
		'content',
		'file_name'
	];

	public function getImagePath()
	{
		return sprintf('/upload/article/%s.%s', $this->file_name, $this->file_extension);
	}

}