<div class="modal fade bd-example-modal-lg" id="licenseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('admin.profile.update', ['license']) }}" enctype="multipart/form-data" method="POST">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">LICENSE DETAILS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if ($errors->license->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->license->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif 
                    @if ($errors->document->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->document->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif 
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="DriversLicenseNo" class="font-weight-bold">DRIVERS LICENSE NUMBER</label>
                            <input type="text" class="form-control" id="DriversLicenseNo" name="drivers_license_number" 
                                value="{{ $user->license->drivers_license_number ?? '' }}">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="DriversLicenseExpiry" class="font-weight-bold">DRIVERS LICENSE EXPIRY DATE</label>

                            <div class="form-row">
                                <input class="form-control" type="date" id="" name="drivers_license_expiry" style="width: 250px;"
                                    value="{{ $user->license->drivers_license_expiry ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="font-weight-bold">TYPE</label>
                            @if(isset($user->license))   
                            <select class="form-control mb-2" name="license_type">
                                <option {{ $user->license->license_type == 'student' ? 'selected' : '' }} value="student">Student Permit</option>
                                <option {{ $user->license->license_type == 'non-prof' ? 'selected': '' }} value="non-prof">Non-Professional</option>
                                <option {{ $user->license->license_type == 'prof' ? 'selected': '' }} value="prof">Professional</option>
                            </select>
                            <input type="hidden" value="{{$user->license->status ?? 2}}" name="status">
                            @else
                            <select class="form-control mb-2" name="license_type">
                                <option value="student">Student Permit</option>
                                <option value="non-prof">Non-Professional</option>
                                <option value="prof">Professional</option>
                            </select>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="attachedoc" class="font-weight-bold">ATTACH DOCUMENT</label><br>
                            <input type="file" name="document" id="document" required>
                            <!-- <button type="button" class="btn btn-default btn-sm " onclick=""><i class="fas fa-paperclip"></i></button> -->
                        </div>
                    </div>
                    <hr>
                    <!-- <p class="text-center">Upon submitting your application status will will be pending and to be approved</p> -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>