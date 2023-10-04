
<form method="POST" action="{{ route('login.action') }}">
    @csrf
    {{-- أهم وحدة هاي عشان نحدد أي تسجيل دخول يوديني بنكتب اسم القارد  --}}
    admin
    <input type="hidden" name="guard" value="admin">
    <div class="row">
        <input type="email" name="email" id="email" class="form__input" placeholder="Email">
    </div>
    <div class="row">
        <!-- <span class="fa fa-lock"></span> -->
        <input type="password" name="password" id="password" class="form__input" placeholder="Password">
    </div>
    <div class="row">
        <input type="checkbox" name="remember" id="remember" class="">
        <label for="remember_me">Remember Me!</label>
    </div>
    <div class="row">
        <input type="submit" value="Submit" class="btn">
    </div>
</form>
