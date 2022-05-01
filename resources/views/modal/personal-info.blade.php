<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">    
        <form action="{{ route('admin.profile.update', ['personal']) }}" method="POST">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">PERSONAL INFORMATION</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if ($errors->personal->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->personal->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif 
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="firstname" class="font-weight-bold">FIRSTNAME</label>
                            <input type="text" class="form-control" name="firstname" 
                            {{ isset($user->detail->firstname) ? 'readonly': '' }}  value="{{ $user->detail->firstname ?? '' }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="middlename" class="font-weight-bold">MIDDLENAME</label>
                            <input type="text" class="form-control" name="middlename" 
                            {{ isset($user->detail->middlename) ? 'readonly': '' }}  value="{{ $user->detail->middlename ?? '' }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="lastname" class="font-weight-bold">SURNAME</label>
                            <input type="text" class="form-control" name="lastname" 
                            {{ isset($user->detail->lastname) ? 'readonly': '' }}  value="{{ $user->detail->lastname ?? '' }}">
                        </div>
                    </div>

                    <div class="form-group col-md-13">
                        <label for="address" class="font-weight-bold">ADDRESS</label>
                        <input type="text" class="form-control" name="address" value="{{ $user->detail->address ?? '' }}">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="contactno" class="font-weight-bold">CONTACT NUMBER</label>
                            <input type="text" class="form-control" name="contact_number" value="{{ $user->detail->contact_number ?? '' }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="emailAddress" class="font-weight-bold">EMAIL ADDRESS</label>
                            <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="username" class="font-weight-bold">USERNAME</label>
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="Password" class="font-weight-bold">PASSWORD</label>
                            <input type="password" placeholder="******" class="form-control" name="password">
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>