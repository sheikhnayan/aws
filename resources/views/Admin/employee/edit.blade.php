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
             Edit Employee
            </div> 
            <a href="{{route('employee.index')}}"><button class="btn btn-info" style="float: right;">Employee List</button></a>
          </div>
          <div class="card-body">
            <form method="post" action="{{route('employee.update', $data->id)}}">
             @csrf
             @method('patch')
             <div class="row">
              <div class="col-md-12">

                <div class="form-group ">
                    <label class="control-label">Designation</label>
                    <div class="controls">
                        <input type="text" class="form-control" name="designation" placeholder="Designation" required="" value="{{ $data->designation }}">
                    </div>
                </div>

                <div class="form-group ">
                    <label class="control-label">Name</label>
                    <div class="controls">
                        <input type="text" class="form-control" name="name" placeholder="Name" required="" value="{{ $data->name }}">
                    </div>
                </div>

                <div class="form-group ">
                    <label class="control-label">Phone Number</label>
                    <div class="controls">
                        <input type="number" class="form-control" name="phone" placeholder="Phone Number" required="" value="{{ $data->phone }}">
                    </div>
                </div>
                
                <div class="form-group ">
                    <label class="control-label">Email</label>
                    <div class="controls">
                        <input type="email" class="form-control" name="email" placeholder="Email" required="" value="{{ $data->email }}">
                    </div>
                </div>

                <div class="form-group ">
                    <label class="control-label">Address</label>
                    <div class="controls">
                        <input type="text" class="form-control" name="address" placeholder="Address" required="" value="{{ $data->address }}">
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



