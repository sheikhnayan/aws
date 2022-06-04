@include('Admin.header')

<br>
<br>
<br>






<div class="main-content" style="overflow: hidden;">
            <!--page title start-->
            <div class="page-title" style="float: left;">
                <h4 class="mb-0">Add Holyday
                    <small></small>
                </h4>
            </div>
            
            <!--page title end-->


            <div class="container" style="overflow-x: scroll;">

                <!-- state start-->
                <div class="row">
                    <div class=" col">
                        <div class="mb-4">
                                <form method="post" action="/add-holyday/add">
                                @csrf
                                   <div class="form-group row">
                                       <div class=" col-4">
                                            Title:<input type="text" class="form-control" id="title" name="title" required size="10" required>
                                       </div>
                                   </div>
                                   
                                   <div class="form-group row">
                                        <div class="col-4">
                                            Date:<input type="date" class="form-control" id="date" name="date" required/>&nbsp;&nbsp;
                                           <!--To Date: <input type="date" class="form-control" id="date2" name="date2"  required/>-->
                                        </div>
                                   </div>
                                  
                                   <div class=" col-sm-4">
                                   <button class="btn btn-success" type="submit" >Add</button>
                                   </div>
                               </form>
                               
                                <span id="sms"></span>
                            <div class="card-body">
                                <table id="example" class="display nowrap" style="width:100%;text-align:center;">
                                    <thead>
                                        @php
                                        $sl=1;
                                        @endphp
                                    <tr>
                                        <th>SL</th>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @if(isset($data))
                                    @foreach($data as $showdata)
                                      <tr id="tr-{{$showdata->id}}">
                                        <td data-toggle="tooltip" title="SL">{{$sl++}}</td>
                                        <td data-toggle="tooltip" title="Title">{{$showdata->title}}</td>
                                        <td data-toggle="tooltip" title="Date">{{$showdata->date}}</td>
                                        <td>
                                            <a href="{{url('add-holyday/updateholyday')}}/{{$showdata->id}}" class="btn btn-primary btn-mini" >Update</a>
                                            <a href="#" class="btn btn-danger" onclick="deleteholiday('{{$showdata->id}}')">Delete</a>
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




            </div>
        </div>

@include('Admin.footer')
<script>
 //Unused
    function add() {
  var date=$('#date').val();
  var title=$('#title').val();
    
      $.ajax({
        headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
        url: '{{ url("add-holyday/add") }}',
        type: 'POST',
        data: {date: date,title: title},
        success: function(data){
          $('#showdata').html(data);
          
          	UIkit.notification({
        message: '<span uk-icon=\'icon: check\'></span> added successfully',
        pos:     'top-right',
        status:'primary',
        timeout:  1000
        
      });
      window.location.reload();
      
      
          //GetBrand();
        //   console.log(data);
        //   document.getElementById('date').value = "";
        //   document.getElementById('date2').value = "";
          document.getElementById('title').value = "";
        }
      });
   
  
}

 function deleteholiday(id)
{
if(confirm('Are you sure?'))
{
      $.ajax({
        headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
        url: '{{ url("add-holyday/deleteholyday") }}',
        type: 'POST',
        data: {id:id},
        success: function(data){
		$("#tr-"+id).hide(); 
        }
      }); 
}
   
      

}
</script>