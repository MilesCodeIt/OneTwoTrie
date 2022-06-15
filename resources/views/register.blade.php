<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Onetwotrie</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>register: </h1>
    <form action="#" method="post">
        @csrf
        <input type="text" name="name" id="name" placeholder="Your Name">
        <input type="email" name="email" id="email" placeholder="Your email">
        <input type="password" name="password" id="password" placeholder="Your password">
        <input type="password" name="passwordConfirm" id="PasswordConfirm" placeholder="Confirm your password">
        <input type="submit" value="Register">
    </form>
    <div class="footer">
        <p>already registered ?</p> <a href="{{route('login')}}">Login !</a> | <a href="{{route('home')}}">home</a>
    </div>
</div>
</body>
</html>
