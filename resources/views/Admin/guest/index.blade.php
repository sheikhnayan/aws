@include('Admin.header')

<br>
<br>
<br>






<div class="main-content" style="overflow: hidden;">
            <!--page title start-->
            <div class="page-title" style="float: left;">
                <h4 class="mb-0">View Guest Registration
                    <small></small>
                </h4>
              
            </div>
            <div class="page-title" style="float: right;">
                <h4 class="mb-0"> <a href="{{url('/Admin-dashboard')}}" class="btn btn-danger">X</a>
                    <small></small>
                </h4>
              
            </div>


            <div class="container" style="overflow-x: scroll;">

                <!-- state start-->
                <div class="row">
                    <div class=" col-sm-12">
                        <div class="mb-4">
                   
                            <div class="card-body">
                                <table id="example" class="display nowrap" style="width:100%">
                                    <thead>
                                    <tr>
                                        
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        
                                     
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                         
                                    <tbody>

                                        @if(isset($data))
                                        @foreach($data as $showdata)
                                      <tr id="tr-{{$showdata->id}}">
                                        
                                        <td>{{$showdata->id}}</td>
                                        <td>{{$showdata->first_name}}&nbsp;{{$showdata->last_name}}</td>
                                        <td>{{$showdata->email}}</td>
                                        <td>{{$showdata->phone}}</td>
                                        <td>{{$showdata->address}}</td>
                                      
                                        <td>
                                              @if($showdata->status == '1')
                                            <a href="{{url('/inactiveguest')}}/{{$showdata->id}}" class="btn btn-success">Active</a>
                                            @else
                                            <a href="{{url('/activeguest')}}/{{$showdata->id}}" class="btn btn-danger">Inactive</a>

                                            @endif

                                        </td>
                                        <td>
                                        
                                        <a href="{{ url('GuestListdelete',$showdata->id) }}" class="btn btn-outline-danger">delete</a>
                                     
                                            
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