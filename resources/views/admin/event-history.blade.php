@extends('layouts.default')
@section('content')
@inject('carbon', 'Carbon\Carbon')
<div class="w-75 mx-auto p-5">
    <div class="mb-3">
        <form class="form-inline" method="GET" action="/admin-events-history">
            @csrf
            <input type="text" name="search"  value="{{ $request->search ?? '' }}" 
                class="form-control mr-2" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />

            <select class="homepageSort form-control mr-2" name="sortBy">
                <option value="">Sort</option>
                <option value="date_started_at" {{ $request->sortBy == 'date_started_at' ? 'selected': '' }}>Date Started</option>
                <option value="date_ended_at" {{ $request->sortBy == 'date_ended_at' ? 'selected': '' }}>Date Ended</option>
            </select>

            <button type="submit" class="btn btn-success text-right">Search</button>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">TITLE</th>
                    <th scope="col">RESTRICTION</th>
                    <th scope="col">DATE START</th>
                    <th scope="col">TIME START</th>
                    <th scope="col">DATE END</th>
                    <th scope="col">TIME END</th>
                    <th scope="col">STATUS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                <tr>
                    <td>{{ $event->event_title }}</td>
                    <td>{{ $event->restrictions }}</td>
                    <td>{{ $carbon::parse($event->date_started_at )->toFormattedDateString() }}</td>
                    <td>{{ $carbon::parse($event->time_started_at )->toTimeString() }}</td>
                    <td>{{ $carbon::parse($event->date_ended_at )->toFormattedDateString() }}</td>
                    <td>{{ $carbon::parse($event->time_ended_at )->toTimeString() }} </td>
                    <td>{{ $event->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>


@stop