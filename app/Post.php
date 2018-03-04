<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Post extends Model
{
	use LogsActivity;

	protected $fillable = ['topic_id'];
	protected static $logFillable = true;
	protected static $recordEvents = ['created', 'deleted'];

    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function topic() {
    	return $this->belongsTo('App\Topic');
    }

    public function comments() {
    	return $this->hasMany('App\Comment');
    }

    public function commentsCount() {
        return $this->comments()
            ->selectRaw('post_id, count(post_id) as top_posts')
            ->groupBy('post_id')
            ->orderBy('top_posts', 'desc');
    }
}
