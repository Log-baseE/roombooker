@extends('layouts.front.app')

@section('content')
<section class="signup-section">
    <div class="row">
        <header class="account-content">
                <h1>{{ __('Sign Up Now') }}</h1>
                <p>Sign up to use our sevices. Praesent iaculis neque quis velit malesuada, a ornare augue maximus. Etiam eget nulla vel velit aliquet ultrices.</p>
        </header>
        <div class="account-card">
            <div class="card-body">
                <form method="POST" action="{{ route('signup') }}">
                    @csrf

                    <div>
                        <label for="name">{{ __('Name') }}</label>
                        <input id="name" type="text" class="{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="ex. John Doe" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div>
                        <label for="email">{{ __('E-mail Address') }}</label>

                        <input id="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="ex. johndoe@mail.com" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div>
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Enter your password') }}" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div>
                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('Enter your password again') }}" required>
                    </div>

                    <div>
                        <button type="submit">
                                {{ __('Register') }}
                            </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
