<?php namespace App;


use Illuminate\Database\Eloquent\Model;

class Photo extends Model {

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function getPath($style = null)
	{
		if ($style)
		{
			return sprintf('/upload/gallery/%s-%s.%s', $this->file_name, $style , $this->file_extension);
		}

		return sprintf('/upload/gallery/%s.%s', $this->file_name, $this->file_extension);
	}

	protected function setContentAttribute($value)
	{
		$this->attributes['content'] = strip_tags($value, '<a><p><b><strong>');
	}

}