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

</body>

</html>