<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Forum extends Model {


	public function threads()
	{
		return $this->hasMany('App\Thread')->orderBy('created_at', 'desc');
	}

	protected function getLastActivityAttribute()
	{
		$activityTimes = []; 

		if ($this->threads)
		{
			foreach ($this->threads as $thread)
			{
				foreach ($thread->replies as $reply)
				{
				
					$activityTimes[] = $reply->created_at->timestamp;
				}

				$activityTimes[] = $thread->created_at->timestamp;
			}
		}

		arsort($activityTimes);

		$lastActivityTime = array_shift($activityTimes);

		return $lastActivityTime ? Carbon::createFromTimestamp($lastActivityTime) : null;
	}

}