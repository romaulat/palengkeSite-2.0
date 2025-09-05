



@extends('layouts.login')

@section('content')

    <div class="form-area">
        <div class="form-wrapper">

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
                        <div id="password-error" class="invalid-feedback" style="display:none; color:red; font-size:13px;">
                            Password must be at least 8 characters long
                        </div>

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        <div id="password-not-match" class="invalid-feedback" style="display:none; color:red; font-size:13px;">
                            Password does not match
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="home-btn option-btn">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <script>
        const passwordInput = document.getElementById('password');
        const passwordError = document.getElementById('password-error');
        const passwordConfirm = document.getElementById('password-confirm')
        const passwordNotMatch = document.getElementById('password-not-match');

        passwordInput.oninput = function() {
            if (passwordInput.value.length < 8) {
                passwordError.style.display = 'block';
            } else {
                passwordError.style.display = 'none';
            }
        }

        passwordConfirm.oninput = function() {
            if (passwordConfirm.value !== passwordInput.value) {
                passwordNotMatch.style.display = 'block';
            } else {
                passwordNotMatch.style.display = 'none';
            }
        }

    </script>

@endsection

