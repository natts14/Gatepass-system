@extends('layouts.default')
@section('content')

<div class="container w-50 p-4 mt-4 bg-light mx-auto">
    <div class="p-4">
        <p class="h3 text-center p-1">ADD PARKING SLOTS</p>
        <div class="row">
            <div class="col-sm">
                <label class="text-center">AREA CODE</label>
                <input type="text" class="form-control" id="" placeholder="">
            </div>
            <div class="col-sm">
                <label>CAPACITY</label>
                <input type="text" class="form-control" id="" placeholder="">
            </div>
        </div> <br>
        <div class="row ">
            <div class="col-sm">
                <label>PARKING TYPE</label>
                <div class="ml-4">
                    <input class="form-check-input" type="radio" name="" id="" value="option1" checked>
                    <label class="form-check-label mb-3">VEHICLE</label>
                </div>
                <div class="ml-4">
                    <input class="form-check-input" type="radio" name="" id="" value="option2" checked>
                    <label class="form-check-label">MOTORCYCLE</label>
                </div>
            </div>
            <div class="col-sm">
                <label>SENSOR ID</label>
                <select class="form-control" id="sensorID" placeholder="">
                    <option>ABC</option>
                    <option>DEF</option>
                </select>
                <label for="favcolor">SLOT COLOR: </label>
                <input type="color" class="mt-1" id="slotColor" name="" value=""><br><br>
            </div>
        </div>

        <div class="addParkingSlotButton text-center">
            <button type="button" class="btn btn-success" id="submitAddedParkingSpace" onclick="addParkingSlotSubmit()"> SUBMIT </button>
            <button type="button" class="btn btn-danger" id="cancelAddedParkingSpace" onclick="addParkingSlotCancel()"> CANCEL </button>
        </div>
    </div>
</div>

@stop