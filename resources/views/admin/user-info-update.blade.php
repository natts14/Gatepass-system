@extends('layouts.default')
@section('content')

<div class="container-fluid" id="userRecords">

    <form class="needs-validation p-4" id="admin_adduser" required>
        <div id="profile" class="">
            <input type="hidden" value="" name="id">
            <div class="d-flex">
                <h4>PERSONAL INFORMATION</h4>
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
                        <option value="STUDENT">STUDENT</option>
                        <option value="EMPLOYEE">EMPLOYEE</option>
                    </select>
                </div>
            </div>

            <div class=" mt-3 text-right">
                <button type="submit" class="btn btn-success"> SUBMIT </button>
                <button type="button" class="btn btn-danger" id="cancelEventButton" onclick="javascript:window.history.back();"> BACK </button>
            </div>
        </div>

        <script src="js/javascript.js"></script>
    </form>
</div>

@stop