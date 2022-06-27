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

    <div style="display: flex; justify-content: space-around;">
        <div style="width: 35%;">
            <img src="{{ url('storage/office/'.$office->image_link) }}" class="card-img-top" alt="..." style="margin-top: 20%;">
        </div>
        <div style="width: 50%;">
            <div style="border-style: solid; border-width: 1.5px; border-color:#106cfc; border-radius: 5px;  padding: 3%; height: 500px; margin-top: 5%; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <form actions="{{ route('updateOffice_form', $office->office_id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Office Name</label>
                        <input type="text" name ="name" class="form-control" id="exampleFormControlInput1" value="{{ $office->name }}">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Office Address</label>
                      <input type="text" name ="address" class="form-control" id="exampleInputEmail1" value="{{ $office->address }}">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Contact Name</label>
                      <input type="text" name ="contact_name" class="form-control" id="exampleInputPassword1" value="{{ $office->contact_name }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Phone Number</label>
                        <input type="text" name ="phone_number" class="form-control" id="exampleInputPassword1" value="{{ $office->phone_number }}">
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
