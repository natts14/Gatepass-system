<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="HandheldFriendly" content="true">

    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Automated Vehicle Gate Pass System with e-Monitoring Parking Space</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light" style="background: #000080;">
        <a class="navbar-brand text-white" href="/guard-homepage">JOSHUA GARCIA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

            </ul>
            <form class="form-inline my-2 my-lg-0">
                <button type="button" class="btn btn-secondary mr-2" data-toggle="modal" data-target="#reportModal">REPORT</button>

                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="btn btn-secondary btn-sm dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="/guard-profile" class="dropdown-item">PROFILE</a>
                            <a href="#" class="dropdown-item">LOGOUT</a>
                        </div>
                    </li>
                </ul>
            </form>
        </div>
    </nav>

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

    <!-- Report Modal -->
    <div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">REPORT VIOLATION</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>ENTER PLATE NUMBER</label>
                        <input type="text" class="form-control" placeholder="">
                        <label>VIOLATION SPECIFICATION</label>
                        <input type="text" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>


</body>

</html>