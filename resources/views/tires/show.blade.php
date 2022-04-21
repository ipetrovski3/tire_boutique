@extends('layouts.public')
@section('content')
    <section class="section bg-gray">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <!-- Left sidebar -->
                <div class="col-md-8">
                    <div class="product-details">
                        <h1 class="product-title">{{ $tire->brand()->name }} {{ $tire->pattern->name }}  {{ $tire->dimension() }}</h1>
                        <div class="product-meta">
                            <ul class="list-inline">
                                <li class="list-inline-item"><i class="fa fa-user-o"></i> By <a href="">Andrew</a></li>
                                <li class="list-inline-item"><i class="fa fa-folder-open-o"></i> Category<a href="">Electronics</a></li>
                                <li class="list-inline-item"><i class="fa fa-location-arrow"></i> Location<a href="">Dhaka Bangladesh</a></li>
                            </ul>
                        </div>

                        <!-- product slider -->
                        <div class="product-slider">
                            <img src="{{ asset('storage/patterns/'. $tire->pattern->image) }}" alt="">
                        </div>
                        <!-- product slider -->

                        <div class="content pt-5">

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <h3 class="tab-title">Информации и спецификации</h3>
                                    <ul>
                                        <li>Димензија: {{ $tire->dimension() }}</li>
                                        <li>Тежински | Брзински индекс: {{ $tire->load_index . $tire->speed_index }}</li>
                                        <li>Производител: {{ $tire->brand()->name }}</li>
                                        <li>Сезона: {{ Helpers::to_mk($tire->season->name) }} <img src="{{ asset(Helpers::season_icon($tire->season->name)) }}" style="max-height: 30px" alt=""></li>
                                        <li>Категорија: {{ Helpers::cat_to_mk($tire->category()->name) }} <img src="{{ asset('images/helpers/' . Helpers::category_icon($tire->category()->name)) }}" style="max-height: 30px" alt=""></li>
                                        <li>Потрошувачка на гориво:
                                            <img src="{{ asset('images/labels/fuel.png') }}" style="max-height: 30px" alt="">
                                            <span style="background: black; border-radius: 30%; color: white; padding: 5px ">A</span>
                                        </li>
                                        <li>Управување на влажен коловоз:
                                            <img src="{{ asset('images/labels/fuel.png') }}" style="max-height: 30px" alt="">
                                            <span style="background: black; border-radius: 30%; color: white; padding: 5px ">A</span>
                                        </li>
                                        <li>Бучавост:
                                            <img src="{{ asset('images/labels/noice_one.png') }}" style="max-height: 30px" alt="">
                                            <span style="background: black; border-radius: 30%; color: white; padding: 5px ">67</span>
                                        </li>
                                    </ul>
                                    <p>
                                        <span class="form-inline">
                                            <input type="number" class="form-control" name="qty" value="4">
                                            <button id="add_to_cart" type="button" class="btn btn-success ml-2"><i class="fa fa-shopping-bag"></i></button>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="widget price text-center">
                            <h4>Цена</h4>
                            <p>{{ number_format($tire->price, 2, ',', '.') }} ден.</p>
                        </div>
                        <!-- User Profile widget -->
                        <div class="widget user text-center">
                            <img class="rounded-circle img-fluid mb-5 px-5" src="images/user/user-thumb.jpg" alt="">
                            <h4><a href="">Jonathon Andrew</a></h4>
                            <p class="member-time">Member Since Jun 27, 2017</p>
                            <a href="">See all ads</a>
                            <ul class="list-inline mt-20">
                                <li class="list-inline-item"><a href="" class="btn btn-contact d-inline-block  btn-primary px-lg-5 my-1 px-md-3">Contact</a></li>
                                <li class="list-inline-item"><a href="" class="btn btn-offer d-inline-block btn-primary ml-n1 my-1 px-lg-4 px-md-3">Make an
                                        offer</a></li>
                            </ul>
                        </div>
                        <!-- Map Widget -->
                        <div class="widget map">
                            <div class="map">
                                <div id="map_canvas" data-latitude="51.507351" data-longitude="-0.127758"></div>
                            </div>
                        </div>
                        <!-- Rate Widget -->
                        <div class="widget rate">
                            <!-- Heading -->
                            <h5 class="widget-header text-center">What would you rate
                                <br>
                                this product</h5>
                            <!-- Rate -->
                            <div class="starrr"></div>
                        </div>
                        <!-- Safety tips widget -->
                        <div class="widget disclaimer">
                            <h5 class="widget-header">Safety Tips</h5>
                            <ul>
                                <li>Meet seller at a public place</li>
                                <li>Check the item before you buy</li>
                                <li>Pay only after collecting the item</li>
                                <li>Pay only after collecting the item</li>
                            </ul>
                        </div>
                        <!-- Coupon Widget -->
                        <div class="widget coupon text-center">
                            <!-- Coupon description -->
                            <p>Have a great product to post ? Share it with
                                your fellow users.
                            </p>
                            <!-- Submii button -->
                            <a href="" class="btn btn-transparent-white">Submit Listing</a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!-- Container End -->
    </section>
@endsection
