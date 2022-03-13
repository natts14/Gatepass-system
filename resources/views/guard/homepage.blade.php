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

    <div class="">
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
                <div class="col">
                    <div class="">
                        <div>
                            <h3 class="mt-3">Parking Slots</h3>
                        </div>

                        <div class="card-deck">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <p class="card-title h5">7BA</p>
                                        <p class="h2">5/25</p>
                                        <p>VEHICLES</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <p class="card-title h5">1COE</p>
                                        <h1 class="h2">35/50</h1>
                                        <p>MOTORCYCLE</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <p class="card-title h5">09CAS</p>
                                        <p class="h2">15/15</p>
                                        <p>VEHICLES</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <div class="card mt-4 mb-4 p-2 border border-primary">
                            <div class="guardStatistics">
                                <div class="row">
                                    <div class="col">
                                        <label class="" style="font-size: .7em;">USERS</label>
                                        <p class="h2" id="numberLoggedIn">70/250</p>
                                        <label class="" style="font-size: .7em;">LOGGED IN</label>
                                    </div>
                                    <div class="col-5">
                                        <label class="text-left" style="font-size: .7em;">PARKING SLOTS</label>
                                        <p class="h2" id="numberParkingSlots">65/70</p>
                                        <label class="" style="font-size: .7em;">PARKED USER</label>
                                    </div>
                                    <div class="col">
                                        <label class="" style="font-size: .7em;">VISITORS REGISTERED</label>
                                        <p class="h2" id="numberVisitorRegistered">10/50</p>
                                        <label class="" style="font-size: .7em;">LOGGED IN VISITORS</label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <div>
                                    <p class="h6">TODAYS EVENT</p>
                                    <p class="h2">Intrams</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col text-white">
                    <div id="buksuMap">
                        <img src="{{ asset('image/BukSUMap.jpg') }}" width="100%" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class=" ">
            <nav class="navbar navbar-light" style="background: #000080;">
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

        <div class="">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">NAME</th>
                        <th scope="col">CATEGORY</th>
                        <th scope="col">LOGIN TIME</th>
                        <th scope="col">LOGIN DATE</th>
                        <th scope="col">LOGOUT TIME</th>
                        <th scope="col">LOGOUT DATE</th>
                        <th scope="col">REMARKS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Sheryl Kate Monserrat</td>
                        <td>Student</td>
                        <td>7:00 AM</td>
                        <td>4-9-2021</td>
                        <td>5:00 PM</td>
                        <td>4-9-2021</td>
                        <td>No Violation</td>
                    </tr>
                    <tr>
                        <td>Nathalie Butic</td>
                        <td>Student</td>
                        <td>7:00 AM</td>
                        <td>4-9-2021</td>
                        <td>7:00 PM</td>
                        <td>4-9-2021</td>
                        <td>Violation</td>
                    </tr>
                    <tr>
                        <td>Riza Titar</td>
                        <td>Student</td>
                        <td>7:00 AM</td>
                        <td>4-9-2021</td>
                        <td>7:00 PM</td>
                        <td>4-9-2021</td>
                        <td>Violation</td>
                    </tr>
                    <tr>
                        <td>Millie Brown</td>
                        <td>Employee</td>
                        <td>7:00 AM</td>
                        <td>4-9-2021</td>
                        <td>7:00 PM</td>
                        <td>4-9-2021</td>
                        <td> No Violation</td>
                    </tr>
                </tbody>
            </table>
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