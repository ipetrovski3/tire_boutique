@extends('layouts.public')

@section('content')
    <section class="hero-area bg-1 text-center overly">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Header Contetnt -->
                    <div class="content-block">
                        <h1>Бутик за Гуми</h1>
                        <p>Најголем избор на гуми <br> со најдобри цени</p>
                        {{--                        <div class="short-popular-category-list text-center">--}}
                        {{--                            <h2>Popular Category</h2>--}}
                        {{--                            <ul class="list-inline">--}}
                        {{--                                <li class="list-inline-item">--}}
                        {{--                                    <a href="category.html"><i class="fa fa-bed"></i> Hotel</a>--}}
                        {{--                                </li>--}}
                        {{--                                <li class="list-inline-item">--}}
                        {{--                                    <a href="category.html"><i class="fa fa-grav"></i> Fitness</a>--}}
                        {{--                                </li>--}}
                        {{--                                <li class="list-inline-item">--}}
                        {{--                                    <a href="category.html"><i class="fa fa-car"></i> Cars</a>--}}
                        {{--                                </li>--}}
                        {{--                                <li class="list-inline-item">--}}
                        {{--                                    <a href="category.html"><i class="fa fa-cutlery"></i> Restaurants</a>--}}
                        {{--                                </li>--}}
                        {{--                                <li class="list-inline-item">--}}
                        {{--                                    <a href="category.html"><i class="fa fa-coffee"></i> Cafe</a>--}}
                        {{--                                </li>--}}
                        {{--                            </ul>--}}
                        {{--                        </div>--}}

                    </div>
                    <!-- Advance Search -->
                    <div class="advance-search">
                        <input id="location" type="hidden" name="location" value="">

                        <div class="container align-items-center">
                            <form id="search_form">
                                <div class="form-group">
                                    <select id="witdh" class="js-example-basic-single" name="width">
                                        <option value="" disabled selected>Ширина</option>
                                        @foreach($witdhs as $width)
                                            <option value="{{ $width->width }}">{{ $width->width }}</option>
                                        @endforeach
                                    </select>
                                    <select id="height" class="js-example-basic-single" name="height">
                                        <option value="" disabled selected>Висина</option>
                                        @foreach($heights as $height)
                                            <option value="{{ $height->height }}">{{ $height->height }}</option>
                                        @endforeach
                                    </select>
                                    <select id="diameter" class="js-example-basic-single" name="diameter">
                                        <option value="" disabled selected>Диаметар</option>
                                        @foreach($diameters as $diameter)
                                            <option value="{{ $diameter->diameter }}">{{ $diameter->diameter }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success"><i
                                            class="fa fa-search"></i> Барај
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>


    <section class=" section">



        <!-- Container Start -->
        <div id="render_div" class="container render">
            @include('partials.brands')
        </div>
        <!-- Container End -->
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2({
                theme: "classic",
                language: {
                    noResults: function () {
                        return 'Не се Пронајдени резултати';
                    },
                }
            });
        });
        $('#search_form').submit(function (e) {
            e.preventDefault()
            let season_id = $('#season').val()
            let category_id = $('#category').val()
            let brand_id = $('#brand').val()
            let witdh = $('#witdh').val()
            let height = $('#height').val()
            let diameter = $('#diameter').val()

            // let data = JSON.stringify(ser)
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ route('search.results') }}",
                data: {season_id, category_id, brand_id, witdh, height, diameter},
                success: function (data) {
                    let render_div = $('#render_div')
                    render_div.empty()
                    render_div.html(data.view)
                    $('#location').val(data.location)
                }
            });
        })

        $(document).on('change', '.filter', function() {

            let category_id = $('#category').val()
            let brand_id = $('#brand').val()
            let season_id = $('#season').val()
            // console.table({'category': category_id, 'brand': brand_id, 'season': season_id} )


            if ($(this).data('flag') === 'season')
            {
                season_id = $(this).val()
            } else if ($(this).data('flag') === 'category') {
                category_id =  $(this).val()
            } else if ($(this).data('flag') === 'brand') {
                brand_id =  $(this).val()
            }

            let location = $('#location').val()


            console.log(season_id)
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ route('filter.results') }}",
                data: {season_id, location, brand_id, category_id },
                success: function (data) {
                    let render_div = $('#render_div')
                    render_div.empty()
                    render_div.html(data.view)
                }
            });

        })
    </script>
@endsection
