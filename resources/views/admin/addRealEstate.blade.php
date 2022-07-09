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

    {{-- form --}}
    <div style="border-style: solid; border-width: 1.5px; border-color:#106cfc; border-radius: 5px; height: 500px; width: 700px; margin: auto; margin-top: 5%; padding: 3%; margin-bottom: 5%;">
        <form actions="{{ route('addEstate_form') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Sales Type</span>
                <select class="form-select" aria-label="Default select example" name="sales_type">
                    <option selected>Choose the type of sales</option>
                    <option value="1">Sale</option>
                    <option value="2">Rent</option>
                </select>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Building Type</span>
                <select class="form-select" aria-label="Default select example" name="building_type">
                    <option selected>Choose the Building Type</option>
                    <option value="1">Apartment</option>
                    <option value="2">House</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="InputPrice" class="form-label">Price</label>
                <input type="number" class="form-control" id="exampleInputPassword1" name="price">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Location</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="location">
            </div>

            <div class="mb-4">
                <label for="formFile" class="form-label">Upload the Image</label>
                <input class="form-control" type="file" id="formFile" name="image">
            </div>

            @if($errors->any())
              <div class="alert alert-danger">
                  {{$errors->first()}}
              </div>
            @endif

            <button type="submit" class="btn btn-primary position-absolute">Insert</button>
          </form>


    </div>

</body>
</html>
