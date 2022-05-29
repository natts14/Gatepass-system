@foreach ($vehicles['active'] as $vehicle)
<div>
    <div class="form-row">
        <div class="form-group col-sm-3">
   <!--QRCODE -->
   @if($user->category != 'admin' && $user->category != 'guard' && $user->category !='employee' && $user->category !='student')
            <input type="hidden" id="myID-{{$vehicle->vehicle_plate_number}}" value="{{ $vehicle->id }}">
            <div id="qrcode-{{$vehicle->vehicle_plate_number}}"></div>
            <h1>{{ $vehicle->vehicle_plate_number }}</h1>
      @endif
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
    <label for="model" class="font-weight-bold">ATTACHED DOCUMENT</label><br>
    <div class="form-row">
          @if(isset($vehicle->document))
        <div class="form-group col-sm-3">
            <label for="model" class="font-weight-bold">FRONT</label><br>
            <img src="{{url('image/documents/'.$vehicle->document->front )}}" class="img-fluid" alt="Responsive image">
        </div>
        <div class="form-group col-sm-3">
           <label for="model" class="font-weight-bold">BACK</label><br>
           <img src="{{url('image/documents/'.$vehicle->document->back )}}" class="img-fluid" alt="Responsive image">
        </div>
        <div class="form-group col-sm-3">
           <label for="model" class="font-weight-bold">LEFT</label><br>
            <img src="{{url('image/documents/'.$vehicle->document->left )}}" class="img-fluid" alt="Responsive image">  
        </div>
        <div class="form-group col-sm-3">
           <label for="model" class="font-weight-bold">RIGHT</label><br>
            <img src="{{url('image/documents/'.$vehicle->document->right )}}" class="img-fluid" alt="Responsive image">  
     </div>
        @endif
        <div class="form-group col-sm-5 text-right"><br>
      <!--      <button type="button" class="btn btn-default btn-sm " data-toggle="modal" data-target="">EDIT</button> -->
            <!-- <button type="button" class="btn btn-default btn-sm " data-toggle="modal" data-target="">REMOVE</button> -->
        </div>
    </div> 
</div>
<script type="text/javascript">
    new QRCode(document.getElementById("qrcode-{{$vehicle->vehicle_plate_number}}"), $('#myID-{{$vehicle->vehicle_plate_number}}').val());
</script>
@endforeach


