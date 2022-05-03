@extends('layouts.default')
@section('content')
<!-- inject laravel date formatter -->
@inject('carbon', 'Carbon\Carbon')

<nav class="navBarRequest mt-3 mb-3 mx-auto nav nav-pills nav-justified w-75" style="background: #000080;">
    <a class="nav-item nav-link text-white" href="/admin-request">VEHICLE @if($vehicles_count > 0)<span class="badge badge-danger">{{$vehicles_count}}</span>@endif</a></a>
    <a class="nav-item nav-link active text-white" href="/admin-request-renewal">VEHICLE RENEWAL @if($renewals_count > 0)<span class="badge badge-danger">{{$renewals_count}}</span>@endif</a>
    <a class="nav-item nav-link text-white" href="/admin-request-event">EVENT @if($events_count > 0)<span class="badge badge-danger">{{$events_count}}</span>@endif</a>
    <a class="nav-item nav-link text-white" href="/admin-request-license">DRIVERS LICENSE @if($license_count > 0)<span class="badge badge-danger">{{$license_count}}</span>@endif</a>
</nav>

@foreach ($renewals as $renewal)
<div>
    <div class="card border border-primary p-4" style="margin: 0vw 10vw 0vw 10vw;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <label class="font-weight-bold">USER</label>
                    <p class="h4" id="UserInfoLastname">
                    @if(isset($renewal->user->detail))
                        {{ $renewal->user->detail->firstname.' '.$renewal->user->detail->middlename.' '.$renewal->user->detail->lastname }}
                    @else
                        {{ $renewal->user->name }}
                    @endif
                    </p>
                </div>
                <div class="col">
                    <label class="font-weight-bold">PLATE NUMBER</label>
                    <p class="h4" id="plateNo">{{ $renewal->vehicle->vehicle_plate_number }}</p>
                </div>
                <div class="col">
                    <label class="font-weight-bold">CATEGORY</label>
                    <p class="h4" id="category">{{ strtoupper($renewal->user->category) }}</p>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="row">
                <div class="col">
                    <label class="font-weight-bold">VEHICLE REGISTRATION NO.</label>
                    <p>{{ $renewal->vehicle->vehicle_registration_number }}</p>
                </div>
                <div class="col">
                    <label class="font-weight-bold">EXPIRY DATE</label>
                    <p>{{ $carbon::parse($renewal->vehicle->vehicle_registration_expiry)->toFormattedDateString() }}</p>
                </div>
                <div class="col">
                    <label class="font-weight-bold">MODEL</label>
                    <p>{{ $renewal->vehicle->model }}</p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col">
                    <label class="font-weight-bold">TYPE</label>
                    <p id="type">VEHICLE</p>
                </div>
                <div class="col">
                    <label class="font-weight-bold">COLOR</label>
                    <p id="color">WHITE</p>
                </div>
                <div class="col">
                    <label class="font-weight-bold">ATTACHED DOCUMENT</label><br>
                    <button type="button" class="btn btn-outline-secondary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" fill="currentColor" class="bi bi-paperclip" viewBox="0 0 16 16">
                            <path d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z" />
                        </svg></button>
                    <button type="button" class="btn btn-outline-secondary btn-sm"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" fill="currentColor" class="bi bi-paperclip" viewBox="0 0 16 16">
                            <path d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z" />
                        </svg></button>
                </div>
                <div>
                    <br>
                    <form action="{{ url('/admin-request-renewal', ['renewal' => $renewal->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="vehicle" name="type">
                        <button type="submit" class="btn btn-success" id="submitEvent"> APPROVE </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
    <br>
</div>
@endforeach
@stop