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
                                    Edit Exchange Request
                                </div> 
                                <div class="card-title" style="float: right;">
                                    <a href="{{url('/Admin-dashboard')}}" class="btn btn-danger">X</a>
                                </div>
                            </div>
                            <div class="card-body">

                        	    <form action="{{ url('update-exchange-request', $exchange_request->id) }}" method="post" class="mb-4" style="max-width: 500px;">
							        @csrf
							        <div class="form-group mt-3">
							            <label for="">Name</label>
							            <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $exchange_request->name ?? '' }}" required="">
							        </div>
							        <div class="form-group mt-3">
							            <label for="">Phone Number</label>
							            <input type="number" class="form-control" name="phone_number" placeholder="Phone Number"  value="{{ $exchange_request->phone_number ?? '' }}" required="">
							        </div>
							        <div class="form-group mt-3">
							            <label for="">Email Address  (please double check your address is correct)</label>
							            <input type="email" class="form-control" name="email" placeholder="Email Address" value="{{ $exchange_request->email ?? '' }}" required="">
							        </div>
							        <div class="form-group mt-3">
							            <label for="">Order Number:</label>
							            <input type="text" class="form-control" name="order_number" value="{{ $exchange_request->order_number ?? '' }}" placeholder="Order Number" required="">
							        </div>
							        <div class="form-group mt-3">
							            <label for="">Reason for Exchange Request:</label>
							            <input type="text" class="form-control" name="reason" value="{{ $exchange_request->reason ?? '' }}" placeholder="Reason for Exchange Request" required="">
							        </div>

							        <h4><b>List of Product you want to return:</b></h4>

							        <div class="form-group mt-3">
							            <input type="text" class="form-control" name="return_product_style_number" value="{{ $exchange_request->return_product_style_number ?? '' }}" placeholder="Style Number/ SKU:" required="">
							        </div>
							        <div class="form-group mt-3">
							            <input type="text" class="form-control" name="return_product_size" value="{{ $exchange_request->return_product_size ?? '' }}" placeholder="Size:" required="">
							        </div>
							        <div class="form-group mt-3">
							            <input type="text" class="form-control" name="return_product_color" value="{{ $exchange_request->return_product_color ?? '' }}" placeholder="Color:" required="">
							        </div>

							        <h4><b>What you want in exchange:</b></h4>

							        <div class="form-group mt-3">
							            <input type="text" class="form-control" name="exchange_product_style_number" value="{{ $exchange_request->exchange_product_style_number ?? '' }}" placeholder="Style Number/ SKU:" required="">
							        </div>
							        <div class="form-group mt-3">
							            <input type="text" class="form-control" name="exchange_product_size" value="{{ $exchange_request->exchange_product_size ?? '' }}" placeholder="Size:" required="">
							        </div>
							        <div class="form-group mt-3">
							            <input type="text" class="form-control" name="exchange_product_color" value="{{ $exchange_request->exchange_product_color ?? '' }}" placeholder="Color:" required="">
							        </div>

							        <div class="form-group mt-3">
							            <label for=""><b>Your Message (Optional) :</b> </label>
							            <textarea name="message" rows="5" class="form-control">{{ $exchange_request->message ?? '' }}</textarea>
							        </div>

							        @if($exchange_request->status == 0)
							        <div class="form-group mt-3">
							            <select name="status" id="status" class="form-control">
		                                    <option value="1" @php if ($exchange_request->status == 1) { echo "selected"; } @endphp>Completed</option>
		                                    <option value="0" @php if ($exchange_request->status == 0) { echo "selected"; } @endphp>Pending</option>
		                                </select>
							        </div>
							        @endif

							        <button type="submit" class="py-3 px-5 text-light border-0 fw-bold mt-3" style="background-color: #b90000;">Update Exchange request</button>
							    </form>

                            </div>
                        </div>
                    </div>
                </div>







    </div>
</div>








@include('Admin.footer')
