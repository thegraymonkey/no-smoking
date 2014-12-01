<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model {

	public function user()
	{

		return $this->belongsTo('App\User');
	}

	protected $dates = [
		'start_date',
		'quit_date'
	];

	protected $fillable = 
	[
		'start_date',
		'quit_date',
		'daily_amount',
		'daily_expense'
	];


	// non_smoke_days -> NonSmokeDays -> get + NonSmokeDays + Attribute -> getNonSmokeDaysAttribute()
	protected function getDaysSmokingAttribute()
	{
		return $this->start_date->diffInDays($this->quit_date);
	}

	protected function getMoneyBurnedAttribute()
	{
		return $this->start_date->diffInDays($this->quit_date) * $this->daily_expense;
	}

	protected function getTimeWastedAttribute()
	{
		return $this->start_date->diffInDays($this->quit_date) * $this->daily_amount * 300 / 60 / 60 / 24;
	}

	protected function getNonSmokeDaysAttribute()
	{
		return $this->quit_date->diffInDays();
	}

	protected function getMoneySavedAttribute()
	{
		return Carbon::now()->diffInDays($this->quit_date) * $this->daily_expense;
	}

	protected function getNotSmokedAttribute()
	{
		return Carbon::now()->diffInDays($this->quit_date) * $this->daily_amount;
	}

	protected function getTimeSavedAttribute()
	{
		return Carbon::now()->diffInDays($this->quit_date) * $this->daily_amount * 300 / 60 / 60;
	}

	public function getAvatar($style)
	{
		return $this->avatar . '-' . $style . '.' . $this->avatar_ext;
	}

	public function getStatusAvatar()
	{
		if (Carbon::now()->diffInDays($this->quit_date) > 10)
		{
			$style = 'thumb';	
		}
		else
		{
			$style = 'thumb-grayscale';
		}

		return $this->getAvatar($style);
	}
}