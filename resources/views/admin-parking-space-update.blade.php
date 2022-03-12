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

    <div class="container w-50 p-4 bg-light my-auto mx-auto">
            <div class="p-4">
                <p class="h3 text-center p-1">UPDATE PARKING SLOTS</p>
                <div class="row">
                    <div class="col-sm">
                        <label class="text-center">AREA CODE</label>
                        <input type="text" class="form-control" id="" placeholder="">
                    </div>
                    <div class="col-sm">
                        <label>CAPACITY</label>
                        <input type="text" class="form-control" id="" placeholder="">
                    </div>
                </div> <br>
                <div class="row ">
                    <div class="col-sm">
                        <label>PARKING TYPE</label>
                        <div class="ml-4">
                            <input class="form-check-input" type="radio" name="" id="" value="option1" checked>
                            <label class="form-check-label mb-3">VEHICLE</label>
                        </div>
                        <div class="ml-4">
                            <input class="form-check-input" type="radio" name="" id="" value="option2" checked>
                            <label class="form-check-label">MOTORCYCLE</label>
                        </div>
                    </div>
                    <div class="col-sm">
                        <label >SENSOR ID</label>
                        <select class="form-control" id="sensorID" placeholder="">
                            <option>ABC</option>
                            <option>DEF</option>
                        </select>
                            <label for="favcolor">SLOT COLOR: </label>
                            <input type="color" class="mt-1" id="slotColor" name="" value=""><br><br>
                    </div>
                </div>

                <div class="addParkingSlotButton text-center">
                    <button type="button" class="btn btn-success" id="submitAddedParkingSpace" onclick="addParkingSlotSubmit()"> SUBMIT </button>
                    <button type="button" class="btn btn-danger" id="cancelAddedParkingSpace" onclick="addParkingSlotCancel()"> CANCEL </button>
                </div>
            </div>
        </div>
</body>

</html>