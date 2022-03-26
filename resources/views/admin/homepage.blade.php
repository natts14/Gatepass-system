<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="HandheldFriendly" content="true">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <title>Automated Vehicle Gate Pass System with e-Monitoring Parking Space</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </head>

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
                    <a class="nav-link text-white" href=""> HOME <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('admin.profile')}}">PROFILE</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-white" href="{{ route('admin.events')}}">EVENTS</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-white" href="{{ route('admin.parking-space')}}">PARKING SPACE</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-white" href="{{ route('admin.request')}}">REQUEST</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-white" href="{{ route('admin.userpage') }}">USERS</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link text-white" href="{{ route('logout.perform') }}">LOGOUT</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="wholeContainer">

        <!--LOGS-->
        <div class="container mt-4">
            <div class="row">
                <div class="col-sm text-center">
                    <label class="labelUser">USERS</label>
                    <p class="" id="numberLoggedIn" style="font-size: 2.5em; margin: 0; padding: 0;">70/350</p>
                    <label class="label2">LOGGED IN</label>
                </div>
                <div class="col-sm text-center">
                    <label class="labelParking">PARKING SLOTS</label>
                    <p class="" id="numberParkingSlots" style="font-size: 2.5em; margin: 0; padding: 0;">65/70</p>
                    <label class="label2">PARKED USER</label>
                </div>
                <div class="col-sm text-center">
                    <label class="labelVisitor">VISITORS REGISTERED</label>
                    <p class="" id="numberVisitorRegistered" style="font-size: 2.5em; margin: 0; padding: 0;">10/50</p>
                    <label class="label2">LOGGED IN VISITORS</label>
                </div>
            </div>
        </div>
        <br />

        <!--DATE-->
        <div class="p-3" style="background: #000080; width: 300px;">
            <p class="h3 text-white">USER LOGS <span id="time"></span></p>

            <form action="/action_page.php">
                <input class="form-control" type="date" id="" name="date">
            </form>
        </div>

        <!--SEARCH-->
        <div>
            <nav class="navbar navbar-light p-3" style="background: #000080;">
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="width: 440px;">

                    <select class="homepageSort form-control mr-2" placeholder="" id="select">
                        <option>Sort</option>
                        <option>Logged In</option>
                        <option>Logged Out</option>
                    </select>

                    <select class="homepageShow form-control mr-2" placeholder="" id="select">
                        <option>Show</option>
                        <option>Employees</option>
                        <option>Students</option>
                        <option>Visitors</option>
                    </select>
                </form>

                <div class="downloadButton">
                    <button type="button" class="btn btn-success" id="download"> Download </button>
                </div>


            </nav>
        </div>

        <!--TABLE-->
        <div>
            <table class="table table-bordered">
                <thead class="thead-dark ">
                    <tr>
                        <th scope="col">NAME</th>
                        <th scope="col">CATEGORY</th>
                        <th scope="col">LOGIN TIME</th>
                        <th scope="col">LOGIN DATE</th>
                        <th scope="col">LOGOUT TIME</th>
                        <th scope="col">LOGOUT DATE</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td id="clickableName" onclick="popUserInfo()">Sheryl Kate Monserrat</td>
                        <td>Student</td>
                        <td>7:00 AM</td>
                        <td>4-9-2021</td>
                        <td>5:00 PM</td>
                        <td>4-9-2021</td>
                    </tr>
                    <tr>
                        <td>Nathalie Butic</td>
                        <td>Student</td>
                        <td>7:00 AM</td>
                        <td>4-9-2021</td>
                        <td>7:00 PM</td>
                        <td>4-9-2021</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

</body>

</html>

<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4'
    });

    //time
    window.onload = setInterval(clock, 1000);

    function clock() {
        var d = new Date();
        var hour = d.getHours();
        var min = d.getMinutes();
        var sec = d.getSeconds();

        document.getElementById("time").innerHTML = hour + ":" + min;
    }
</script>