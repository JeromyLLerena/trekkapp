<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
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

    public function events()
    {
        return $this->hasMany(Event::class, 'user_id');
    }

    public function favorited_events()
    {
        return $this->belongsToMany(Event::class, 'favorites', 'user_id', 'event_id');
    }

    public function joined_events()
    {
        return $this->belongsToMany(Instance::class, 'memberships', 'user_id', 'instance_id');
    }

    public function commented_events()
    {
        return $this->belongsToMany(Event::class, 'comments', 'user_id', 'event_id');
    }
}
