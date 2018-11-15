@extends('layouts.front.app')

@section('content')
<section class="login-section">
    <div class="row">
        <header class="account-content">
            <h1>{{ __('Log in to RoomBooker') }}</h1>
            <p>Log in to see stuff. Praesent iaculis neque quis velit malesuada, a ornare augue maximus. Etiam eget
                nulla vel velit aliquet ultrices.</p>
        </header>
        <div class="account-card">
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <label for="email">{{ __('E-mail Address') }}</label>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                            name="email" value="{{ old('email') }}" placeholder="ex. johndoe@mail.com" required
                            autofocus>

                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div>
                        <label for="password">{{ __('Password') }}</label>

                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                            name="password" placeholder="{{ __('Enter your password') }}" required>

                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div>
                        <div class="remember-me">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>

                        <a class="forgot-password" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
