@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
  <input type="text" name="" id="">
  <input type="text" name="" id="">
  <input type="text" name="" id="">
  <input type="text" name="" id="">
  <input type="text" name="" id="">
  <input type="text" name="" id="">
  <input type="text" name="" id="">
  <input type="text" name="" id="">
  <input type="text" name="" id="">
  <button id="add_field"> plus </button>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet">

@stop

@section('js')
    @if (Session::has('message'))
        <script>

        </script>
    @endif
    <script>

    </script>
    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>

@stop
