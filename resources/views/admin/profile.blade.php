@extends('layouts.default')
@section('content')
<!-- inject laravel date formatter -->
@inject('carbon', 'Carbon\Carbon')
<!-- profile content -->
@include('includes.profile-content');

@stop