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
                <!-- <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">PROFILE</a> -->
                @if($user->category != 'admin' && $user->category != 'guard' && $user->category !='employee' && $user->category !='student')
                    <a class="nav-link" id="v-pills-event-tab" data-toggle="pill" href="#v-pills-event" role="tab" aria-controls="v-pills-event" aria-selected="false">EVENT</a>
         <!--       <a class="nav-link" id="v-pills-notif-tab" data-toggle="pill" href="#v-pills-notif" role="tab" aria-controls="v-pills-notif" aria-selected="false">NOTIFICATION</a>
                <a class="nav-link" id="v-pills-trans-tab" data-toggle="pill" href="#v-pills-trans" role="tab" aria-controls="v-pills-trans" aria-selected="false">TRANSACTION</a> -->
                @endif
                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">ACTIVE VEHICLE</a>
                <!-- <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">INACTIVE VEHICLE</a> -->
            </div>

            <hr><br>
            <footer class="container-fluid">
                <!-- <label class="buksu-details">BUKSU CONTACT DETAILS</label> -->
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

                            <div class="form-group col-md-3">
                                <label for="surname" class="font-weight-bold">SUFFIX</label>
                                <input type="text" readonly class="form-control-plaintext" id="suffix" value="">
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
                                <input type="password" readonly class="form-control-plaintext" id="Password" value="******">
                            </div>
                        </div>



                        <h4>LICENSE DETAILS</h4>
                        @if(isset($user->license))
                        <div class="form-row">
                            <div class="form-group col-sm-3">
                                <label for="DriversLicenseNo" class="font-weight-bold">DRIVERS LICENSE NUMBER</label>
                                <input type="text" readonly class="form-control-plaintext" id="DriversLicenseNo" 
                                    value="{{ $user->license->drivers_license_number ?? 'NULL' }}">
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="DriversLicenseExpiry" class="font-weight-bold">DRIVERS LICENSE EXPIRY</label>
                                <div class="form-row">
                                    <div>
                                    {{ $user->license->drivers_license_expiry ?? 'NULL' }}
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
                                <!-- <label for="attachedoc" class="font-weight-bold">ATTACHED DOCUMENT</label><br> -->
                                <!--  -->
                                <!-- <button type="button" class="btn btn-default btn-sm " for="license_document">
                                    <i class="fas fa-paperclip"></i>
                                </button> -->
                                
                            </div>
                            <div class="form-group col-sm-5 text-right"><br>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#licenseModal">EDIT </button>
                                <!-- <button type="button" class="btn btn-primary btn-sm" onclick="enterLicenseDetails()">RENEW</button> -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="v-pills-notif" role="tabpanel" aria-labelledby="v-pills-notif-tab">
                    <div class="notification" id="notification">
                        @if (count($notifications) == 0)
                            No new notification
                        @endif
                        @foreach ($notifications as $notification)
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <h6>{{ $notification->remarks }}</h6>
                                @if ($notification->type == 'license')
                                    <h6>DRIVER NUMBER: {{ $notification->renewal->license->drivers_lilcense_number }}</h6>
                                @else
                                    <h6>PLATE NUMBER: {{ $notification->renewal->vehicle->vehicle_plate_number }}</h6>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <h6>{{ $carbon::parse($notification->created_at)->toFormattedDateString() }}</h6>
                                <h6>{{ $carbon::parse($notification->created_at)->toTimeString() }}</h6>
                            </div>
                        </div>
                        <hr>
                        @endforeach
                    </div>
                </div>

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
                        <div class="form-group col-sm-8 text-right">
                            <!-- <button type="button" class="btn btn-default btn-sm " data-toggle="modal" data-target="#vehicleModal">ADD</button> -->
                        </div>
                        
                        @include('includes.vehicles_active')
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
                    $('#vehicleModal').modal('show');
                });
                </script>
            @endif
            <div id="transaction"></div>
        </div>
    </div>
</div>