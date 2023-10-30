<div class="modal fade" id="add-user-modal">
        <div class="modal-dialog modal-xl">
        
          <div class="modal-content">
          <form action="/dashboard/users" method="post">
          @csrf
            <div class="modal-header">
              <h4 class="modal-title">Add New User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="John Doe" value="{{old('name')}}" required>
                </div> 
                @if ($errors->has('name')) <br>
                <p class="text-danger">{{$errors->first('name')  }} </p>
                @endif
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="johndoe@example.com" value="{{old('email')}}" required>
                </div>
                @if ($errors->has('email')) <br>
                <p class="text-danger">{{$errors->first('email')  }} </p>
                @endif

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="08012345678" value="{{old('phone')}}" required>
                </div>
                @if ($errors->has('phone')) <br>
                <p class="text-danger">{{$errors->first('phone')  }} </p>
                @endif

                <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="role" required >
                            @foreach (\App\Models\Role::all() as $role )
                            <option value="{{$role->id}}" selected>{{$role->name}}</option>
                            @endforeach
                            
                          
                        </select>
                </div>
                @if ($errors->has('role')) <br>
                <p class="text-danger">{{$errors->first('role')  }} </p>
                @endif
                <div class="form-group">
                    <label for="designation">Designation/Title</label>
                    <input type="text" class="form-control" id="designation" name="designation" value="{{old('designation')}}" placeholder="Web Designer (optional)" >
                </div>
                <div class="form-group">
                    <label for="job_description">Job Description </label>
                    <textarea name="job_description" id="job_description" value="{{old('job_description')}}" class="form-control" rows="3" placeholder="Design Websites For Clients (optional)"></textarea> 
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



      