@extends('layouts.default')
@section('content')

<nav class="navBarRequest mt-3 mb-3 mx-auto nav nav-pills nav-justified w-75" style="background: #000080;">
    <a class="nav-item nav-link text-white" href="/admin-request">VEHICLE <span class="badge badge-danger" id="">1</span></a>
    <a class="nav-item nav-link text-white" href="/admin-request-renewal">VEHICLE RENEWAL </a>
    <a class="nav-item nav-link active text-white" href="/admin-request-event">EVENT</a>
    <a class="nav-item nav-link text-white" href="/admin-request-license">DRIVERS LICENSE</a>
</nav>


<div class="eventRequestCard">
    <div class="card border border-primary" id="requestEvent" style="margin: 0vw 10vw 0vw 10vw;">
        <div class="card-header">
            <p class="h4">INTRAMURALS 2021</p>
        </div>

        <div class="container p-4">
            <div class="row">
                <div class="col">
                    <label class="font-weight-bold">USER</label>
                    <p class="h4" id="UserInfoLastname">SHERYL KATE MONSERRAT</p>
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
                <div class="col">
                    <label class="font-weight-bold">TYPE</label>
                    <p class="requestEventType" id="type">VEHICLE</p>
                </div>
                <div class="col text-right">
                    <button type="button" class="btn btn-success" id="submitEvent" onclick=""> APPROVE </button>
                    <button type="button" class="btn btn-dark" id="cancelEvent" onclick=""> DECLINE </button>
                </div>
            </div>
        </div>
    </div>
</div>

@stop