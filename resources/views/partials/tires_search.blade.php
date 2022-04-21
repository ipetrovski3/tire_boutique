<section class="section-sm">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="search-result bg-gray">
                    <h2>Димензија: {{ $tires->count() > 0 ? $tires->first()->dimension() : 'нема' }} | Пронајдени резултати: {{ $tires->count() }}</h2>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="category-sidebar">
                    <div class="widget category-list">
                        <h4 class="widget-header">Филтрирај според</h4>
                        <label for="category">Категорија</label>
                        <select name="category" id="category" data-flag="category"
                                class="js-example-basic-single filter form-control">
                            <option value="all">Сите</option>
                            @foreach ($categories as $category)
                                <option
                                    {{ $category->id == $category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->to_mk($category->name) }}
                                </option>
                            @endforeach
                        </select>
                        <label for="season">Сезона</label>
                        <select name="season" id="season" data-flag="season"
                                class="js-example-basic-single filter form-control">
                            <option value="all">Сите</option>
                            @foreach ($seasons as $season)
                                <option
                                    {{ $season->id == $season_id ? 'selected' : '' }} value="{{ $season->id }}">{{ $season->to_mk($season->name) }}
                                </option>
                            @endforeach
                        </select>
                        <label for="brand">Бренд</label>
                        <select name="brand" data-flag="brand" id="brand"
                                class="js-example-basic-single filter form-control">
                            <option value="all">Сите</option>
                            @foreach ($brands as $brand)
                                <option
                                    {{ $brand->id == $brand_id ? 'selected' : '' }} value="{{ $brand->id }}">{{ $brand->name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="price">Цена</label>
                        <select name="price" data-flag="price" id="price"
                                class="js-example-basic-single filter form-control">
                            <option value="all">Избери...</option>
                            <option value="desc">Од Најскапи</option>
                            <option value="asc">Од Најефтини</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="category-search-filter">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Short</strong>
                            <select>
                                <option>Most Recent</option>
                                <option value="1">Most Popular</option>
                                <option value="2">Lowest Price</option>
                                <option value="4">Highest Price</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="view">
                                <strong>Views</strong>
                                <ul class="list-inline view-switcher">
                                    <li class="list-inline-item">
                                        <a href="#" onclick="event.preventDefault();" class="text-info"><i class="fa fa-th-large"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="../../../../../Downloads/classimax-premium/themes/classimax-premium/ad-list-view.html"><i class="fa fa-reorder"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-grid-list">
                    <div class="row mt-30">
                        @foreach($tires as $tire)
                        <div class="col-sm-12 col-lg-4 col-md-6">
                            <!-- product card -->
                            <div class="product-item bg-light">
                                <div class="card">
                                    <div class="thumb-content">
                                        <!-- <div class="price">$200</div> -->
                                            <img src="{{ asset('storage/patterns/' . $tire->pattern->image) }}" style="max-height: 120px;"
                                                 alt="">
                                        </a>
                                    </div>
                                    <a href="{{ route('show_tire', [$tire->brand()->name, $tire->id]) }}">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $tire->pattern->name }}</h4>
                                        <ul class="list-inline product-meta">
                                            <li class="list-item">
                                                Сезона:
                                                <img src="{{ asset(Helpers::season_icon($tire->season->name)) }}" title="{{ Helpers::to_mk($tire->season->name) }}" style="max-height: 35px" alt="">
                                            </li>
                                            <li class="list-item">
                                                Бренд: {{ $tire->brand()->name }}
                                            </li>
                                           <li title="{{ Helpers::cat_to_mk($tire->pattern->category->name) }}" class="list-item">
                                                Категорија: <img src="{{ asset('images/helpers/' . Helpers::category_icon($tire->pattern->category->name)) }}" style="max-height: 50px" alt="">
                                           </li>

                                        </ul>
                                        <p class="card-text">
                                            <ul class="list-inline">
                                                <li class="list-inline-item mr-1">
                                                    <img src="{{ asset('images/labels/fuel.png') }}" style="max-height: 30px" alt="">
                                                    <span style="background: black; border-radius: 30%; color: white; padding: 5px ">A</span>
                                                </li>
                                                <li class="list-inline-item mr-1">
                                                    <img src="{{ asset('images/labels/wet.png') }}" style="max-height: 30px" alt="">
                                                    <span style="background: black; border-radius: 30%; color: white; padding: 5px ">B</span>
                                                </li>
                                                <li class="list-inline-item">
                                                    <img src="{{ asset('images/labels/noice_one.png') }}" style="max-height: 30px" alt="">
                                                    <span style="background: black; border-radius: 30%; color: white; padding: 5px ">67</span>
                                                </li>
                                            </ul>
                                        </p>
                                        <div class="product-ratings">
                                            <p class="text-xl-center"> <strong>{{ number_format($tire->price, 2, ',', '.') }} ден.</strong></p>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach

{{--                <div class="pagination justify-content-center">--}}
{{--                    <nav aria-label="Page navigation example">--}}
{{--                        <ul class="pagination">--}}
{{--                            <li class="page-item">--}}
{{--                                <a class="page-link" href="#" aria-label="Previous">--}}
{{--                                    <span aria-hidden="true">&laquo;</span>--}}
{{--                                    <span class="sr-only">Previous</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                            <li class="page-item active"><a class="page-link" href="#">2</a></li>--}}
{{--                            <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                            <li class="page-item">--}}
{{--                                <a class="page-link" href="#" aria-label="Next">--}}
{{--                                    <span aria-hidden="true">&raquo;</span>--}}
{{--                                    <span class="sr-only">Next</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </nav>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</section>




