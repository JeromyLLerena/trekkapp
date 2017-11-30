<?php

namespace App\Http\Controllers\Events;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\EventRepository;
use App\Repositories\InstanceRepository;
use App\Repositories\EventPhotoRepository;
use App\InstanceStatus;
use App\InstanceType;
use Storage;

class EventController extends Controller
{
    public function __construct
    (
        InstanceRepository $instance_repository,
        EventRepository $event_repository,
        EventPhotoRepository $photo_repository
    )
    {
        $this->instance_repository = $instance_repository;
        $this->event_repository = $event_repository;
        $this->photo_repository = $photo_repository;
    }

    public function index()
    {
    }

    public function showCreate()
    {
        $statuses = InstanceStatus::all();
        $types = InstanceType::all();
    }

    public function create(Request $request)
    {
        $data->$request->all();
        $data['user_id'] = 1;
        $event = $this->event_repository->save($data);

        $photos = $data['photos'];

        foreach ($photos as $photo) {
            $photo_path = $photo ? $photo->store(config('constants.upload_paths.photos.events'), 'public') : null;
            if ($photo_path) {
                $photo_data = ['event_id' => $event->id, 'url' => Storage::url($photo_path)];
                $this->photo_repository->save($photo_data);
                $this->photo_repository = new EventPhotoRepository;
            }
        }

        $data['event_id'] = $event->id;

        $instance = $this->instance_repository->save($data);

        return redirect('/');
    }
}
