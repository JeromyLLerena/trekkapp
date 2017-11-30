<?php

namespace App\Repositories;

use App\EventPhoto;

class EventPhotoRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new EventPhoto;
    }

    public function save($data)
    {
        $transaction = null;

        if (array_key_exists('id', $data)) {
            $transaction = $this->model->find($data['id']);
        } else {
            $transaction = $this->model;
        }

        if (array_key_exists('url', $data)) {
            $transaction->url = $data->url;
        }

        if (array_key_exists('event_id', $data)) {
            $transaction->event_id = $data->event_id;
        }

        $transaction->save();

        return $transaction;
    }
}