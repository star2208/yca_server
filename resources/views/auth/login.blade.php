
/**
 * Created by PhpStorm.
 * User: LenLv
 * Date: 2015/9/21
 * Time: 21:52
 */

<form method="POST" action="/auth/login">
{!! csrf_field() !!}

<div>
    Email
    <input type="email" name="email" value="{{ old('email') }}">
</div>

<div>
    Password
    <input type="password" name="password" id="password">
</div>

<div>
    <input type="checkbox" name="remember"> Remember Me
</div>

<div>
    <button type="submit">Login</button>
</div>
</form>