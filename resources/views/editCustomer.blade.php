<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <center><h2>Update Customer</h2></center>
  <form action="updateCustomer" method="POST">
    @csrf
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name" value="{{$data->name}}" name="name">
    </div>
    <div class="form-group">
      <label for="mob">Mobile Number:</label>
      <input type="text" class="form-control" id="mob" placeholder="Enter Mobile Number" value="{{$data->mob}}" name="mob">
    </div>
    <div class="form-group">
      <label for="mobileNumber">Address:</label>
      <textarea class="form-control" id="address" placeholder="Enter Address" name="address">{{$data->address}}</textarea>   
    </div>
    <button type="submit" class="btn btn-warning" name="updateButton" value="{{$data->id}}">Update</button>
  </form>
  <center><a href="/view" class="btn btn-primary btn-xs">View All Customers</a></center>
</div>

</body>
</html>
