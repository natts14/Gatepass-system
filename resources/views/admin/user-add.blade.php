@extends('layouts.default')
@section('content')

<style>
    body {
        background-color: #f1f1f1;
    }

    #regForm {
        background-color: #ffffff;
        margin: 30px auto;
        padding: 40px;
        width: 70%;
        min-width: 300px;
    }

    input {
        padding: 10px;
        width: 100%;
        font-size: 17px;
        border: 1px solid #aaaaaa;
    }

    /* Mark input boxes that gets an error on validation: */
    input.invalid {
        background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .tab {
        display: none;
    }

    button {
        background-color: #04AA6D;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        font-size: 17px;
        cursor: pointer;
    }

    button:hover {
        opacity: 0.8;
    }

    #prevBtn {
        background-color: #bbbbbb;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    .step.active {
        opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
        background-color: #04AA6D;
    }
</style>

<div class="" id="register-account">
    <div class="">
        <p class="addUserHeader text-center mt-3 mb-3 h3">ADD USER</p>
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

    <form id="regForm" action="/admin-userpage/register" class="needs-validation" method="POST" id="admin_adduser" required>
        @csrf
        <!-- One "tab" for each step in the form: -->
        <div class="tab">
            <p class="h4">PERSONAL INFORMATION</p>
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
                    <select class="form-control mb-2" name="category" value="" id="category" placeholder="CATEGORY" required>
                        <option></option>
                        <option value="student">STUDENT</option>
                        <option value="employee">EMPLOYEE</option>
                        <option value="guard">GUARD</option>
                        <option value="admin">ADMIN</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="tab">
            <p class="h4">LICENSE DETAILS</p>
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
                        <option></option>
                        <option value="student">Student Permit</option>
                        <option value="non-prof">Non-Professional</option>
                        <option value="prof">Professional</option>
                    </select>
                </div>

                <div class="form-group col-sm-3">
                    <label class="font-weight-bold">DOCUMENTS</label><br>
                    <input type="file" class="form-control" name="document" id="document" required>
                    <!-- <button type="button" class="btn btn-default btn-sm" name="licenseDocu"></button><i class="fas fa-paperclip"></i></button>
                    <button type="button" class="btn btn-default btn-sm "></button><i class="fas fa-paperclip"></i></button>
                 -->
                </div>
            </div>
        </div>
        <div class="tab">
            <p class="h4">VEHICLES</p>
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
                    <input type="file"class="form-control" name="document" id="document" required>
                    <!--
                    <button type="button" class="btn btn-default btn-sm" name="licenseDocu"></button><i class="fas fa-paperclip"></i></button>
                    <button type="button" class="btn btn-default btn-sm "></button><i class="fas fa-paperclip"></i></button>
-->
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-sm-3">
                    <label class="font-weight-bold">TYPE</label>
                    <select class="form-control mb-2" name="type" id="vehicleType" placeholder="type" required>
                        <option></option>
                        <option value="vehicle">VEHICLE</option>
                        <option value="motorcycle">MOTORCYCLE</option>
                    </select>
                </div>

                <div class="form-group col-sm-3">
                    <label class="font-weight-bold">MODEL</label>
                    <input type="text" name="model" class="form-control" id="vehicleModel" required>
                </div>

                <div class="form-group col-sm-3">
                    <label class="font-weight-bold">COLOR</label>
                    <input type="text" name="color" class="form-control" id="vehicleColor" required>
                </div>

                <div class="form-group col-sm-3">
                    <label class="font-weight-bold">RFID</label><br>
                    <input type="text" name="rfid" class="form-control" id="RFID" maxlength="10" required>
                </div>
            </div>
        </div>
        <div style="overflow:auto;">
            <div style="float:right;">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
            </div>
        </div>
        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
        </div>
    </form>
</div>



<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
            // ... the form gets submitted:
            document.getElementById("regForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false
                valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
    }
</script>

@stop