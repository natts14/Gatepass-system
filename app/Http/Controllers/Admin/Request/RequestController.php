<?php

namespace App\Http\Controllers\Admin\Request;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index() 
    {
        return view('admin.request');
    }

    public function event() 
    {
        return view('admin.request-event');
    }

    public function license() 
    {
        return view('admin.request-license');
    }

    public function renewal() 
    {
        return view('admin.request-renewal');
    }
}
