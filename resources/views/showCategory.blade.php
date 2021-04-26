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
  <center><h2>Categories</h2></center>
  <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4"><input type="text" class="form-control" id="searach" placeholder="Search..."/></div>
    <div class="col-sm-4"></div>
  </div><p/>
    <form method="post" id="myForm" action="/categoryDataManipulate">      
      @csrf
      <table class="table table-bordered">
        <thead>
          <tr><td colspan="6" style="font-size:16px;text-align:center;color:green"><b>Total Record : <span id="total_records">{{sizeof($categories)}}</span></b></td></tr>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach($categories as $category)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td> {{$category->categoryName}}</td>
                <td><button type="submit" class="btn btn-warning btn-xs" name = "Update" value = "{{$category->id}}">Update</button></td>
                <td><button type="submit" class="btn btn-danger btn-xs" id = "delete"  name = "Delete" value = "{{$category->id}}">Delete</button></td>
            </tr>
          @endforeach

        </tbody>
      </table>
    </form>
  <center><a href="/dashboard" class="btn btn-primary btn-xs">Back to Home Page</a></center>
</div>

</body>
</html>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">

  $(document).on('keyup', '#searach', function(){
    var query = $(this).val();
    $.ajax({
        url:"{{ route('live_search_category.action') }}",
        method:'GET',
        data:{query:query,"_token": "{{ csrf_token() }}"},
        dataType:'json',
        success:function(data){
         
         var datacnt = 0;
         $('tbody').empty()
         for(var i=0;i<data.searchData.length;i++){
          datacnt++;
            id = data.searchData[i].id;
            name = data.searchData[i].name;
            var rowData = "<tr> <td>"+datacnt+"</td> <td> "+name+"</td> <td><button type='submit' class='btn btn-warning btn-xs' name = 'Update' value = "+id+">Update</button></td> <td><button type='submit' class='btn btn-danger btn-xs' id = 'delete'  name = 'Delete' value = "+id+">Delete</button></td> </tr>";
            $("tbody").append(rowData);
         }   
         $('#total_records').text(data.total_data_count);
        }
      })
   });


    document.onsubmit=function(){
           return confirm('Are you Sure?');
    }



</script>