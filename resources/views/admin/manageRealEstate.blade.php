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
    @include('navbar.adminNavbar')

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <div style="padding-right: 5%; padding-left: 5%; padding-top:1%;">
        <a class="btn btn-primary" href="/addRealEstate" role="button"> + Add Real Estate</a>

        <div style="display: flex; justify-content: center;">
            @foreach ($estates as $estate)
            <div class="shadow card" style="width: 18rem; margin: 10px;">
                <img src="{{ url('storage/estate/'.$estate->image_link) }}" class="card-img-top" alt="..." style=" height: 150px;">
                <div class="card-body">
                <h5 class="card-title">${{$estate->price}}</h5>
                <span class="card-text">{{$estate->location}}</span><br>
                <span class="btn btn-info btn-sm text-light" style="margin-top:10px; --bs-btn-font-size: .75rem; --bs-btn-padding-y: .1rem; --bs-btn-padding-x: .3rem;">{{$estate->building_type}}</span>
                @if ($estate->status == 'Open'||$estate->status == 'Cart')
                    <span class="btn btn-primary btn-sm text-light" style="margin-top:10px; --bs-btn-font-size: .75rem; --bs-btn-padding-y: .1rem; --bs-btn-padding-x: .3rem;">{{$estate->sales_type}}</span>
                @endif
                <span class="btn btn-success btn-sm text-light" style="margin-top:10px; --bs-btn-font-size: .75rem; --bs-btn-padding-y: .1rem; --bs-btn-padding-x: .3rem;">{{$estate->status}}</span><br>


                <div style="display:flex; justify-content: center; margin-top: 10px;">
                    <a href="/updateRealEstate/{{ $estate->estate_id }}" class="btn btn-primary">Update</a>
                    <a href="/deleteRealEstate/{{ $estate->estate_id }}" class="btn btn-danger">Delete</a>
                    @if ($estate->status == 'Cart')
                        <a href="/updateRealEstateCartStatus/{{ $estate->estate_id }}" class="btn btn-success">Finish</a>
                    @endif
                </div>
            </div>
            </div>
            @endforeach

        </div>

        <div class="d-flex" style="justify-content: center">
            {{ $estates->links() }}
        </div>
    </div>


</body>
</html>
