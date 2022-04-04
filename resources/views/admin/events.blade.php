@extends('layouts.default')
@section('content')
<div>
    <div class="text-right p-2">
        <a href="/admin-events-add"><button type="button" class="btn btn-success" id="eventHistry"> ADD EVENT </button></a>
        <a href=""><button type="button" class="btn btn-success" id="eventHistry"> HISTORY </button></a>
    </div>
</div>

<!--EVENT CARD-->
<div class="">
     @foreach($events as $event)
    <div class="col d-inline-flex">

        <div class="card mt-3 border border-primary p-2" id="" style="width: 280px;">
            <div class="text-right">
                <a href="/admin-events/{{$event->id}}/edit">
                    <svg class="eventEditIcon" xmlns="http://www.w3.org/2000/svg" width="20" height="26" fill="currentColor" class="bi bi-pencil-square" id="editIconUniqAct" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg>
                </a>

                <a href="/admin-events/{{$event->id}}" class="removeEvents">
                    <svg class="eventDeleteIcon" xmlns="http://www.w3.org/2000/svg" width="20" height="26" fill="currentColor" class="bi bi-trash" id="deleteIconUniqAct" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                    </svg>
                </a>
              

            </div>
            <p class="card-title h2" style="margin: 0; padding: 0;">{{ $event->event_title }}</p>
            <p class="eventNo">{{$event->id}}</p>


            <div class="row text-center" style="margin: 0; padding: 0;">
                <div class="col">
                    <p class="font-weight-bold">START</p>
                    <p class="eventDate">{{ Carbon\Carbon::parse ($event->date_started_at)->format('Y-m-d') }}</p>
                    <p class="eventTime" style="margin: 0; padding: 0;">{{ Carbon\Carbon::parse ($event->time_started_at)->format('h-i') }}</p>
                </div>
                <div class="col">
                    <p class="font-weight-bold">END</p>
                    <p class="eventDate">{{ Carbon\Carbon::parse ($event->date_ended_at)->format('Y-m-d') }}</p>
                    <p class="eventTime" style="margin: 0; padding: 0;">{{ Carbon\Carbon::parse ($event->time_ended_at)->format('h-i')}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>

@stop