@extends('layouts.default')
@section('content')

<nav class="navBarRequest mt-3 mb-3 mx-auto nav nav-pills nav-justified w-75" style="background: #000080;">
    <a class="nav-item nav-link text-white" href="/admin-request">VEHICLE @if($vehicles_count > 0)<span class="badge badge-danger">{{$vehicles_count}}</span>@endif</a></a>
    <!-- <a class="nav-item nav-link text-white" href="/admin-request-renewal">VEHICLE RENEWAL @if($renewals_count > 0)<span class="badge badge-danger">{{$renewals_count}}</span>@endif</a> -->
    <!-- <a class="nav-item nav-link text-white active" href="/admin-request-event">EVENT @if($events_count > 0)<span class="badge badge-danger">{{$events_count}}</span>@endif</a> -->
    <a class="nav-item nav-link text-white" href="/admin-request-license">DRIVERS LICENSE @if($license_count > 0)<span class="badge badge-danger">{{$license_count}}</span>@endif</a>
</nav>

@foreach ($events as $event)
<div class="eventRequestCard">
    <div class="card border border-primary" id="requestEvent" style="margin: 0vw 10vw 0vw 10vw;">
        <div class="card-header">
            <p class="h4">{{ $event->event_title }}</p>
        </div>

        <div class="container p-4">
            <div class="row">
                <div class="col">
                    <label class="font-weight-bold">USER</label>
                    <p class="h4" id="UserInfoLastname">
                    
                    </p>
                </div>
                <div class="col">
                    <label class="font-weight-bold">PLATE NUMBER</label>
                    <p class="h4" id="plateNo">ABC 123</p>
                </div>
                <div class="col">
                    <label class="font-weight-bold">CATEGORY</label>
                    <p class="h4" id="category">STUDENT</p>
                </div>
            </div>
        </div>

        <div class="container p-4">
            <div class="row">
                <div class="col-9">
                    <label class="font-weight-bold">TYPE</label>
                    <p class="requestEventType" id="type">VEHICLE</p>
                </div>
                <div class="col text-right d-flex">
                    <!-- <button type="button" class="btn btn-success" id="submitEvent" onclick=""> APPROVE </button>
                    <button type="button" class="btn btn-dark" id="cancelEvent" onclick=""> DECLINE </button> -->
                    <form action="{{ url('/admin-request-event', ['event' => $event->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success mr-3" id="submitEvent"> APPROVE </button>
                    </form>
                    <form action="{{ url('/admin-request-event', ['event' => $event->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-dark" id="cancelEvent"> DECLINE </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>
@endforeach
@stop