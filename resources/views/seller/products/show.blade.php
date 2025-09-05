@extends('layouts.seller')

@section('content')
    <div class="container">
        <div class="profile">
            <div class="profile-wrapper">
                <form action="" method="GET"  class="form-group list-header" id="form-header">
                    <h3>Products</h3>

                    <div class="list-header-fields">
                        <div class="form-group" style="justify-content: flex-end;">
                            <input  class="form-control" type="text" name="search" id="search" value="{{ old('search') ??  $_GET['search']  ?? '' }}" placeholder="Search">
                        </div>
                    </div>

                </form>

                <table class="table table-bordered">
            <thead>
                <tr>

                    <th>Product Name</th>
                    <th>SRP</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($seller_products as $seller_product)
              
                    <tr>
                        <td>{{ $seller_product->product->product_name }}</td>
                        <td>{{ $seller_product->product->srp }}</td>
                        <td>{{ $seller_product->price }}</td>
                        <td>{{ $seller_product->product->category->category }}</td>
                        <td>{{ $seller_product->type }}</td>
                        <td>{{ $seller_product->product->status }}</td>
                        <td>
                            <a href="{{ route('seller.products.find', ['id' => $seller_product->id]) }}">View </a>|
                            <a href="{{ route('seller.products.edit', $seller_product->id) }}">Edit </a>|
                            <a href="#" data-action-delete="Product" data-href="{{ route('seller.products.delete', $seller_product->id) }}"> Delete</a>
                        </td>
                    </tr>
                
            @endforeach
            </tbody>
        </table>
        <a href="{{ route('seller.products.create') }}" class="info-header-edit"> <i class="fa fa-plus-circle"></i></a>
            </div>
        </div>
    </div>
@endsection
