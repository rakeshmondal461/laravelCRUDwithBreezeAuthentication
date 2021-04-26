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
  <center><h2>Update Category</h2></center>
  <form action="updateCategory" method="POST">
    @csrf
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name" value="{{$data->categoryName}}" name="name">
    </div>
    <button type="submit" name="updateButton" class="btn btn-warning" value="{{$data->id}}" >Update</button>
  </form>
  <center><a href="/dashboard" class="btn btn-primary btn-xs">Back to Home Page</a></center>
</div>

</body>
</html>
