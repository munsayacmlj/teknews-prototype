<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;


class Comment extends Model
{

	use LogsActivity;

	protected $fillable = ['post_id'];
	protected static $logFillable = true;
	protected static $recordEvents = ['created', 'deleted'];

	// public function getDescriptionForEvent(string $eventName): string
 //    {
 //        return "This model has been {$eventName}";
 //    }

    public function post() {
    	return $this->belongsTo('App\Post');
    }

    public function user() {
    	return $this->belongsTo('App\User');
    }
}
