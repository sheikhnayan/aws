@include('Admin.header')

<br>
<br>
<br>






<div class="main-content" style="overflow: hidden;">
            <!--page title start-->
            <div class="page-title" style="float: left;">
                <h4 class="mb-0">View Offer
                    <small></small>
                </h4>
              
            </div>
            <div class="page-title" style="float: right; ">
                <a href="{{route('offer-setup.create')}}" class="btn btn-outline-success">Add Offer</a> 
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
                                        <th>Type</th>
                                        <th>Start Date&Time</th>
                                        <th>End Date&Time</th>
                                        <th>Status</th>
                                        <!--<th>Action</th>-->
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                          <th>Select</th>
                                          <th>SL</th>
                                        <th>ID</th>
                                        <th>Product Name</th>
                                        <th>Type</th>
                                        <th>Start Date&Time</th>
                                        <th>End Date&Time</th>
                                        <th>Status</th>
                                        <!--<th>Action</th>-->
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

                                        <td>
                                           
                                            @if($showdata->type == '1')
                                            Flash Sale
                                            @elseif($showdata->type == '2')
                                            Offer
                                            @elseif($showdata->type == '3')
                                            Feature  Product
                                            @elseif($showdata->type == '4')
                                            Best Sale
                                            @elseif($showdata->type == '5')
                                            Discount Mela
                                            @elseif($showdata->type == '7')
                                            Lifestyle Mela
                                            @elseif($showdata->type == '8')
                                            Gadget Mela
                                            @elseif($showdata->type == '9')
                                            Deshi Mela
                                            @elseif($showdata->type == '6')
                                            Express Service
                                            @endif

                                        </td>
                                        <td>{{$showdata->start_date_time}}</td>
                                        <td>{{$showdata->end_date_time}}</td>
                                        <td>
                                            @if($showdata->status == '1')
                                        <a href="{{url('/inactiveoffer')}}/{{$showdata->id}}" class="btn btn-outline-success" onclick="return confirm('Are you sure inactive your offer?')">Active</a>
                                             @else
                                        <a href="{{url('/activeoffer')}}/{{$showdata->id}}" class="btn btn-outline-danger" onclick="return confirm('Are you sure active your offer?')">Inactive</a>
                                            @endif
                                        </td>
                                        <!--<td>-->
                                        <!--    <form method="POST" action="{{ route('offer-setup.destroy',$showdata->id) }}">-->
                                        <!--        @csrf-->
                                        <!--        {{ method_field('delete') }}-->
                                        <!--        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure delete your offer?')">delete</button> -->
                                        <!--    </form>-->

                                        <!--</td>-->
                                    </tr>
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