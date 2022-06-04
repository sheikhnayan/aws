@include('Admin.header')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<div class="main-content">
    <div class="container">

<br>
<br>
<br>
<div class="container lst">


@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Sorry!</strong> There were more problems with your HTML input.<br><br>
    <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
    </ul>
</div>
@endif


@if(session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div> 
@endif


<h3 class="well">Multiple Product Image  Upload </h3>
<form method="post" action="{{url('multiimage')}}" enctype="multipart/form-data">
  @csrf

    <div class="col-6 input-group hdtuto control-group lst increment" >
      <label>Product Name :</label>
      <select class="form-control searchjs" name="product_id">
        <option value="">Select One</option>
        @if($product)
        @foreach($product as $productdata)
        <option value="{{$productdata->id}}">{{$productdata->product_name}} ({{$productdata->product_id}})</option>
        @endforeach
        @endif
      </select>
    </div>
    <br>


    <div class="input-group hdtuto control-group lst increment" >
      <input type="file" name="filenames[]" class="myfrm form-control" multiple>
      <!-- <div class="input-group-btn"> 
        <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
      </div> -->
    </div>



    <button type="submit" class="btn btn-success" style="margin-top:10px">Submit</button>


        
</div>


<script type="text/javascript">
    $(document).ready(function() {
      $(".btn-success").click(function(){ 
          var lsthmtl = $(".clone").html();
          $(".increment").after(lsthmtl);
      });
      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".hdtuto control-group lst").remove();
      });
    });
</script>

</div>
</div>
@include('Admin.footer')
