@extends('layouts.default')
@section('content')

<div class="w-75 mx-auto p-5">
    <div class="mb-3">
        <div class="form-inline">
            <input type="search" class="form-control mr-2" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />

            <select class="homepageSort form-control mr-2" placeholder="">
                <option>Sort</option>
                <option value="logged in">Logged In</option>
                <option value="logged out">Logged Out</option>
            </select>

            <button type="button" class="btn btn-success text-right"> Active Events </button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">EVENT ID</th>
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
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

</div>


@stop