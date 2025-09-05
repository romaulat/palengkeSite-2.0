@extends('layouts.verified')
@section('content')

<section class="verification-acct" style="padding-top: 20px !important; text-align: center;">
    <div class="container">
        <div class="row">
            @if($result['response'] == 'error')
                <div class="col-lg-8 offset-lg-2">
                    <h2>Ooops..</h2>
                    <h4 style="color: red;"><?php echo($result['messages']); ?></h4>
                </div>
            @else
                <div class="col-lg-8 offset-lg-2">
                    <h2>Activation Complete!</h2>
                    <h4>Your Account has been successfully activated. You can now log in using the email and password you chose during the registration.</h4>
                </div>
            @endif
        </div>
    </div>
</section>

@stop