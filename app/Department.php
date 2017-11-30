<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function events()
    {
        return $this->hasMany(Event::class, 'department_id');
    }
}
