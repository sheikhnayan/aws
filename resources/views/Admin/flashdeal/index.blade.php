@include('Admin.header')

<br>
<br>
<br>






<div class="main-content" style="overflow: hidden;">

        
         
            <!--page title end-->


            <div class="container" style="overflow-x: scroll; max-height:726px">

                <!-- state start-->
                <div class="row">
                    <div class=" col-sm-12">
                        <div class="mb-4">
                   
                            <a href="{{url('flashdeal/create')}}" style="float: right;"><button class="btn btn-info mb-3">Create Flash Deal</button></a>
                            <div class="card-body">
                                <table id="example" class="display nowrap" style="width:100%;text-align:center;">
                                    <thead>
                                    <tr>
                                       <th>SL</th>
                                        <th>Title</th>
                                        <th>Background Color</th>
                                        <th>Text Color</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                       <th>SL</th>
                                        <th>Title</th>
                                        <th>Background Color</th>
                                        <th>Text Color</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        @php
                                        $sl=1;
                                        @endphp
                                        @if(isset($datas))
                                        @foreach($datas as $showdata)
                                      
                                      <tr id="tr-{{$showdata->invoice_id}}">
                                        <td data-toggle="tooltip" title="SL">{{$sl++}}</td>
                                        <td data-toggle="tooltip" title="Order ID">{{ $showdata->title }}</td>
                                        <td data-toggle="tooltip" title="Order ID">{{ $showdata->background_color }}</td>
                                        <td data-toggle="tooltip" title="Order ID">{{ $showdata->text_color }}</td>
                                        <td data-toggle="tooltip" title="Order ID">{{ $showdata->start_date }}</td>
                                        <td data-toggle="tooltip" title="Order ID">{{ $showdata->end_date }}</td>

                                        <td>
                                            @if($showdata->status == '0')
                                            <a class="btn btn-warning btn-sm">Inactive</a>
                                            @elseif($showdata->status == '1')
                                              <a class="btn btn-info btn-sm">Active</a>
                                             @endif
                                        </td>
                                        <td>
                                          <div class="row">
                                             <a href="{{route('flashdeal.edit', $showdata->id)}}" class="btn btn-outline-warning btn-sm mr-2" target="_blank" style="float: left;">Edit</a>

                                            <form action="{{route('flashdeal.destroy', $showdata->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-warning btn-sm" style="float: left;">Delete</button>
                                            </form> 
                                          </div>
                                            

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
