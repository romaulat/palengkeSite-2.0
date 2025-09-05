@extends('layouts.app')

@section('content')
    <div class="home-bg"> 
        <div class="overlay"></div>
        <section class="home">
           
            <div class="content" style="margin-top: 40px;">
                <span>Buy Now, Deliver Later</span>
                <h3>Fresh and Quality Products</h3>
                <p>To serve your Palengke needs right in your front door</p>
                <!-- <a href="{{ route('shop.products.index') }}" class="home-btn white-btn" style="text-decoration:none;">Products</a><br> -->
                <a href="#section2" class="home-btn white-btn" style="text-decoration:none;">Scroll Down for More <i class="fa fa-arrow-circle-down"></i></a><br>
                <!-- <a href="#section2" class="scroll-down"><i class="fa fa-angle-double-down"></i></a> -->
            </div>

        </section>
    </div>
    <div class="longbar green-bar">
        <div class="">
            <form action="{{ route('select.market') }}" method="POST" id="select-market">
                @csrf
                <label for="">Mabini Public Market - </label>
                <select name="market_option"  class="" id="market-option">

                    <option value="">All</option>
                    @foreach(\App\Market::all() as $market)
                        <option value="{{ $market->id }}" {{ session()->get('shop_at_market') ==  $market->id ? 'selected' : ''}}>{{ $market->market }}</option>
                    @endforeach
                </select>

            </form>
        </div>
    </div>
    <section class="home-category" id="section2">

        <p class="category-subtitle">What we serve</p>
        <h1 class="title">shop by <span>category</span></h1>

        <div class="box-container" id="box-container">
            @foreach($categories as $category)
                     <a href="{{ route('shop.product.category', ['slug' => $category->slug]) }}"  >
                         <canvas style="background-image: url({{ asset($category->image)  }})" class="box-item">

                         </canvas>
                        <div class="overlay"></div>
                         <h3>{{ $category->category }}</h3>
                    </a>
            @endforeach
        </div>
        <div class="home-category-arrow">
            <i class="category-previous fa fa-angle-left">

            </i>
            <i class="category-next fa fa-angle-right">

            </i>
        </div>

    </section>

    <section class="home-products products container">

        <p class="product-subtitle">You may want to have</p>
        <h1 class="title">Featured <span>Products</span></h1>

        <div class="products-grid">

            @foreach($featuredProducts as $featuredProduct)

            <div class="product-item">

                    <a class="product-image" href="{{ route('shop.products.find', ['id' => $featuredProduct->id]) }}">
                        <img src="{{ asset($featuredProduct->image) }}" alt="">
                    </a>
                    <div class="product-details">


                        <h4 class="product-name">{{ ($featuredProduct->custom_title != '' ? $featuredProduct->custom_title : $featuredProduct->product->product_name) }}</h4>
                        <p>Php {{ number_format($featuredProduct->price, 2) }}</p>
                        <form action="{{ route('shop.product.addToCart') }}" method="POST">

                            @csrf
                            <input type="hidden" name="seller_id" id="seller_id" value="{{ $featuredProduct->seller_id }}">
                            <input type="hidden" name="product_id" id="product_id" value="{{ $featuredProduct->product_id }}">
                            <input type="hidden" name="price" id="price" value="{{ $featuredProduct->price }}">
                            <input type="hidden" name="seller_product_id" id="seller_product_id" value="{{ $featuredProduct->id }}">
                            <input type="number" name="quantity" id="quantity" value="" max="{{ $featuredProduct->stock }}">
                            <button class="add-to-cart btn btn-green" type="submit" {{ ($featuredProduct->stock ? '' : 'disabled') }}><span class="fa fa-shopping-cart "></span> Add to Cart</button>
                        </form>
                    </div>
                </div>

            @endforeach

        </div>


    </section>


    <section class="home-products products popular">

        <p class="product-subtitle">A must try</p>
        <h1 class="title">Most <span>Popular Items</span></h1>

        <div class="products-grid">

            @foreach($popularProducts as $popularProduct)

                <div class="product-item">

                    <a class="product-image" href="{{ route('shop.products.find', ['id' => $popularProduct->seller_product->id]) }}">
                        <img src="{{ asset($popularProduct->seller_product->image) }}" alt="">
                    </a>
                    <div class="product-details">


                        <h4 class="product-name">{{ ($popularProduct->custom_title != '' ? $popularProduct->custom_title : $popularProduct->product->product_name) }}</h4>
                        <p>Php {{ number_format($popularProduct->seller_product->price, 2) }}</p>
                        <form action="{{ route('shop.product.addToCart') }}" method="POST">

                            @csrf
                            <input type="hidden" name="seller_id" id="seller_id" value="{{ $popularProduct->seller_id }}">
                            <input type="hidden" name="product_id" id="product_id" value="{{ $popularProduct->product_id }}">
                            <input type="hidden" name="price" id="price" value="{{ $popularProduct->seller_product->price }}">
                            <input type="hidden" name="seller_product_id" id="seller_product_id" value="{{ $popularProduct->seller_product->id }}">
                            <input type="number" name="quantity" id="quantity" value="" max="{{ $popularProduct->seller_product->stock }}">
                            <button class="add-to-cart btn btn-green" type="submit" {{ ($popularProduct->seller_product->stock ? '' : 'disabled') }}><span class="fa fa-shopping-cart "></span> Add to Cart</button>
                        </form>
                    </div>
                </div>

            @endforeach

        </div>


    </section>

    <section class="home-products products container">

        <p class="product-subtitle">Get to know your suki</p>
        <h1 class="title">Our <span>Stores</span></h1>

        <div class="products-grid">

            @foreach($stores as $store)

                <div class="product-item" >

                    <a class="product-image" href="{{ route('shop.store.find', ['id' => $store->id]) }}">
                        @if( $store->seller_stall_images()->exists())
                            <img src="{{ asset( $store->seller_stall_images->first()->image ) }}" alt="">
                        @else
                            <img src="{{ asset( $store->stall->image ) }}" alt="">
                        @endif
                    </a>
                    <div class="product-details">
                        <h4>{{ $store->name ?? $store->seller->user->first_name . " Stall"}}</h4>


                        <a class="view-store-btn btn btn-orange" type="submit" href="{{ route('shop.store.find', ['id' => $store->id]) }}" >
                            <span class="fa fa-store"> </span>
                            View
                        </a>

                    </div>
                </div>

            @endforeach

        </div>


    </section>


    <script>    
        function reveal() {
            var reveals = document.querySelectorAll(".reveal");

            for (var i = 0; i < reveals.length; i++) {
            var windowHeight = window.innerHeight;
            var elementTop = reveals[i].getBoundingClientRect().top;
            var elementVisible = 120;

            if (elementTop < windowHeight - elementVisible) {
                reveals[i].classList.add("active");
            } else {
                reveals[i].classList.remove("active");
            }
            }
        }

        window.addEventListener("scroll", reveal);

        const elements = {
            initSlick: function () {
                $(".home-category .box-container").slick({
                    slidesToShow:4,
                    slidesToScroll:1,
                    dots: false,
                    autoplay: true,
                    autoplaySpeed: 5000,
                    infinite: true,
                    slide: 'div',
                    cssEase: 'linear',
                    prevArrow: jQuery('.home-category .category-previous'),
                    nextArrow: jQuery('.home-category .category-next'),
                    responsive: [
                        {
                            breakpoint: 991,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll:1,
                                infinite: false,
                                dots: false
                            }
                        },

                    ]
                });
            },
            initFeaturedProducts: function () {

                $(" .products-grid").slick({
                    slidesToShow:4,
                    slidesToScroll:1,
                    dots: false,
                    autoplay: false,
                    autoplaySpeed: 5000,
                    infinite: true,
                    slide: 'div',
                    cssEase: 'linear',

                });
            }
        }

        $(document).ready(function(){
           elements.initSlick();
           // elements.initFeaturedProducts();
        });

    </script>
@endsection
