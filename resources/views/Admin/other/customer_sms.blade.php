@include('Admin.header')

<br>
<br>
<br>






<div class="main-content" style="overflow: hidden;">
            <!--page title start-->
            <div class="page-title" style="float: left;">
                <h4 class="mb-0">View Customer Message
                    <small></small>
                </h4>
              
            </div>
            <div class="page-title" style="float: right; ">
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>SMS</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                       <th>SL</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>SMS</th>
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
                                        <td>{{$showdata->name}}</td>
                                       
                                        <td><textarea style="height: 200px;width: 500px;">{{$showdata->description}}</textarea></td>
                                         <td>{{$showdata->email}}</td>
                                       
                                        <td>
                                            <a href="{{url('customer-sms-delete',$showdata->id)}}" class="btn btn-outline-danger">Delete</a>
                                           
                                            
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