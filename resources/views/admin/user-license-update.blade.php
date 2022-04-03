@extends('layouts.default')
@section('content')

<div class="container-fluid" id="">
    <form class="needs-validation p-4" method="POST" id="updateUserLicense" required>
        <div class="d-flex">
            <h4>LICENSE DETAILS</h4>
        </div>

        <div class="d-inline-flex w-100 ml-1">
            <div class="form-group col-sm-3">
                <label for="DriversLicenseNo" class="font-weight-bold">DRIVERS LICENSE NUMBER</label>
                <input type="text" class="form-control" value="" required>
            </div>
            <div class="form-group col-sm-3">
                <label for="DriversLicenseExpiry" class="font-weight-bold">DRIVERS LICENSE EXPIRY</label>
                <div class="form-row">
                    <form action="/action_page.php">
                        <input class="form-control" type="date" id="" name="date">
                    </form>
                </div>
            </div>

            <div class="form-group col-sm-3">
                <label for="licenseType" class="font-weight-bold">TYPE</label>
                <select class="form-control" name="licenseType" value="" id="select" required>
                    <option></option>
                    <option value="">Student Permit</option>
                    <option value="">Non-Professional</option>
                    <option value="">Professional</option>
                </select>
            </div>

            <div class="form-group col-sm-3">
                <label for="attachedoc" class="font-weight-bold">ATTACHED DOCUMENT</label><br>
                <button type="button" class="btn btn-default btn-sm "></button><i class="fas fa-paperclip"></i></button>
                <button type="button" class="btn btn-default btn-sm "></button><i class="fas fa-paperclip"></i></button>
            </div>
        </div>
        <div class=" mt-3 text-right">
            <button type="submit" class="btn btn-success"> SUBMIT </button>
            <button type="button" class="btn btn-danger" id="cancelEventButton" onclick="javascript:window.history.back();"> BACK </button>
        </div>
    </form>

</div>

@stop