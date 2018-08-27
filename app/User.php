<?php

namespace App;

use Spatie\Activitylog\Traits\CausesActivity;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use CausesActivity;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function comments() {
        return $this->hasMany('App\Comment');
    }

     public function messages() {
        return $this->hasMany('App\Message');
    }

    public function posts() {
        return $this->hasMany('App\Post');
    }

    public function userDetail() {
        return $this->hasOne('App\UserDetail');
    }

    // public $follows = [];

    public function followers() {

        return $this->belongsToMany(self::class, 'followers', 'follow_id', 'user_id')->withTimestamps();
    }

    public function following() {
        return $this->belongsToMany(self::class, 'followers', 'user_id', 'follow_id')->withTimestamps();
    }

    public function getPhotoPath() {
        if ( !empty( $this->userDetail->avatar ) ) {
            if ( file_exists( public_path() . '/uploads/user_avatar/' . $this->userDetail->avatar ) ) {
                return asset("uploads/user_avatar/" . $this->userDetail->avatar);
            }
        }
        else {
            return asset("images/default.png");
        }
    }

    public function hasPhoto() {
        if ( !empty($this->userDetail->avatar) ) {
            return file_exists( public_path() . '/uploads/user_avatar/' . $this->userDetail->avatar );
        }
    }

    public function getSnakeCaseName() {
        return str_replace(' ', '-', strtolower($this->name));
    }
}
