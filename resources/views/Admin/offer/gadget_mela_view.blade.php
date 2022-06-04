@include('Admin.header')

<br>
<br>
<br>






<div class="main-content" style="overflow: hidden;">
            <!--page title start-->
            <div class="page-title" style="float: left;">
                <h4 class="mb-0">View Gadget Mela Offer
                    <small></small>
                </h4>
              
            </div>
            <div class="page-title" style="float: right; ">
                <a href="{{url('offer-setup-gadget-mela')}}" class="btn btn-outline-success">Add Gadget Offer</a> 
                 <a href="{{url('/Admin-dashboard')}}" class="btn btn-danger">X</a>
            </div>
            <!--page title end-->


            <div class="container" style="overflow-x: scroll;">

                <!-- state start-->
                <div class="row">
                    <div class=" col-sm-12">
                        <div class="mb-4">
                   
                            <div class="card-body">
                                <form method="POST" action="{{ url('offer-setup-destroy') }}">
                                                @csrf

                               <button class="btn btn-danger" onclick="return confirm('are you sure?')" style="float:right">Delete</button>
                                  <table id="example" class="display nowrap" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Select <input id="chkbx_all"  onclick="return check_all()" type="checkbox"  /></th>
                                        <th>SL</th>
                                        <th>ID</th>
                                        <th>Product Name</th>
                                        <th>SKU</th>
                                        <th>Unit Price</th>
                                        <th>Discount Percentage</th>
                                        <th>Discount Amount</th>
                                        <th>Discounted Price</th>
                                        <th>Start Date&Time</th>
                                        <th>End Date&Time</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                          <th>Select</th>
                                          <th>SL</th>
                                        <th>ID</th>
                                        <th>Product Name</th>
                                        <th>SKU</th>
                                        <th>Unit Price</th>
                                        <th>Discount Percentage</th>
                                        <th>Discount Amount</th>
                                        <th>Discounted Price</th>
                                        <th>Start Date&Time</th>
                                        <th>End Date&Time</th>
                                        <th>Status</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        @php
                                        $sl=1;
                                        @endphp
                                        @if(isset($data))
                                        @foreach($data as $showdata)
                                      <tr id="tr-{{$showdata->id}}">
                                        <td> <input type="checkbox" id="id" name="id[]" value="{{$showdata->id}}" class="check_elmnt" /></td>
                                        <td>{{$sl++}}</td>
                                        <td>{{$showdata->id}}</td>
                                        <td>{{$showdata->product->product_name}}</td>
                                        <td>{{$showdata->product->product_id}}</td>
                                        <td>{{$showdata->sale_price}}</td>
                                        <td>{{floor($showdata->discount_per)}}%</td>
                                        <td>{{$showdata->discount_price}}</td>
                                        <td>{{$showdata->current_price}}</td>
                                        <td>{{$showdata->start_date_time}}</td>
                                        <td>{{$showdata->end_date_time}}</td>
                                        <td>
                                            @if($showdata->status == '1')
                                        <a href="{{url('/inactiveoffer')}}/{{$showdata->id}}" class="btn btn-outline-success" onclick="return confirm('Are you sure inactive your offer?')">Active</a>
                                             @else
                                        <a href="{{url('/activeoffer')}}/{{$showdata->id}}" class="btn btn-outline-danger" onclick="return confirm('Are you sure active your offer?')">Inactive</a>
                                            @endif
                                        </td>
                                       
                                         @endforeach
                                         @endif
                                    </tbody>
                                </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- state end-->

            </div>
        </div>

@include('Admin.footer')
<script type="text/javascript">
 function check_all()
      {
      
      if($('#chkbx_all').is(':checked')){
        $('input.check_elmnt2').prop('disabled', false);
        $('input.check_elmnt').prop('checked', true);
        $('input.check_elmnt2').prop('checked', true);
      }else{
        $('input.check_elmnt2').prop('disabled', true);
        $('input.check_elmnt').prop('checked', false);
        $('input.check_elmnt2').prop('checked', false);
        }
    }
</script>