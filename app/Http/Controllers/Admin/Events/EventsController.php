<?php

namespace App\Http\Controllers\Admin\Events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventsController extends Controller
{
    public function index() 
    {
        $events = Event::all();

        return view('admin.events',['events'=>$events]);
    }

    public function create() 
    {
        return view('admin.event-add');
    }

    public function store() 
    {
        request()->validate([
            'event_title' => 'required',
            'date_started_at'=> 'required',
            'time_started_at' => 'required',
            'date_ended_at' => 'required',
            'time_ended_at'=> 'required',
        ]);
        Event::create([
            'event_title'=> request('event_title'),
            'date_started_at'=> request('date_started_at'),
            'time_started_at'=> request('time_started_at'),
            'date_ended_at' => request('date_ended_at'),
            'time_ended_at' => request ('time_ended_at')
        ]);
        return  redirect('/admin-events');
    }
    public function edit(Event $event) 
    {
        return view('admin.events-update',['event' => $event]);
    }

    public function update(Event $event)
    {
        request()->validate([
            'event_title' => 'required',
            'date_started_at'=> 'required',
            'time_started_at' => 'required',
            'date_ended_at' => 'required',
            'time_ended_at'=> 'required',
        ]);
        $event::update([
            'event_title'=> request('event_title'),
            'date_started_at'=> request('date_started_at'),
            'time_started_at'=> request('time_started_at'),
            'date_ended_at' => request('date_ended_at'),
            'time_ended_at' => request ('time_ended_at')
        ]);

        return redirect('/admin-events');
    }

    public function destroy(Event $event) 
    {
        $event->delete();

        return redirect('/admin-events');
    }
}
