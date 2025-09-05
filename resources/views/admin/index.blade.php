@extends('layouts.admin')

@section('content')
<div class="dashboard-flex">
    <!-- display flex -->
        <!-- columns 1 x 3 border: 1px solid #e3e3e3; border-radius:25px; flex: 1 1 33.3333% -->
        <div class="dashboard-column" id="seller-col">
            <a href="{{ route('admin.show.sellers.list') }}">
                <div class="column-content">
                    <div class="col-left">
                        <span class="icon-dashboard">
                            <i class="fa fa-users"></i>
                        </span>
                    </div>
                    <div class="col-right">
                        <h3>{{ $sellers }}</h3>
                        <p>Active Sellers</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="dashboard-column" id="buyer-col">
            <a href="{{ route('admin.show.buyers.list') }}">
                <div class="column-content">
                    <div class="col-left">
                        <span class="icon-dashboard">
                            <i class="fa fa-users"></i>
                        </span>
                    </div>
                    <div class="col-right">
                        <h3>{{ $buyers }}</h3>
                        <p>Active Buyers</p>
                    </div>
                </div>
            </a>
        </div>
        
        @if(auth()->guard('admin')->user()->is_super)
        <a href="{{ route('admin.show.staff') }}">
        <div class="dashboard-column" id="staff-col">    
            <div class="column-content">
                <div class="col-left">
                    <span class="icon-dashboard">
                        <i class="fa fa-users"></i>
                    </span>
                </div>
                <div class="col-right">
                    <h3>{{ $staff }}</h3>
                    <p>Staff</p>
                </div>
            </div>
        </a>
        </div>
        @endif

        <a href="{{ route('admin.appointments.show') }}">
        <div class="dashboard-column" id="appointment-col">    
            <div class="column-content">
                <div class="col-left">
                    <span class="icon-dashboard">
                        <i class="fa fa-calendar"></i>
                    </span>
                </div>
                <div class="col-right">
                    <h3>{{ $stallappointments }}</h3>
                    <p>Pending Stall Appointment</p>
                </div>
            </div>
        </a>
        </div>

        <a href="{{ route('admin.seller.stalls.show') }}">
        <div class="dashboard-column" id="approval-col">    
            <div class="column-content">
                <div class="col-left">
                    <span class="icon-dashboard">
                        <i class="fa fa-user-shield"></i>
                    </span>
                </div>
                <div class="col-right">
                    <h3>{{ $stallapproval }}</h3>
                    <p>Stall Approval</p>
                </div>
            </div>
        </a>
        </div>

        <a href="{{ route('admin.products.show') }}">
        <div class="dashboard-column" id="approval-col">    
            <div class="column-content">
                <div class="col-left">
                    <span class="icon-dashboard">
                        <i class="fa fa-cart-plus"></i>
                    </span>
                </div>
                <div class="col-right">
                    <h3>{{ $products }}</h3>
                    <p>Product Approval</p>
                </div>
            </div>
        </a>
        </div>

        </div>
        <!-- columns 1 x 3 -->
    <!-- display flex -->

    
</div>

@endsection
