@extends('layouts.default')
@section('content')
<!-- inject laravel date formatter -->
@inject('carbon', 'Carbon\Carbon')

<nav class="navBarRequest mt-3 mb-3 mx-auto nav nav-pills nav-justified w-75" style="background: #000080;">
<a class="nav-item nav-link text-white" href="/admin-request">VEHICLE @if($vehicles_count > 0)<span class="badge badge-danger">{{$vehicles_count}}</span>@endif</a></a>
    
    <!-- <a class="nav-item nav-link text-white" href="/admin-request-event">EVENT @if($events_count > 0)<span class="badge badge-danger">{{$events_count}}</span>@endif</a> -->
    <a class="nav-item nav-link text-white " href="/admin-request-license">DRIVERS LICENSE @if($license_count > 0)<span class="badge badge-danger">{{$license_count}}</span>@endif</a>
    <a class="nav-item nav-link text-white active" href="/admin-request-visitor">VISITOR @if($user_count > 0)<span class="badge badge-danger">{{$user_count}}</span>@endif</a></a>
   
</nav>

@foreach ($users as $user)
<div class="driversLicenseRequestCard">
    <div class="card border border-primary p-4" id="requestVehicle" style="margin: 0vw 10vw 0vw 10vw;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <label class="font-weight-bold">FIRST NAME</label>
                    <p class="h4" id="UserInfoLastname">{{ $user->detail->firstname ?? $user->name }}</p>
                </div>
                <div class="col">
                    <label class="font-weight-bold">MIDDLE NAME</label>
                    <p class="h4" id="UserInfoLastname">{{ $user->detail->middlename ?? '' }}</p>
                </div>
                <div class="col">
                    <label class="font-weight-bold">LAST NAME</label>
                    <p class="h4" id="UserInfoLastname">{{ $user->detail->lastname ?? '' }}</p>
                </div>
                <div class="col">
                    <label class="font-weight-bold">CATEGORY</label>
                    <p class="h4" id="UserInfoLastname">{{ $user->category }}</p>
                </div>
            </div>
        </div>
        <br />

        <div class="container mb-2">
            <div class="row">
                <div class="col-9">
                    <label class="font-weight-bold">ADDRESS</label>
                    <p class="h4" id="UserInfoLastname">{{ $user->detail->address ?? '' }}</p>
                </div>
                <div class="col">
                    <label class="font-weight-bold">DRIVERS LICENSE NO.</label>
                    <p class="h4" id="UserInfoLastname">{{ $user->license->drivers_license_number ?? '' }}</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <label class="font-weight-bold">LICENSE TYPE</label>
                    <p class="h4" id="UserInfoLastname">{{ $user->license->license_type ?? '' }}</p>
                </div>
                <div class="col">
                    <label class="font-weight-bold">LICENSE EXPIRY DATE</label>
                    <p class="h4" id="UserInfoLastname">{{ $user->license->drivers_license_expiry ?? '' }}</p>
                </div>
                <div class="col d-flex text-right">
                <form action="{{ url('/admin-request-visitor', ['visitor' => $user->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input name="id" type="hidden" value="{{$user->id }}">
                        <button type="submit" class="btn btn-success mr-3"> VERIFIED </button>
                    </form>
                    <form action="{{ url('/admin-request-visitor', ['visitor' => $user->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input name="id" type="hidden" value="{{$user->id }}">
                        <button type="submit" class="btn btn-dark"> DECLINE </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>
@endforeach
@stop