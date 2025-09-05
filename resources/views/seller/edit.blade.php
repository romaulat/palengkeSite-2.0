@extends('layouts.seller')

@section('content')

<div class="profile">
        <div class="profile-wrapper">
            <div class="card basic-info" style="width: 18rem;">
                <div class="card-header basic-info-header">
                    Basic Information
                </div>
                <div class="basic-info-body">
                     @if(isset($message))
                         <strong>{{ $message  }}</strong>
                     @endif
                    <form action="{{ route('seller.update') }}" method="POST" class="form-">
                        @csrf
                        <div class="info-body-flex">
                            <div class="form-group info-item short">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror " id="first_name" name="first_name" placeholder="First Name" value="{{ auth()->user()->first_name }}" >
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group info-item short">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror " id="last_name" name="last_name" placeholder="Last Name" value=" {{ auth()->user()->last_name }}" >
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group info-item short">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value=" {{ auth()->user()->email }}">
                                @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                            <div class="form-group info-item short input-group mb-3 prepend">
                                <label for="email">Mobile</label>
                                    <div class="input-group-prepend info-item-prepend">
                                        <span class="input-group-text" id="basic-addon1">+63</span>
                                    </div>
                                    <input type="text" class="form-control @error('mobile') is-invalid @enderror" id="mobile" name="mobile" placeholder="9123456789" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" value="{{ auth()->user()->mobile }}">
                                    @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror


                            </div>

                            @if(auth()->user()->seller()->exists())
                            <div class="form-group info-item short">
                                <label for="birthday">Birthday</label>
                                <input type="date" class="form-control @error('birthday') is-invalid @enderror " id="birthday" name="birthday" placeholder="Birthday" value="{{ date(auth()->user()->seller->birthday) }}" >
                                 @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror

                            </div>

                            <div class="form-group info-item xshort">
                                <label for="email">Age</label>
                                <input type="number" class="form-control @error('age') is-invalid @enderror" id="age" name="age" placeholder="Age" value="{{ auth()->user()->seller->age }}" readonly>
                                @error('age')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group info-item xshort">
                                <label for="gender">Gender</label>
                                

                                <select   class="form-control @error('gender') is-invalid @enderror" id="gender"
                                         name="gender">
                                        <option value="Male" {{ ('Male' == auth()->user()->seller->gender) ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ ('Female' == auth()->user()->seller->gender) ? 'selected' : '' }}>Female</option>
                                </select>

                            </div>

                        @endif
                        </div>
                        <div class="row-btn">
                            <div class="btn-container" style="padding: 0 10px 15px;">
                                <button type="submit" class="btn btn-primary" style="font-size: 11px; padding: 8px;">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
<script>
    function getAge(dateString) {
        var today = new Date();
        var birthDate = new Date(dateString);
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
    }

    $('#birthday').on('change', function () {

        var age = getAge( $(this).val());
        $('#age').val( age );
    })
</script>
@endsection
