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
    <title>MEGAWEALTH</title>
</head>
<body>
    @include('navbar.adminNavbar')
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <div style="padding-right: 5%; padding-left: 5%; padding-top:1%;">
        <a class="btn btn-primary" href="/addOffice" role="button"> + Add Office</a>

        <div style="display: flex; justify-content: center;">
            @foreach ($office as $off)
                <div class="shadow card" style="width: 16rem; margin: 10px;">
                    <img src="{{ url('storage/office/'.$off->image_link) }}" class="card-img-top" alt="..." style=" height: 150px;">
                    <div class="card-body">
                        <h5 class="card-title fs-6 fw-bold">{{$off->name}}</h5>
                        <span class="card-text fs-6 fw-light">{{$off->address}}</span><br><br>
                        <span class="card-text">{{$off->contact_name}}</span><br>
                        <span class="card-text">{{$off->phone_number}}</span>


                        <div style="display:flex; justify-content: space-around; margin-top: 10px;">
                            <a href="/updateOffice/{{ $off->office_id }}" class="btn btn-primary">Update</a>
                            <a href="/deleteOffice/{{ $off->office_id }}" class="btn btn-danger">Delete</a>

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
