<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Profile extends Model {

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function messages()
	{
		return $this->hasMany('App\Message');
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
	'daily_expense',
	'quit'
	];


	// non_smoke_days -> NonSmokeDays -> get + NonSmokeDays + Attribute -> getNonSmokeDaysAttribute()
	protected function getDaysSmokingAttribute()
	{
		if($this->quit == 1)
		{
		return $this->start_date->diffInDays($this->quit_date);
		}
		return Carbon::now()->diffInDays($this->start_date);
	}

	protected function getMoneyBurnedAttribute()
	{
		if($this->quit == 1)
		{
		return $this->start_date->diffInDays($this->quit_date) * $this->daily_expense;
		}
		return Carbon::now()->diffInDays($this->start_date) * $this->daily_expense;
	}

	protected function getTimeWastedAttribute()
	{
		if($this->quit == 1)
		{
		return $this->start_date->diffInDays($this->quit_date) * $this->daily_amount * 300 / 60 / 60 / 24;
		}
		return Carbon::now()->diffInDays($this->start_date) * $this->daily_amount * 300 / 60 / 60 / 24;
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



	protected function getNonSmokeTenDaysAttribute()
	{
		return $this->quit_date->diffInHours() * 0.41;
	}

	protected function getNonSmokeOneDayAttribute()
	{
		return $this->quit_date->diffInHours() * 4.16;
	}

	protected function getNonSmokeTwoDaysAttribute()
	{
		return $this->quit_date->diffInHours() * 2.08;
	}

	protected function getNonSmokeSevenDaysAttribute()
	{
		return $this->quit_date->diffInHours() * 0.59;
	}

	protected function getNonSmokeMonthAttribute()
	{
		return $this->quit_date->diffInHours() * 0.13;
	}

	protected function getNonSmokeThreeMonthAttribute()
	{
		return $this->quit_date->diffInHours() * 0.046;
	}

	protected function getNonSmokeYearAttribute()
	{
		return $this->quit_date->diffInHours() * 0.0117;
	}



	protected function getTimeSavedAttribute()
	{
		return Carbon::now()->diffInDays($this->quit_date) * $this->daily_amount * 300 / 60 / 60 / 24;
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