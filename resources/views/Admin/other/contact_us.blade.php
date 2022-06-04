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
             Contact us
            </div> 
            <div class="card-title" style="float: right;">

            </div>
          </div>
          <div class="card-body">
            <form method="post" action="{{ url('updatecontact_us/'. $contact_us->id) }}">
             @csrf
             <div class="row">
              <div class="col-md-12">




                <div class="control-group">

                  <label class="control-label">Details</label>

                  <div class="controls">
                    <textarea  name="details" id="condition" class="form-control">{{ $contact_us->description }}</textarea>
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
  $('#product_us').summernote(); 
  $('#product_details').summernote(); 
  $('#condition').summernote(); 
</script>


