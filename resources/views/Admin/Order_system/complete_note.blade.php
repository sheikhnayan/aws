           <form>
            <div class="control-group" id="staticParent">
                <label class="control-label">Complete Order Note</label>
                <div class="controls">
                  <input type="text"  class='form-control'  value="{{old('serial')}}" placeholder="Comment or Note Write here..."
                   id="note1" name="note1">
                </div>
              </div>
   
              <div class="form-actions">
                <input type="submit" value="Complete" class="btn btn-danger" onclick="ontheTosuccOrder('{{$id}}')">
              </div>
              </form>


