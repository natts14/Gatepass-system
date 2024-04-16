@extends('layouts.default')
@section('content')

<div class="container">
    <div class="col-sm-8 mx-auto">
        <!--EVENT ADD -->
        <form method="POST" action="/admin-events" class="needs-validation" id="updateEvent">
            @csrf
            <div class="card p-4 mt-4">
                <p class="h3 text-center">ADD EVENT</p>
                <input type="hidden" value="" name="id" required>

                <p class="font-weight-bold">EVENT TITLE</p>
                <input type="text" name="event_title" id="event_title" class="eventTitle form-control" id="eventTitleInputBox" value="" required>

                <br />
                <p class="font-weight-bold">EVENT TIME & DATE</p>
                <div class="row">
                    <div class="col">
                        <p class="text-center">START ON:</p>
                        <div class="col-md-11 addEventDate">
                            <input class="form-control" type="date" id="date_started_at" name="date_started_at" required>
                        </div><br>

                        <p class="text-center">START TIME:</p>
                        <div class="col-md-11">
                            <input class="form-control" type="time" id="time_started_at" name="time_started_at" required>
                        </div><br>
                    </div>

                    <div class="col">
                        <p class="text-center">ENDS ON:</p>
                        <div class="col-md-11">
                            <input class="form-control" type="date" id="date_ended_at" name="date_ended_at" required>
                        </div><br>

                        <p class="text-center">END TIME:</p>
                        <div class="col-md-11">
                            <input class="form-control" type="time" id="time_ended_at" name="time_ended_at" required>
                        </div><br>
                    </div>


                </div>

                <div class="addEventButton mt-3 text-center">
                    <button type="submit" class="btn btn-success"> SUBMIT </button>
                    <button type="button" class="btn btn-danger" id="cancelEventButton" onclick="javascript:window.history.back();"> BACK </button>
                </div>
            </div>
        </form>
    </div>

</div>

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