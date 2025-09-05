@extends('layouts.admin')

@section('content')
<div class="container">
        <div class="profile">
            <div class="profile-wrapper">
                <form action="" method="GET"  class="form-group list-header" id="form-header">
                    <h3>Users</h3>

                    <div class="list-header-fields">
                        
                        <div class="form-group">
                            <input  class="form-control" type="text" name="search" id="search" value="{{ old('search') ??  $_GET['search']  ?? '' }}" placeholder="Search">
                        </div>

                        <div class="form-group">
                            <select  class="form-control" id="orderby" name="orderby" placeholder="Order By" value="" >
                                <option value="A-Z"     <?=  ( isset( $_GET['orderby'] ) ?  ( $_GET['orderby'] == 'A-Z' ) ? 'selected' : '' : '' ); ?>>Name (A-Z)</option>
                                <option value="Z-A"     <?=  ( isset( $_GET['orderby'] ) ?  ( $_GET['orderby'] == 'Z-A' ) ? 'selected' : '' : '' ); ?>>Name (Z-A)</option>
                                <option value="recent"  <?=  ( isset( $_GET['orderby'] ) ?  ( $_GET['orderby'] == 'recent' ) ? 'selected' : '' : '' ); ?>>Recent</option>
                                <option value="oldest"  <?=  ( isset( $_GET['orderby'] ) ?  ( $_GET['orderby'] == 'oldest' ) ? 'selected' : '' : '' ); ?>>Oldest</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <select  class="form-control" id="stall" name="stall" placeholder="Stall Status" value="" >
                                <option value="">All</option>
                                <option value="active"     <?=  ( isset( $_GET['stall'] ) ?  ( $_GET['stall'] == 'active' ) ? 'selected' : '' : '' ); ?>>Active</option>
                                <option value="inactive"     <?=  ( isset( $_GET['stall'] ) ?  ( $_GET['stall'] == 'inactive' ) ? 'selected' : '' : '' ); ?>>Inactive</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <select  class="form-control" id="contract" name="contract" placeholder="Contract" value="" >
                                <option value="">All</option>
                                <option value="active"     <?=  ( isset( $_GET['contract'] ) ?  ( $_GET['contract'] == 'active' ) ? 'selected' : '' : '' ); ?>>Active</option>
                                <option value="end"     <?=  ( isset( $_GET['contract'] ) ?  ( $_GET['contract'] == 'end' ) ? 'selected' : '' : '' ); ?>>Contract End</option>
                            </select>
                        </div>

                        @if(isset($_GET['page']))
                            <input type="hidden" name="page" value="{{ $_GET['page'] }}">
                        @endif
                    </div>





                </form>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->seller->seller_type}}</td>
                                <td>
                                    <a href="{{ route('admin.show.seller', $user->id) }}">View</a> | 
                                    <a href="{{ route('admin.users.edit', $user->id) }}">Edit</a> |
                                    <a href="#" data-action-delete="User" data-href="{{ route('admin.sellers.delete', $user->id) }}"> Delete </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @if( isset($_GET) )
                {{$users->appends($_GET)->links()}}
                @else
                {{$users->links()}}
                @endif
                <!-- <a href="{{ route('admin.stalls.create') }}" class="info-header-edit"> <i class="fa fa-plus-circle"></i> Create</a> -->
                <a href="{{ route('admin.seller.export') }}?{{ $request->getQueryString() }}" class="btn btn-primary"><span class="fa fa-download"></span> Downloads</a>
            </div>
        </div>
    </div>
@endsection


