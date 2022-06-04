@include('Admin.header')

<br>
<br>
<br>






<div class="main-content" style="overflow: hidden;">
            <!--page title start-->
            <div class="page-title" style="float: left;">
                <h4 class="mb-0">View Product Stock
                    <small></small>
                </h4>
              
            </div>
            <div class="page-title" style="float: right; ">
                <a href="{{url('productstock')}}" class="btn btn-outline-success">Add Stock</a> 
                 <a href="{{url('/Admin-dashboard')}}" class="btn btn-danger">X</a>
            </div>
            <!--page title end-->


            <div class="container" style="overflow-x: scroll;">

                <!-- state start-->
                <div class="row">
                    <div class=" col-sm-12">
                        <div class="mb-4">
                   
                            <div class="card-body">
                                <table id="example" class="display nowrap" style="width:100%">
                                    <thead>
                                    <tr>
                                         <th>Date</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Date</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                        @if(isset($view))
                                        @foreach($view as $showdata)
                                      <tr>
                                        <td>{{ $showdata->date }}</td>
                                        <td>{{ $showdata->product_name }}</td>
                                        <td>{{ $showdata->quentity }}</td>
                                        <td>
                                            <a href="{{ url('/deletestock/'. $showdata->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                            <a href="{{ url('/editstock/'. $showdata->id) }}" class="btn btn-info btn-sm">Edit</a>
                                        </td>
                          
                                     
                                    </tr>
                                         @endforeach
                                         @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- state end-->

            </div>
        </div>

@include('Admin.footer')
<script type="text/javascript">

</script>