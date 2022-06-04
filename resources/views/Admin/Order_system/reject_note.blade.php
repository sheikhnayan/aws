           <form>
            <div class="control-group" id="staticParent">
                <label class="control-label">Reject Note</label>
                <div class="controls">
                  <input type="text"  class='form-control'  value="{{old('serial')}}" placeholder="Comment or Note Write here..."
                   id="note" name="note">
                </div>
              </div>
   
              <div class="form-actions">
                <input type="submit" value="Reject" class="btn btn-danger" onclick="penTorejectOrder('{{$id}}')">
              </div>
              </form>


