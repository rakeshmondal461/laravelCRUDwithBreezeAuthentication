
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

 <style type="text/css">
 .table tr {
    cursor: pointer;
}
.table{
  background-color: #fff !important;
}
.hedding h1{
  color:#fff;
  font-size:25px;
}

.hiddenRow {
    padding: 0 4px !important;
    background-color: #eeeeee;
    font-size: 13px;
}
.accordian-body span{
  color:#a2a2a2 !important;
}

    </style>

</head>
<body >
<div class="container">
  <center><h2>Billing</h2></center>
  <form action="submitBilling" method="POST">
    @csrf
    <div class="form-group">
      <label for="name">Search: </label>
      <input type="text" name="" class="form-control" placeholder="Enter Bill Number">
      <p/>
      <center>
        <button type="button" class="btn btn-success btn-sm">Show</button>
      </center>
    </div>


   
    
  <br/>
  <center>


        <table class="table table-bordered" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Bill Number</th>
                    <th>Customer</th>
                    <th>Payment Mode</th>
                    <th>Category</th>
                    <th>Product</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                



                @foreach ($billingData as  $billing) 
                      <?php  $mainlp= $loop->iteration;?>
                               
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $billing->billNumber }}</td>
                        <td>{{ $billing->customerName }}</td>
                        <td>{{ $billing->paymentMode }}</td>   
                        <td></td>
                        <td></td>
                        <td><b>Total :{{ $billing->totalAmount }}</b></td>         
                    </tr>
                    <?php 
                     $billdetailsData = $billing->data;?>
                  @foreach ($billdetailsData as $billdetails)
                      <?php  $scndlp= $loop->iteration;?>
                      <tr>
                      <td colspan="7">
                       
                        <table  style="width: 100% !important;"> 
                     
                        <tr>
                          <td colspan="4" style="width: 70%;"></td>
                          <td style="width: 10%;">{{ $billdetails->categoryName }}</td>
                          <td style="width: 10%;">{{ $billdetails->productName }}</td>                       
                          <td style="width: 10%;">{{ $billdetails->price }}</td>
                        
                        </tr>
                        </table>
                       
                    
                      </td> 
                      </tr>                  
                  @endforeach
                @endforeach

                
             
            
 
            </tbody>
        </table>
    



</form>
</center>
  <center><a href="/dashboard" class="btn btn-primary btn-xs">Back to Home Page</a></center>

</div>

</body>
</html>
<script type="text/javascript">
  
$('.accordion-toggle').click(function(){
  $('.hiddenRow').hide();
  $(this).next('tr').find('.hiddenRow').show();
});

</script>
