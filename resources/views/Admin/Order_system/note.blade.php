            <div class="control-group" id="staticParent">
                <label class="control-label">Note</label>
                <div class="controls">
                  <input type="text"  class='form-control'  value="{{old('serial')}}" placeholder="Comment or Note Write here..."
                   id="note" name="note">
                </div>
              </div>
   
              <div class="form-actions">
                <input type="submit" value="Save" class="btn btn-success" onclick="penToProOrder('{{$id}}')">
              </div>
<script type="text/javascript">

        
function penToProOrder(id)
{
    let note = $("#note").val();
   if(confirm('are you sure?'))
    $.ajax({

            headers:{ 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
            url:'{{url("penToProOrder")}}',
            type:'POST',
            data:{id:id,note:note},
            success:function(data)
            {
                $("#tr-"+id).hide();
                $("#sms").html('<span class="alert alert-success">Order Sent to Proccessign</span>');
            }
        })  

    
}
</script>