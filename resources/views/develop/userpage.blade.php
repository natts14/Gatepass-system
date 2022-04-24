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
                                <p class="" id="numberLoggedIn" style="font-size: 2.5em; margin: 0; padding: 0;">70/350</p>
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
                                <p class="" id="numberParkingSlots" style="font-size: 2.5em; margin: 0; padding: 0;">65/70</p>
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
                                <p class="" id="numberVisitorRegistered" style="font-size: 2.5em; margin: 0; padding: 0;">10/50</p>
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
    <div>
        <nav class="navbar navbar-light p-3" style="background: #000080;">
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" id="userSearch" aria-label="Search" style="width: 440px;">

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

                <div>
                    <a class="btn btn-primary w-100" id="addUserButton" href="/admin-user-add">Add User</a>
                </div>
            </form>

            <div class="downloadButton">
                <button type="button" class="btn" id="download"></button>
            </div>


        </nav>
    </div>

    <!--TABLE-->
    <div class="table-responsive">
        <table class="table table-borderless table-hover" id="userTable">
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
            @foreach ($users as $user)
                <tr onclick="window.location='/admin'">
                    <td id="clickableName{{$user->id}}" onclick="popUserInfo()">{{$user->firstname.' '.$user->middlename.' '.$user->lastname}}</td>
                    <td>{{$user->user->category}}</td>
                    <td>7:00 AM</td>
                    <td>4-9-2021</td>
                    <td>5:00 PM</td>
                    <td>4-9-2021</td>
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
        dTable = $('#userTable').DataTable({
            "paging": false,
            "ordering": false,
            "info": false,
            "dom": "lrtip",
            dom: 'B',
            lengthChange: false,
            buttons: [{
                text: 'Download',
                className: 'btn btn-success',
                extend: 'excelHtml5',
            }, ],
            initComplete: function() {
                var btns = $('.dt-button');
                btns.addClass('btn btn-success');
                btns.removeClass('dt-button');

            },
            "columnDefs": [{
                "targets": [0, 2],
                "orderable": false
            }],
            "order": [
                [1, "asc"]
            ]
        });


        dTable.buttons().container().appendTo($('#download'))


        $('#userSearch').keyup(function() {
            dTable.search($(this).val()).draw(); // this  is for customized searchbox with datatable search feature.
        });

        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
    });
</script>

@stop