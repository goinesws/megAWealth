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
    <div style="display: flex; justify-content: space-around;">
        <div style="width: 35%;">
        <img src="{{ url('storage/estate/'.$estate->image_link) }}" class="card-img-top" alt="..." style="margin-top: 20%;">

        </div>
        <div style="width: 50%;">
            <div style="border-style: solid; border-width: 1.5px; border-color:#106cfc; border-radius: 5px;  padding: 3%; height: 500px; margin-top: 5%; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <form actions="{{ route('updateEstate_form', $estate->estate_id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Sales Type</span>
                        <select class="form-select" aria-label="Default select example" name="sales_type">
                            <option value="">Choose the type of sales</option>
                            <option value="1" {{ $estate->sales_type == 'Sale' ? 'selected' : '' }}>Sale</option>
                            <option value="2" {{ $estate->sales_type == 'Rent' ? 'selected' : '' }}>Rent</option>
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Building Type</span>
                        <select class="form-select" aria-label="Default select example" name="building_type">
                            <option value="">Choose the Building Type</option>
                            <option value="1" {{ $estate->building_type == 'Apartment' ? 'selected' : '' }}>Apartment</option>
                            <option value="2" {{ $estate->building_type == 'House' ? 'selected' : '' }}>House</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="InputPrice" class="form-label">Price</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name="price" value="{{ $estate->price }}">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Location</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="location" value="{{ $estate->location }}">
                    </div>

                    @if($errors->any())
                      <div class="alert alert-danger">
                          {{$errors->first()}}
                      </div>
                    @endif

                    <button type="submit" class="btn btn-primary position-absolute">Update</button>
                  </form>
            </div>
        </div>
    </div>


</body>
</html>
