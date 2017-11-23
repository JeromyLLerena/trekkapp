<?php

namespace App\Repositories;

use App\Instance;

class InstanceRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Instance;
    }

    public function save($data)
    {
        $instance = null;

        if (property_exists($data, 'id')) {
            $instance = $this->model->find($data->id);
        } else {
            $instance = $this->model;
        }

        if (property_exists($data, 'event_id')) {
            $instance->event_id = $data->event_id;
        }

        if (property_exists($data, 'status_id')) {
            $instance->status_id = $data->status_id;
        }

        if (property_exists($data, 'start_date')) {
            $instance->start_date = $data->start_date;
        }

        if (property_exists($data, 'end_date')) {
            $instance->end_date = $data->end_date;
        }

        if (property_exists($data, 'start_time')) {
            $instance->start_time = $data->start_time;
        }

        if (property_exists($data, 'end_time')) {
            $instance->end_time = $data->end_time;
        }

        if (property_exists($data, 'price')) {
            $instance->price = $data->price;
        }

        if (property_exists($data, 'capacity')) {
            $instance->capacity = $data->capacity;
        }

        $instance->save();

        return $instance;
    }
}