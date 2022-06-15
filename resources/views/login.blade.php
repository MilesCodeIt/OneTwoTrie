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
    <h1>Login: </h1>
    <form action="#" method="post">
        @csrf
        <input type="text" name="login" id="login" placeholder="Your Name or your email">
        <input type="password" name="password" id="password" placeholder="Your password">
        <input type="submit" value="Login">
    </form>
    <div class="footer">
        <p>No account ?</p> <a href="{{route('register')}}">Register !</a> | <a href="{{route('home')}}">home</a>
    </div>
</div>
</body>
</html>