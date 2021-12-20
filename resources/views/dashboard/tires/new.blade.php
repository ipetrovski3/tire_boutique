@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h3>Нова Гума</h3>
            </div>
            <div class="card-body">
                <form action={{ route('tires.store') }} method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="category">Категорија</label>
                            <select name="category" id="category" class="selectpicker" data-live-search="true">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->name }}">{{ $category->to_mk($category->name) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="season">Сезона</label>
                            <select name="season" id="season" class="selectpicker" data-live-search="true">
                                @foreach ($seasons as $season)
                                    <option value="{{ $season->id }}">{{ $season->to_mk($season->name) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="brand">Бренд</label>
                            <select name="brand" id="brand" class="selectpicker" data-live-search="true">
                                <option value=""></option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6" id="pat-div" hidden>
                            <label class="form-label" for="pattern">Шара</label>
                            <select name="pattern" id="pattern" class="form-select">
                            </select>
                        </div>
                    </div>
                    <h5>Димензија</h5>
                    <div class="row mb-3" hidden id="dimensions">
                        <div class="col-4">
                            <label for="width">Ширина</label>
                            <select name="width" id="witdh" class="selectpicker" data-live-search="true">
                                @foreach ($widths as $width)
                                    <option value="{{ $width->width }}">{{ $width->width }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="height">Висина</label>
                            <select name="height" id="height" class="selectpicker" data-live-search="true">
                                @foreach ($heights as $height)
                                    <option value="{{ $height->height }}">{{ $height->height }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="diameter">Диаметар</label>
                            <select name="diameter" id="diameter" class="selectpicker" data-live-search="true">
                                @foreach ($diameters as $diameter)
                                    <option value="{{ $diameter->diameter }}">{{ $diameter->diameter }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
            </div>
            <div class="col-12 mb-2">
                <label for="price">Цена</label>
                <input type="number" class="form-control" name="price" id="price">
            </div>

            <div class="col-12 mb-2">
                <button type="submit" class="p-auto btn btn-block btn-success"><i class="fas fa-save"></i>
                    Внеси гума</button>
            </div>
        </div>
        </form>
    </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet">

@stop

@section('js')
    @if (Session::has('message'))
        <script>
            Swal.fire(
                '!',
                '{{ Session::get('message') }}',
                'success'
            )
        </script>
    @endif
    <script>
        $(document).ready(function() {
            $("#brand").on('change', function() {
                $('#pattern').empty()
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                let brand_id = $('#brand').val()
                $.ajax({
                    type: 'post',
                    url: "{{ route('get_season') }}",
                    data: { brand_id: brand_id },
                    success: function(data) {
                        $('#pat-div').attr('hidden', false)
                        $('#dimensions').attr('hidden', false)
                        $.each(data, function(key, value)
                        {
                            $('#pattern').append('<option value=' + value.id + '>' + value.name + '</option>' )
                            // $('#pattern').append('<option value=> askdjklasdask</option>' )
                        })
                        console.log(data);
                    }
                });
            });
        })
    </script>
    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>

@stop
