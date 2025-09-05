@extends('layouts.admin')

@section('content')

<div class="profile">
        <div class="profile-wrapper">
            <div class="card basic-info" style="width: 18rem;">
                <div class="card-header basic-info-header">
                   Category
                </div>
                <div class="basic-info-body">

                    @if(isset($message))
                        <strong>{{ $message  }}</strong>
                    @endif
                    <form action="{{ route('admin.categories.store') }}" method="POST" class="form-" enctype="multipart/form-data">
                        @csrf
                        <div class="info-body-flex">



                                <div class="form-group long">
                                    <label for="Product">Category</label>
                                    <input type="text"  class="form-control @error('category') is-invalid @enderror"
                                                        id="category"
                                                        name="category"
                                                        placeholder="i.e. Apple" value="" >
                                    @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                                <div class="form-group long">
                                    <label for="Product">Image Upload</label>
                                    <input type="file"  class="form-control @error('image') is-invalid @enderror"
                                                        id="image"
                                                        name="image"
                                                        placeholder="" value="" >
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                        </div>
                        <div class="row-btn">
                            <div class="btn-container" style="padding: 0 10px 15px;">
                                <button type="submit" class="btn btn-primary" style="font-size: 11px; padding: 8px;">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
