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

    <!-- Barcode CDN -->
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>
    <!-- QRCODE -->
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>

</head>

<body>
    <!-- inject laravel date formatter -->
    @inject('carbon', 'Carbon\Carbon')
    <nav class="navbar navbar-expand-lg navbar-light" style="background: #000080;">
        <a class="navbar-brand text-white" href="/guard-homepage">
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
            <ul class="navbar-nav">
                <li class="my-2 my-lg-0">
                    <a class="btn btn-secondary mr-2" href="/logout">LOGOUT</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- profile content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="profile-header text-center"><br>
                    <img src="{{ asset('image/avatar.png') }}" class="rounded-circle" alt="profile" width="200" height="200">
                    @if(isset($user->detail))
                    <h3 id="surname">{{ $user->detail->lastname }}</h3>
                    <h4 id="firstname">{{ $user->detail->firstname }}</h4>
                    @else
                    <h3 id="name">{{ $user->name }}</h3>
                    @endif
                    <hr>
                </div>

                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">PROFILE</a>
                    @if($user->category != 'admin' && $user->category != 'guard' && $user->category !='employee' && $user->category !='student')
                    <!-- <a class="nav-link" id="v-pills-event-tab" data-toggle="pill" href="#v-pills-event" role="tab" aria-controls="v-pills-event" aria-selected="false">EVENT</a> -->
                    <!--       <a class="nav-link" id="v-pills-notif-tab" data-toggle="pill" href="#v-pills-notif" role="tab" aria-controls="v-pills-notif" aria-selected="false">NOTIFICATION</a>
                <a class="nav-link" id="v-pills-trans-tab" data-toggle="pill" href="#v-pills-trans" role="tab" aria-controls="v-pills-trans" aria-selected="false">TRANSACTION</a> -->
                    @endif
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">ACTIVE VEHICLE</a>
                    <a class="nav-link" id="v-pills-history-tab" data-toggle="pill" href="#v-pills-history" role="tab" aria-controls="v-pills-history" aria-selected="false">HISTORY LOGS</a>
                    <a class="nav-link" id="v-pills-violation-tab" data-toggle="pill" href="#v-pills-violation" role="tab" aria-controls="v-pills-violation" aria-selected="false">VIOLATION</a>
                    <!-- <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">INACTIVE VEHICLE</a> -->
                </div>

                <hr><br>
                <footer class="container-fluid">
                    <label class="buksu-details">BUKSU CONTACT DETAILS</label>
                </footer>
            </div>

            <div class="col-md-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div id="profile" class="">
                            <h2 class="text-center">PROFILE</h2>
                            <hr>
                            <h4>PERSONAL INFORMATION</h4>

                            <div class="form-group col-sm-10 text-right">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                                    EDIT
                                </button>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-sm-3">
                                    <label for="firstname" class="font-weight-bold">FIRSTNAME</label>
                                    <input type="text" readonly class="form-control-plaintext" id="firstname" value="{{ $user->detail->firstname ?? 'NULL' }}">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label for="middlename" class="font-weight-bold">MIDDLENAME</label>
                                    <input type="text" readonly class="form-control-plaintext" id="middlename" value="{{ $user->detail->middlename ?? 'NULL' }}">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="surname" class="font-weight-bold">SURNAME</label>
                                    <input type="text" readonly class="form-control-plaintext" id="surname" value="{{ $user->detail->lastname ?? 'NULL' }}">
                                </div>


                            </div>


                            <div class="form-group col-md-12">
                                <label for="address" class="font-weight-bold" style="margin-left:-16px;">ADDRESS</label>
                                <input type="text" readonly class="form-control-plaintext" id="address" value="{{ $user->detail->address ?? 'NULL' }}" style="margin-left:-16px;">
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="contactno" class="font-weight-bold">CONTACT NUMBER</label>
                                    <input type="text" readonly class="form-control-plaintext" id="contactno" value="{{ $user->detail->contact_number ?? 'NULL' }}">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="emailAddress" class="font-weight-bold">EMAIL ADDRESSS</label>
                                    <input type="text" readonly class="form-control-plaintext" id="emailAddress" value="{{ $user->email ?? 'NULL' }}">
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="username" class="font-weight-bold">USERNAME</label>
                                    <input type="text" readonly class="form-control-plaintext" id="username" value="{{ $user->name ?? 'NULL' }}">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="Password" class="font-weight-bold"> PASSWORD</label>
                                    <input type="password" readonly class="form-control-plaintext" id="Password" value="********">
                                </div>
                            </div>
                            <div class="form-row">
                                @if($user->category != 'admin' && $user->category != 'guard' && $user->category !='employee' && $user->category !='student' &&$user->status == 1)
                                <div class="form-group col-md-3">
                                    <!--QRCODE -->
                                    <input type="hidden" id="myID" value="{{$user->id}}">
                                    <div id="qrcode"></div>

                                    <!-- BARCODE -->
                                    <!-- @if(isset($user->vehicles))
                                      <img id="barcode" class="barcode" jsbarcode-format="code128" jsbarcode-value="{{ $user->vehicles->last()->rfid }}" jsbarcode-textmargin="0" jsbarcode-fontoptions="bold">  -->
                                    <!-- <button type="button" class="btn btn-success download" id="downloadBarcode">Download</button> -->
                                    <!-- @endif -->
                                </div>
                                @endif
                            </div>
                            <h4>LICENSE DETAILS</h4>
                            @if(isset($user->license))
                            <div class="form-row">
                                <div class="form-group col-sm-3">
                                    <label for="DriversLicenseNo" class="font-weight-bold">DRIVERS LICENSE NUMBER</label>
                                    <input type="text" readonly class="form-control-plaintext" id="DriversLicenseNo" value="{{ $user->license->drivers_license_number ?? 'NULL' }}">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="DriversLicenseExpiry" class="font-weight-bold">DRIVERS LICENSE EXPIRY</label>
                                    <div class="form-row">
                                        <div>
                                            <!-- <img src="" class="img-fluid" alt="Responsive image"> -->

                                        </div>
                                        <!-- <div class="for-group col-sm-3">
                                        <input type="text" readonly class="form-control-plaintext" id="DriversLicenseExpiry" value="MAY">
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <input type="text" readonly class="form-control-plaintext" id="DriversLicenseExpiry" value="12">
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <input type="text" readonly class="form-control-plaintext" id="DriversLicenseExpiry" value="2025">
                                    </div> -->
                                    </div>
                                </div>

                                <div class="form-group col-sm-3">
                                    <label for="licenseType" class="font-weight-bold">TYPE</label>
                                    <div>
                                        {{ strtoupper($user->license->license_type) ?? 'NULL' }}
                                    </div>

                                    <!-- <input type="text" readonly class="form-control-plaintext" id="licenseType" value="NON-PROFESSIONAL"> -->
                                </div>
                            </div>
                            @endif
                            <div class="form-row">
                                <div class="form-group col-sm-3">
                                    <label for="attachedoc" class="font-weight-bold">ATTACHED DOCUMENT</label><br>
                                    @if(isset($user->license))
                                    <!-- <img src="" class="img-fluid" alt="Responsive image"> -->
                                    @endif
                                    <!-- <button type="button" class="btn btn-default btn-sm " for="license_document">
                                    <i class="fas fa-paperclip"></i>
                                </button>  -->

                                </div>
                                @if($user->category != 'admin' && $user->category != 'guard' && $user->category !='employee' && $user->category !='student')
                                <div class="form-group col-sm-5 text-right"><br>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#licenseModal">ADD</button>
                                    <!-- <button type="button" class="btn btn-primary btn-sm" onclick="enterLicenseDetails()">RENEW</button> -->
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- <div class="tab-pane fade" id="v-pills-event" role="tabpanel" aria-labelledby="v-pills-event-tab">
                    <div class="notification" id="notification">
                    <br>
                        <h2>EVENT</h2>
                        <hr>
                        <div class="form-group col-sm-8 text-right">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#eventModal">ADD </button>
                        </div>
                        
                      
                        <br>
                        <hr>
                    </div>
                </div> -->

                    <!--
                    <div class="tab-pane fade" id="v-pills-trans" role="tabpanel" aria-labelledby="v-pills-trans-tab">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">DATE</th>
                                    <th scope="col">TIME</th>
                                    <th scope="col">ACTIVITY</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">REMARKS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $carbon::parse($transaction->created_at)->toFormattedDateString() }}</td>
                                    <td>{{ $carbon::parse($transaction->created_at)->toTimeString() }}</td>
                                    <td>{{ $transaction->specification }}</td>
                                    <td>
                                        @if ($transaction->status == 1)
                                        PENDING
                                        @else
                                        APPROVED
                                        @endif
                                    </td>
                                    <td>
                                        @if (isset($transaction->notification))
                                        {{ $transaction->notification->remarks }}
                                        @endif
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
-->
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <div class="activeVehicle" id="activeVehicle">
                            <br>
                            <h2>ACTIVE VEHICLES</h2>
                            <hr>
                            <!-- <div class="form-group col-sm-8 text-right">
                                <button type="button" class="btn btn-default btn-sm " data-toggle="modal" data-target="#vehicleModal">ADD</button>
                            </div> -->

                            @include('includes.vehicles_active')
                            <br>
                            <hr>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="v-pills-history" role="tabpanel" aria-labelledby="v-pills-history-tab">
                        <div class="activeVehicle" id="activeVehicle">
                            <br>
                            <h2>HISTORY LOGS</h2>
                            <hr>
                            <div class="form-group col-sm-8 text-right">
                                <!-- <button type="button" class="btn btn-default btn-sm " data-toggle="modal" data-target="#vehicleModal">ADD</button> -->
                            </div>

                            @include('includes.history')
                            <br>
                            <hr>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-violation" role="tabpanel" aria-labelledby="v-pills-violation-tab">
                        <div class="activeVehicle" id="activeVehicle">
                            <br>
                            <h2>VIOLATIONS</h2>
                            <hr>
                            <div class="form-group col-sm-8 text-right">
                                <!-- <button type="button" class="btn btn-default btn-sm " data-toggle="modal" data-target="#vehicleModal">ADD</button> -->
                            </div>

                            @include('includes.violation')
                            <br>
                            <hr>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                        <div class="inactiveVehicle" id="inactiveVehicle">
                            <br>
                            <h2>INACTIVE VEHICLES</h2>
                            <hr>
                            @include('includes.vehicles_inactive')
                            <br>
                            <hr>
                        </div>
                    </div>
                </div>

                <!-- Modal Personal Info -->
                @include('modal.personal-info')

                <!-- Modal LIcense Details -->
                @include('modal.personal-license')

                <!-- Modal Add Vehicle -->
                @include('modal.personal-vehicles')

                @if($errors->personal->any())
                <script>
                    $(function() {
                        $('#exampleModal').modal('show');
                    });
                </script>
                @elseif($errors->license->any() || $errors->document->any())
                <script>
                    $(function() {
                        $('#licenseModal').modal('show');
                    });
                </script>
                @else($errors->vehicles->any() || $errors->document->any())
                <script>
                    $(function() {
                        $('#vehicleModal').modal('hide');
                    });
                </script>
                @endif
                <div id="transaction"></div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        new QRCode(document.getElementById("qrcode"), $('#myID').val());
    </script>

    @if($errors->report->any())
    <script>
        $(function() {
            $('#reportModal').modal('show');
        });
    </script>
    @endif

    <script>
        JsBarcode(".barcode").init();

        var barcodeCtrl;
        $(function() {
            $("#barcode").ejBarcode({
                text: "HTTP://WWW.SYNCFUSION.COM",
                symbologyType: "qrbarcode",
                xDimension: 12,
            });
            barcodeCtrl = $("#barcode").data("ejBarcode");
        });

        function Download(link, canvasId, filename) {
            link.href = document.querySelector(canvasId).toDataURL();
            link.download = filename;
        }

        document.getElementById('downloadBarcode').addEventListener('click', function() {
            Download(this, '#barcode canvas', 'Barcode.png');
        }, false);
    </script>
</body>

</html>