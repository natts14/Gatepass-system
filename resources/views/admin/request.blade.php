@extends('layouts.default')
@section('content')
<!-- inject laravel date formatter -->
@inject('carbon', 'Carbon\Carbon')

<nav class="navBarRequest mt-3 mb-3 mx-auto nav nav-pills nav-justified w-75" style="background: #000080;">
    <a class="nav-item nav-link active text-white" href="/admin-request">VEHICLE @if($vehicles_count > 0)<span class="badge badge-danger">{{$vehicles_count}}</span>@endif</a></a>
    <!-- <a class="nav-item nav-link text-white" href="/admin-request-event">EVENT @if($events_count > 0)<span class="badge badge-danger">{{$events_count}}</span>@endif</a> -->
    <a class="nav-item nav-link text-white" href="/admin-request-license">DRIVERS LICENSE @if($license_count > 0)<span class="badge badge-danger">{{$license_count}}</span>@endif</a>
    <a class="nav-item nav-link text-white" href="/admin-request-visitor">VISITOR @if($user_count > 0)<span class="badge badge-danger">{{$user_count}}</span>@endif</a></a>
</nav>

@foreach ($vehicles as $vehicle)
<div>
    <div class="card border border-primary p-4" style="margin: 0vw 10vw 0vw 10vw;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <label class="font-weight-bold">USER</label>
                    <p class="h4" id="UserInfoLastname">
                    @if(isset($vehicle->user->detail))
                        {{ $vehicle->user->detail->firstname.' '.$vehicle->user->detail->middlename.' '.$vehicle->user->detail->lastname }}
                    @else
                        {{ $vehicle->user->name }}
                    @endif
                    </p>
                </div>
                <div class="col">
                    <label class="font-weight-bold">PLATE NUMBER</label>
                    <p class="h4" id="plateNo">{{ $vehicle->vehicle_plate_number }}</p>
                </div>
                <div class="col">
                    <label class="font-weight-bold">CATEGORY</label>
                    <!-- <p class="h4" id="category">{{ strtoupper($vehicle->user->category) }}</p> -->
                </div>
                <div class="col">
                    <label class="font-weight-bold">VEHICLE REGISTRATION NO.</label>
                    <p>{{ $vehicle->vehicle_registration_number }}</p>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="row">

                <div class="col">
                    <label class="font-weight-bold">EXPIRY DATE</label>
                    <p>{{ $carbon::parse($vehicle->vehicle_registration_expiry)->toFormattedDateString() }}</p>
                </div>
                <div class="col">
                    <label class="font-weight-bold">MODEL</label>
                    <p>{{ $vehicle->model }}</p>
                </div>
                <div class="col">
                    <label class="font-weight-bold">TYPE</label>
                    <p id="type">VEHICLE</p>
                </div>
                <div class="col">
                    <label class="font-weight-bold">COLOR</label>
                    <p id="color">WHITE</p>
                </div>
            </div>
        </div>

        <div class="container">
             <label class="font-weight-bold">ATTACHED DOCUMENT</label><br>
            <div class="row">
            @if(isset($vehicle->document))
                <div class="col-sm-3">
                  <label class="font-weight-bold">FRONT</label><br>
                  <img src="{{url('image/documents/'.$vehicle->document->front )}}" class="img-fluid" alt="Responsive image">
                </div>
                <div class="col-sm-3">
                  <label class="font-weight-bold">BACK</label><br>
                  <img src="{{url('image/documents/'.$vehicle->document->back )}}" class="img-fluid" alt="Responsive image">
                </div>
                <div class="col-sm-3">
                  <label class="font-weight-bold">LEFT</label><br>
                  <img src="{{url('image/documents/'.$vehicle->document->left )}}" class="img-fluid" alt="Responsive image">
                </div>
                <div class="col-sm-3">
                  <label class="font-weight-bold">RIGHT</label><br>
                  <img src="{{url('image/documents/'.$vehicle->document->right )}}" class="img-fluid" alt="Responsive image">
                </div>
                @endif
            </div>
            <div class="row">
                <div class="col-sm-9">
                </div>
                
                <div class="col d-flex text-center">
                    <br>
                    <form action="{{ url('/admin-request-vehicle', ['vehicle' => $vehicle->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input name="id" type="hidden" value="{{ $vehicle->user->id }}">
                        <button type="submit" class="btn btn-success mr-3" id="submitEvent"> APPROVE </button>
                    </form>
                    <form action="{{ url('/admin-request-vehicle', ['vehicle' => $vehicle->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input name="id" type="hidden" value="{{ $vehicle->user->id }}">
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