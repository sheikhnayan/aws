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
                                    Offer Banner Update
                                </div> 
                        
                            </div>
                            <div class="card-body">
                                <form id="" method="post" class=" right-text-label-form feedback-icon-form" action="{{url('updateofferbanner')}}" enctype="multipart/form-data">
                                    @csrf
                       

                                
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Discount Mela</label>
                                        <div class="col-sm-6">
                                            <div class="input-group mb-3">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                              </div>
                                              <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="discount_mela" id="">
                                                <label class="custom-file-label" for="inputGroupFile01" style="text-align: left;">Choose Discount Mela Banner</label>
                                                
                                              </div>
                                            </div><br>
                                            <img src="{{asset('public/offer_banner_image')}}/{{$data->discount_mela}}" style="height:150px;width:100%">
                                        </div>
                                    </div>
                                    
                                      <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Lifestyle Mela</label>
                                        <div class="col-sm-6">
                                               <div class="input-group mb-3">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                              </div>
                                              <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="life_style" id="inputGroupFile01">
                                                <label class="custom-file-label" for="inputGroupFile01" style="text-align: left;">Choose Lifestyle Mela Banner</label>
                                              </div>
                                            </div>
                                            
                                            <br>
                                            <img src="{{asset('public/offer_banner_image')}}/{{$data->life_style}}" style="height:150px;width:100%">
                                        </div>
                                    </div>


                                      <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Gadget Mela</label>
                                        <div class="col-sm-6">
                                               <div class="input-group mb-3">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                              </div>
                                              <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="gadget_mela" id="inputGroupFile01">
                                                <label class="custom-file-label" for="inputGroupFile01" style="text-align: left;">Choose Gadget Mela Banner</label>
                                              </div>
                                            </div>
                                            
                                            <br>
                                            <img src="{{asset('public/offer_banner_image')}}/{{$data->gadget_mela}}" style="height:150px;width:100%">
                                        </div>
                                    </div>
                                    
                                    
                                      <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Deshi Mela</label>
                                        <div class="col-sm-6">
                                               <div class="input-group mb-3">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                              </div>
                                              <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="deshi_mela" id="inputGroupFile01">
                                                <label class="custom-file-label" for="inputGroupFile01" style="text-align: left;">Choose Deshi Mela Banner</label>
                                              </div>
                                            </div>
                                            
                                            <br>
                                            <img src="{{asset('public/offer_banner_image')}}/{{$data->deshi_mela}}" style="height:150px;width:100%">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-8 ml-auto">
                                            <button type="submit" class="btn btn-success" name="signup1" value="Sign up">Update</button>
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
