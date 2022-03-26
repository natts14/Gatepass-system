<?php

namespace App\Http\Controllers\Admin\Events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index() 
    {
        return view('admin.events');
    }

    public function create() 
    {
        return view('admin.event-add');
    }

    public function edit() 
    {
        return view('admin.events-update');
    }
}
