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
        .image-container{
            position: relative;
            width: auto;
        }

        .image-effect{
            opacity: 1;
            display: block;
            width: 100%;
            height: auto;
            transition: .5s ease;
            backface-visibility: hidden;
        }

        .make-middle{
            transition: .5s ease;
            opacity: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
        }

        .texts-effect{
            font-size: 16px;
            padding: 16px 32px;
        }

        .image-container:hover .image-effect{
            opacity: 0.3;
        }

        .image-container:hover .make-middle{
            opacity: 1;
        }

    </style>
</head>

<body>

    {{-- {{ dd(Auth::user()->name) }} --}}
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

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <div class="container-fluid" style="padding-right: 7%; padding-left: 7%; padding-top:1%;">
        <div class="card bg-dark text-white" style="border: 0;">
            <img src="{{ url('storage/assets/thumbnail.jpg') }}" class="card-img" alt="..." height="400">
            <div class="card-img-overlay">
                <h5 class="fs-1 text-center" style="margin-top: 3rem">Find Your Future Home</h5>
                <form class="d-flex" style="margin-top: 7rem" action="{{ route('search') }}" method="get">
                    <input class="form-control me-2" type="text" placeholder="Enter a City, Property Type, Buy or Rent..." aria-label="Search" name="search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4 p-4">
            <div class="col p-5">
            <div class="card h-70 image-container">
                <img src="{{ url('storage/assets/rent-image.jpg') }}" class="img-thumbnail image-effect" alt="..." style="image-">
                <div class="make-middle">
                    <a href="/rent" class="btn btn-outline-dark texts-effect" type="button">RENT</a>
                </div>
            </div>
            </div>
            <div class="col p-5">
            <div class="card h-70 image-container">
                <img src="{{ url('storage/assets/buy-image.jpg') }}" class="img-thumbnail image-effect" alt="...">
                <div class="make-middle">
                    <a href="/buy" class="btn btn-outline-dark texts-effect" type="button">BUY</a>
                </div>
            </div>
            </div>
            <div class="col p-5">
                <div class="card h-70 image-container">
                    <img src="{{ url('storage/assets/aboutus-image.jpg') }}" class="img-thumbnail image-effect" alt="...">
                    <div class="make-middle">
                        <a href="/aboutUs" class="btn btn-outline-dark texts-effect" type="button">ABOUT US</a>
                    </div>
                </div>
            </div>
        </div>
    <div>
</body>

</html>
