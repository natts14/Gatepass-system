@extends('layouts.default')
@section('content')

    <!--EVENT UPDATE -->
    <form method="POST" class="needs-validation" id="updateEvent">
        <div class="card w-50 mx-auto mt-4 bg-light p-4 ">
            <p class="h3 text-center">ADD EVENT</p>
            <input type="hidden" value="" name="id" required>

            <p class="font-weight-bold">EVENT TITLE</p>
            <input type="text" name="eventTitle" class="eventTitle form-control" id="eventTitleInputBox" value="" required>

            <br />
            <p class="font-weight-bold">EVENT TIME & DATE</p>
            <div class="row">
                <div class="col">
                    <p class="text-center">START ON:</p>
                    <div class="col-md-11 addEventDate">
                        <form action="/action_page.php">
                            <input class="form-control" type="date" id="" name="" required>
                        </form>
                    </div><br>

                    <p class="text-center">START TIME:</p>
                    <div class="col-md-11">
                        <form action="/action_page.php">
                            <input class="form-control" type="time" id="" name="time" required>
                        </form>
                    </div><br>
                </div>

                <div class="col">
                    <p class="text-center">ENDS ON:</p>
                    <div class="col-md-11">
                        <form action="/action_page.php">
                            <input class="form-control" type="date" id="" name="" required>
                        </form>
                    </div><br>

                    <p class="text-center">END TIME:</p>
                    <div class="col-md-11">
                        <form action="/action_page.php">
                            <input class="form-control" type="time" id="" name="time" required>
                        </form>
                    </div><br>
                </div>


            </div>

            <div class="addEventButton mt-3 text-center">
                <button type="submit" class="btn btn-success"> SUBMIT </button>
                <button type="button" class="btn btn-danger" id="cancelEventButton" onclick="javascript:window.history.back();"> BACK </button>
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