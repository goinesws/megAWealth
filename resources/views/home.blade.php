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
    <title>Home</title>

    <style>
        .img-hover-effect:hover{
            opacity: 0.5;

        }
    </style>
</head>

<body>


    @auth
        @if(Gate::allows('isAdmin'))
            @include('navbar.adminNavbar')
        @elseif (Gate::allows('isMember'))
            @include('navbar.memberNavbar')
        @endif
    @endauth
    @guest
        @include('navbar.guestNavbar')
    @endguest



    <div class="card bg-dark text-white">
        <img src="{{ url('storage/assets/thumbnail.jpg') }}" class="card-img" alt="..." height="400">
        <div class="card-img-overlay">
            <h5 class="fs-1 text-center" style="margin-top: 3rem">Find Your Future Home</h5>
            <form class="d-flex" style="margin-top: 7rem">
                <input class="form-control me-2" type="search" placeholder="Enter a City, Property Type, Buy or Rent..." aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4 m-4 p-4">
        <div class="col">
          <div class="card h-100">
            <img src="{{ url('storage/assets/rent-image.jpg') }}" class="card-img-top" alt="...">
            <div class="card-img-overlay">
                <div class="d-grid gap-2">
                    <a href="/" class="btn btn-outline-dark" type="button">RENT</a>
                </div>
            </div>
        </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <img src="{{ url('storage/assets/buy-image.jpg') }}" class="card-img-top" alt="...">
            <div class="card-img-overlay">
                <div class="d-grid gap-2">
                    <a href="/" class="btn btn-outline-dark" type="button">BUY</a>
                </div>
            </div>
          </div>
        </div>
        <div class="col">
            <div class="card h-100">
              <img src="{{ url('storage/assets/aboutus-image.jpg') }}" class="card-img-top img-hover-effect" alt="...">
              <div class="card-img-overlay">
                    <div class="d-grid gap-2">
                        <a href="/" class="btn btn-outline-dark" type="button">ABOUT US</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- ngetest mau liat ada folder storage ga di github --}}
</body>

</html>
