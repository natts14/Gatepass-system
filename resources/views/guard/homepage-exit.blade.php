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
            <a class="navbar-brand text-white text-capitalize" href="/guard-homepage">
                @if(isset($user->detail))
                {{ $user->detail->firstname.' '.$user->detail->middlename.' '.$user->detail->lastname }}
                @else
                {{ $user->name }}
                @endif
            </a>
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
                                <a href="/logout" class="dropdown-item">LOGOUT</a>
                            </div>
                        </li>
                    </ul>
                </form>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm">
                    <div class="col-sm-12 py-4">
                        <form action="/guard-scan-{{ $user->type }}" method="POST">
                        @csrf
                            <div class="input-group mb-2">
                                <input value="{{ $request->rfid ?? '' }}" name="rfid" type="text" class="form-control" placeholder="Scan RFID" aria-label="Recipient's username" aria-describedby="basic-addon2" onchange="this.form.submit()" autofocus>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Scan RFID</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="">
                        <div>
                            <h3 class="mt-1">Parking Slots</h3>
                        </div>

                        <?php
                        //Columns must be a factor of 12 (1,2,3,4,6,12)
                        $numOfCols = 3;
                        $rowCount = 0;
                        $bootstrapColWidth = 12 / $numOfCols;
                        ?>

                        <div class="row">
                            <?php
                            foreach ($parking_lots as $parking_lot) {
                            ?>

                                <div class="col-md-<?php echo $bootstrapColWidth; ?> mb-3">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="text-center">
                                                <p class="card-title h5">{{ $parking_lot->area_code }}</p>
                                                <p class="h2">{{ count($parking_lot->parking_logs).'/'.$parking_lot->capacity }}</p>
                                                <p>{{ strtoupper($parking_lot->parking_type) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                $rowCount++;
                                if ($rowCount % $numOfCols == 0) echo '</div><div class="row">';
                            }
                            ?>
                        </div>
                    </div>

                    <div class="">
                        <div class="card mb-4 p-2 border border-primary">
                            <div class="guardStatistics">
                                <div class="row">
                                    <div class="col">
                                        <label class="" style="font-size: .7em;">USERS</label>
                                        <p class="h2" id="numberLoggedIn">{{ $users_login.'/'.$users_count }}</p>
                                        <label class="" style="font-size: .7em;">LOGGED IN</label>
                                    </div>
                                    <div class="col-5">
                                        <label class="text-left" style="font-size: .7em;">PARKING SLOTS</label>
                                        <p class="h2" id="numberParkingSlots">{{ $users_login.'/'.$parking_slots }}</p>
                                        <label class="" style="font-size: .7em;">PARKED USER</label>
                                    </div>
                                    <div class="col">
                                        <label class="" style="font-size: .7em;">VISITORS REGISTERED</label>
                                        <p class="h2" id="numberVisitorRegistered">{{ $visitors_login.'/'.$visitors_count }}</p>
                                        <label class="" style="font-size: .7em;">LOGGED IN VISITORS</label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <div>
                                    <p class="h6">TODAYS EVENT</p>
                                    @foreach ($todays_events as $event)
                                    <p class="h2">{{ $event->event_title }}</p>
                                    @endforeach
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

        <form method="GET" action="/guard-homepage">
            <nav class="navbar navbar-light" style="background: #000080;">
                <div class="form-row w-100">

                    <div class="col-sm-4">
                        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search" value="{{ $request->search ?? '' }}">
                    </div>

                    <div class="col-sm-1">
                        <select class="homepageSort form-control mr-2" name="sortBy" id="select">
                            <option value="">Sort</option>
                            <option value="login_date" {{ $request->sortBy == 'login_date' ? 'selected': '' }}>Logged In</option>
                            <option value="logout_date" {{ $request->sortBy == 'logout_date' ? 'selected': '' }}>Logged Out</option>
                        </select>
                    </div>

                    <div class="col-sm-1">
                        <select class="homepageShow form-control mr-2" name="category" id="show">
                            <option value="">Show</option>
                            <option value="employee" {{ $request->category == 'employee' ? 'selected': '' }}>Employee</option>
                            <option value="student" {{ $request->category == 'student' ? 'selected': '' }}>Student</option>
                            <option value="visitor" {{ $request->category == 'visitor' ? 'selected': '' }}>Visitor</option>
                        </select>
                    </div>

                    <div class="col-sm">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>

                    <div class="col">
                        <button type="button" class="btn btn-success" id="download"> Download </button>
                    </div>

                </div>

            </nav>

        </form>

        <div class="table-responsive">
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
                    @foreach ($parking_logs as $log)
                    <tr>
                        <td>
                            @if(isset($log->vehicle->user->detail->firstname))
                            {{ $log->vehicle->user->detail->firstname.' '.$log->vehicle->user->detail->middlename.' '.$log->vehicle->user->detail->lastname }}
                            @else
                            {{ $log->vehicle->user->name }}
                            @endif
                        </td>
                        <td>{{ ucfirst($log->vehicle->user->category) }}</td>
                        <td>{{ $log->login_time }}</td>
                        <td>{{ $log->login_date }}</td>
                        <td>{{ $log->logout_time }}</td>
                        <td>{{ $log->logout_date }}</td>
                        @if(count($log->vehicle->violations) > 0)
                        <td>{{ $log->vehicle->violations[0]->specification }}</td>
                        @else
                        <td>No Violation</td>
                        @endif

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Report Modal -->
    @include('modal.report');

</body>

</html>