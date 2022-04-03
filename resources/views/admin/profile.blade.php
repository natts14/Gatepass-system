@extends('layouts.default')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="profile-header text-center"><br>
                <img src="{{ asset('image/avatar.png') }}" class="rounded-circle" alt="profile" width="200" height="200">
                <h3 id="surname">MONSERRAT</h3>
                <h4 id="firstname">SHERYL KATE</h4>
                <hr>
            </div>

            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">PROFILE</a>
                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">VEHICLE</a>
                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">ACTIVE</a>
                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">INACTIVE</a>
            </div>

            <hr><br>
            <footer class="container-fluid">
                <label class="buksu-details">BUKSU CONTACT DETAILS</label>
            </footer>
        </div>

        <div class="col-md-9">


            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <div id="profile" class="">
                        <h2 class="text-center">PROFILE</h2>
                        <hr>
                        <h4>PERSONAL INFORMATION</h4>

                        <div class="form-group col-sm-10 text-right">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                                EDIT
                            </button>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-sm-3">
                                <label for="firstname" class="font-weight-bold">FIRSTNAME</label>
                                <input type="text" readonly class="form-control-plaintext" id="firstname" value="SHERYL KATE">
                            </div>

                            <div class="form-group col-sm-3">
                                <label for="middlename" class="font-weight-bold">MIDDLENAME</label>
                                <input type="text" readonly class="form-control-plaintext" id="middlename" value="PESASKO">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="surname" class="font-weight-bold">SURNAME</label>
                                <input type="text" readonly class="form-control-plaintext" id="surname" value="MONSERRAT">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="surname" class="font-weight-bold">SUFFIX</label>
                                <input type="text" readonly class="form-control-plaintext" id="suffix" value="">
                            </div>
                        </div>


                        <div class="form-group col-md-12">
                            <label for="address" class="font-weight-bold" style="margin-left:-16px;">ADDRESS</label>
                            <input type="text" readonly class="form-control-plaintext" id="address" value="PINENWOOD SUBD. SAN JOSE, MALAYBALAY CITY" style="margin-left:-16px;">
                        </div>


                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="contactno" class="font-weight-bold">CONTACT NUMBER</label>
                                <input type="text" readonly class="form-control-plaintext" id="contactno" value="0972802630">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="emailAddress" class="font-weight-bold">EMAIL ADDRESSS</label>
                                <input type="text" readonly class="form-control-plaintext" id="emailAddress" value="sherylkpm15@gmail.com">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="username" class="font-weight-bold">USERNAME</label>
                                <input type="text" readonly class="form-control-plaintext" id="username" value="sherylkate">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="Password" class="font-weight-bold"> PASSWORD</label>
                                <input type="password" readonly class="form-control-plaintext" id="Password" value="sheryl">
                            </div>
                        </div>



                        <h4>LICENSE DETAILS</h4>

                        <div class="form-row">
                            <div class="form-group col-sm-3">
                                <label for="DriversLicenseNo" class="font-weight-bold">DRIVERS LICENSE NUMBER</label>
                                <input type="text" readonly class="form-control-plaintext" id="DriversLicenseNo" value="k03-20-000195">
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="DriversLicenseExpiry" class="font-weight-bold">DRIVERS LICENSE EXPIRY</label>
                                <div class="form-row">
                                    <div class="for-group col-sm-3">
                                        <input type="text" readonly class="form-control-plaintext" id="DriversLicenseExpiry" value="MAY">
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <input type="text" readonly class="form-control-plaintext" id="DriversLicenseExpiry" value="12">
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <input type="text" readonly class="form-control-plaintext" id="DriversLicenseExpiry" value="2025">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-sm-3">
                                <label for="licenseType" class="font-weight-bold">TYPE</label>
                                <input type="text" readonly class="form-control-plaintext" id="licenseType" value="NON-PROFESSIONAL">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-sm-3">
                                <label for="attachedoc" class="font-weight-bold">ATTACHED DOCUMENT</label><br>
                                <button type="button" class="btn btn-default btn-sm "></button><i class="fas fa-paperclip"></i></button>
                            </div>
                            <div class="form-group col-sm-5 text-right"><br>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#licenseModal">EDIT </button>
                                <button type="button" class="btn btn-primary btn-sm" onclick="enterLicenseDetails()">RENEW</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                </div>

                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <div class="activeVehicle" id="activeVehicle">
                        <br>
                        <h2>ACTIVE VEHICLES</h2>
                        <hr>
                        <div class="form-group col-sm-8 text-right">
                            <button type="button" class="btn btn-default btn-sm ">ADD</button>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-sm-3">
                                <h1>123</h1>
                            </div>
                            <div class="form-group col-sm-3">
                                <h1>BARCODE</h1>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-sm-3">
                                <label for="vehicleRegistarationNo" class="font-weight-bold">VEHICLE REGISTRATION NUMBER</label>
                                <input type="text" readonly class="form-control-plaintext" id="vehicleRegistarationNo" value="F10454">
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="vehicleExpiryDate" class="font-weight-bold">VEHICLE EXPIRY DATE</label>
                                <input type="text" readonly class="form-control-plaintext" id="vehicleExpiryDate" value="MAY 1, 2025">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-sm-3">
                                <label for="model" class="font-weight-bold">MODEL</label>
                                <input type="text" readonly class="form-control-plaintext" id="model" value="TOYOTA FORTUNER">
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="type" class="font-weight-bold">TYPE</label>
                                <input type="text" readonly class="form-control-plaintext" id="type" value="VEHICLE">
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="color" class="font-weight-bold">COLOR</label>
                                <input type="text" readonly class="form-control-plaintext" id="model" value="WHITE">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-sm-3">
                                <label for="model" class="font-weight-bold">ATTACHED DOCUMENT</label><br>
                                <button type="button" class="btn btn-default btn-sm " data-toggle="modal" data-target="#"><i class="fas fa-paperclip"></i></button>
                            </div>
                            <div class="form-group col-sm-5 text-right"><br>
                                <button type="button" class="btn btn-default btn-sm " data-toggle="modal" data-target="">EDIT</button>
                                <button type="button" class="btn btn-default btn-sm " data-toggle="modal" data-target="">REMOVE</button>
                            </div>
                        </div> <br>
                        <hr>
                    </div>
                </div>


                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                    <div class="inactiveVehicle" id="inactiveVehicle">
                        <br>
                        <h2>INACTIVE VEHICLES</h2>
                        <hr>

                        <div class="form-row">
                            <div class="form-group col-sm-3">
                                <h1>123</h1>
                            </div>
                            <div class="form-group col-sm-3">
                                <h1>BARCODE</h1>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-sm-3">
                                <label for="vehicleRegistarationNo" class="font-weight-bold">VEHICLE REGISTRATION NUMBER</label>
                                <input type="text" readonly class="form-control-plaintext" id="vehicleRegistarationNo" value="F10454">
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="vehicleExpiryDate" class="font-weight-bold">VEHICLE EXPIRY DATE</label>
                                <input type="text" readonly class="form-control-plaintext" id="vehicleExpiryDate" value="MAY 1, 2025">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-sm-3">
                                <label for="model" class="font-weight-bold">MODEL</label>
                                <input type="text" readonly class="form-control-plaintext" id="model" value="TOYOTA FORTUNER">
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="type" class="font-weight-bold">TYPE</label>
                                <input type="text" readonly class="form-control-plaintext" id="type" value="VEHICLE">
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="color" class="font-weight-bold">COLOR</label>
                                <input type="text" readonly class="form-control-plaintext" id="model" value="WHITE">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-sm-3">
                                <label for="model" class="font-weight-bold">ATTACHED DOCUMENT</label><br>
                                <button type="button" class="btn btn-default btn-sm " data-toggle="modal" data-target="#"><i class="fas fa-paperclip"></i></button>
                            </div>
                            <div class="form-group col-sm-5 text-right"><br>
                                <button type="button" class="btn btn-default btn-sm " data-toggle="modal" data-target="">RENEW</button>
                                <button type="button" class="btn btn-default btn-sm " data-toggle="modal" data-target="">REMOVE</button>
                            </div>
                        </div> <br>
                        <hr>
                    </div>
                </div>
            </div>

            <!-- Modal Personal Info -->
            <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">PERSONAL INFORMATION</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="firstname" class="font-weight-bold">FIRSTNAME</label>
                                        <input type="text" readonly class="form-control-plaintext" id="firstname" value="SHERYL KATE">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="middlename" class="font-weight-bold">MIDDLENAME</label>
                                        <input type="text" readonly class="form-control-plaintext" id="middlename" value="PESASKO">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="surname" class="font-weight-bold">SURNAME</label>
                                        <input type="text" readonly class="form-control-plaintext" id="surname" value="MONSERRAT">
                                    </div>
                                </div>

                                <div class="form-group col-md-13">
                                    <label for="address" class="font-weight-bold">ADDRESS</label>
                                    <input type="text" class="form-control" id="address">
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="contactno" class="font-weight-bold">CONTACT NUMBER</label>
                                        <input type="text" class="form-control" id="contactno">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="emailAddress" class="font-weight-bold">EMAIL ADDRESS</label>
                                        <input type="text" class="form-control" id="emailAddress">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="username" class="font-weight-bold">USERNAME</label>
                                        <input type="text" class="form-control" id="username">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="Password" class="font-weight-bold">PASSWORD</label>
                                        <input type="password" class="form-control" id="Password">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal LIcense Details -->
            <div class="modal fade bd-example-modal-lg" id="licenseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">LICENSE DETAILS</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="DriversLicenseNo" class="font-weight-bold">DRIVERS LICENSE NUMBER</label>
                                    <input type="text" class="form-control" id="DriversLicenseNo">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="DriversLicenseExpiry" class="font-weight-bold">DRIVERS LICENSE EXPIRY DATE</label>

                                    <div class="form-row">
                                        <form action="/action_page.php">
                                            <input class="form-control" type="date" id="" name="date" style="width: 250px;">
                                        </form>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="licenseType" class="font-weight-bold">TYPE</label>
                                    <select class="form-control mb-2" id="licenseType">
                                        <option></option>
                                        <option>Student Permit</option>
                                        <option>Non-Professional</option>
                                        <option>Professional</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="attachedoc" class="font-weight-bold">ATTACHED DOCUMENT</label><br>
                                    <button type="button" class="btn btn-default btn-sm " onclick=""><i class="fas fa-paperclip"></i></button>
                                </div>
                            </div>
                            <hr>
                            <p class="text-center">Upon submitting your application status will will be pending and to be approved</p>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="transaction"></div>
        </div>
    </div>
</div>

@stop