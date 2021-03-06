<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

    <title>Register</title>
    <style>
        .navbar-content{
            text-decoration: none;
            color:lightgray;
            font-size: 15px;
            margin: 10px;
        }
        .active{
            color: lightskyblue;
        }
    </style>
</head>
<body>

    {{-- navbar --}}
    <div class="container-nb" style="width: 100%; background-color:#101c5c; color: white; display: flex; justify-content: space-between">
        <div class="title">
            <h3 style="padding: 10px; font-family: 'Lobster', cursive;">megAWealth</h3>
        </div>

        <div class="navbar-items" style="padding: 10px; margin-top: 7px;">
            <a class= "navbar-content {{ Route::currentRouteNamed('homepage') ? 'active' : '' }}" href="/home">Home</a>
            <a class= "navbar-content {{ Route::currentRouteNamed('aboutUs') ? 'active' : '' }}" href="/aboutUs">About Us</a>
            <a class= "navbar-content {{ Route::currentRouteNamed('buy') ? 'active' : '' }}" href="/buy">Buy</a>
            <a class= "navbar-content {{ Route::currentRouteNamed('rent') ? 'active' : '' }}" href="/rent">Rent</a>
            <a class= "navbar-content {{ Route::currentRouteNamed('index_login') ? 'active' : '' }}" href="/login">Login</a>
            <a class= "navbar-content {{ Route::currentRouteNamed('index_register') ? 'active' : '' }}" href="/register">Register</a>
        </div>
    </div>

</body>
</html>
