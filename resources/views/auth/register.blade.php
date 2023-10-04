<form method="POST" action="{{ route('register') }}" dir="rtl">
    @csrf
    <input type="hidden" name="guard" value="web">
    <div class="singel-form text-center">
        <label for="name">{{ __('main.name_student') }}</label>
        <input class="text-center" type="text" id="name" name="name" placeholder="{{ __('main.name_student') }}" required>
    </div>
    <div class="singel-form text-center">
        <label for="email">{{ __('main.email') }}</label>
        <input class="text-center" type="email" id="email" name="email" placeholder="{{ __('main.email') }}" required>
    </div>
    <div class="singel-form text-center">
        <label for="password">{{ __('main.password') }}</label>
        <input class="text-center" type="password" id="password" name="password" placeholder="{{ __('main.password') }}" required>
    </div>
    <div class="singel-form text-center">
        <label for="password_confirmation">{{ __('main.confirm password') }}</label>
        <input class="text-center" type="password" id="password_confirmation" name="password_confirmation" placeholder="{{ __('main.confirm password') }}" required>
    </div>
    <div class="singel-form text-center">
            <p>{{ __('main.account') }} <span><a href="{{ url('/student/login') }}">{{ __('main.account_login') }}</a></span></p>
    </div>
    <div class="singel-form text-center">
        <button class="main-btn" type="submit">{{ __('main.register') }}</button>
    </div>
</form>
