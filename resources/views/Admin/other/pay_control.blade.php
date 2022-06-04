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
                            Payment Method Off/On
                        </div>
                        <div class="card-title" style="float: right;">

                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ url('updatecontrol') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">




                                    <div class="control-group">

                                        <label class="control-label">Payment Method</label>

                                        <div class="controls">
                                           <select name="control" class="form-control">
                                               <option value="1">Cash</option>
                                               <option value="2">Online</option>
                                               <option value="3">Bkash</option>
                                               <option value="4">Rocket</option>
                                               <option value="5">Nagad</option>
                                               <option value="6">Bank</option>
                                           </select>
                                        </div>
                                    </div>



                                </div>
                            </div>
                            <br>
                            <div align="center">
                                <input type="submit" name="submit" value="Off/On" class="btn btn-warning">
                            </div>
                        </form>
                    </div>
                </div>




            </div>
        </div>
    </div>
</div>
@include('Admin.footer')
