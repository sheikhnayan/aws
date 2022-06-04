@include('Admin.header')
<div class="main-content">
  <div class="container">

    <br>
    <br>
    <br>
    <br>
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <div class="row">
      <div class="col-md-12">

        <div class="card card-shadow mb-4">
          <div class="card-header">
            <div class="card-title" style="float: left;">
            Cash On Delivery
            </div> 
            <div class="card-title" style="float: right;">

            </div>
          </div>
          <div class="card-body">
            <form method="post" action="{{ url('updatecod/'. $cod->id) }}">
             @csrf
             <div class="row">
              <div class="col-md-12">




                <div class="control-group">

                  <label class="control-label">Details</label>

                  <div class="controls">
                    <textarea  name="details" id="details" class="form-control">{{ $cod->description }}</textarea>
                  </div>
                </div>        



              </div>
            </div>
            <br>
            <div align="center">
             <input type="submit" name="submit" class="btn btn-success">
           </div>
         </form>
       </div>
     </div>




   </div>
 </div>
</div>
</div>
@include('Admin.footer')


<!--<script src="{{URL::to('/')}}/public/editor3/ckeditor.js"></script> -->

<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>

<script>
  $('#details').summernote(); 
</script>


