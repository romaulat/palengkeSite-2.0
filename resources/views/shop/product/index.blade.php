@extends('layouts.app')

@section('content')
    <section class="product container">

        <div class="product-wrapper ">
            <div class="product-top-area">
                <div class="product-img-area">

                        <div id="slide-for">
                            <div>
                                <div class="product-main-image">
                                    <img src="{{ asset( $sellerProduct->image )  }}" alt="">
                                </div>
                            </div>
                            @for($i=1; $i<=5; $i++)
                                @php $imagekey = 'image_'.$i; @endphp
                                @if($sellerProduct[$imagekey])
                                    <div>
                                        <div class="product-main-image">
                                            <img src="{{ asset($sellerProduct[$imagekey]) }}" alt="">
                                        </div>
                                    </div>
                                @endif
                            @endfor

                        </div>
                        <div id="slide-nav" class="product-gallery">
                            <div>
                                <div class="product-img">
                                    <img src="{{ asset($sellerProduct->image) }}" alt="">
                                </div>
                            </div>
                            @for($i=1; $i<=5; $i++)
                                @php $imagekey = 'image_'.$i; @endphp
                                @if($sellerProduct[$imagekey])
                                    <div>
                                        <div class="product-img">
                                            <img src="{{ asset( $sellerProduct[$imagekey] ) }}" alt="">
                                        </div>
                                    </div>
                                @endif
                            @endfor
                        </div>

                </div>
                <div class="product-details-area">
                    <div class="details-top">

                        <div class="average-ratings">
                            @if($sellerProduct->average_ratings)

                                @php list($whole, $decimal) = explode('.', $sellerProduct->average_ratings) @endphp

                                <h3>
                                    @for($i=1; $i <= 5; $i++)
                                        @if($i <= $whole)
                                            <span class="product-rating active fa fa-star" data-rating="" style="position: relative; overflow: hidden"> </span>
                                        @else
                                            <span class="product-rating fa fa-star" data-rating="" style="position: relative; overflow: hidden"> </span>
                                        @endif
                                    @endfor
                                    {{  $sellerProduct->average_ratings}}
                                </h3>

                            @else
                                No Ratings yet.
                            @endif
                        </div>

                        <h4 class="product-name">{{ ($sellerProduct->custom_title != '' ? $sellerProduct->custom_title : $sellerProduct->product->product_name) }}</h4>
                        <p class="seller-name"><i class="fa fa-store"></i> <span class="stall-name">{{  $sellerProduct->seller->seller_stalls->name }} </span> : <span class="seller-name">{{  $sellerProduct->seller->user->first_name }}</span></p>
                    </div>

                    <hr>

                    <div class="details-middle">
                        <h4 class="product-price">Php {{ number_format($sellerProduct->price, 2) }}</h4>
                        <br>
                        <p>{{ $sellerProduct->description }}</p>
                    </div>

                    <div class="details-bottom">
                        @if(session('user_type') == 'buyer')
                            <div class="add-to-cart-area">
                                <form action="{{ route('shop.product.addToCart') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="seller_id" id="seller_id" value="{{ $sellerProduct->seller_id }}">
                                    <input type="hidden" name="product_id" id="product_id" value="{{ $sellerProduct->product_id }}">
                                    <input type="hidden" name="price" id="price" value="{{ $sellerProduct->price }}">
                                    <input type="hidden" name="seller_product_id" id="seller_product_id" value="{{ $sellerProduct->id }}">

                                    <hr>

                                    <div class="form-group row" style="margin: 0; align-items: center">
                                        <label for="" class="col-sm-1 col-form-label">Quantity:</label>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control-plaintext quantity" name="quantity" id="quantity" value="" max="{{ $sellerProduct->stock }}">
                                        </div>
                                        <div class="col-sm-5">
                                            <button class="btn btn-orange details-add-to-cart" type="submit" {{ ($sellerProduct->stock ? '' : 'disabled') }}>Add to Cart</button>
                                        </div>
                                    </div>



                                </form>
                            </div>
                        @endif
                    </div>



                </div>
            </div>

        </div>
    </section>
    <div class="product-bottom-area">

        <div class="comment-area container">


            <h1 class="title"><span>Comments</span></h1>

            <ul>
                @foreach($sellerProduct->comments as $comment)
                    <li>
                        @for( $i=1; $i<=$comment->ratings; $i++)
                            <span class="product-rating active fa fa-star" data-rating=""></span>
                        @endfor
                        <p><strong>{{ ( ($comment->is_anonymous == 1) ? 'Anonymous' : $comment->buyer->user->first_name) }}</strong></p>

                        <p>{{ $comment->comment  }}</p>
                    </li>
                @endforeach
            </ul>



            <div class="comment-form-area">
              
                @if(session('user_type') == 'buyer')

                    
                    <form action="{{ route('shop.products.post.comment', ['id' => $sellerProduct->id]) }}" id="post-comment" method="POST">


                        @csrf
                        <span class="rating fa fa-star" data-rating="1"></span>
                        <span class="rating fa fa-star" data-rating="2"></span>
                        <span class="rating fa fa-star" data-rating="3"></span>
                        <span class="rating fa fa-star" data-rating="4"></span>
                        <span class="rating fa fa-star" data-rating="5"></span>
                        <input type="hidden" name="ratings" value="0">
                        <div class="form-group">
                            <textarea class="form-control" name="comment" id="comment" cols="120" rows="10"> </textarea>
                        </div>
                        <div class="form-group">
                            <div class="form-check-inline   ">
                                <input type="checkbox" class="form-check-input" name="anonymous" value="1" checked>
                                <label for="" class="form-check-label" > Post as Anonymous</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-orange">Submit</button>
                    </form>
                @endif
            </div>


        </div>


    </div>
    <script>

        var doc = $(document);
        var productDetail = {
            onInit: function(){
                productDetail.setRatings($('span.rating'));
                // productDetail.hoverRatings($('span.rating'));
               // productDetail.postRating($(''))
            },
            
            setRatings: function (trigger) {
                trigger.click(function () {

                    var self = $(this);

                    var rating = self.data('rating');

                    $('input[name="ratings"]').val(rating);
                    $('span.rating').removeClass('active');


                   for (rating; rating > 0; rating--){
                       $('span[data-rating="'+ rating +'"]').addClass('active');
                   }


                });
            },

            hoverRatings: function(trigger){
                trigger.mouseover(function () {

                    var self = $(this);

                    var rating = self.data('rating');

                    $('input[name="ratings"]').val(rating);
                    $('span.rating').removeClass('active');


                    for (rating; rating > 0; rating--){
                        $('span[data-rating="'+ rating +'"]').addClass('active');
                    }


                });
            },
            postRating: function () {

                $('form#post-comment').submit();

            }
        }

        doc.ready(function () {

            productDetail.onInit();

            $('#slide-for').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                arrows: false,
                fade: true,
                asNavFor: '#slide-nav'
            });

            $('#slide-nav').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                asNavFor: '#slide-for',
                dots: false ,
                centerMode: true,
                focusOnSelect: true
            });
        })



    </script>
@endsection
