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
             Add Create Flash
            </div> 
            <a href="{{route('flashdeal.index')}}"><button class="btn btn-info" style="float: right;">Create Flash List</button></a>
          </div>
          <div class="card-body">
            <form method="post" action="{{route('flashdeal.store')}}" enctype="multipart/form-data">
             @csrf
             <div class="row">
              <div class="col-md-12">

                <div class="form-group ">
                    <label class="control-label">Serial No.</label>
                    <div class="controls">
                        <input type="number" class="form-control" name="sl" placeholder="Serial No." required="" value="">
                    </div>
                </div>

                <div class="form-group ">
                    <label class="control-label">Title</label>
                    <div class="controls">
                        <input type="text" class="form-control" name="title" placeholder="Title" required="" value="">
                    </div>
                </div>

                <div class="form-group ">
                    <label class="control-label">Background Color (Hexa-code)</label>
                    <div class="controls">
                        <input type="text" class="form-control" name="background_color" placeholder="#ffffff" required="" value="">
                    </div>
                </div>

                <div class="form-group ">
                    <label class="control-label">Text Color</label>
                    <div class="controls">
                        <select name="text_color" class="form-control">
                            <option value="" selected="">Select</option>
                            <option value="white">White</option>
                            <option value="black">Black</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="picture1">Banner</label>
                    <div class="col-sm-5">
                        <input type="file" class="form-control" id="banner" name="banner" />
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="picture1">Start Date</label>
                    <div class="col-sm-5">
                        <input type="datetime-local" class="form-control" id="start_date" name="start_date" />
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="picture1">End Date</label>
                    <div class="col-sm-5">
                        <input type="datetime-local" class="form-control" id="end_date" name="end_date" />
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="picture1">Page Link</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="page_link" name="page_link" />
                    </div>
                </div>

                <div class="form-group ">
                    <label class="control-label">Products</label>
                    <div class="controls">
                        <select name="product_id[]" class="form-control flashdeal_products" multiple="">
                            @foreach($products as $product)
                            <option value="{{$product->id}}">{{$product->product_name}} -  (Discount Price: {{$product->discount_price}} TK) - (Current Price: {{$product->current_price}} TK) </option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="control-group">
                  <label class="control-label">Featured</label>
                  <div class="controls">
                    <textarea  name="featured" id="description" class="form-control"></textarea>
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

<script>
    $('#description').summernote({
        focus: true,
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            //['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']],
        ],
        fontSizes: ['8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '24', '36', '48', '64',
            '82', '150'
        ],
        popover: {
            air: [
                ['color', ['color']],
                ['font', ['bold', 'underline', 'clear']]
            ]
        }
    });

</script>


