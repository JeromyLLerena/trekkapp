<?php

namespace App\Repositories;

use App\Event;

class EventRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Event;
    }

    public function save($data)
    {
        $event = null;

        if (property_exists($data, 'id')) {
            $event = $this->model->find($data->id);
        } else {
            $event = $this->model;
        }

        if (property_exists($data, 'name')) {
            $event->name = $data->name;
        }

        if (property_exists($data, 'rate')) {
            $event->rate = $data->rate;
        }

        if (property_exists($data, 'description')) {
            $event->description = $data->description;
        }

        if (property_exists($data, 'user_id')) {
            $event->user_id = $data->user_id;
        }

        if (property_exists($data, 'location')) {
            $event->location = $data->location;
        }

        if (property_exists($data, 'recommendations')) {
            $event->recommendations = $data->recommendations;
        }

        if (property_exists($data, 'itinerary')) {
            $event->itinerary = $data->itinerary;
        }

        $event->save();

        return $event;
    }
}