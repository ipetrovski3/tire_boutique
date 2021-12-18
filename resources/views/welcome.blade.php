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
                        <div class="short-popular-category-list text-center">
                            <h2>Popular Category</h2>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="category.html"><i class="fa fa-bed"></i> Hotel</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="category.html"><i class="fa fa-grav"></i> Fitness</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="category.html"><i class="fa fa-car"></i> Cars</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="category.html"><i class="fa fa-cutlery"></i> Restaurants</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="category.html"><i class="fa fa-coffee"></i> Cafe</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- Advance Search -->
                    <div class="advance-search">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-12 col-md-12 align-content-center">
                                    <form>
                                        <div class="form-row">
                                            <div class="col-2">
                                                <label for="category">Категорија</label>
                                                <div class="form-group">
                                                    <select name="category" id="category" class="selectpicker"
                                                    data-live-search="true">
																										<option value="all" selected>Сите</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->to_mk($category->name) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <label for="season">Сезона</label>
                                                <div class="form-group">
                                                    <select name="season" id="season" class="selectpicker"
                                                    data-live-search="true">
																										<option value="all" selected>Сите</option>
                                                        @foreach ($seasons as $season)
                                                            <option value="{{ $season->id }}">{{ $season->to_mk($season->name) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <label for="brand">Бренд</label>
                                                <div class="form-group">
                                                    <select name="brand" id="brand" class="selectpicker"
                                                    data-live-search="true">
																										<option value="all" selected>Сите</option>
                                                        @foreach ($brands as $brand)
                                                            <option value="{{ $brand->id }}">{{ $brand->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-1 ml-1 mr-2" >
                                                <label for="width">Ширина</label>
                                                <select name="witdh" id="witdh" class="selectpicker"
                                                    data-live-search="true">
																										<option value="" disabled selected>205</option>
                                                    @foreach ($witdhs as $width)
                                                        <option value="{{ $width->id }}">{{ $width->width }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-1">
                                                <label for="height">Висина</label>
                                                <select name="height" id="height" class="selectpicker"
                                                    data-live-search="true">
																										<option value="" disabled selected>55</option>
                                                    @foreach ($heights as $height)
                                                        <option value="{{ $height->id }}">{{ $height->height }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-1">
                                                <label for="diameter">Диаметар</label>
                                                <select name="diameter" id="diameter" class="selectpicker"
                                                    data-live-search="true">
																										<option value="" disabled selected>16</option>
                                                    @foreach ($diameters as $diameter)
                                                        <option value="{{ $diameter->id }}">{{ $diameter->diameter }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
																						<div class="col-2">
																							<button class="p-auto btn btn-block btn-success"><i class="fa fa-search"></i> Барај</button>
																						</div>
                                        </div>
                                        {{-- <div class="form-group col-md-4">
                                                <input type="text" class="form-control my-2 my-lg-1" id="inputtext4"
                                                    placeholder="What are you looking for">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <select class="w-100 form-control mt-lg-1 mt-md-2">
                                                    <option>Category</option>
                                                    <option value="1">Top rated</option>
                                                    <option value="2">Lowest Price</option>
                                                    <option value="4">Highest Price</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control my-2 my-lg-1" id="inputLocation4"
                                                    placeholder="Location">
                                            </div>
                                            <div class="form-group col-md-2 align-self-center">
                                                <button type="submit" class="btn btn-primary">Search Now</button>
                                            </div> --}}
                                        {{-- </div> --}}
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>

    <section class="popular-deals section bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>Trending Adds</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, magnam.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- offer 01 -->
                <div class="col-lg-12">
                    <div class="trending-ads-slide">
                        <div class="col-sm-12 col-lg-4">
                            <!-- product card -->
                            <div class="product-item bg-light">
                                <div class="card">
                                    <div class="thumb-content">
                                        <!-- <div class="price">$200</div> -->
                                        <a href="single.html">
                                            <img class="card-img-top img-fluid" src="images/products/products-1.jpg"
                                                alt="Card image cap">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="single.html">11inch Macbook Air</a></h4>
                                        <ul class="list-inline product-meta">
                                            <li class="list-inline-item">
                                                <a href="single.html"><i class="fa fa-folder-open-o"></i>Electronics</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#"><i class="fa fa-calendar"></i>26th December</a>
                                            </li>
                                        </ul>
                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            Explicabo, aliquam!</p>
                                        <div class="product-ratings">
                                            <ul class="list-inline">
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <div class="col-sm-12 col-lg-4">
                            <!-- product card -->
                            <div class="product-item bg-light">
                                <div class="card">
                                    <div class="thumb-content">
                                        <!-- <div class="price">$200</div> -->
                                        <a href="single.html">
                                            <img class="card-img-top img-fluid" src="images/products/products-2.jpg"
                                                alt="Card image cap">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="single.html">Full Study Table Combo</a></h4>
                                        <ul class="list-inline product-meta">
                                            <li class="list-inline-item">
                                                <a href="single.html"><i class="fa fa-folder-open-o"></i>Furnitures</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#"><i class="fa fa-calendar"></i>26th December</a>
                                            </li>
                                        </ul>
                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            Explicabo, aliquam!</p>
                                        <div class="product-ratings">
                                            <ul class="list-inline">
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <div class="col-sm-12 col-lg-4">
                            <!-- product card -->
                            <div class="product-item bg-light">
                                <div class="card">
                                    <div class="thumb-content">
                                        <!-- <div class="price">$200</div> -->
                                        <a href="single.html">
                                            <img class="card-img-top img-fluid" src="images/products/products-3.jpg"
                                                alt="Card image cap">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="single.html">11inch Macbook Air</a></h4>
                                        <ul class="list-inline product-meta">
                                            <li class="list-inline-item">
                                                <a href="single.html"><i class="fa fa-folder-open-o"></i>Electronics</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#"><i class="fa fa-calendar"></i>26th December</a>
                                            </li>
                                        </ul>
                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            Explicabo, aliquam!</p>
                                        <div class="product-ratings">
                                            <ul class="list-inline">
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <div class="col-sm-12 col-lg-4">
                            <!-- product card -->
                            <div class="product-item bg-light">
                                <div class="card">
                                    <div class="thumb-content">
                                        <!-- <div class="price">$200</div> -->
                                        <a href="single.html">
                                            <img class="card-img-top img-fluid" src="images/products/products-2.jpg"
                                                alt="Card image cap">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="single.html">Full Study Table Combo</a></h4>
                                        <ul class="list-inline product-meta">
                                            <li class="list-inline-item">
                                                <a href="single.html"><i class="fa fa-folder-open-o"></i>Furnitures</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#"><i class="fa fa-calendar"></i>26th December</a>
                                            </li>
                                        </ul>
                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            Explicabo, aliquam!</p>
                                        <div class="product-ratings">
                                            <ul class="list-inline">
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <section class=" section">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section title -->
                    <div class="section-title">
                        <h2>All Categories</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, provident!</p>
                    </div>
                    <div class="row">
                        <!-- Category list -->
                        <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                            <div class="category-block">
                                <div class="header">
                                    <i class="fa fa-laptop icon-bg-1"></i>
                                    <h4>Electronics</h4>
                                </div>
                                <ul class="category-list">
                                    <li><a href="category.html">Laptops <span>93</span></a></li>
                                    <li><a href="category.html">Iphone <span>233</span></a></li>
                                    <li><a href="category.html">Microsoft <span>183</span></a></li>
                                    <li><a href="category.html">Monitors <span>343</span></a></li>
                                </ul>
                            </div>
                        </div> <!-- /Category List -->
                        <!-- Category list -->
                        <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                            <div class="category-block">
                                <div class="header">
                                    <i class="fa fa-apple icon-bg-2"></i>
                                    <h4>Restaurants</h4>
                                </div>
                                <ul class="category-list">
                                    <li><a href="category.html">Cafe <span>393</span></a></li>
                                    <li><a href="category.html">Fast food <span>23</span></a></li>
                                    <li><a href="category.html">Restaurants <span>13</span></a></li>
                                    <li><a href="category.html">Food Track<span>43</span></a></li>
                                </ul>
                            </div>
                        </div> <!-- /Category List -->
                        <!-- Category list -->
                        <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                            <div class="category-block">
                                <div class="header">
                                    <i class="fa fa-home icon-bg-3"></i>
                                    <h4>Real Estate</h4>
                                </div>
                                <ul class="category-list">
                                    <li><a href="category.html">Farms <span>93</span></a></li>
                                    <li><a href="category.html">Gym <span>23</span></a></li>
                                    <li><a href="category.html">Hospitals <span>83</span></a></li>
                                    <li><a href="category.html">Parolurs <span>33</span></a></li>
                                </ul>
                            </div>
                        </div> <!-- /Category List -->
                        <!-- Category list -->
                        <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                            <div class="category-block">
                                <div class="header">
                                    <i class="fa fa-shopping-basket icon-bg-4"></i>
                                    <h4>Shoppings</h4>
                                </div>
                                <ul class="category-list">
                                    <li><a href="category.html">Mens Wears <span>53</span></a></li>
                                    <li><a href="category.html">Accessories <span>212</span></a></li>
                                    <li><a href="category.html">Kids Wears <span>133</span></a></li>
                                    <li><a href="category.html">It & Software <span>143</span></a></li>
                                </ul>
                            </div>
                        </div> <!-- /Category List -->
                        <!-- Category list -->
                        <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                            <div class="category-block">
                                <div class="header">
                                    <i class="fa fa-briefcase icon-bg-5"></i>
                                    <h4>Jobs</h4>
                                </div>
                                <ul class="category-list">
                                    <li><a href="category.html">It Jobs <span>93</span></a></li>
                                    <li><a href="category.html">Cleaning & Washing <span>233</span></a></li>
                                    <li><a href="category.html">Management <span>183</span></a></li>
                                    <li><a href="category.html">Voluntary Works <span>343</span></a></li>
                                </ul>
                            </div>
                        </div> <!-- /Category List -->
                        <!-- Category list -->
                        <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                            <div class="category-block">
                                <div class="header">
                                    <i class="fa fa-car icon-bg-6"></i>
                                    <h4>Vehicles</h4>
                                </div>
                                <ul class="category-list">
                                    <li><a href="category.html">Bus <span>193</span></a></li>
                                    <li><a href="category.html">Cars <span>23</span></a></li>
                                    <li><a href="category.html">Motobike <span>33</span></a></li>
                                    <li><a href="category.html">Rent a car <span>73</span></a></li>
                                </ul>
                            </div>
                        </div> <!-- /Category List -->
                        <!-- Category list -->
                        <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                            <div class="category-block">
                                <div class="header">
                                    <i class="fa fa-paw icon-bg-7"></i>
                                    <h4>Pets</h4>
                                </div>
                                <ul class="category-list">
                                    <li><a href="category.html">Cats <span>65</span></a></li>
                                    <li><a href="category.html">Dogs <span>23</span></a></li>
                                    <li><a href="category.html">Birds <span>113</span></a></li>
                                    <li><a href="category.html">Others <span>43</span></a></li>
                                </ul>
                            </div>
                        </div> <!-- /Category List -->
                        <!-- Category list -->
                        <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                            <div class="category-block">

                                <div class="header">
                                    <i class="fa fa-laptop icon-bg-8"></i>
                                    <h4>Services</h4>
                                </div>
                                <ul class="category-list">
                                    <li><a href="category.html">Cleaning <span>93</span></a></li>
                                    <li><a href="category.html">Car Washing <span>233</span></a></li>
                                    <li><a href="category.html">Clothing <span>183</span></a></li>
                                    <li><a href="category.html">Business <span>343</span></a></li>
                                </ul>
                            </div>
                        </div> <!-- /Category List -->


                    </div>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>
@endsection
