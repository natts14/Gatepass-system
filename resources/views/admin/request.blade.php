@extends('layouts.default')
@section('content')

<nav class="navBarRequest mt-3 mb-3 mx-auto nav nav-pills nav-justified w-75" style="background: #000080;">
    <a class="nav-item nav-link active text-white" href="/admin-request">VEHICLE <span class="badge badge-danger" id="">1</span></a>
    <a class="nav-item nav-link text-white" href="/admin-request-renewal">VEHICLE RENEWAL </a>
    <a class="nav-item nav-link text-white" href="/admin-request-event">EVENT</a>
    <a class="nav-item nav-link text-white" href="/admin-request-license">DRIVERS LICENSE</a>
</nav>


<div class="">
    <div class="card border border-primary p-4" id="" style="margin: 0vw 10vw 0vw 10vw;">
        <div class="container">
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
        <br>
        <div class="container">
            <div class="row">
                <div class="col">
                    <label class="font-weight-bold">VEHICLE REGISTRATION NO.</label>
                    <p id="userID">NF10454</p>
                </div>
                <div class="col">
                    <label class="font-weight-bold">EXPIRY DATE</label>
                    <p id="category">MAY 1, 2023</p>
                </div>
                <div class="col">
                    <label class="font-weight-bold">MODEL</label>
                    <p id="contactNo">TOYOTA FORTUNER</p>
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
                <div><br>
                    <button type="button" class="btn btn-success" id="submitEvent" onclick=""> APPROVE </button>
                    <button type="button" class="btn btn-dark" id="cancelEvent" onclick=""> DECLINE </button>
                </div>
            </div>
        </div>
    </div>

    <br>
</div>

@stop