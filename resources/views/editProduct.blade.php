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
  <center><h2>Update Product</h2></center>
  <form action="updateProduct" method="POST">
    @csrf
    <div class="form-group">
      <label for="name">Category: </label>
      <select name="category" id="category" class="form-control">
        <option value="">---- Select Category ----</option>
        @foreach($categories as $category)
        <option value="{{$category->id}}"  @if ($category->id == $data->category) {{'selected="selected"'}} @endif> {{$category->categoryName}} </option>
        @endforeach
      </select>
    </div>
    


    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" value="{{$data->productName}}"placeholder="Enter Name" name="name">
    </div>
    <div class="form-group">
      <label for="description">Description:</label>
      <input type="text" class="form-control" id="description" value="{{$data->description}}" placeholder="Enter Product Description" name="description">
    </div>
    <div class="form-group">
      <label for="price">Price:</label>
      <input type="text" class="form-control" id="price" value="{{$data->price}}" placeholder="Enter Price" name="price"/>  
    </div>
    <button type="submit" value="{{$data->id}}" name="updateButton" class="btn btn-success">Submit</button>
  </form>
  <center><a href="/dashboard" class="btn btn-primary btn-xs">Back to Home Page</a></center>
</div>

</body>
</html>
