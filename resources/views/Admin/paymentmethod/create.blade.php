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
             Add Payment Method
            </div> 
            <a href="{{route('paymentmethod.index')}}"><button class="btn btn-info" style="float: right;">Payment Method List</button></a>
          </div>
          <div class="card-body">
            <form method="post" action="{{route('paymentmethod.store')}}" enctype="multipart/form-data">
             @csrf
             <div class="row">
              <div class="col-md-12">

                <div class="form-group ">
                    <label class="control-label">Name</label>
                    <div class="controls">
                        <input type="text" class="form-control" name="name" placeholder="Name" required="" value="">
                    </div>
                </div>

                <div class="form-group ">
                    <label class="control-label">Account Holder Name</label>
                    <div class="controls">
                        <input type="text" class="form-control" name="account_holder_name" placeholder="Account Holder Name" required="" value="">
                    </div>
                </div>

                <div class="form-group ">
                    <label class="control-label">Account Number</label>
                    <div class="controls">
                        <input type="number" class="form-control" name="account_number" placeholder="Account Number" required="" value="">
                    </div>
                </div>

                <div class="form-group ">
                    <label class="control-label">Account Type</label>
                    <div class="controls">
                        <select name="account_type" id="" class="form-control">
                            <option value="Personal">Personal</option>
                            <option value="Agent">Agent</option>
                        </select>
                    </div>
                </div>

             

                <div class="form-group ">
                    <label class="control-label">Image</label>
                    <div class="controls">
                        <input type="file" class="form-control" name="image" required="" value="">
                    </div>
                </div>
                
                
                <div class="form-group ">
                    <label class="control-label">Status</label>
                    <div class="controls">
                        <select name="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inaction</option>
                        </select>
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

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>



