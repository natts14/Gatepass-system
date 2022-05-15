@extends('layouts.default')
@section('content')

<div class="">
    <div class="row w-100 mt-3">
        <div class="col-sm">
            <div class="row form-inline">
                <div class="col">
                    <p class="h3 mt-3 ml-4">PARKING SLOTS</p>
                </div>
                <div class="col text-right my-auto mx-auto">
                    <a href="/admin-parking-space-add">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="36" fill="currentColor" class="bi bi-plus" id="addParkingSlotsIcon" onclick="addParkingSlots()" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg>
                    </a>
                </div>
            </div>

            <div class="row p-3">
                <div class="col-sm">
                    <?php
                    //Columns must be a factor of 12 (1,2,3,4,6,12)
                    $numOfCols = 3;
                    $rowCount = 0;
                    $bootstrapColWidth = 12 / $numOfCols;
                    ?>
                    <div class="row mb-3">
                        <?php
                        foreach ($parkings as $parking) {
                        ?>
                            <div class="col-md-<?php echo $bootstrapColWidth; ?> mb-3" id="">
                                <div class="card p-3">
                                    <div class="text-right">
                                        <a href="/admin-parking-space/{{$parking->id}}/edit">
                                            <svg class="" xmlns="http://www.w3.org/2000/svg" width="20" height="26" fill="currentColor" class="bi bi-pencil-square" id="editIconUniqAct" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </a>

                                        <a href="/admin-parking-space/{{$parking->id}}">
                                            <svg class="" xmlns="http://www.w3.org/2000/svg" width="20" height="26" fill="currentColor" class="bi bi-trash" id="deleteIconUniqAct" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                            </svg>
                                        </a>

                                    </div>
                                    <div class="text-center">
                                        <p class="card-title h2">{{$parking->area_code}}</p>
                                        <p class="parkingSpaceNo h2">{{ count($parking->parking_logs) }}/{{$parking->capacity}}</p>
                                        <p class="parkingSpaceType">{{$parking->parking_type}}</p>
                                    </div>
                                </div>
                            </div>
                        <?php
                            $rowCount++;
                            if ($rowCount % $numOfCols == 0) echo '</div><div class="row">';
                        }
                        ?>

                    </div>

                </div>
            </div>

        </div>
        <div class="col" id="">
            <div class="d-inline-flex">

                <img src="{{ asset('image/BukSUMap.jpg') }}" width="100%" alt="">

                <div class="text-right mt-2">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customInput" required>
                        <label class="custom-file-label" for="customInput">

                        </label>
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>

@stop