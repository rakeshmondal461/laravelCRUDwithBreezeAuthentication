<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Test Application</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Test Application</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
     
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Add
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/addCategory">Add Category</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/addProduct">Add Product</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/add">Add Customer</a>
        </div>
      </li>
    

   <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          View
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/viewCategory">Show Category</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/view">Show Customer</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/viewProduct">Show Product</a>
        </div>
      </li>

    </ul>
  </div>
</nav>

<div class="container">
  <h3 class="text-center">Welcome</h3>
  <p/>
  <div class="d-flex flex-row justify-content-center">
  <div class="card mr-3" style="width: 18rem;">
    <div class="card-body text-center">
      <a href="/createBill" style="width:100%;float:left;text-decoration:none">
      <h5 class="card-title">Create Bill</h5>
      <i class="fa fa-newspaper-o"  style="font-size:50px;" aria-hidden="true"></i>
      </a>
    </div>
  </div>

  <div class="card" style="width: 18rem;">
    <div class="card-body text-center">
      <a href="/showBill" style="width:100%;float:left;text-decoration:none">
      <h5 class="card-title">View Bill</h5>
      <i class="fa fa-eye" style="font-size:50px;" aria-hidden="true"></i>
      </a>
    </div>
  </div>
</div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>