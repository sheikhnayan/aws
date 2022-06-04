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
             Edit Page
            </div> 
            <a href="{{route('page.index')}}"><button class="btn btn-info" style="float: right;">Page List</button></a>
          </div>
          <div class="card-body">
            <form method="post" action="{{route('page.update', $page->id)}}">
             @csrf
             @method('patch')
             <div class="row">
              <div class="col-md-12">

                <div class="form-group ">
                    <label class="control-label">Page Category</label>
                    <div class="controls">
                        <select name="page_category_id" class="form-control">
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" @php if ($page['page_category_id'] == $category->id) { echo "selected"; } @endphp>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group ">
                    <label class="control-label">Title</label>
                    <div class="controls">
                        <input type="text" class="form-control" name="title" placeholder="Title" required="" value="{{ $page->title }}">
                    </div>
                </div>


                <div class="control-group">
                  <label class="control-label">Description</label>
                  <div class="controls">
                    <textarea  name="description" id="description" class="form-control">{!! $page->description !!}</textarea>
                  </div>
                </div>  

                <div class="form-group ">
                    <label class="control-label">Status</label>
                    <div class="controls">
                        <select name="status" class="form-control">
                            <option value="1" @php if ($page['status'] == 1) { echo "selected"; } @endphp>Active</option>
                            <option value="0" @php if ($page['status'] == 0) { echo "selected"; } @endphp>Inactive</option>
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


