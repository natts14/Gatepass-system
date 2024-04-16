@extends('layouts.default')
@section('content')

<div class="wholeContainer">

    <!--LOGS-->
    <div class="container mt-4">
        <!-- CARD -->
        <div class="row gx-5 mb-3">
            <div class="col-sm">
                <div class="card mb-2 border-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col me-2">
                                <label class="font-weight-bold">USERS</label>
                                <p class="" id="numberLoggedIn" style="font-size: 2.5em; margin: 0; padding: 0;">{{ $users_login.'/'.$users_count }}</p>
                                <label class="">LOGGED IN</label>
                            </div>
                            <div class="col-6 my-auto">
                                <img src="{{ asset('image/car.png') }}" width="80%" alt="" class="float-end p-2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card mb-2 border-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col me-2">
                                <label class="font-weight-bold">PARKING SLOTS</label>
                                <p class="" id="numberParkingSlots" style="font-size: 2.5em; margin: 0; padding: 0;">{{ $users_login.'/'.$parking_slots }}</p>
                                <label class="">PARKED USER</label>
                            </div>
                            <div class="col my-auto">
                                <img src="{{ asset('image/park.png') }}" width="70%" alt="" class="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card mb-2 border-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col me-2">
                                <label class="font-weight-bold">VISITORS</label>
                                <p class="" id="numberVisitorRegistered" style="font-size: 2.5em; margin: 0; padding: 0;">{{ $visitors_login.'/'.$visitors_count }}</p>
                                <label class="">LOGGED IN</label>
                            </div>
                            <div class="col my-auto">
                                <img src="{{ asset('image/car.png') }}" width="70%" alt="" class="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br />
    <form method="GET" action="/admin-homepage">
        <!--DATE-->
        <div class="p-3" style="background: #000080; width: 300px;">
            <p class="h3 text-white">USER LOGS <span id="time"></span></p>

            <div>
                <input class="form-control" type="date" name="date_logs" value="{{ $request->date_logs ?? date('Y-m-d') }}">
            </div>
        </div>

        <!--SEARCH-->
        <div>
            <nav class="navbar navbar-light p-3" style="background: #000080;">
                <div class="form-row w-100">
                    <!-- <button type="submit" class="btn btn-primary mr-2">Search</button> -->
                    <div class="col-sm-4">
                        <input class="form-control mb-1" type="search" name="search" placeholder="Search" aria-label="Search" value="{{ $request->search ?? '' }}">
                    </div>
                    <!-- <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search" id="homepageSearch"> -->

                    <div class="col-sm-1">
                        <select class="homepageSort form-control mb-1" name="sortBy" id="select">
                            <option value="">Sort</option>
                            <option value="login_date" {{ $request->sortBy == 'login_date' ? 'selected': '' }}>Logged In</option>
                            <option value="logout_date" {{ $request->sortBy == 'logout_date' ? 'selected': '' }}>Logged Out</option>
                        </select>
                    </div>

                    <div class="col-sm-1">
                        <select class="homepageShow form-control mb-1" name="category" id="show">
                            <option value="">Show</option>
                            <option value="employee" {{ $request->category == 'employee' ? 'selected': '' }}>Employee</option>
                            <option value="student" {{ $request->category == 'student' ? 'selected': '' }}>Student</option>
                            <option value="visitor" {{ $request->category == 'visitor' ? 'selected': '' }}>Visitor</option>
                            <option value="visitor" {{ $request->category == 'guard' ? 'selected': '' }}>Guard</option>
                            <option value="visitor" {{ $request->category == 'admin' ? 'selected': '' }}>Admin</option>
                        </select>
                    </div>

                    <div class="col">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>

                    <div class="col text-right">
                        <!-- <button type="button" class="btn btn-success" id="download"> Download </button> -->
                        <!-- <button type="button" class="btn download mb-1" id="download"></button> -->
                    </div>

                </div>

            </nav>
        </div>
    </form>
    <!--TABLE-->
    <div class="table-responsive">
    <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">NAME</th>
                        <th scope="col">CATEGORY</th>
                        <th scope="col">PLATE NUMBER</th>
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
                            {{$log->fullname}}
                        </td>
                        <td>{{$log->category }}</td>
                        <td>{{ $log->plate_number }}</td>
                        <td>{{ $log->login_time }}</td>
                        <td>{{ $log->login_date }}</td>
                        <td>{{ $log->logout_time }}</td>
                        <td>{{ $log->logout_date }}</td>
                        <td>
                            @if($log->remarks)
                                {{$log->remarks}}
                            @else
                                No Violation
                            @endif
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>

</div>


<script>
    window.onload = setInterval(clock, 1000);

    function clock() {
        var d = new Date();
        var hour = d.getHours();
        var min = d.getMinutes();
        var sec = d.getSeconds();

        document.getElementById("time").innerHTML = hour + ":" + min;
    };

    $(document).ready(function() {
        dTable = $('#homepageTable').DataTable({
            "paging": false,
            "ordering": false,
            "info": false,
            "dom": "lrtip",
            dom: 'B',
            lengthChange: false,
            // buttons: [{
            //     text: 'Download',
            //     className: 'btn btn-success',
            //     extend: 'excelHtml5',
            // }],
            initComplete: function() {
                var btns = $('.dt-button');
                btns.addClass('btn btn-success');
                btns.removeClass('dt-button');
            },
            filterDropDown: {
                columns: [
                    1
                ]
            }
        });


        //dTable.buttons().container().appendTo($('#download'))

        // SEARCH
        $('#homepageSearch').keyup(function() {
            dTable.search($(this).val()).draw(); // this  is for customized searchbox with datatable search feature.
        });

        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });

    });
</script>

@stop