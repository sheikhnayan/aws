            <form action="{{url('/change_shipping')}}" method="post">
                @csrf
                <div class="control-group" id="staticParent">
                <label class="control-label">Name</label>
                <div class="controls">
                  <input type="text"  class='form-control'  value="{{$data->first_name}}" placeholder="Write name here..."
                   id="first_name" name="first_name">
                </div>
              </div>
              
              <div class="control-group" id="staticParent">
                <label class="control-label">E-mail</label>
                <div class="controls">
                  <input type="email"  class='form-control'  value="{{$data->email}}" placeholder= "Write Email here..."
                   id="email" name="email">
                    <input type="hidden" value="{{$data->id}}" id="id" name="id">
                    <input type="hidden" value="{{$id}}" id="invoice_id" name="invoice_id">
                </div>
              </div>
              
              
              <div class="control-group" id="staticParent">
                <label class="control-label">Address</label>
                <div class="controls">
                  <input type="text"  class='form-control'  value="{{$data->address}}"
                   id="address" name="address">
                </div>
              </div>
              
              <div class="control-group" id="staticParent">
                <label class="control-label">phone</label>
                <div class="controls">
                  <input type="text"  class='form-control'  value="{{$data->phone}}"
                   id="phone" name="phone" required>
                </div>
              </div>
              
              <div class="control-group" id="staticParent">
                <label class="control-label">District</label>
                <div class="controls">
                 <select class='form-control' name="district_id"  id="district_id" onclick="return thana_info();" onchange="return thana_info();" required>
                     
                     @if($district)
                     @foreach($district as $dis_data)
                     @if($dis_data->id == $data->district_id)
                     <option value="{{$dis_data->id}}">{{$dis_data->district_name}}</option>
                     @endif
                     @endforeach
                     @endif
                     
                     @if($district)
                     @foreach($district as $dis_data)
                     @if($dis_data->id != $data->district_id)
                     <option value="{{$dis_data->id}}">{{$dis_data->district_name}}</option>
                     @endif
                     @endforeach
                     @endif
                     
                 </select>
                </div>
              </div>
   
              <div class="control-group" id="staticParent">
                <label class="control-label">Thana</label>
                <div class="controls">
                   <select class='form-control' name="thana_id" id="thana_id" required>
                    @if($thana)
                     @foreach($thana as $thana_data)
                     @if($thana_data->id == $data->thana_id)
                     <option value="{{$thana_data->id}}">{{$thana_data->thana_name}}</option>
                     @endif
                     @endforeach
                     @endif
                     
                 </select>
                </div>
              </div>
   
              <div class="form-actions">
                <input type="submit" value="Save" class="btn btn-success" onclick="return confirm('are you sure?')" >
              </div>
            </form>
            
            
              
              
<script>
    	function thana_info()
		{
			var district_id = $("#district_id").val();

			$.ajax({

				headers:{ 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
				url:'{{url("thana_info")}}',
				type:'POST',
				data:{district_id:district_id},
				success:function(data)
				{
					$("#thana_id").html(data)

				}
			});

		}
</script>
