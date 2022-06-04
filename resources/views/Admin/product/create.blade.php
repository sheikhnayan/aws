@include('Admin.header')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>







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
                            Create Product
                        </div>
                        <div class="card-title" style="float: right;">
                            <a href="{{ route('product-add.index') }}" class="btn btn-warning">View</a>
                            <a href="{{ url('/Admin-dashboard') }}" class="btn btn-danger">X</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{ route('product-add.store') }}" name="basic_validate"
                        novalidate="novalidate" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="control-group mb-3">
                                    <label class="control-label">Product Code</label>
                                    <div class="controls">
                                        <input type="text" name="product_id" id="product_id" class="form-control"
                                        placeholder="" 
                                        value="{{ $serial_no ?? 0 }}"  required=""/>
                                    </div>
                                </div>

                                <div class="control-group mb-3">
                                    <label class="control-label">Item Name</label>
                                    <div class="controls">
                                        <select name="item_id" onchange="GetCategory();" id="item_id"
                                        class="form-control searchjs" required="">
                                        <option value="">Select An Item</option>
                                        @if (count($iteminfo))
                                        @foreach ($iteminfo as $item)
                                        <option value="{{ $item->id }}">{{ $item->item_name }}
                                        </option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="control-group mb-3">
                                <label class="control-label">Category Name</label>
                                <div class="controls">
                                    <select name="category_id" id="category_id" onchange="getsubcat();"
                                    class="form-control searchjs1" required="">
                                    <option value=""> Select A Category</option>
                                </select>
                                </div>
                            </div>

                            <div class="control-group mb-3">
                                <label class="control-label">Sub Category Name</label>
                                <div class="controls">
                                    <select name="subcategory_id" id="subcategory_id"
                                    class="form-control searchjs1" required="">
                                    <option value=""> Select A Sub Category</option>
                                </select>
                                </div>
                            </div>

                        <div class="control-group mb-3">
                            <label class="control-label">Brand Name</label>
                            <div class="controls">
                                <select name="brand_id" id="brand_id" class="form-control searchjs3" required="">
                                    <option value=""> Select A Brand</option>
                                    @if (isset($company) && count($company))
                                    @foreach ($company as $com)
                                    <option value="{{ $com->id }}">{{ $com->company_name }}
                                    </option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

              

                        <div class="control-group mb-3">
                            <label class="control-label">Product Name:</label>
                            <div class="controls">
                                <input type="text" name="product_name" id="product_name"
                                class="form-control" placeholder="Product Name (English)"
                                value="{{ old('product_name') }}"  required=""/>
                            </div>
                        </div>

                        <div class="control-group mb-3">
                            <label class="control-label">Min. Quntity</label>
                            <div class="controls">
                                <input type="number" min="1" name="min_qunt" id="min_qunt" class="form-control"
                                placeholder="ex:2" 
                                value="{{ old('min_qunt') }}"  required=""/>
                            </div>
                        </div>

                        <div class="control-group mb-3">
                            <label class="control-label">Measurement Type:</label>
                            <div class="controls">
                                <select class="form-control searchjs5" name="measurement_type"
                                id="measurement_type" required="">
                                    @if ($measurementinfo)
                                    @foreach ($measurementinfo as $measurement)
                                    <option value="{{ $measurement->id }}">
                                        {{ $measurement->measurement_type }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
<!-- 
                        <div class="control-group mb-3">
                            <label class="control-label text-danger"><b>Call For Order ??</b></label>
                            <div class="controls">
                                <select name="call_for_order" id="call_for_order" class="form-control" required="">
                                    <option value="" selected="">Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div> -->

                        <div class="control-group mb-3">
                            <label class="control-label">Purchase Price:</label>
                            <div class="controls">
                                <input type="number" name="purchase_price" id="purchase_price"
                                class="form-control" placeholder="Purchase Price" 
                                value="0" required=""/>
                            </div>
                        </div>

                        <div class="control-group mb-3">
                            <label class="control-label">Sale Price</label>
                            <div class="controls">
                                <input type="number" name="sale_price" id="sale_price" class="form-control"
                                class="form-control" placeholder="Sale Price" 
                                value="{{ old('sale_price') }}" onkeyup="calculate()" min="1" required=""/>
                            </div>
                        </div>

                        <div class="control-group mb-3">
                            <label class="control-label">Discount percentage</label>
                            <div class="controls">
                                <input type="number" name="discount_per" id="discount_per"
                                class="form-control" class="form-control"
                                placeholder="Discount percentage" 
                                value="{{ old('discount_per') }}" min="0" onkeyup="calculateDiscountAmount()" required=""/>
                            </div>
                        </div>

                        <div class="control-group mb-3">
                            <label class="control-label">Discount Amount</label>
                            <div class="controls">
                                <input type="number" name="discount_price" id="discount_price"
                                class="form-control" class="form-control" placeholder="Discount Amount"
                                value="0" min="1"  onkeyup="calculateDiscountPercent()"  />
                            </div>
                        </div>

                        <div class="control-group mb-3">
                            <label class="control-label">Current Price</label>
                            <div class="controls">
                                <input type="number" name="current_price" id="current_price"
                                class="form-control" class="form-control" placeholder="Cuurent Price"
                                value="{{ old('current_price') }}" readonly=""  required=""/>
                            </div>
                        </div>

                    </div>



                    <div class="col-md-6">
                        <div class="control-group mb-3">
                            <label class="control-label">Specification</label>
                            <div class="controls">
                                <textarea name="product_us" id="product_us" class="form-control"
                                style="resize: none;" required="">{{ old('product_us') }}</textarea>
                            </div>
                        </div>

                        <div class="control-group mb-3">
                            <label class="control-label">Product Details </label>
                            <div class="controls">
                                <textarea name="product_details" id="product_details" class="form-control"
                                style="resize: none;">{{ old('product_details') }}</textarea>
                            </div>
                        </div>

                        <div class="control-group mb-3">
                            <label class="control-label">Stock Available/Out</label>
                            <div class="controls">
                                <select name="stock_status" id="stock_status" class="form-control" required="">
                                    <option value="1">Stock Available</option>
                                    <option value="0">Stock Out</option>
                                </select>
                            </div>
                        </div>


                        <div class="control-group mb-3">
                            <label class="control-label">Size</label>
                            <div class="controls">
                                <select name="size_title[]" id="size_title" class="form-control productSize" multiple="" required="">
                                    <option value="">Select One</option>
                                    @if ($sizes)
                                        @foreach ($sizes as $size)
                                        <option value="{{ $size->size_title }}">
                                            {{ $size->size_title }}
                                        </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>



                        <div class="control-group mb-3">
                            <label class="control-label">Color</label>
                            <div class="controls">
                                <select name="color_title[]" id="color_title" class="form-control productColor" multiple="" required="">
                                    <option value="">Select One</option>
                                    @if ($colors)
                                        @foreach ($colors as $color)
                                        <option value="{{ $color->color_title }}">
                                            {{ $color->color_title }}
                                        </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>




                <div class="control-group mb-3">
                    <label class="control-label">Feature Image</label>
                    <div class="controls">

                        <input type="file" name="feature_image" class="form-control">
                    </div>
                </div>

<!-- 
                        <div class="control-group mb-3">
                            <label class="control-label">Shipping Class</label>
                            <div class="controls">
                                <select name="shipping_id" id="shipping_id" class="form-control" required="">
                                    <option value="">Select One</option>
                                    @if ($shipping)
                                    @foreach ($shipping as $ship)
                                    <option value="{{ $ship->id }}">
                                        {{ $ship->shipping_name }}
                                    </option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div> -->


                        <div class="col-md-12">
                            <div class="form-group ">
                                <label class="control-label">Price Image</label>
                                <div class="controls">
                                    <table class="table" id="image_row_table">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="image_row">
                                                <td><input type="file" name="image[]" class="form-control"></td>

                                                <td>
                                                    <button id="add_image_row" type="button" class="btn btn-success add_image_row btn-sm "><i class="fa fa-plus-circle"></i> </button>
                                                </td>
                                            </tr>
                                            <tr></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


<!--                         <div class="control-group mb-3">
                            <label class="control-label text-danger"><b>Offer Select</b></label>
                            <div class="controls">
                                <select name="offer_id" id="offer_id" class="form-control">
                                    <option value="">Select Offer</option>
                                    <option value="1">Huge Savings</option>
                                    <option value="2">Order More Save more</option>
                                    <option value="3">Discount Offer</option>
                                    <option value="4">Buy one get 1 free</option>
                                    <option value="5">Special Services</option>
                                </select>
                            </div>
                        </div> -->


                    </div>
                </div>


                <hr>



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



<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>



<script>



    $(document).on('click', '.add_size_row', function() {
        var html = '';
        html += '<tr class="size-row">' +
            '<td><select name="size_title[]" id="size_title" class="form-control" required=""><option value="">Select</option> @if ($sizes) @foreach ($sizes as $size)<option value="{{ $size->size_title }}">{{ $size->size_title }}</option>@endforeach @endif </select></td>' +
           
            '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove mr-1"><span class="fa fa-minus-circle"></span></button><button id="add_size_row" type="button" class="btn btn-success add_size_row btn-sm "><i class="fa fa-plus-circle"></i> </button></td></tr>';
        $('#size_item_table').append(html);
    });

    $(document).on('click', '.add_color_row', function() {
        var html = '';
        html += '<tr class="color-row">' +
            '<td><select name="color_title[]" id="color_title" class="form-control" required=""><option value="">Select</option> @if ($colors) @foreach ($colors as $color)<option value="{{ $color->color_title }}">{{ $color->color_title }}</option>@endforeach @endif </select></td>' +
           
            '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove mr-1"><span class="fa fa-minus-circle"></span></button><button id="add_color_row" type="button" class="btn btn-success add_color_row btn-sm "><i class="fa fa-plus-circle"></i> </button></td></tr>';
        $('#color_item_table').append(html);
    });




    $(document).on('click', '.add_image_row', function() {
        var html = '';
        html += '<tr class="image_row">' +
            '<td><input type="file" name="image[]" class="form-control"></td>' +
           
            '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove mr-1"><span class="fa fa-minus-circle"></span></button><button id="add_image_row" type="button" class="btn btn-success add_image_row btn-sm "><i class="fa fa-plus-circle"></i> </button></td></tr>';
        $('#image_row_table').append(html);
    });

    $(document).on('click', '.remove', function() {
        $(this).closest('tr').remove();
    });





    $('#product_us').summernote({
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']],
            ]
        });

    $('#product_details').summernote({
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']],
            ]
        });

    $('#condition').summernote({
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']],
            ]
        });

    </script>

    <script type="text/javascript">
        function calculate()

        {
            var sale_price = $("#sale_price").val();
            var discount_price = $("#discount_price").val();
            var total = 0;

            total = sale_price - discount_price;
            per = (discount_price / sale_price * 100);

            $("#current_price").val(total);
            $("#discount_per").val(per.toFixed(0));
        }
        function calculateDiscountAmount()

        {
            var sale_price = $("#sale_price").val();
            var discount_per = $("#discount_per").val();
            var total = 0;

            discount_price = (sale_price * discount_per)/100;
            current_price = sale_price - discount_price;

            total = sale_price - discount_price;
            per = (discount_price / sale_price * 100);

            $("#current_price").val(current_price);
            $("#discount_price").val(discount_price.toFixed(0));
        }

        function calculateDiscountPercent()

        {
            var sale_price = $("#sale_price").val();
            var discount_price = $("#discount_price").val();
            var total = 0;

            discount_per = ((sale_price - discount_price) / sale_price) * 100;

            current_price = sale_price - discount_price;

            total = sale_price - discount_price;
            per = (discount_price / sale_price * 100);

            $("#current_price").val(current_price);
            $("#discount_per").val(discount_per.toFixed(0) ?? 0);
        }

        function GetCategory() {

            var item_id = $('#item_id').val();

            if (item_id != 0) {

                $.ajax({

                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },

                    url: '{{ url('CreateProductGetCategory') }}',

                    type: 'POST',

                    data: {
                        id: item_id
                    },

                    success: function(data) {

                        $('#category_id').html(data);

                    //GetBrand(); 

                }

            });

            } else {

                $('#category_id').html('<option value="0">Select A Category</option>');

            }

        }



        function getsubcat() {

            var category_id = $('#category_id').val();

            if (category_id != 0) {

                $.ajax({

                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },

                    url: '{{ url('CreateProductGetsubCategory') }}',

                    type: 'POST',

                    data: {
                        id: category_id
                    },

                    success: function(data) {

                        $('#subcategory_id').html(data);

                    //GetBrand(); 

                }

            });

            } else {

                $('#subcategory_id').html('<option value="0">Select A subCategory</option>');

            }

        }









        function Add_Product() {

            var formData = new FormData();

            formData.append('img', $('#img')[0].files[0]);

            formData.append('img2', $('#img2')[0].files[0]);

            formData.append('img3', $('#img3')[0].files[0]);

            formData.append('product_id', $("#product_id").val());

            formData.append('product_name', $("#product_name").val());

            formData.append('product_name_bangla', $("#product_name_bangla").val());

            formData.append('item_id', $("#item_id").val());

            formData.append('category_id', $("#category_id").val());

            formData.append('brand_id', $("#brand_id").val());

            formData.append('measurement_unit_id', $("#measurement_unit_id").val());

            formData.append('purchase_price', $("#purchase_price").val());

            formData.append('sale_price', $("#sale_price").val());

            formData.append('old_price', $("#old_price").val());

            formData.append('product_details', $("#editor1").val());

            formData.append('barcode', $("#barcode").val());

            formData.append('pro_qunt', $("#pro_qunt").val());

            formData.append('stock', $("#stock").val());

            formData.append('why_is', $("#why_is").val());

            formData.append('shelf_no', $("#shelf_no").val());

            $.ajax({

                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },

                url: '{{ URl::to('CreateProduct') }}',

                type: 'POST',

                processData: false,

                contentType: false,

                data: formData,

                success: function(data) {

                    data = data.split('///');

                    if (data[0] == "yes") {

                        $('#error').hide();

                        $('#success').html(data[1]);

                        $('#success').show();

                        $('#product_name').val('');

                        $('#product_name_bangla').val('');

                        $('#purchase_price').val('');

                        $('#sale_price').val('');

                        $('#old_price').val('');

                        $('#editor1').val('');

                        $('#why_is').val('');

                        $('#shelf_no').val('');

                        $('#pro_qunt').val('');

                        $('#barcode').val('');

                    }



                    if (data[0] == "no") {

                        $('#success').hide();

                        $('#error').html(data[1]);

                        $('#error').show();

                    }



                }

            });



        }



        $(function() {

            $('#staticParent').on('keydown', '#child', function(e) {
                -1 !== $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) || /65|67|86|88/.test(e
                    .keyCode) && (!0 === e.ctrlKey || !0 === e.metaKey) || 35 <= e.keyCode && 40 >= e
                .keyCode || (e.shiftKey || 48 > e.keyCode || 57 < e.keyCode) && (96 > e.keyCode || 105 <
                    e.keyCode) && e.preventDefault()
            });

        })



        Dropzone.options.dropzoneForm = {

            autoProcessQueue: false,

            acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",



            init: function() {

                var submitButton = document.querySelector("#submit-all");

                myDropzone = this;



                submitButton.addEventListener('click', function() {

                    myDropzone.processQueue();

                });



                this.on("complete", function() {

                    if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)

                    {

                        var _this = this;

                        _this.removeAllFiles();

                    }

                    load_images();

                });



            }



        };

        function TogglePrice() {
            value = $('#call_for_order').val();
            if(value == 'Yes'){
                document.getElementById('purchase_price').readOnly = true;
                document.getElementById('sale_price').readOnly = true;
                document.getElementById('discount_price').readOnly = true;
                document.getElementById('discount_per').readOnly = true;
                document.getElementById('current_price').readOnly = true;
            }else{
                document.getElementById('purchase_price').readOnly = false;
                document.getElementById('sale_price').readOnly = false;
                document.getElementById('discount_price').readOnly = false;
                // document.getElementById('discount_per').readOnly = false;
                document.getElementById('current_price').readOnly = false;
            }
        }

    </script>
