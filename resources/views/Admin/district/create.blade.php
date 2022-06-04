@include('Admin.header')



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
                                    Create Delivery Zone
                                </div> 
                                <div class="card-title" style="float: right;">
                                    <a href="{{route('district-add.index')}}" class="btn btn-warning">View</a>
                                     <a href="{{url('/Admin-dashboard')}}" class="btn btn-danger">X</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form id="" method="post" class=" right-text-label-form feedback-icon-form" action="{{route('district-add.store')}}" enctype="multipart/form-data">
                                    @csrf
                       

                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Delivery Zone Name</label>
                                        <div class="col-sm-5">
                                   <select name="district_name" id="district_name" class="form-control">       
                                    <option value="">Please select Delivery Zone</option>
                                    <option  title="Feni">Feni</option>
                                    <option  title="Bagerhat">Bagerhat</option>
                                    <option  title="Bandarban">Bandarban</option>
                                    <option  title="Barguna">Barguna</option>
                                    <option  title="Barisal">Barisal</option>
                                    <option  title="Brahmanbaria">Brahmanbaria</option>
                                    <option  title="Bogra">Bogra</option>
                                    <option  title="Bhola">Bhola</option><option  title="Chandpur">Chandpur</option>
                                    <option  title="Chittagong">Chittagong</option><option  title="Chuadanga">Chuadanga</option>
                                    <option  title="Comilla">Comilla</option><option  title="Coxs Bazar">Coxs Bazar</option><option  title="Dhaka">Dhaka</option>
                                    <option  title="Dinajpur">Dinajpur</option><option  title="Faridpur">Faridpur</option>
                                    <option  title="Gaibandha">Gaibandha</option><option  title="Gazipur">Gazipur</option><option  title="Gopalganj">Gopalganj</option><option  title="Habiganj">Habiganj</option><option  title="Joypurhat">Joypurhat</option><option  title="Jamalpur">Jamalpur</option><option  title="Jessore">Jessore</option><option  title="Jhalokati">Jhalokati</option><option  title="Jhenaidah">Jhenaidah</option><option  title="Khagrachhari">Khagrachhari</option><option  title="Khulna">Khulna</option><option  title="Kishoreganj">Kishoreganj</option><option  title="Kurigram">Kurigram</option><option  title="Kushtia">Kushtia</option><option  title="Lakshmipur">Lakshmipur</option><option  title="Lalmonirhat">Lalmonirhat</option><option  title="Madaripur">Madaripur</option><option  title="Magura">Magura</option><option  title="Manikganj">Manikganj</option><option  title="Meherpur">Meherpur</option><option  title="Moulvibazar">Moulvibazar</option><option  title="Munshiganj">Munshiganj</option><option  title="Mymensingh">Mymensingh</option><option  title="Naogaon">Naogaon</option><option  title="Narayanganj">Narayanganj</option><option  title="Narsingdi">Narsingdi</option><option  title="Natore">Natore</option><option  title="Chapai Nawabganj">Chapai Nawabganj</option><option  title="Netrakona">Netrakona</option><option  title="Nilphamari">Nilphamari</option><option  title="Noakhali">Noakhali</option><option  title="Narail">Narail</option><option  title="Pabna">Pabna</option><option  title="Panchagarh">Panchagarh</option><option  title="Patuakhali">Patuakhali</option><option  title="Pirojpur">Pirojpur</option><option  title="Rajbari">Rajbari</option><option  title="Rajshahi">Rajshahi</option><option  title="Rangamati">Rangamati</option><option  title="Rangpur">Rangpur</option><option  title="Satkhira">Satkhira</option><option  title="Shariatpur">Shariatpur</option><option  title="Sherpur">Sherpur</option><option  title="Sirajganj">Sirajganj</option><option  title="Sunamganj">Sunamganj</option><option  title="Sylhet">Sylhet</option><option  title="Tangail">Tangail</option><option  title="Thakurgaon">Thakurgaon</option>
                                            </select>
                                        </div>
                                    </div>
                                   

                                    <div class="form-group row">
                                        <div class="col-sm-8 ml-auto">
                                            <button type="submit" class="btn btn-success" name="signup1" value="Sign up">Create</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>







    </div>
</div>








@include('Admin.footer')
<script type="text/javascript">
     

</script>