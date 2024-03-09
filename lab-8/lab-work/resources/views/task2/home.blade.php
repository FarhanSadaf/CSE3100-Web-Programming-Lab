<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    
    <!-- If cookie exists, display the form -->
    @if (!Cookie::has('email'))
    <h1>Welcome to Lab 8!</h1>
    <h2>Register</h2>
    <form action="{{ route('home') }}" method="GET">
        Enter your email:
        <input type="email" name="email" id="email">
        <input type="submit" value="Submit">
    </form>
    @else
    <h1>Welcome, {{ Cookie::get('email') }}</h1>
    <p>Click <a href="{{ route('bank-account') }}">here</a> to go to the bank account page.</p>
    <a href="{{ route('logout') }}">Logout</a>
    @endif

</body>

</html>