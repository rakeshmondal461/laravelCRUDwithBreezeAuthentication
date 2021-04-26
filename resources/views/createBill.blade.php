
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  .table{
    width:60% !important;
  }

  .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
    padding:0px !important;
  }

  </style>
</head>
<body onload="loadTempData()">
<div class="container">
  <center><h2>Billing</h2></center>
  <form action="submitBilling" method="POST">
    @csrf
    <div class="form-group">
      <label for="name">Customer: </label>
      <select name="customer" id="customer" class="form-control">
        <option value="">---- Select Customer ----</option>
        @foreach($customers as $customer)
        <option value="{{$customer->id}}">{{$customer->customerName}}</option>
        @endforeach
      </select>
    </div>

  <div class="form-group">
      <label for="name">Payment Mode: </label>
      <select name="paymentMode" id="paymentMode" class="form-control">
        <option value="">---- Select Payment Mode ----</option>    
        <option value="CASH">CASH</option> 
        <option value="DEBIT CARD">DEBIT CARD</option>  
        <option value="CREDIT CARD">CREDIT CARD</option>  
        <option value="NET BANKING">NET BANKING</option>
        <option value="UPI">UPI</option>
      </select>
    </div>
   
   


<center>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Category</th>
        <th>Product</th>
        <th>Price</th>
        <th>Action</th>
      </tr>
       <tr>
        <td>
          <select name="category" id="category">            
            <option value="">---- Select Category ----</option>
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->categoryName}}</option>
            @endforeach

          </select>
          </td>
        <td>
          <select name="product" id="product" >
            <option value="">---- Select Product ----</option>
          </select>
        </td>
        <td><input type="text" name="price" id="price" readonly style="height:19px;"></td>
        <td><button type="button" name="addBtn" onclick="addtotemp()" class="btn btn-primary btn-xs" style="width:100%">Add</button></td>
      </tr>
    </thead>
    <tbody>
     
    </tbody>
  </table>
</center>
 <button type="submit" class="btn btn-success">Submit</button><br/>
  </form><br/>
  
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

<script type="text/javascript">
    $(document).ready(function ()
    {
            $('select[name="category"]').on('change',function(){
               var categoryID = $(this).val();
               if(categoryID){
                  $.ajax({
                     url : 'getProducts/' +categoryID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        $('select[name="product"]').empty();
                        $('select[name="product"]').append('<option value="">---- Select Product ----</option>');
                        $.each(data, function(key,value){
                           $('select[name="product"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('select[name="product"]').empty();
               }
            });

            $('select[name="product"]').on('change',function(){
                var productId = $(this).val();
                   if(productId){
                      $.ajax({
                         url : 'getProductPrice/' +productId,
                         type : "GET",
                         dataType : "json",
                         success:function(data)
                         {
                            $('input[name="price"]').empty();
                            $.each(data, function(key,value){
                               $('input[name="price"]').val(value);
                            });
                         }
                      });
                   }
                   else
                   {
                      $('input[name="price"]').empty();
                   }
            });
    });

    function addtotemp(){         
      var category = document.getElementById('category').value;
      var product = document.getElementById('product').value;
      var price = document.getElementById('price').value;
      var customer = document.getElementById('customer').value;
      if(category == ''){
        alert("Select a category");
      }else if(product == ''){
        alert("Select a product");
      }else if(price == ''){
        alert("Price can't be empty");
      }else if(customer == ''){
        alert("Select a customer");
      }else{
          $.ajax({
              url:"/saveTempBillDetails",
              method: "GET",
              data: {
            
                  type: 1,
                  category: category,
                  product: product,
                  price: price,
                  customer: customer,
                  "_token": "{{ csrf_token() }}"
              },
              cache: false,
              success: function(dataResult){
                  console.log(dataResult);
                  loadTempData();
                  $("#category").val("");
                  $("#product").val("");
                  $("#price").val("");
              }
          });
      }
    }



    function loadTempData(){
      $.ajax({
          url:"{{ route('getTempBillDetails.action') }}",
          method:'GET',
          dataType:'json',
          success:function(data){
            //console.log(data);
         
           var datacnt = 0;
           var totAmount = 0;
           $('tbody').empty()
           for(var i=0;i<data.length;i++){
            datacnt++;
              id = data[i].id;
              categoryName = data[i].categoryName;
              productName = data[i].productName;
              price = data[i].price;
              totAmount = parseInt(totAmount)+parseInt(price);
              var rowData = "<tr> <td> "+categoryName+"</td> <td> "+productName+"</td> <td> "+price+"</td> <td><button type='button' class='btn btn-danger btn-xs' id = 'delete'  name = 'Delete' onclick='deleteTempData("+id+")' >Delete</button></td>  </tr>";
              $("tbody").append(rowData); 
           } 
            var rowDataAmount = "<tr> <td> </td> <td align='right'><b>Total Amount:</b></td> <td> <input type='text' readonly id='totAmount' name='totAmount' style='height:19px;' value='"+totAmount+"'> </td> <td></td> </tr>";
            $("tbody").append(rowDataAmount); 
            //console.log(totAmount);

          }
        })
    }
    

    function deleteTempData(id){
        $.ajax({
           url : 'deleteTempBillDetails/' +id,
           type : "GET",
           dataType : "json",
           success:function(data)
           {
              console.log(data);
              loadTempData();
           }
        });
    }
  

  </script>

