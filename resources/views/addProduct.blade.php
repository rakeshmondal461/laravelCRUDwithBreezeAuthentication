
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
  <center><h2>Add New Product</h2></center>
  <form action="saveProduct" method="POST">
    @csrf
    <div class="form-group">
      <label for="name">Category: </label>
      <select name="category" id="category" class="form-control">
        <option value="">---- Select Category ----</option>
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->categoryName}}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
    </div>
    <div class="form-group">
      <label for="description">Description:</label>
      <input type="text" class="form-control" id="description" placeholder="Enter Product Description" name="description">
    </div>
    <div class="form-group">
      <label for="price">Price:</label>
      <textarea class="form-control" id="price" placeholder="Enter Price" name="price"></textarea>   
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
