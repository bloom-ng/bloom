<div class="modal fade" id="add-task-modal">
        <div class="modal-dialog modal-xl">
        
          <div class="modal-content">
          <form action="/dashboard/tasks" method="post">
          @csrf
            <div class="modal-header">
              <h4 class="modal-title">Assign New Task</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
            <div class="form-group">
                    <label for="personnel_id">Personnel</label>
                    <select name="personnel_id" id="personnel_id" required  class="form-control">

                        @foreach (\App\Models\Personnel::all() as $personnel)
                            <option value="{{$personnel->id}}"
                               
                            >{{$personnel->user->name .' ('.$personnel->designation.')'}}</option>
                        @endforeach
                    </select>
                </div> 
                
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="description" class="form-control" id="description" name="description" placeholder="Design three banners" 
                    value="{{old('description')}}" required>
                </div>
                @if ($errors->has('description')) <br>
                <p class="text-danger">{{$errors->first('description')  }} </p>
                @endif

                <div class="form-group">
                    <label for="phone">Due</label>
                    <input type="datetime-local"  class="form-control" name="due" id="due" value="{{old('due')}}">
                </div>
              
              
             
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->



      