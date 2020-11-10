@extends('site.template')

@section('content')
<div class="banner-wrapper has_background">
    <img src="{{ asset('site/assets/images/banner-for-all2.jpg')}}"
         class="img-responsive attachment-1920x447 size-1920x447" alt="img">
    <div class="banner-wrapper-inner">
        <h1 class="page-title">My Account</h1>
        <div role="navigation" aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
            <ul class="trail-items breadcrumb">
                <li class="trail-item trail-begin"><a href="index-2.html"><span>Home</span></a></li>
                <li class="trail-item trail-end active"><span>My Account</span>
                </li>
            </ul>
        </div>
    </div>
</div>
<main class="site-main  main-container no-sidebar">
    <div class="container">
        <div class="row">
            <div class="main-content col-md-12">
                <div class="page-main-content">
                    <div class="dayuna">
                        <div class="dayuna-notices-wrapper"></div>
                        <div class="u-columns col2-set" id="customer_login">
                            <div class="u-column1 col-1">
                                <h2>Login</h2>
                                <form class="dayuna-form dayuna-form-login login" method="post" action="login">
                                    @csrf()
                                    <p class="dayuna-form-row dayuna-form-row--wide form-row form-row-wide">
                                        <label for="username">Email Address&nbsp;<span class="required">*</span></label>
                                        <input id="email" type="email" class="dayuna-Input dayuna-Input--text input-text @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </p>
                                    <p class="dayuna-form-row dayuna-form-row--wide form-row form-row-wide">
                                        <label for="password">Password&nbsp;<span class="required">*</span></label>
                                        <input id="password" class="dayuna-Input dayuna-Input--text input-text @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>
                                    <p class="form-row">
                                        <button type="submit" class="dayuna-Button button" name="login"
                                                value="Log in">Log in
                                        </button>
                                        <label class="dayuna-form__label dayuna-form__label-for-checkbox inline">
                                            <input class="dayuna-form__input dayuna-form__input-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <span>Remember me</span>
                                        </label>
                                    </p>
                                    @if (Route::has('password.request'))

                                    <p class="dayuna-LostPassword lost_password">
                                        <a href="{{ route('password.request') }}">Lost your
                                            password?</a>
                                    </p>
                                    @endif
                                </form>
                            </div>
                            <div class="u-column2 col-2">
                                <h2>Register</h2>
                                <form method="post" action="{{ route('register') }}" class="dayuna-form dayuna-form-register register">
                                    @csrf()
                                    <p class="dayuna-form-row dayuna-form-row--wide form-row form-row-wide">
                                        <label for="reg_email">Full Name&nbsp;<span
                                                class="required">*</span></label>
                                        <input id="name" type="text" class="dayuna-Input dayuna-Input--text input-text @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>
                                     <p class="dayuna-form-row dayuna-form-row--wide form-row form-row-wide">
                                        <label for="reg_email">Email address&nbsp;<span
                                                class="required">*</span></label>
                                        <input id="email" type="email" class="dayuna-Input dayuna-Input--text input-text @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>
                                    <p class="dayuna-form-row dayuna-form-row--wide form-row form-row-wide">
                                        <label for="reg_email">Password&nbsp;<span
                                                class="required">*</span></label>
                                        <input id="password" type="password" class="dayuna-Input dayuna-Input--text input-text @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>
                                    <p class="dayuna-form-row dayuna-form-row--wide form-row form-row-wide">
                                        <label for="reg_email">{{ __('Confirm Password') }}&nbsp;<span
                                                class="required">*</span></label>
                                        <input id="password-confirm" type="password" class="dayuna-Input dayuna-Input--text input-text"name="password_confirmation" required autocomplete="new-password">
                                    </p>
                                     <p class="dayuna-form-row dayuna-form-row--wide form-row form-row-wide">
                                        <label for="reg_email">{{ __('State') }}&nbsp;
                                            <span class="required">*</span>
                                        </label>
                                        <select class="input-text" name="city" required>
                                            <?php $states = App\Models\Shipping::all(); ?>
                                            <option value="">Select State</option>
                                            @foreach($states as $state)
                                            <option value="{{$state->state}}">{{$state->state}}</option>
                                            @endforeach
                                        </select>
                                    </p>
                                    <p class="dayuna-form-row dayuna-form-row--wide form-row form-row-wide">
                                        <label for="reg_email">{{ __('Address') }}&nbsp;
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" class="dayuna-Input dayuna-Input--text input-text" name="address" required>
                                    </p>

                                    <p class="dayuna-form-row dayuna-form-row--wide form-row form-row-wide">
                                        <label for="reg_email">{{ __('Phone') }}&nbsp;
                                            <span class="required">*</span>
                                        </label>
                                        <input type="number" class="dayuna-Input dayuna-Input--text input-text" name="phone" required>
                                    </p>
                                   
                                    <p class="dayuna-FormRow form-row">
                                        <button type="submit" class="dayuna-Button button" name="register"
                                                value="Register">Register
                                        </button>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
