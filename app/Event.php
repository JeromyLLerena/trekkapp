<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function instances()
    {
        return $this->hasMany(Instance::class, 'event_id');
    }

    public function getCurrentInstanceAttribute()
    {
        return $this->instances->last();
    }

    public function favorited_users(){
        return $this->belongsToMany(User::class, 'favorites', 'event_id', 'user_id');
    }

    public function event_members(){
        return $this->belongsToMany(User::class, 'memberships', 'event_id', 'user_id');
    }

    public function commented_users()
    {
        return $this->belongsToMany(User::class, 'comments', 'event_id', 'user_id');
    }
}
