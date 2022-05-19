@foreach ($vehicles['active'] as $vehicle)
<div>
    <div class="form-row">
        <div class="form-group col-sm-3">
            <h1>{{ $vehicle->vehicle_plate_number }}</h1>
        </div>
        <div class="form-group col-sm-3">
            <h1></h1>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-sm-3">
            <label for="vehicleRegistarationNo" class="font-weight-bold">VEHICLE REGISTRATION NUMBER</label>
            <input type="text" readonly class="form-control-plaintext" id="vehicleRegistarationNo" value="{{ $vehicle->vehicle_registration_number }}">
        </div>
        <div class="form-group col-sm-3">
            <label for="vehicleExpiryDate" class="font-weight-bold">VEHICLE EXPIRY DATE</label>
            <input type="text" readonly class="form-control-plaintext" id="vehicleExpiryDate" 
                value="{{ $carbon::parse($vehicle->vehicle_registration_expiry)->toFormattedDateString() }}">
        </div>
        @if($user->category != 'visitor') 
        <div class="form-group col-sm-3">
            <label for="vehicleRegistarationNo" class="font-weight-bold">RFID</label>
            <input type="text" readonly class="form-control-plaintext" id="vehicleRegistarationNo" value="{{ $vehicle->rfid}}">
        </div>
        @endif
    </div>

    <div class="form-row">
        <div class="form-group col-sm-3">
            <label for="model" class="font-weight-bold">MODEL</label>
            <input type="text" readonly class="form-control-plaintext" id="model" value="{{ strtoupper($vehicle->model) }}">
        </div>
        <div class="form-group col-sm-3">
            <label for="type" class="font-weight-bold">TYPE</label>
            <input type="text" readonly class="form-control-plaintext" id="type" value="{{ strtoupper($vehicle->type) }}">
        </div>
        <div class="form-group col-sm-3">
            <label for="color" class="font-weight-bold">COLOR</label>
            <input type="text" readonly class="form-control-plaintext" id="model" value="{{ strtoupper($vehicle->color) }}">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-sm-3">
            <label for="model" class="font-weight-bold">ATTACHED DOCUMENT</label><br>
            @if(isset($user->vehicle))
                 <img src="{{url('image/documents/'.$user->vehicle->document->name ?? 'NO ATTACHED DOCUMENT')}}" class="img-fluid" alt="Responsive image">
              @endif
        </div>
        <div class="form-group col-sm-5 text-right"><br>
      <!--      <button type="button" class="btn btn-default btn-sm " data-toggle="modal" data-target="">EDIT</button> -->
            <!-- <button type="button" class="btn btn-default btn-sm " data-toggle="modal" data-target="">REMOVE</button> -->
        </div>
    </div> 
</div>
@endforeach