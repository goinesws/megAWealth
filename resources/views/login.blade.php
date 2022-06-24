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
    <style>
        a{
            text-decoration: none;
            color:lightgray;
            font-size: 15px;
            margin: 10px;
        }
    </style>
    <title>Login</title>
</head>
<body>

    {{-- navbar --}}
    <div class="container-nb" style="width: 100%; background-color:#101c5c; color: white; display: flex; justify-content: space-between">
        <div class="title">
            <h3 style="padding: 10px; font-family: 'Lobster', cursive;">megAWealth</h3>
        </div>

        <div class="navbar-items" style="padding: 10px; margin-top: 7px;">
            <a href="/home">Home</a>
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        </div>
    </div>

    {{-- form --}}
    <div style="border-style: solid; border-width: 1.5px; border-color:#106cfc; border-radius: 5px; height: 500px; width: 700px; margin: auto; margin-top: 5%; padding: 3%; margin-bottom: 5%;">
        <div style="text-align: center;">
            <h3 style="">Login</h3>
        </div>
        <form actions="{{ route('login_form') }}" method="post">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" name ="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Email Address Here..."
              value={{ Illuminate\Support\Facades\Cookie::get('LoginCookie') !== NULL ?
              Illuminate\Support\Facades\Cookie::get('LoginCookie') : "" }}>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" name ="password" class="form-control" id="exampleInputPassword1" placeholder="Your Password must be at least 8 characters."
              value={{ Illuminate\Support\Facades\Cookie::get('PasswordCookie') !== NULL ?
                        Illuminate\Support\Facades\Cookie::get('PasswordCookie') : "" }}>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="form2Example31"
                    checked={{ \Illuminate\Support\Facades\Cookie::get('LoginCookie') !== NULL }} >
                <label class="form-check-label" for="form2Example31"> Remember me </label>
            </div>

            @if($errors->any())
              <div class="alert alert-danger">
                  {{$errors->first()}}
              </div>
            @endif

            <button type="submit" class="btn btn-primary position-absolute start-50"> Login </button>
          </form>


    </div>
</body>
</html>
