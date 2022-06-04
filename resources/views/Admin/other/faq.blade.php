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
                            FAQ
                        </div>
                        <div class="card-title" style="float: right;">

                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ url('updatefaq/' . $faq->id) }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">




                                    <div class="control-group">

                                        <label class="control-label">Details</label>

                                        <div class="controls">
                                            <textarea name="details" id="condition"
                                                class="form-control">{{ $faq->description }}</textarea>
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


<!--<script src="{{ URL::to('/') }}/public/editor3/ckeditor.js"></script> -->

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<script>
    $('#condition').summernote({
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
