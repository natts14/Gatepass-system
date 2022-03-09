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

    <!--NAVBAR-->
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

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="profile-header"><br>
                    <img src="photos/sheryl kate.jpg" class="rounded-circle" alt="sheryl kate" width="200" height="200">
                    <h3 id="surname">MONSERRAT</h3>
                    <h4 id="firstname">SHERYL KATE</h4>
                    <hr>
                </div>

                <ul class="list-group">
                    <li class="list-group-item"><a onclick="enterProfile()">PROFILE</a></li>
                    <li class="list-group-item"><a>VEHICLE</a></li>
                    <li class="list-group-item"><a onclick="enterActiveVehicle()">ACTIVE</a></li>
                 <li class="list-group-item"><a onclick="enterInactiveVehicle()">INACTIVE</a></li>
                    <li class="list-group-item"> <a href="#transaction">TRANSACTION</a></li>
                </ul>

                <hr><br>
                <footer class="container-fluid">
                    <label class="buksu-details">BUKSU CONTACT DETAILS</label>
                </footer>
            </div>

            <div class="col-md-9">
                <div id="profile" class="">
                    <h2 class="text-center">PROFILE</h2>
                    <hr>
                    <h4>PERSONAL INFORMATION</h4>

                    <div class="form-group col-sm-10 text-right">
                        <button type="button" class="btn btn-primary btn-sm " onclick="enterEditProfile()">EDIT</button>
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
                            <button type="button" class="btn btn-primary btn-sm" onclick="">EDIT</button>
                            <button type="button" class="btn btn-primary btn-sm" onclick="enterLicenseDetails()">RENEW</button>
                        </div>
                    </div>
                </div>

                <div id="transaction"></div>
            </div>
        </div>


    </div>

</body>

</html>