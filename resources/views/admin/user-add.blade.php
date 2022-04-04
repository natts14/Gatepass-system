@extends('layouts.default')
@section('content')

    <div class="w-100" id="register-account">
        <div class="">
            <p class="addUserHeader text-center mb-3 h3">ADD USER</p>
        </div>

        <form class="needs-validation" method="POST" id="admin_adduser" required>
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
                            <input type="text" name="surname" value="" class="form-control" id="surname" required>
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="userID" class="font-weight-bold">STUDENT/EMPLOYEE ID</label>
                            <input type="text" name="user_id" value="" class="form-control" id="userID" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-3">
                            <label for="contactno" class="font-weight-bold">CONTACT NUMBER</label>
                            <input type="text" name="contactNo" value="" class="form-control" id="contactNo" required>
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
                                <option></option>
                                <option>STUDENT</option>
                                <option>EMPLOYEE</option>
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
                            <input type="text" name="driversLicenseNo" value="" class="form-control" id="driversLicenseNo" required>
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="DriversLicenseExpiry" class="font-weight-bold">DRIVERS LICENSE EXPIRY</label>
                            <form action="/action_page.php">
                                <input class="form-control" type="date" id="birthday" name="birthday">
                            </form>
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="licenseType" class="font-weight-bold">TYPE</label>
                            <select class="form-control" name="licenseType" value="" id="select" required>
                                <option></option>
                                <option value="Student Permit">Student Permit</option>
                                <option value="Non-Professional">Non-Professional</option>
                                <option value="Professional">Professional</option>
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
                            <input type="text" name="plateNo" value="" class="form-control" id="plateNo" required>
                        </div>

                        <div class="form-group col-sm-3">
                            <label class="font-weight-bold">VEHICLE REGISTRATION NO.</label>
                            <input type="text" name="vehicleRegistrationNo" value="" class="form-control" id="vehicleRegistrationNo" required>
                        </div>

                        <div class="form-group col-sm-3">
                            <label class="font-weight-bold">EXPIRY DATE</label>
                            <form action="/action_page.php">
                                <input class="form-control" type="date" id="birthday" name="birthday">
                            </form>
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
                            <input type="text" name="vehicleType" value="" class="form-control" id="vehicleType" required>
                        </div>

                        <div class="form-group col-sm-3">
                            <label class="font-weight-bold">MODEL</label>
                            <input type="text" name="vehicleModel" value="" class="form-control" id="vehicleModel" required>
                        </div>

                        <div class="form-group col-sm-3">
                            <label class="font-weight-bold">COLOR</label>
                            <input type="text" name="vehicleColor" value="" class="form-control" id="vehicleColor" required>
                        </div>

                        <div class="form-group col-sm-3">
                            <label class="font-weight-bold">RFID</label><br>
                            <input type="text" name="RFID" value="" class="form-control" id="RFID" required>
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