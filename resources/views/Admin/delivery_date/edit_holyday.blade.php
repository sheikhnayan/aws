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
                    <div class=" col-sm-8">
                        <div class="mb-4">
                            <form method="post" action="/add-holyday/insertholyday">
                                @csrf
                                   <div class="form-group row">
                                       <div class=" col-sm-8">
                                            Title:<input type="text" class="form-control" id="title" name="title" value= "{{$data->title}}"required size="10">
                                       </div>
                                   </div>
                                   
                                   <div class="form-group row">
                                        <div class="col-sm-8">
                                            Date:<input type="date" class="form-control" id="date" name="date" required="" value= "{{$data->date}}"/>&nbsp;&nbsp;
                                        </div>
                                   </div>
                                    <input type="hidden" id="id" name="id" value= "{{$data->id}}">
                                  
                                   <div class=" col-sm-4">
                                   <button type="submit" class="btn btn-success"  >Update</button>
                                   </div>
                            </form>

                        </div>
                    </div>
                </div>




            </div>
        </div>

@include('Admin.footer')
<script>


</script>