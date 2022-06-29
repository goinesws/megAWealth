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
    <title></title>
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

    <div class="container-fluid" style="padding-left: 0; padding-right: 0;">

        <div class="card bg-dark text-white" style="border-radius: 0; margin-left: 0; margin-right: 0;">
            <img src="{{ url('storage/assets/aboutUs-thumbnail.jpg') }}" class="card-img" alt="..." height="400">
            <div class="card-img-overlay">
                <h5 class="fs-1 text-center" style="margin-top: 3rem; margin-bottom: 3rem;">About Our Company</h5>
                <p class="text-center">Our company was founded at 2008 by our founder Renanda. At that time, we started as law firm specializing in real estate and construction. In 2012, our company expanded our service to real estate with the included service of real estates lawyers. Today, our company have 5 offices throughout the states and is planning to build more </p>
            </div>
        </div>
        <div style="padding-right: 5%; padding-left: 5%; padding-top:1%;">
            {{-- Content style="margin-top: 3rem; margin-bottom: 3rem;"--}}
            <h5 class="fs-3 text-start mb-3">Our Offices</h5>
            <div style="display: flex; justify-content: center;">
                @foreach ($office as $off)
                    <div class="shadow card" style="width: 16rem; margin: 10px;">
                        <img src="{{ url('storage/office/'.$off->image_link) }}" class="card-img-top" alt="..." style=" height: 150px;">
                        <div class="card-body">
                            <h5 class="card-title fs-6 fw-bold">{{$off->name}}</h5>
                            <span class="card-text fs-6 fw-light">{{$off->address}}</span><br><br>
                            <span class="card-text">{{$off->contact_name}}</span><br>
                            <span class="card-text">{{$off->phone_number}}</span>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="d-flex" style="justify-content: center">
                {{ $office->links() }}
            </div>

        </div>
    </div>
</body>
</html>
