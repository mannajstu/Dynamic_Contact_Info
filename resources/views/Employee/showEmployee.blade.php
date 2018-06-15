<div class="modal fade showemployee{{$employee->id}}" id="#showemployee{{$employee->id}}" tabindex="-1" role="dialog" aria-labelledby="showemployee{{$employee->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addparentLabel">Employee Detail</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>

            <div class="modal-body">

             
                    
                    <div class="alert alert-danger" role="alert">
                      Name: <p class="card-text">{{$employee->name}}</p>
                    </div>
                    <div class="alert alert-success" role="alert">
                        Mobile Number: <p class="card-text">{{$employee->mobile_number}}</p>
                    </div>
                    <div class="alert alert-warning" role="alert">
                        Email: <p class="card-text">{{$employee->email}}</p>
                    </div>
                    <div class="alert alert-primary" role="alert">
                       Designation: <p class="card-text">{{$employee->designation}}</p>
                    </div>

  </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
 
        </div>
    </div>
</div>