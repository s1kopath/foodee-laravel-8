@extends('Frontend.master')
@section('title')
    Dishes
@endsection

@section('content')
    <!-- products -->
    <div class="products">
        <div class="container">
            <div class="col-md-9 product-w3ls-right">
                <div class="product-top">
                    <h4>Food Collection</h4>
                    <ul>
                        <li class="dropdown head-dpdn">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Filter By<span
                                    class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Low price</a></li>
                                <li><a href="#">High price</a></li>
                                <li><a href="#">Latest</a></li>
                            </ul>
                        </li>
                        <li class="dropdown head-dpdn">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Food Type<span
                                    class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Breakfast</a></li>
                                <li><a href="#">Lunch</a></li>
                                <li><a href="#">Dinner</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="clearfix"> </div>
                </div>


                <div class="products-row">
                    @foreach ($dishes as $dish)
                        <div class="col-xs-6 col-sm-4 product-grids">
                            <div class="flip-container">
                                <div class="flipper agile-products">
                                    <div class="front">
                                        <img src="{{ asset($dish->dish_image) }}" style="height: 182px; width: 277px;"
                                            class="img-responsive" alt="img">
                                        <div class="agile-product-text">
                                            <div style="height: 50px;">
                                                <h5>{{ $dish->dish_name }}</h5>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="back">
                                        <h4>{{ $dish->dish_name }}</h4>
                                        {{-- <p>{{ $dish->dish_detail }}</p> --}}
                                        <h6>
                                            {{ $dish->full_price }}
                                            @if ($dish->half_price)
                                                /
                                            @endif
                                            {{ $dish->half_price }}
                                            <sup>TK</sup>
                                        </h6>
                                        {{-- <form action="#" method="post">
                                            <input type="hidden" name="cmd" value="_cart">
                                            <input type="hidden" name="add" value="1">
                                            <input type="hidden" name="w3ls_item" value="Fish salad">
                                            <input type="hidden" name="amount" value="3.00">

                                            <button href="#" type="submit" class="w3ls-cart pw3ls-cart"><i
                                                    class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                                            <span class="w3-agile-line"> </span>
                                            <a href="#" data-toggle="modal"
                                                data-target="#myModal{{ $dish->id }}">More</a>
                                        </form> --}}

                                        <a href="#"  aria-hidden="true" data-toggle="modal" data-target="#myModal{{ $dish->id }}"><i class="fa fa-cart-plus"></i> Add to cart</a>
                                        <span class="w3-agile-line"> </span>
                                        <a href="#" data-toggle="modal" data-target="#myModal{{ $dish->id }}">More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- modal -->
                        <div class="modal video-modal fade" id="myModal{{ $dish->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="myModal1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">×</span></button>
                                    </div>
                                    <section>
                                        <div class="modal-body">
                                            <div class="col-md-5 modal_body_left">
                                                <img src="{{ asset($dish->dish_image) }}"
                                                    style="height: 182px; width: 277px;" class="img-responsive">
                                            </div>
                                            <div class="col-md-7 modal_body_right single-top-right">
                                                <h3 class="item_name">{{ $dish->dish_name }}</h3>
                                                <p>{{ $dish->dish_detail }}</p>
                                                <div class="single-rating">
                                                    <ul>
                                                        <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                        <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                        <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                        <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                        <li class="w3act"><i class="fa fa-star-o" aria-hidden="true"></i>
                                                        </li>
                                                        <li class="rating">20 reviews</li>
                                                        <li><a href="#">Add your review</a></li>
                                                    </ul>
                                                </div>
                                                <div class="single-price">
                                                    <ul>
                                                        <li>{{ $dish->full_price }} TK</li>
                                                        @if ($dish->half_price)
                                                            <li>Half: {{ $dish->half_price }} TK <input type="checkbox"
                                                                    name="half_price"></li>
                                                        @endif
                                                        {{-- <li><del>$20</del></li> --}}
                                                        <li><span class="w3off">10% OFF</span></li>
                                                        <li>Ends on : Dec,5th</li>
                                                        <li><a href="#"><i class="fa fa-gift" aria-hidden="true"></i>
                                                                Coupon</a></li>
                                                    </ul>
                                                </div>
                                                <p class="single-price-text">Fusce a egestas nibh, eget ornare erat. Proin
                                                    placerat, urna et
                                                    consequat efficitur, sem odio blandit enim, sit amet euismod turpis est
                                                    mattis lectus.
                                                    Vestibulum maximus quam et quam egestas imperdiet. In dignissim auctor
                                                    viverra. </p>
                                                <form action="#" method="post">
                                                    <input type="hidden" name="cmd" value="_cart" />
                                                    <input type="hidden" name="add" value="1" />
                                                    <input type="hidden" name="w3ls_item" value="France Special" />
                                                    <input type="hidden" name="amount" value="18.00" />
                                                    <button type="submit" class="w3ls-cart"><i class="fa fa-cart-plus"
                                                            aria-hidden="true"></i> Add to cart</button>
                                                </form>
                                                <a href="#" class="w3ls-cart w3ls-cart-like"><i class="fa fa-heart-o"
                                                        aria-hidden="true"></i> Add to Wishlist</a>
                                                <div class="single-page-icons social-icons">
                                                    <ul>
                                                        <li>
                                                            <h4>Share on</h4>
                                                        </li>
                                                        <li><a href="#" class="fa fa-facebook icon facebook"> </a></li>
                                                        <li><a href="#" class="fa fa-twitter icon twitter"> </a></li>
                                                        <li><a href="#" class="fa fa-google-plus icon googleplus"> </a></li>
                                                        <li><a href="#" class="fa fa-dribbble icon dribbble"> </a></li>
                                                        <li><a href="#" class="fa fa-rss icon rss"> </a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="clearfix"> </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                        <!-- //modal -->
                    @endforeach
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-3 rsidebar">
                <div class="rsidebar-top">
                    <div class="slider-left">
                        <h4>Category</h4>
                        <div class="row row1 scroll-pane">
                            <a href="{{ route('all_dish') }}" class="checkbox"><span>1.</span> All Dishes</a>
                            @foreach ($categories as $key => $cate)
                                <a href="{{ route('category_dish', $cate->id) }}"
                                    class="checkbox"><span>{{ $key + 2 }}.</span> {{ $cate->category_name }}</a>
                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="related-row">
                    <h4>Related Searches</h4>
                    <ul>
                        <li><a href="products.html">Salads </a></li>
                        <li><a href="products.html">Vegetarian</a></li>
                        <li><a href="products.html">Dinner</a></li>
                        <li><a href="products.html">Diet Soup</a></li>
                        <li><a href="products.html">Sweets</a></li>
                        <li><a href="products.html">Seasonal</a></li>
                        <li><a href="products.html">Breakfast</a></li>
                        <li><a href="products.html">Italian Food</a></li>
                        <li><a href="products.html">Meals</a></li>
                    </ul>
                </div>

            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- //products -->
    <div class="container">
        <div class="w3agile-deals prds-w3text">
            <h5>Vestibulum maximus quam et quam egestas imperdiet. In dignissim auctor viverra.</h5>
        </div>
    </div>


@endsection
