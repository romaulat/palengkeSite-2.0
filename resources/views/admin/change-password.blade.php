@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="profile">
        <div class="profile-wrapper">
            <div class="form-area">
                @if (Session::has('message'))
                    <div class="alert alert-success }}">{{ Session::get('message')  }}</div>
                @endif
                @if(($errors->any()))
                    <div class="alert alert-danger alert-dismissible" role="alert" id="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Reminder!</strong>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                    </div>
                @endif

                <div class="form-wrapper">
                    <h3>{{ 'Change Password' }}</h3>
                    <form method="POST" action="{{ route('admin.update.password') }}">
                        @csrf
                        <div class="form-group">
                            <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                            <div id="password-error" class="invalid-feedback" style="display:none; color:red; font-size:13px;">
                                Password must be at least 8 characters long
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 col-form-label">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            <div id="password-not-match" class="invalid-feedback" style="display:none; color:red; font-size:13px;">
                                Password does not match
                            </div>
                        </div>

                        <div class="row-btn">
                            <div class="btn-container">
                                <button type="submit" class="btn btn-secondary">
                                    {{ __('Update Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const passwordInput = document.getElementById('password');
    const passwordError = document.getElementById('password-error');
    const passwordConfirm = document.getElementById('password-confirm');
    const passwordNotMatch = document.getElementById('password-not-match');

    // document.addEventListener('input', function(event) {
    //     if (event.target.classList.contains('is-invalid')) {
    //         event.target.classList.remove('is-invalid');
    //     }
    // });

    // document.addEventListener('click', function(event) {
    //     if (event.target.classList.contains('is-invalid')) {
    //         event.target.classList.remove('is-invalid');
    //     }
    // });

    passwordInput.oninput = function() {
        if (passwordInput.value.length < 8) {
            passwordError.style.display = 'block';
        } else {
            passwordError.style.display = 'none';
            passwordInput.classList.remove('is-invalid'); // Remove the 'is-invalid' class
        }
    };

    passwordConfirm.oninput = function() {
        if (passwordConfirm.value !== passwordInput.value) {
            passwordNotMatch.style.display = 'block';
        } else {
            passwordNotMatch.style.display = 'none';
        }
    };
</script>
@endsection
