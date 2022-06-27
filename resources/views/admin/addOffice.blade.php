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

    {{-- form --}}
    <div style="border-style: solid; border-width: 1.5px; border-color:#106cfc; border-radius: 5px; height: 550px; width: 700px; margin: auto; margin-top: 5%; padding: 3%; margin-bottom: 5%;">
        <form actions="{{ route('addOffice_form') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Office Name</label>
                <input type="text" name ="name" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Office Address</label>
              <input type="text" name ="address" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Contact Name</label>
              <input type="text" name ="contact_name" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Phone Number</label>
                <input type="text" name ="phone_number" class="form-control" id="exampleInputPassword1">
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

            <button type="submit" class="btn btn-primary position-absolute start-50">Register</button>
          </form>


    </div>

</body>
</html>
