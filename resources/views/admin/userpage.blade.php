@extends('layouts.default')
@section('content')

<div class="wholeContainer">
    <!-- LOGS -->
    <div class="container mt-4">
        <!-- CARD -->
        <div class="row gx-5 mb-3">
            <div class="col-sm">
                <div class="card mb-2 border-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col me-2">
                                <label class="font-weight-bold">USERS</label>
                                <p class="" id="numberLoggedIn" style="font-size: 2.5em; margin: 0; padding: 0;">{{ $users_login }}/{{ $users_count }}</p>
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
                                <p class="" id="numberParkingSlots" style="font-size: 2.5em; margin: 0; padding: 0;">{{ $users_login }}/{{ $parking_slots }}</p>
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
                                <p class="" id="numberVisitorRegistered" style="font-size: 2.5em; margin: 0; padding: 0;">{{ $visitors_login }}/{{ $visitors_count }}</p>
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
    <br>

    <div class="p-2" style="background: #000080; width: 300px; margin: 0; padding: 0;">
        <p class="h3 text-white">USER LOGS <span id="time"></span></p>
    </div>

    <!--SEARCH-->
    <form method="GET" action="/admin-userpage">
        <nav class="navbar navbar-light p-3" style="background: #000080;">
            <div class="form-row w-100">

                <div class="col-sm-3">
                    <input class="form-control mb-1" type="search" name="search" placeholder="Search" aria-label="Search" value="{{ $request->search ?? '' }}">
                </div>

                <div class="col-sm-1">
                    <select class="homepageSort form-control mr-2" name="sortBy" placeholder="" id="select">
                        <option value="">Sort</option>
                        <option value="asc" {{ $request->sortBy == 'asc' ? 'selected': '' }}>NAME ASCENDING</option>
                        <option value="desc" {{ $request->sortBy == 'desc' ? 'selected': '' }}>NAME DESCENDING</option>
                    </select>
                </div>

                <div class="col-sm-1">
                    <select class="homepageShow form-control mr-2" name="category" placeholder="" id="select">
                        <option value="">Show</option>
                        <option value="employee" {{ $request->category == 'employee' ? 'selected': '' }}>Employee</option>
                        <option value="student" {{ $request->category == 'student' ? 'selected': '' }}>Student</option>
                        <option value="visitor" {{ $request->category == 'visitor' ? 'selected': '' }}>Visitor</option>
                        <option value="guard" {{ $request->category == 'guard' ? 'selected': '' }}>Guard</option>
                        <option value="admin" {{ $request->category == 'admin' ? 'selected': '' }}>Admin</option>
                    </select>
                </div>

                <div class="col-sm-1">
                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                </div>

                <div class="col-sm-1">
                    <a class="btn btn-primary" id="" href="/admin-user-add">Add User</a>
                </div>
                <div class="col-sm-1">
                    <a class="btn btn-primary" id="" href="/admin-user-add-vehicle">Add Vehicle</a>
                </div>
                <div class="col text-right">
                    <!-- <button type="button" class="btn btn-success" id="download">download</button> -->
                </div>
            </div>
        </nav>
    </form>

    <!--TABLE-->
    <div class="table-responsive">
        <table class="table table-borderless table-hover" id="userTable">
            <thead class="thead-dark ">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAME</th>
                    <th scope="col">PLATE NUMBER</th>
                    <th scope="col">VEHICLE REGISTRATION</th>
                    <th scope="col">CATEGORY</th>
                    <th scope="col">STATUS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr onclick="window.location=''">
                    <td>{{ $user->id }}</td>
                    <td id="{{ 'clickableName'.$user->id }}" onclick="popUserInfo()">
                        @if(isset($user->detail->firstname))
                        {{ $user->detail->firstname.' '.$user->detail->middlename.' '.$user->detail->lastname }}
                        @else
                        {{ $user->name }}
                        @endif
                    </td>
                    <td>
                        @if(isset($user->vehicles))
                        {{ $user->vehicles->last()->vehicle_plate_number }}
                        @endif
                    </td>
                    <td>
                        @if(isset($user->vehicles))
                        {{ $user->vehicles->last()->vehicle_registration_number }}
                        @endif
                    </td>
                    <td>{{ ucfirst($user->category) }}</td>
                    <td>{{ $user->status == 1 ? 'ACTIVE' : 'INACTIVE' }}</td>
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
        var workbook = new GC.Spread.Sheets.Workbook(document.getElementById("ss"));
    });

    $(document).ready(function() {
        dTable = $('#userTable').DataTable({
            "paging": false,
            "ordering": false,
            "info": false,
            "dom": "lrtip",
            // dom: 'B',
            // lengthChange: false,
            // buttons: [{
            //     text: 'Download',
            //     className: 'btn btn-success',
            //     extend: 'excelHtml5',
            // }, ],
            // initComplete: function() {
            //     var btns = $('.dt-button');
            //     btns.addClass('btn btn-success');
            //     btns.removeClass('dt-button');

            // },
            // filterDropDown: {
            //     columns: [
            //         1
            //     ]
            // }
        });


        // dTable.buttons().container().appendTo($('#download'))


        $('#userSearch').keyup(function() {
            dTable.search($(this).val()).draw(); // this  is for customized searchbox with datatable search feature.
        });

        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
    });
</script>

@stop