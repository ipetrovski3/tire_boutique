@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="container">
        <div class="card">

            <form action="{{ route('store.pattern') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label" for="name">Назив</label>
                                <input class="form-control" id="name" type="text" name="name">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label class="form-label" for="season">Сезона</label>
                                <select class="form-control" name="season_id" id="season">
                                    @foreach($seasons as $season)
                                        <option value="{{ $season->id }}">{{ $season->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label class="form-label" for="brand">Бренд</label>
                                <select class="form-control" name="brand_id" id="brand">
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label class="form-label" for="category">Категорија</label>
                                <select class="form-control" name="category_id" id="category">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->to_mk($category->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="image">Слика</label>
                        <input class="form-control-file" id="image" type="file" name="image">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-default">Потврди</button>
                </div>
            </form>
        </div>

    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
