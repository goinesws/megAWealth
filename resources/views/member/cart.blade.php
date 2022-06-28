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
    @include('navbar.memberNavbar')

    <div style="padding-right: 5%; padding-left: 5%; padding-top:1%;">
        <h4>Your Cart</h4>

        <div style="display: flex; justify-content: center;">
            @if(count($carts)==0)
                <h4>No Data in Cart Yet</h4>
            @else
                @foreach ($carts as $cart)
                <div class="shadow card" style="width: 16rem; margin: 10px;">
                    <img src="{{ url('storage/estate/'.$cart->estate->image_link) }}" class="card-img-top" alt="..." style=" height: 150px;">
                    <div class="card-body">
                    <h5 class="card-title">${{$cart->estate->price}}</h5>
                    <span class="card-text">{{$cart->estate->location}}</span><br>
                    <span class="btn btn-info btn-sm text-light" style="margin-top:10px; --bs-btn-font-size: .75rem; --bs-btn-padding-y: .1rem; --bs-btn-padding-x: .3rem;">{{$cart->estate->building_type}}</span>
                    <span class="btn btn-warning btn-sm text-light" style="margin-top:10px; --bs-btn-font-size: .75rem; --bs-btn-padding-y: .1rem; --bs-btn-padding-x: .3rem;">{{$cart->created_at->format('d M Y')}}</span>


                    <div style="display:flex; justify-content: space-around; margin-top: 10px;">
                        <a href="/cancelCart/{{ $cart->estate->estate_id }}" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
                </div>
                @endforeach
            @endif

        </div>

        <div class="d-flex" style="justify-content: center">
            {{ $carts->links() }}
        </div>

        @if(count($carts)!=0)
            <div class="d-flex" style="justify-content: center">
                <a href="/cartCheckout" class="btn btn-primary">Checkout</a>
            </div>
        @endif

    </div>

</body>
</html>
