<?php

namespace App\Http\Controllers\Admin\Events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventsController extends Controller
{
    public function index() 
    {
        $events = Event::whereDate('date_ended_at', '>=', now())->get();
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
            'time_ended_at'=> 'required'
        ]);

        $event_data = [
            'event_title'=> request('event_title'),
            'date_started_at'=> request('date_started_at'),
            'time_started_at'=> request('time_started_at'),
            'date_ended_at' => request('date_ended_at'),
            'time_ended_at' => request ('time_ended_at')
        ];

        if (isset($request->restrictions)) {
            $event_data[] = $request->restrictions;
        }

        if (isset($request->status)) {
            $event_data[] = $request->status;
        }
        $event->update($event_data);

        return redirect('/admin-events');
    }

    public function destroy(Event $event) 
    {
        $event->delete();

        return redirect('/admin-events');
    }

    public function history(Request $request) 
    {
        if (isset($request->search)) {
            $events = Event::where('event_title', 'like', "%".$request->search."%")->whereDate('date_ended_at', '<', now())->get();
        }else {
            $events = Event::whereDate('date_ended_at', '<', now())->get();
        }

        if (isset($request->sortBy)) {
            $events = $events->sortBy($request->sortBy, SORT_NATURAL);
        }
        
        // return view('admin.event-history', ['events' => $events]);
        return view('develop.event-history', ['events' => $events]);
    }
}
