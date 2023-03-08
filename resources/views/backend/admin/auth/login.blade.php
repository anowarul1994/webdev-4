<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <link rel="stylesheet" href="{{asset('/backend/admin/css/admin-login.css')}}">
</head>
<body>
<div class="login-box">
    <h2>Login</h2>
    @if(session()->has('error'))

    <p style="color: red">{{ session()->get('error') }}</p>
    @endif
    <form method="POST" action="{{ url('/admin/login') }}">
        @csrf
        <div class="user-box">
            <input type="text" name="email" id="email">
            <label for="email">Email</label>
            @error('email')
                <p class="text-white mb-0"><small><i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}</small></p>
            @enderror
        </div>

        <div class="user-box">
            <input type="password" name="password" required="">
            <label>Password</label>
        </div>
        <button type="submit">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Submit
        </button>
    </form>
</div>


<script src="index.js"></script>
</body>
</html>
