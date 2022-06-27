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

    <div class="container-fluid">

        <div class="card bg-dark text-white">
            <img src="{{ url('storage/assets/aboutUs-thumbnail.jpg') }}" class="card-img" alt="..." height="400">
            <div class="card-img-overlay">
                <h5 class="fs-1 text-center" style="margin-top: 3rem; margin-bottom: 3rem;">About Our Company</h5>
                <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque sunt a ipsum provident ipsam, quos dignissimos fugit corrupti, animi esse, nesciunt exercitationem nisi voluptatum quasi saepe maiores quis! Alias, magni?Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis tenetur ipsum libero placeat debitis, esse quod excepturi odio aut accusamus aperiam ipsa aspernatur! Maxime recusandae eum eaque tenetur vitae officiis?</p>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-5 g-4">
            @foreach($office as $off)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ url('storage/office/'.$off->image_link) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$off->name}}</h5>
                            <span class="card-text">{{$off->address}}</span><br>
                            <span class="card-text">{{$off->contact_name}}</span><br>
                            <span class="card-text">{{$off->phone_number}}</span>
                        </div>
                    </div>
                </div>
           @endforeach
        </div>
        <div class="d-flex" style="justify-content: center">
            {{ $office->links() }}
        </div>
    </div>
</body>
</html>
