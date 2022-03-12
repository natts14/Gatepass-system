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

    <div>
        <div class="text-right p-2">
            <a href="/admin-events-add"><button type="button" class="btn btn-success" id="eventHistry"> ADD EVENT </button></a>
            <a href=""><button type="button" class="btn btn-success" id="eventHistry"> HISTORY </button></a>
        </div>
    </div>

    <!--EVENT CARD-->
    <div class="">
        <div class="col d-inline-flex">
            <div class="card mt-3 border border-primary p-2" id="" style="width: 280px;">
                <div class="text-right">
                    <a href="/admin-events-update">
                        <svg class="eventEditIcon" xmlns="http://www.w3.org/2000/svg" width="20" height="26" fill="currentColor" class="bi bi-pencil-square" id="editIconUniqAct" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg>
                    </a>
                    <a class="removeEvents">
                        <svg class="eventDeleteIcon" xmlns="http://www.w3.org/2000/svg" width="20" height="26" fill="currentColor" class="bi bi-trash" id="deleteIconUniqAct" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                        </svg>
                    </a>
                </div>
                <p class="card-title h2" style="margin: 0; padding: 0;">Intrams</p>
                <p class="eventNo">1</p>


                <div class="row text-center" style="margin: 0; padding: 0;">
                    <div class="col">
                        <p class="font-weight-bold">START</p>
                        <p class="eventDate">Nov. 3, 2022</p>
                        <p class="eventTime" style="margin: 0; padding: 0;">7 : 00 AM</p>
                    </div>
                    <div class="col">
                        <p class="font-weight-bold">END</p>
                        <p class="eventDate">Nov. 9, 2022</p>
                        <p class="eventTime" style="margin: 0; padding: 0;">5 : 00 PM</p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</body>

</html>