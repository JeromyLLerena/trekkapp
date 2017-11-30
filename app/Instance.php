<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Instance extends Model
{
    public function getFormattedStartDateAttribute()
    {
        return Carbon::CreateFromFormat('Y-m-d', $this->start_date)->format('d/m/Y');
    }

    public function status()
    {
        return $this->belongsTo(InstanceStatus::class, 'status_id');
    }
}
