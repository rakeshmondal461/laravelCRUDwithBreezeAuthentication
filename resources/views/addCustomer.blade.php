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
  <center><h2>Add New Customer</h2></center>
  <form action="addCustomer" method="POST">
    @csrf
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
    </div>
    <div class="form-group">
      <label for="mob">Mobile Number:</label>
      <input type="text" class="form-control" id="mob" placeholder="Enter Mobile Number" name="mob">
    </div>
    <div class="form-group">
      <label for="mobileNumber">Address:</label>
      <textarea class="form-control" id="address" placeholder="Enter Address" name="address"></textarea>   
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
  </form>
  <center><a href="/dashboard" class="btn btn-primary btn-xs">Back to Home Page</a></center>
  <p/>
    @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade in">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Success!</strong> {{ session()->get('message') }}
    </div>
    @endif
</div>

</body>
</html>
