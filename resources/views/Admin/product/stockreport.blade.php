<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Product Stock Report</title>
  </head>
  <body>
      
  
  
  <div class="container">
          
  <table class="table table-bordered">
  <thead>
    <tr>
      
      <td colspan="7" style="font-weight:bold;text-align:center;font-size:20px; text-transform:uppercase">Product Stock Report</td>
    </tr>
    <tr>
      <th scope="col">SL</th>
      <th scope="col">Product ID</th>
      <th scope="col">Product Name</th>
      <th scope="col">Total Stock</th>
      <th scope="col">Total Sale Stock</th>
      <th scope="col">Current Stock</th>
    </tr>
  </thead>
  <tbody>
       
       
       @php
        $i=0;
       @endphp
      
      @if(isset($view))
      @foreach($view as $v)
      
      @php 
      $i++;
       $quantitys = DB::table('shopping_carts')
            ->where('product_id',$v->pro_id)
            ->where('status','1')
            ->sum('quantity');  
            
      @endphp
    <tr>
      <th scope="row">{{ $i }}</th>
      <td>{{ $v->product_id }}</td>
      <td>{{ $v->product_name }}</td>
      <td>{{ $v->stockqunt }}</td>
      <td>
          
        {{ $quantitys }}
      </td>
      
      
      <td>
      
        {{ $v->stockqunt - $quantitys }}
      </td>
    </tr>
    
    @endforeach
    @endif
    
  
 
  </tbody>
</table>
    
      
  </div>
    
    
    
    
    
    
    
    
    
    
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>