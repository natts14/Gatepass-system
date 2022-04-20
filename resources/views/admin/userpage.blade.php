@extends('layouts.default')
@section('content')

<div class="wholeContainer">
    <div class="container mt-4 mb-4">
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
                    <a class="btn btn-primary w-100" id="addUserButton" href="/admin-add-user">Add User</a>
                </div>
            </form>

            <div class="downloadButton">
                <button type="button" class="btn btn-success" id="download"> Download </button>
            </div>


        </nav>
    </div>

    <!--TABLE-->
    <div>
        <table class="table table-bordered" id="userTable">
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


<script>
    $(document).ready(function() {
        dTable = $('#userTable').DataTable({
            "paging": false,
            "ordering": false,
            "info": false,
            "dom": "lrtip"
        });
        $('#userSearch').keyup(function() {
            dTable.search($(this).val()).draw(); // this  is for customized searchbox with datatable search feature.
        });

        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });

        window.onload = setInterval(clock, 1000);

        function clock() {
            var d = new Date();
            var hour = d.getHours();
            var min = d.getMinutes();
            var sec = d.getSeconds();

            document.getElementById("time").innerHTML = hour + ":" + min;
        };


    });
</script>

@stop