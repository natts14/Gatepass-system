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
        <p class="addUserHeader text-center mt-3 mb-3 h3">ADD ANOTHER VEHICLE FOR USER</p>
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

    <form id="regForm" action="/admin-userpage/vehicle" class="needs-validation" method="POST" id="admin_adduser" enctype="multipart/form-data" required>
        @csrf
        <div class="tab">
            <p class="h4">VEHICLES</p><br>
            <div class="form-group com-sm-3">

            <label class="font-weight-bold">Input User</label>
            <select name="user_id" class="form-control" required>
            <option value=""></option>
                @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
    
            </div>
            <div class="form-row">
                <div class="form-group col-sm-3">
                    <label class="font-weight-bold">PLATE NUMBER</label>
                    <input type="text" name="vehicle_plate_number" class="form-control" id="plateNo" required>
                </div>

                <div class="form-group col-sm-3">
                    <label class="font-weight-bold">VEHICLE REGISTRATION</label>
                    <input type="text" name="vehicle_registration_number" class="form-control" id="vehicleRegistrationNo" required>
                </div>

                <div class="form-group col-sm-3">
                    <label class="font-weight-bold">EXPIRY DATE</label>
                    <!-- <form action="/action_page.php"> -->
                    <input class="form-control" type="date" id="birthday" name="vehicle_registration_expiry">
                    <!-- </form> -->
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
            
            <div class="form-row">
                <div class="form-group col-sm-3">
                 <label class="font-weight-bold">FRONT</label><br>
                    <input type="file" name="vehicle_front" id="document" required>
                </div>

                <div class="form-group col-sm-3">
                    <label class="font-weight-bold">BACK</label><br>
                    <input type="file" name="vehicle_back" id="document" required>
                </div>

                <div class="form-group col-sm-3">
                   <label class="font-weight-bold">LEFT</label><br>
                    <input type="file" name="vehicle_left" id="document" required>
                </div>

                <div class="form-group col-sm-3">
                   <label class="font-weight-bold">RIGHT</label><br>
                    <input type="file" name="vehicle_right" id="document" required>
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