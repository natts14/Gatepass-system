@extends('layouts.default')
@section('content')

    <div class="w-100" id="register-account">
        <div class="">
            <p class="addUserHeader text-center mb-3 h3">ADD USER</p>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif 
        </div>

        <form action="/admin-userpage/register" class="needs-validation" method="POST" id="admin_adduser" required>
            @csrf
            <div class="container-fluid">

                <p class="h4">PERSONAL INFORMATION</p>
                <div class="mb-4 p-2">
                    <div class="form-row">
                        <div class="form-group col-sm-3">
                            <label for="firstname" class="font-weight-bold">FIRSTNAME</label>
                            <input type="text" name="firstname" value="" class="form-control" id="firstname" required>
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="middlename" class="font-weight-bold">MIDDLENAME</label>
                            <input type="text" name="middlename" value="" class="form-control" id="middlename" required>
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="surname" class="font-weight-bold">SURNAME</label>
                            <input type="text" name="lastname" value="" class="form-control" id="surname" required>
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="userID" class="font-weight-bold">STUDENT/EMPLOYEE ID</label>
                            <input type="text" name="id_number" value="" class="form-control" id="userID" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-3">
                            <label for="contactno" class="font-weight-bold">CONTACT NUMBER</label>
                            <input type="text" name="contact_number" value="" class="form-control" id="contactNo" required>
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="emailAddress" class="font-weight-bold">EMAIL</label>
                            <input type="text" name="email" value="" class="form-control" id="email" required>
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="username" class="font-weight-bold">USERNAME</label>
                            <input type="text" name="name" value="" class="form-control" id="username" required>
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="password" class="font-weight-bold">PASSWORD</label>
                            <input type="password" name="password" value="" class="form-control" id="password" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-9">
                            <label for="address" class="font-weight-bold">ADDRESS</label>
                            <input type="text" name="address" value="" class="form-control" id="address" required>
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="password" class="font-weight-bold">CATEGORY</label>
                            <select class="form-control mb-2" name="category" value="" id="select" placeholder="CATEGORY" required>
                                <option value="student">STUDENT</option>
                                <option value="employee">EMPLOYEE</option>
                                <option value="visitor">VISITOR</option>
                                <option value="guard">GUARD</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="d-flex">
                    <p class="h4">LICENSE DETAILS</p>
                </div>
                <div class="mb-4 p-2">
                    <div class="form-row">
                        <div class="form-group col-sm-3">
                            <label for="DriversLicenseNo" class="font-weight-bold">DRIVERS LICENSE NUMBER</label>
                            <input type="text" name="drivers_license_number" value="" class="form-control" id="driversLicenseNo" required>
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="DriversLicenseExpiry" class="font-weight-bold">DRIVERS LICENSE EXPIRY</label>
                            <!-- <form action="/action_page.php"> -->
                                <input class="form-control" type="date" id="birthday" name="drivers_license_expiry">
                            <!-- </form> -->
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="licenseType" class="font-weight-bold">TYPE</label>
                            <select class="form-control" name="license_type" id="select" required>
                                <option value="student">Student Permit</option>
                                <option value="non-prof">Non-Professional</option>
                                <option value="prof">Professional</option>
                            </select>
                        </div>

                        <div class="form-group col-sm-3">
                            <label class="font-weight-bold">DOCUMENTS</label><br>
                            <button type="button" class="btn btn-default btn-sm" name="licenseDocu"></button><i class="fas fa-paperclip"></i></button>
                            <button type="button" class="btn btn-default btn-sm "></button><i class="fas fa-paperclip"></i></button>
                        </div>
                    </div>
                </div>

                <p class="h4">VEHICLES</p>
                <div class="mb-4">
                    <div class="form-row">
                        <div class="form-group col-sm-3">
                            <label class="font-weight-bold">PLATE NUMBER</label>
                            <input type="text" name="vehicle_plate_number" class="form-control" id="plateNo" required>
                        </div>

                        <div class="form-group col-sm-3">
                            <label class="font-weight-bold">VEHICLE REGISTRATION NO.</label>
                            <input type="text" name="vehicle_registration_number" class="form-control" id="vehicleRegistrationNo" required>
                        </div>

                        <div class="form-group col-sm-3">
                            <label class="font-weight-bold">EXPIRY DATE</label>
                            <!-- <form action="/action_page.php"> -->
                                <input class="form-control" type="date" id="birthday" name="vehicle_registration_expiry">
                            <!-- </form> -->
                        </div>

                        <div class="form-group col-sm-3">
                            <label class="font-weight-bold">DOCUMENTS</label><br>
                            <button type="button" class="btn btn-default btn-sm" name="licenseDocu"></button><i class="fas fa-paperclip"></i></button>
                            <button type="button" class="btn btn-default btn-sm "></button><i class="fas fa-paperclip"></i></button>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-3">
                            <label class="font-weight-bold">TYPE</label>
                            <input type="text" name="type" value="" class="form-control" id="vehicleType" required>
                        </div>

                        <div class="form-group col-sm-3">
                            <label class="font-weight-bold">MODEL</label>
                            <input type="text" name="model" value="" class="form-control" id="vehicleModel" required>
                        </div>

                        <div class="form-group col-sm-3">
                            <label class="font-weight-bold">COLOR</label>
                            <input type="text" name="color" value="" class="form-control" id="vehicleColor" required>
                        </div>

                        <div class="form-group col-sm-3">
                            <label class="font-weight-bold">RFID</label><br>
                            <input type="text" name="rfid" value="" class="form-control" id="RFID" required>
                        </div>
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="addUserButton">SUBMIT</button>
                <button type="button" class="btn btn-danger" id="addUserButton" onclick="javascript:window.history.back();">CANCEL</button>
            </div>
        </form>
    </div>

@stop