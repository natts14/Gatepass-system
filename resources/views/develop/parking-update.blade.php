@extends('layouts.default')
@section('content')

<form method="POST" action="/admin-parking-space/{{$parking->id}}" class="needs-validation" id="updateParking">
 @csrf
 @method('PUT')
<div class="container w-50 p-4 bg-light my-auto mx-auto">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif 
    <div class="p-4">
        <p class="h3 text-center p-1">UPDATE PARKING SLOTS</p>
        <div class="row">
            <div class="col-sm">
                <label class="text-center">AREA CODE</label>
                <input type="text" class="form-control" id="" name="area_code" value="{{$parking->area_code}}" placeholder="">
            </div>
            <div class="col-sm">
                <label>CAPACITY</label>
                <input type="text" class="form-control" id="" name="capacity" value="{{$parking->capacity}}" placeholder="">
            </div>
        </div> <br>
        <div class="row ">
            <div class="col-sm">
                <label>PARKING TYPE</label>
                <div class="ml-4">
                    <input class="form-check-input" type="radio" name="parking_type" id="" value="vehicle" {{ $parking->parking_type == 'vehicle' ? 'checked': '' }}>
                    <label class="form-check-label mb-3">VEHICLE</label>
                </div>
                <div class="ml-4">
                    <input class="form-check-input" type="radio" name="parking_type" id="" value="motorcycle" {{ $parking->parking_type == 'motorcycle' ? 'checked': '' }}>
                    <label class="form-check-label">MOTORCYCLE</label>
                </div>
            </div>
            <div class="col-sm">
                <label>SENSOR ID</label>
                <select class="form-control" id="sensorID" name="sensor_id" placeholder="">
                    <option {{ $parking->sensor_id == 'ABC' ? 'selected': '' }} value="ABC">ABC</option>
                    <option {{ $parking->sensor_id == 'DEF' ? 'selected': '' }} value="DEF">DEF</option>
                </select>
                <label for="favcolor">SLOT COLOR: </label>
                <input type="color" class="mt-1" id="slotColor" name="slot_color" value="{{$parking->slot_color}}"><br><br>
            </div>
        </div>

        <div class="addParkingSlotButton text-center">
            <button type="submit" class="btn btn-success" id="submitAddedParkingSpace" > SUBMIT </button>
            <button type="button" class="btn btn-danger" id="cancelAddedParkingSpace" onclick="javascript:window.history.back();"> CANCEL </button>
        </div>
    </div>
</div>
</form>

<script>
    $('#timepicker').timepicker({
        uiLibrary: 'bootstrap4'
    });

    $(function() {
        $('#datetimepicker3').datetimepicker({
            format: 'LT'
        });
    });
</script>

@stop