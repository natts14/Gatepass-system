@extends('layouts.default')
@section('content')

<div class="container-fluid" id="">
    <form class="needs-validation p-4" method="POST" id="updateUserVehicle" required>
        <input type="hidden" value="<%= users._id %>" name="id" required>
        <p class="h3">VEHICLES</p>
        <div class="mb-4">
            <div class="d-inline-flex w-100 ml-1">
                <div class="form-group col-sm-3">
                    <label class="font-weight-bold">PLATE NUMBER</label>
                    <input type="text" name="plateNo" value="" class="form-control" id="plateNo" required>
                </div>

                <div class="col-sm-3">
                    <label class="font-weight-bold">VEHICLE REGISTRATION NO.</label>
                    <input type="text" name="vehicleRegistrationNo" value="" class="form-control" id="vehicleRegistrationNo" required>
                </div>

                <div class="col-sm-3">
                    <label class="font-weight-bold">EXPIRY DATE</label>
                    <form action="/action_page.php">
                        <input class="form-control" type="date" id="" name="date">
                    </form>
                </div>
                <div class="col-sm-3">
                    <label class="font-weight-bold">DOCUMENTS</label><br>
                    <button type="button" class="btn btn-default btn-sm " name="vehicleRegistrationDocu"></button><i class="fas fa-paperclip"></i></button>
                    <button type="button" class="btn btn-default btn-sm "></button><i class="fas fa-paperclip"></i></button>
                </div>
            </div>

            <div class="d-inline-flex w-100 ml-1 mb-3">
                <div class="col-sm-3">
                    <label class="font-weight-bold">TYPE</label>
                    <input type="text" name="vehicleType" value="" class="form-control" id="vehicleType" required>
                </div>
                <div class="col-sm-3">
                    <label class="font-weight-bold">MODEL</label>
                    <input type="text" name="vehicleModel" value="" class="form-control" id="vehicleModel" required>
                </div>
                <div class="col-sm-3">
                    <label class="font-weight-bold">COLOR</label>
                    <input type="text" name="vehicleColor" value="" class="form-control" id="vehicleColor" required>
                </div>
                <div class="col-sm-3">
                    <label class="font-weight-bold">RFID No.</label><br>
                    <input type="text" name="RFID" value="" class="form-control" id="RFID" required>
                </div>
            </div>
        </div>
        <div class=" mt-3 text-right">
            <button type="submit" class="btn btn-success"> SUBMIT </button>
            <button type="button" class="btn btn-danger" id="cancelEventButton" onclick="javascript:window.history.back();"> BACK </button>
        </div>
    </form>

</div>

@stop