<div class="modal fade editemployee{{$employee->id}}" id="editemployee{{$employee->id}}" tabindex="-1" role="dialog" aria-labelledby="editemployee{{$employee->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addparentLabel">Update Employee</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>

            <div class="modal-body">

                <form action="{{url('/employee/update')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$employee->name}}" required>
                        <input type="hidden" name="employee_id" value="{{$employee->id}}">
                    </div>
                    <div class="form-group">
                        <label for="mobile_number">Mobile Number</label>
                        <input type="number" maxlength="10" value="{{$employee->mobile_number}}" class="form-control" id="mobile_number" name="mobile_number"placeholder="Mobile Number" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" value="{{$employee->email}}" class="form-control" id="email" name="email"placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="designation">Designation</label>
                        <input type="text" value="{{$employee->designation}}" class="form-control" id="designation" name="designation"placeholder="Designation" required>
                    </div>




                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>

        </div>
    </div>
</div>