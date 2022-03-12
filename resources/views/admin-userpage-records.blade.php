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

    <nav class="navbar navbar-expand-lg navbar-dark" style="background: #000080;">
        <a class="navbar-brand text-white" href="#">JOSHUA GARCIA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link text-white" href="/admin-homepage"> HOME <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/admin-profile">PROFILE</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-white" href="/admin-events">EVENTS</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-white" href="/admin-parking-space">PARKING SPACE</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-white" href="/admin-request">REQUEST</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-white" href="/admin-userpage">USERS</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link text-white" href="/logout">LOGOUT</a>
                </li>
            </ul>
        </div>
    </nav>

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

</body>

</html>