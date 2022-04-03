@extends('layouts.default')
@section('content')

<div class="container-fluid" id="userRecords">

    <form class="needs-validation" id="admin_adduser" required>
        <div class="col">
            <div id="profile" class="">
                <h4 class="text-center p-2">USER RECORDS</h4>
                <input type="hidden" value="" name="id">
                <div class="card border border-primary p-4 mb-3">
                    <div class="d-flex">
                        <h4>PERSONAL INFORMATION</h4>
                        <div class="form-group col-sm-9 text-right">
                            <a href="/admin-user-record-info-update" class="btn btn-primary btn-sm">EDIT</a>
                        </div>
                    </div>

                    <div class="row w-100 ml-1 ">
                        <div class="col-sm-3">
                            <label for="firstname" class="font-weight-bold">FIRSTNAME</label>
                            <input type="text" class="form-control-plaintext  text-capitalize" readonly value="" required>
                        </div>

                        <div class="col-sm-3">
                            <label for="middlename" class="font-weight-bold">MIDDLENAME</label>
                            <input type="text" class="form-control-plaintext  text-capitalize" readonly value="" required>
                        </div>

                        <div class="col-md-3">
                            <label for="surname" class="font-weight-bold">SURNAME</label>
                            <input type="text" class="form-control-plaintext  text-capitalize" readonly value="" required>
                        </div>

                        <div class="col-md-3">
                            <label for="userID" class="font-weight-bold">USER ID</label>
                            <input type="text" class="form-control-plaintext" readonly value="" required>
                        </div>
                    </div>

                    <div class="row w-100 ml-1">
                        <div class="col-md-3">
                            <label for="contactno" class="font-weight-bold">CONTACT NUMBER</label>
                            <input type="text" class="form-control-plaintext" readonly value="" required>
                        </div>

                        <div class="col-md-3">
                            <label for="emailAddress" class="font-weight-bold">EMAIL ADDRESS</label>
                            <input type="text" class="form-control-plaintext" readonly value="" required>
                        </div>

                        <div class="col-md-3">
                            <label for="contactno" class="font-weight-bold">USERNAME</label>
                            <input type="text" class="form-control-plaintext" readonly value="" required>
                        </div>

                        <div class="col-md-3">
                            <label for="contactno" class="font-weight-bold">PASSWORD</label>
                            <input type="password" class="form-control-plaintext" readonly value="" required>
                        </div>
                    </div>

                    <div class="row w-100 ml-1">
                        <div class="col-sm-9">
                            <label for="address" class="font-weight-bold">ADDRESS</label>
                            <input type="text" class="form-control-plaintext  text-capitalize" readonly value="" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="password" class="font-weight-bold">CATEGORY</label>
                            <select class="form-control-plaintext mb-2" readonly name="category" value="" id="select" placeholder="CATEGORY" required>
                                <option></option>
                                <option value="STUDENT" <%= users.category=='STUDENT' ? 'selected' : '' %>>STUDENT</option>
                                <option value="EMPLOYEE" <%= users.category=='EMPLOYEE' ? 'selected' : '' %>>EMPLOYEE</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card border border-primary p-4 mb-3">
                    <div class="d-flex">
                        <h4>LICENSE DETAILS</h4>
                        <div class="form-group col-sm-10 text-right">
                            <a href="/admin-user-record-license-update" class="btn btn-primary btn-sm">EDIT</a>
                        </div>
                    </div>

                    <div class="d-inline-flex w-100 ml-1">
                        <div class="form-group col-sm-3">
                            <label for="DriversLicenseNo" class="font-weight-bold">DRIVERS LICENSE NUMBER</label>
                            <input type="text" class="form-control-plaintext" readonly value="" required>
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="DriversLicenseExpiry" class="font-weight-bold">DRIVERS LICENSE EXPIRY</label>
                            <div class="">
                                <form action="/action_page.php">
                                    <input class="form-control" type="date" id="" name="date">
                                </form>
                            </div>
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="licenseType" class="font-weight-bold">TYPE</label>
                            <input type="text" class="form-control-plaintext" readonly value="" required>
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="attachedoc" class="font-weight-bold">ATTACHED DOCUMENT</label><br>
                            <button type="button" class="btn btn-default btn-sm "></button><i class="fas fa-paperclip"></i></button>
                            <button type="button" class="btn btn-default btn-sm "></button><i class="fas fa-paperclip"></i></button>
                        </div>
                    </div>
                </div>

                <div class=" w-100 mb-3">
                    <div class="card border border-primary w-100 p-4">
                        <div class="vehicle">
                            <div class="d-flex">
                                <h4>VEHICLES</h4>
                                <div class="form-group col-sm-11 text-right">
                                    <p class="h5 text-right"><span class="badge badge-success p-2">ACTIVE</span>
                                        <a href="/admin-user-record-vehicle-update" class="btn btn-primary btn-sm">EDIT</a>
                                    </p>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="row w-100 ml-1">
                                    <div class="col-sm-3">
                                        <label class="font-weight-bold">PLATE NUMBER</label>
                                        <input type="text" name="plateNo" value="" class="form-control-plaintext" readonly id="plateNo" required>
                                    </div>

                                    <div class="col-sm-3">
                                        <label class="font-weight-bold">VEHICLE REGISTRATION NO.</label>
                                        <input type="text" name="vehicleRegistrationNo" value="" class="form-control-plaintext" readonly id="vehicleRegistrationNo" required>
                                    </div>

                                    <div class="col-sm-3">
                                        <label class="font-weight-bold">EXPIRY DATE</label>
                                        <div class="form-row">
                                            <form action="/action_page.php">
                                                <input class="form-control" type="date" id="" name="date">
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="font-weight-bold">DOCUMENTS</label><br>
                                        <button type="button" class="btn btn-default btn-sm " name="vehicleRegistrationDocu"></button><i class="fas fa-paperclip"></i></button>
                                        <button type="button" class="btn btn-default btn-sm "></button><i class="fas fa-paperclip"></i></button>
                                    </div>
                                </div>

                                <div class="row w-100 ml-1 mb-3">
                                    <div class="col-sm-3">
                                        <label class="font-weight-bold">TYPE</label>
                                        <input type="text" name="vehicleType" value="" class="form-control-plaintext" readonly id="vehicleType" required>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="font-weight-bold">MODEL</label>
                                        <input type="text" name="vehicleModel" value="" class="form-control-plaintext" readonly id="vehicleModel" required>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="font-weight-bold">COLOR</label>
                                        <input type="text" name="vehicleColor" value="" class="form-control-plaintext" readonly id="vehicleColor" required>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="font-weight-bold">RFID No.</label><br>
                                        <input type="text" name="RFID" value="" class="form-control-plaintext" readonly id="RFID" required>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>


                </div>

            </div>

            <script src="js/javascript.js"></script>
    </form>
</div>

@stop