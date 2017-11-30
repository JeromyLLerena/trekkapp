<?php

namespace App\Http\Controllers\Events;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\EventRepository;
use App\Repositories\InstanceRepository;
use App\Repositories\EventPhotoRepository;
use App\InstanceStatus;
use App\InstanceType;
use App\Department;
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
        $data = [
            'events' => $this->event_repository->all(),
            'departments' => Department::all(),
        ];

        return view('events.index', $data);
    }

    public function showCreate()
    {
        $data = [
            'types' => InstanceType::all(),
            'departments' => Department::all(),
        ];

        return view('events.create', $data);
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

    public function showJoin($id)
    {

    }

    public function join(Request $request , $id)
    {
        $event = $this->event_repository->find($id);
        $culqi = new Culqi(array('api_key' => ENV('CULQI_SECRET_KEY')));
        $user = $request->user();

        $charge          = $culqi->Charges->create([
            "amount"        => $event->current_instance->price,
            "capture"       => false,
            "currency_code" => "PEN",
            "description"   => $event->name,
            "installments"  => 0,
            "email"         => request('email'),
            "source_id"     => request('culqi_token'),
        ]);

        if ($charge) {
            $user->joined_events()->attach($event->current_instance->id, ['payment_confirmed' => true]);

            return redirect('/');
        } else {
            return redirect()->back();
        }
    }

    public function comment(Request $request, $id)
    {
        $event = $this->event_repository->find($id);
        $request->user()->commented_events()->attach($event->id, ['text' => $request->get('text')]);

        return redirect('/');
    }

    public function favorite(Request $request, $id)
    {
        $event = $this->event_repository->find($id);
        $request->user()->favorited_events()->attach($event->id);

        return redirect('/');
    }
}
