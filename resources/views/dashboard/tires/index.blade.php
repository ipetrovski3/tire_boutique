@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Залиха</h1>
    <div class="float-right">
        <form action="{{ route('tires.index') }}">
            <div class="row">
                <div class="form-group">
                    <label for="season">Сезона:</label>
                    <select name="season" id="">
                        <option value="">Сите</option>
                        @foreach ($seasons as $season)
                        <option value="{{ $season->id }}">{{ $season->to_mk($season->name) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label" for="location">Димензија</label>
                <input class="form-control" type="text" name="location">
            </div>
            <button type="submit" class="btn btn-secondary btn-block mb-1">Пребарај</button>
        </form>
    </div>
@stop

@section('content')
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Димензија</th>
                <th scope="col">Бренд</th>
                <th scope="col">Шара</th>
                <th scope="col">Цена</th>
                <th scope="col">Залиха</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tires as $tire)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $tire->dimension() }}</td>
                    <td>{{ $tire->brand()->name }}</td>
                    <td>{{ $tire->pattern->name }}</td>
                    <td>{{ number_format($tire->price, 2) }}</td>
                    <td>{{ $tire->stock }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet">

@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>

@stop
