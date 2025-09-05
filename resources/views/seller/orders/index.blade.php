@extends('layouts.seller')

@section('content')
    <div class="orders">


        <div class="orders-wrapper">

            <h3>My Orders</h3>

            <hr>


            <!-- Tabs navs -->
            <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
                <li class="nav-item" role="presentation">
                    <a
                            class="nav-link"
                            id="#orderTabPerStatus"
                            data-mdb-toggle="tab"
                            href="?status=pending"
                            role="tab"
                            aria-controls="ex1-tabs-1"
                            aria-selected="true"
                    >Pending
                    <span class="notif badge badge-danger" id="orders-notif">
                        @if(auth()->user()->seller->orders()->exists())
                            {{ auth()->user()->seller->orders->where('status', 'pending')->count() }}
                        @endif
                    </span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a
                            class="nav-link "
                            id="#orderTabPerStatus"
                            data-mdb-toggle="tab"
                            href="?status=confirmed"
                            role="tab"
                            aria-controls="ex1-tabs-1"
                            aria-selected="true"
                    >Confirmed
                    <span class="notif badge badge-danger" id="orders-notif">
                        @if(auth()->user()->seller->orders()->exists())
                            {{ auth()->user()->seller->orders->where('status', 'confirmed')->count() }}
                        @endif
                    </span>
                    </a>
                </li>
               {{-- <li class="nav-item" role="presentation">
                    <a
                            class="nav-link"
                            id="#orderTabPerStatus"
                            data-mdb-toggle="tab"
                            href="?status=shipping"
                            role="tab"
                            aria-controls="ex1-tabs-2"
                            aria-selected="false"
                    >Shipping</a>
                </li>--}}
                <li class="nav-item" role="presentation">
                    <a
                            class="nav-link"
                            id="#orderTabPerStatus"
                            data-mdb-toggle="tab"
                            href="?status=On Delivery"
                            role="tab"
                            aria-controls="ex1-tabs-3"
                            aria-selected="false"
                    >On Delivery
                    <span class="notif badge badge-danger" id="orders-notif">
                        @if(auth()->user()->seller->orders()->exists())
                            {{ auth()->user()->seller->orders->where('status', 'On Delivery')->count() }}
                        @endif
                    </span>
                    </a>
                </li>

                <li class="nav-item" role="presentation">
                    <a
                            class="nav-link"
                            id="#orderTabPerStatus"
                            data-mdb-toggle="tab"
                            href="?status=Delivered"
                            role="tab"
                            aria-controls="ex1-tabs-3"
                            aria-selected="false"
                    >Delivered
                    <span class="notif badge badge-danger" id="orders-notif">
                        @if(auth()->user()->seller->orders()->exists())
                            {{ auth()->user()->seller->orders->where('status', 'Delivered')->count() }}
                        @endif
                    </span>
                    </a>
                </li>

                <li class="nav-item" role="presentation">
                    <a
                            class="nav-link"
                            id="#orderTabPerStatus"
                            data-mdb-toggle="tab"
                            href="?status=Completed"
                            role="tab"
                            aria-controls="ex1-tabs-3"
                            aria-selected="false"
                    >Completed
                    <span class="notif badge badge-danger" id="orders-notif">
                        @if(auth()->user()->seller->orders()->exists())
                            {{ auth()->user()->seller->orders->where('status', 'Completed')->count() }}
                        @endif
                    </span>
                    </a>
                </li>

                <li class="nav-item" role="presentation">
                    <a
                            class="nav-link"
                            id="#orderTabPerStatus"
                            data-mdb-toggle="tab"
                            href="?status=cancelled"
                            role="tab"
                            aria-controls="ex1-tabs-3"
                            aria-selected="false"
                    >Cancelled
                    <span class="notif badge badge-danger" id="orders-notif">
                        @if(auth()->user()->seller->orders()->exists())
                            {{ auth()->user()->seller->orders->where('status', 'cancelled')->count() }}
                        @endif
                    </span>
                    </a>
                </li>
            </ul>

            <hr>
            <!-- Tabs navs -->

            <!-- Tabs content -->
           {{-- <div class="tab-content" id="ex1-content">
                <div
                        class="tab-pane fade show active"
                        id="ex1-tabs-1"
                        role="tabpanel"
                        aria-labelledby="ex1-tab-1"
                >
                    Tab 1 content
                </div>
                <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                    Tab 2 content
                </div>
                <div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
                    Tab 3 content
                </div>
            </div>--}}
          {{--  <form action="" id="filterByStatus" class="form-group" method="GET">
                @csrf
                <label for="">Filter</label>
                <select name="status" id="orderStatus" class="form-control">
                    @foreach($statuses as $status)

                        <option value="{{ $status->id }}" {{ ( isset($_GET['status']) && $_GET['status'] == $status->id ? 'selected'  : '') }}>{{ $status->status }}</option>
                    @endforeach
                </select>
            </form>--}}


            @foreach($orders as $order)
                <div class="my-order-list">
                    <div class="my-order-item">
                        <div class="my-order-details">
                            <div class="details-up">
                                <div>
                                    <p class="order-date">{{ date('F d, Y', strtotime($order->created_at)) }}</p>
                                    <p class="order-no">Order no. PS-{{ $order->transaction_id }}</p>
                                </div>
                                <div>
                                    <p class="order-total-label">Total</p>
                                    @foreach( $order->order_products as $product)
                                        <p class="order-total">₱{{ number_format($product->seller_product->price * $product->quantity, 2) }}</p>
                                    @endforeach
                                </div>
                            </div>
                            <div class="details-thumbnail">
                                {{ $order->seller->seller_stalls->name }}
                                <br>
                                @foreach( $order->order_products as $product)
                                    {{ $product->product->product_name }}
                                    <br>
                                    {{-- <img src="{!! asset($product->seller_product->image)  !!}" alt="" width="60" height="60">--}}
                                    {{ $product->seller_product->price }} x {{ $product->quantity }} =  {{ number_format($product->seller_product->price * $product->quantity, 2) }}
                                @endforeach
                            </div>
                        </div>
                        <div class="my-orders-actions">
                            <span class="alert alert-{{ ($order->status == 'pending' ? 'warning' :  ($order->status == 'confirmed' ? 'success' : '' ) ) }}"> {{ ucfirst($order->status) }}</span>

                            @if( $order->status == 'pending' && $order->payment_option_id == '2')
                                <a href="{{ route('seller.orders.confirmCOD', ['id' => $order->id]) }}" class="pal-button btn-green" >Confirm COD Request</a>
                            @endif

                            <a class="pal-button btn-orange" href="{{ route('seller.orders.find', ['id' => $order->id]) }}">View Order</a>
                        </div>
                    </div>
                </div>



                <div class="modal" tabindex="-1" role="dialog" id="order{{ $order->transaction_id }}">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                @if ($message = Session::get('success'))
                                    <div class="custom-alerts alert alert-success fade in">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                        {!! $message !!}
                                    </div>
                                    <?php Session::forget('success');?>
                                @endif

                                @if ($message = Session::get('error'))
                                    <div class="custom-alerts alert alert-danger fade in">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                        {!! $message !!}
                                    </div>
                                    <?php Session::forget('error');?>
                                @endif
                                <div class="panel-heading"><b>Paywith Paypal</b></div>
                                <div class="panel-body">
                                    <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{!! URL::route('paypal') !!}" >
                                        {{ csrf_field() }}

                                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                                            <label for="amount" class="col-md-4 control-label">Enter Amount</label>

                                            <div class="col-md-6">
                                                <input id="amount" type="text" class="form-control" name="amount" value="{{ $order->total }}" readonly>
                                                <input id="order_id" type="hidden" class="form-control" name="order_id" value="{{ $order->id }}" readonly>

                                                @if ($errors->has('amount'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('amount') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Pay with Paypal
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <div class="modal-footer">

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach



        </div>
    </div>


    <!-- Tabs content -->
    <script>
        const filter = {
            onInit: function () {
                filter.initFilterStatus( $('#orderStatus') );
            },

            initFilterStatus: function(trigger){
                trigger.change(function(e){

                    $('#filterByStatus').submit();
                });
            },
        }

        $(document).ready(function () {
            filter.onInit();
        })
    </script>
@endsection
