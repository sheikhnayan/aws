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
             Edit Payment Method
            </div> 
            <a href="{{route('paymentmethod.index')}}"><button class="btn btn-info" style="float: right;">Payment Method List</button></a>
          </div>
          <div class="card-body">
            <form method="post" action="{{route('paymentmethod.update', $data->id)}}" enctype="multipart/form-data">
             @csrf
             @method('patch')
             <div class="row">
              <div class="col-md-12">

                <div class="form-group ">
                    <label class="control-label">Name</label>
                    <div class="controls">
                        <input type="text" class="form-control" name="name" placeholder="Name" required="" value="{{$data->name}}">
                    </div>
                </div>

                <div class="form-group ">
                    <label class="control-label">Account Holder Name</label>
                    <div class="controls">
                        <input type="text" class="form-control" name="account_holder_name" placeholder="Account Holder Name" required="" value="{{$data->account_holder_name}}">
                    </div>
                </div>

                <div class="form-group ">
                    <label class="control-label">Account Number</label>
                    <div class="controls">
                        <input type="number" class="form-control" name="account_number" placeholder="Account Number" required="" value="{{$data->account_number}}">
                    </div>
                </div>

                <div class="form-group ">
                    <label class="control-label">Account Type</label>
                    <div class="controls">
                        <select name="account_type" id="" class="form-control">
                            <option value="Personal" @php if ($data['account_type'] == 'Personal') { echo "selected"; } @endphp>Personal</option>
                            <option value="Agent" @php if ($data['account_type'] == 'Agent') { echo "selected"; } @endphp>Agent</option>
                        </select>
                    </div>
                </div>

             

                <div class="form-group ">
                    <label class="control-label">Image</label>
                    <div class="controls">
                        @php
                            $path= base_path().'/public/PaymentMethodImage/'.$data->image;
                        @endphp
                        @if($data->image)
                        <img src="{{asset('/public/PaymentMethodImage')}}/{{$data->image}}" alt="">
                        @endif

                        <input type="file" class="form-control" name="image">
                    </div>
                </div>
                
                
                <div class="form-group ">
                    <label class="control-label">Status</label>
                    <div class="controls">
                        <select name="status" class="form-control">
                            <option value="1" @php if ($data['status'] == 1) { echo "selected"; } @endphp>Active</option>
                            <option value="0" @php if ($data['status'] == 0) { echo "selected"; } @endphp>Inactive</option>
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



