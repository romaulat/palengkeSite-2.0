@extends('layouts.app')

@section('content')

<div class="products-grid" style="width:100%;">
<div class="product-item" style="margin:8rem;">
  <div class="product-image">
      <img src="{{ asset($sellerProduct->image) }}" alt="">
  </div>
  <div class="product-details">
    <h4 class="product-name">{{ ($sellerProduct->custom_title != '' ? $sellerProduct->custom_title : $sellerProduct->product->product_name) }}</h4>
    <p>Php {{ number_format($sellerProduct->price, 2) }}</p>
        <form action="{{ route('cart.update') }}" method="POST" class="form-">
              @csrf
              <input type="hidden" name="seller_id" id="seller_id" value="{{ $sellerProduct->seller_id }}">
              <input type="hidden" name="product_id" id="product_id" value="{{ $sellerProduct->product_id }}">
              <input type="hidden" name="price" id="price" value="{{ $sellerProduct->price }}">
              <input type="hidden" name="seller_product_id" id="seller_product_id" value="{{ $sellerProduct->id }}">
              <input type="number" class="form-control-plaintext quantity" name="quantity" id="quantity" value="{{ $cart->quantity }}" max="{{ $sellerProduct->stock }}">
              <button class="btn btn-green update-btn" type="submit" {{ ($sellerProduct->stock ? '' : 'disabled') }}>Update</button>
        </form>
    </div>
</div>
</div>
@endsection