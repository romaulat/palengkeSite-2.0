@extends('layouts.seller')

@section('content')
    <div class="orders">
        <div class="orders-details-wrapper">
            <div class="orders-details-wrapper-left">
                <h3>Order ID: {{ $orders->transaction_id }}</h3>
                <div class="order-details-box order-status">
                    <h2>{{ $orders->status }}</h2>
                </div>
                <div class="order-details-box order-updates">
                    <h2>{{ $orders->order_statuses->last()->status->status }}</h2>

                    @php $arr_status = [] @endphp

                    @foreach($orders->order_statuses as $order_status)
                        @php $arr_status[] =$order_status->status_id @endphp
                    @endforeach


                    <form action="{{ route('seller.orders.status.update') }}" id="updateStatus" class="form-group" method="POST">
                        @csrf
                        <input type="hidden" name="order_id" value="{{ $orders->id }}">
                        @if($orders->status !== 'Completed' && $orders->status !== 'Cancelled')
                        <select name="status" id="orderStatus" class="form-control">
                            @foreach($statuses as $status)


                                @if($status->status !== 'Ship')
                                <option value="{{ $status->id }}"
                                        {{ (in_array($status->id, $arr_status) ? 'disabled' : '') }}


                                        {{ ( $orders->order_statuses->last()->status->status == $status->status  ? 'selected' : '' ) }}

                                >{{ $status->status }}</option>
                                @endif

                            @endforeach
                        </select>
                        @endif
                    </form>
                </div>
                <div class="order-details-box order-customer-info">
                    <div class="order-info-section-1">
                        <h3>Contact Information</h3>
                        <p>{{ $orders->buyer->user->email }}</p>

                        <h3>Shipping Address</h3>
                        <p>
                            {{ $orders->order_delivery_detail->stnumber }}
                            {{ $orders->order_delivery_detail->stname }}
                            {{ $orders->order_delivery_detail->barangay }},
                            {{ $orders->order_delivery_detail->city }},
                            {{ $orders->order_delivery_detail->province }}
                            {{ $orders->order_delivery_detail->zip }}

                        </p>

                        <h3></h3>
                        <p></p>

                        <h3></h3>
                        <p></p>
                    </div>
                    <div class="order-info-section-2">
                        <h3>Payment Method</h3>
                        @foreach($orders->order_products as $product)
                            <p>{{ $orders->payment_option->payment_option }} - ₱ {{ number_format($product->seller_product->price * $product->quantity, 2) }}</p>
                        @endforeach

                        <h3>Billing Address</h3>
                        <p>
                            {{ $orders->order_delivery_detail->stnumber }}
                            {{ $orders->order_delivery_detail->stname }}
                            {{ $orders->order_delivery_detail->barangay }},
                            {{ $orders->order_delivery_detail->city }},
                            {{ $orders->order_delivery_detail->province }}
                            {{ $orders->order_delivery_detail->zip }}

                        </p>
                    </div>
                </div>
            </div>
            <div class="orders-details-wrapper-right">
                <table class="table table-borderless order-items">
                    @foreach($orders->order_products as $product)
                        <tr>
                            <td class="td-left"><img src="{{ asset($product->seller_product->image) }}" alt=""></td>
                            <td class="td-center"><strong>{{ $product->product->product_name }} </strong>x {{  $product->quantity }}</td>
                            <td class="td-right"><p>₱ {{ number_format($product->seller_product->price * $product->quantity, 2) }}</p></td>
                        </tr>
                    @endforeach
                </table>

                <hr>

                <table class="table table-borderless order-items">

                    <tr>
                        <td class="td-left"><p>Price</p></td>
                        <td class="td-center"></td>
                        @foreach($orders->order_products as $product)
                            <td class="td-right"><p>₱ {{ $product->seller_product->price }}</p></td>
                        @endforeach
                    </tr>

                    <tr>
                        <td class="td-left"><p>Quantity</p></td>
                        <td class="td-center"></td>
                        @foreach($orders->order_products as $product)
                            <td class="td-right"><p>{{ $product->quantity }}</p></td>
                        @endforeach
                    </tr>

                </table>

                <hr>

                <table class="table table-borderless order-items">

                    <tr>
                        <td class="td-left"><p>Total</p></td>
                        <td class="td-center"></td>
                        @foreach($orders->order_products as $product)
                            <td class="td-right"><p>₱ {{ number_format($product->seller_product->price * $product->quantity, 2) }}</p></td>
                        @endforeach
                    </tr>

                </table>
            </div>
        </div>
    </div>

    <script>

        var doc = $(document);
        const order = {
            init: function(){
                console.log('A script has been loaded');
                order.updateStatus($('#orderStatus'));
            },
            updateStatus: function(trigger){
                trigger.change(function(e){
                    $('#updateStatus').submit();
                });
            },

        };

        doc.ready(function () {
            order.init();
        });

        $(window).on('load', function(){

        });
    </script>
@endsection
