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

    <div style="padding-right: 5%; padding-left: 5%; padding-top:1%;">
        <h4>Showing Search Results for {{ $search }}</h4>

        @if(count($estates) == 0)
            <h4>No results found for {{ $search }}</h4>
        @else
            <div style="display: flex; justify-content: center;">
                @foreach ($estates as $estate)
                    <div class="shadow card" style="width: 16rem; margin: 10px;">
                        <img src="{{ url('storage/estate/'.$estate->image_link) }}" class="card-img-top" alt="..." style=" height: 150px;">
                        <div class="card-body">
                        <h5 class="card-title">${{$estate->price}}</h5>
                        <span class="card-text">{{$estate->location}}</span><br>
                        <span class="btn btn-info btn-sm text-light" style="margin-top:10px; --bs-btn-font-size: .75rem; --bs-btn-padding-y: .1rem; --bs-btn-padding-x: .3rem;">{{$estate->building_type}}</span><br>


                        <div style="display:flex; justify-content: space-around; margin-top: 10px;">
                            @if($estate->sales_type=='Rent')
                                <a href="/addCart/{{ $estate->estate_id }}" class="btn btn-primary">Rent</a>
                            @elseif ($estate->sales_type=='Sale')
                                <a href="/addCart/{{ $estate->estate_id }}" class="btn btn-primary">Buy</a>
                            @endif

                        </div>
                    </div>
                    </div>
                @endforeach
            </div>
        @endif
        <div class="d-flex" style="justify-content: center">
            {{ $estates->links() }}
        </div>
    </div>

</body>
</html>
