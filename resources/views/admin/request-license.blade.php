@extends('layouts.default')
@section('content')
<!-- inject laravel date formatter -->
@inject('carbon', 'Carbon\Carbon')

<nav class="navBarRequest mt-3 mb-3 mx-auto nav nav-pills nav-justified w-75" style="background: #000080;">
<a class="nav-item nav-link text-white" href="/admin-request">VEHICLE @if($vehicles_count > 0)<span class="badge badge-danger">{{$vehicles_count}}</span>@endif</a></a>
    
    <!-- <a class="nav-item nav-link text-white" href="/admin-request-event">EVENT @if($events_count > 0)<span class="badge badge-danger">{{$events_count}}</span>@endif</a> -->
    <a class="nav-item nav-link text-white active" href="/admin-request-license">DRIVERS LICENSE @if($license_count > 0)<span class="badge badge-danger">{{$license_count}}</span>@endif</a>
    <a class="nav-item nav-link text-white" href="/admin-request-visitor">VISITOR @if($user_count > 0)<span class="badge badge-danger">{{$user_count}}</span>@endif</a></a>
</nav>

@foreach ($licenses as $license)
<div class="driversLicenseRequestCard">
    <div class="card border border-primary p-4" id="requestVehicle" style="margin: 0vw 10vw 0vw 10vw;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <label class="font-weight-bold">FIRST NAME</label>
                    <p class="h4" id="UserInfoLastname">{{ $license->user->detail->firstname ?? $license->name }}</p>
                </div>
                <div class="col">
                    <label class="font-weight-bold">MIDDLE NAME</label>
                    <p class="h4" id="plateNo">{{ $license->user->detail->middlename ?? 'null' }}</p>
                </div>
                <div class="col">
                    <label class="font-weight-bold">LAST NAME</label>
                    <p class="h4" id="plateNo">{{ $license->user->detail->lastname ?? 'null' }}</p>
                </div>
                <div class="col">
                    <label class="font-weight-bold">CATEGORY</label>
                    <p class="h4" id="category">{{ strtoupper($license->user->category) }}</p>
                </div>
            </div>
        </div>
        <br />

        <div class="container">
            <div class="row">
                <div class="col">
                    <label class="font-weight-bold">ADDRESS</label>
                    <p class="secondlineInfo" id="address">{{ $license->user->detail->address ?? null }}</p>
                </div>
                <div class="col">
                    <label class="font-weight-bold">LICENSE TYPE</label>
                    <p class="thirdlineInfo" id="licenseType">{{ strtoupper($license->license_type) }}</p>
                </div>
                <div class="col">
                    <label class="font-weight-bold">DRIVERS LICENSE NO.</label>
                    <p class="secondlineInfo" id="category">{{ $license->drivers_license_number }}</p>
                </div>
                <div class="col">
                    <label class="font-weight-bold">EXPIRY DATE</label>
                    <p class="thirdlineInfo" id="licenseExpiryDate">{{ $carbon::parse($license->drivers_license_expiry)->toFormattedDateString() }}</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">

                <div class="col">
                    <label class="font-weight-bold">ATTACHED DOCUMENT</label><br>
                    @if(isset($license->document))
                       <img src="{{url('image/documents/'.$license->document->name ?? 'NO ATTACHED DOCUMENT')}}" class="img-fluid" alt="Responsive image">
                     @endif
                </div>
          </div>  
         <div class="row">
                    <div class="col-sm-9">
                   </div>
                 <div class="col d-flex text-right">
                    <!-- <button type="button" class="btn btn-success" id="submitEvent" onclick=""> APPROVE </button>
                    <button type="button" class="btn btn-dark" id="cancelEvent" onclick=""> DECLINE </button> -->
                    <form action="{{ url('/admin-request-license', ['license' => $license->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input name="id" type="hidden" value="{{ $license->user->id }}">
                        <button type="submit" class="btn btn-success mr-3"> APPROVE </button>
                    </form>
                    <form action="{{ url('/admin-request-license', ['license' => $license->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input name="id" type="hidden" value="{{ $license->user->id }}">
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