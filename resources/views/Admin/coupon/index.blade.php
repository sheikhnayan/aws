@include('Admin.header')

<br>
<br>
<br>






<div class="main-content" style="overflow: hidden;">
            <!--page title start-->
            <div class="page-title" style="float: left;">
                <h4 class="mb-0">View Coupon
                    <small></small>
                </h4>
              
            </div>
            <div class="page-title" style="float: right; ">
                <a href="{{route('CouponAdd.create')}}" class="btn btn-outline-success">Add Coupon</a> 
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
                                        <th>SL</th>
                                        <th>Coupon Name</th>
                                        <th>Start date</th>
                                        <th>Min Price</th>
                                        <th>Discount Percantage</th>
                                        <!-- <th>Discount price</th> -->
                                        <th>Apply coupon</th>
                                        <th>End Date</th>
                                        <!-- <th>Status</th> -->
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Coupon Name</th>
                                        <th>Start date</th>
                                        <th>Min Price</th>
                                        <th>Discount Percantage</th>
                                        <!-- <th>Discount price</th> -->
                                        <th>Apply coupon</th>
                                        <th>End Date</th>
                                        <!-- <th>Status</th> -->
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        @php
                                        $sl=1;
                                        @endphp
                                        @if(isset($data))
                                        @foreach($data as $showdata)
                                      <tr id="tr-{{$showdata->id}}">
                                        <td>{{$sl++}}</td>
                                        <td>{{$showdata->coupon_name}}</td>
                                        <td>{{$showdata->start_date}}</td>
                                        <td>{{$showdata->min_price}}</td>
                                        <td>{{$showdata->discout_per}}%</td>
                                        <td>{{$showdata->discout_price}}</td>
                                        <td>{{$showdata->apply_coupon}}</td>
                                        <td>{{$showdata->end_date}}</td>
                                        <!-- <td>
                                            @if($showdata->status == '0')
                                            <a  class="btn-outline-danger"  href="{{url('/activecoupon')}}/{{$showdata->id}}">Inactive</a>
                                            @else
                                            <a href="{{url('/inactivecoupon')}}/{{$showdata->id}}" class="btn-outline-success">Active</a>
                                            @endif
                                        </td> -->
                                       
                                        <td>
                                            <a href="{{route('CouponAdd.edit',$showdata->id)}}" class="btn btn-outline-primary">Edit</a>
                                            <form method="POST" action="{{ route('CouponAdd.destroy',$showdata->id) }}">
                                                @csrf
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-outline-danger">delete</button> 
                                            </form>
                                            
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