<?php

namespace App\Http\Controllers\Events;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\EventRepository;
use App\Repositories\InstanceRepository;

class EventController extends Controller
{
    public function __construct
    (
        InstanceRepository $instance_repository,
        EventRepository $event_repository
    )
    {
        $this->instance_repository = $instance_repository;
        $this->event_repository = $event_repository;
    }

    public function index()
    {
    }

    public function showCreate()
    {

    }

    public function create(Request $request)
    {
        
    }
}
