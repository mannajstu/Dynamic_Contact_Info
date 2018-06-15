@extends('layouts.app')

@section('content')
<main class="col-12">
  <div class="card">
    <div class="container">
      <div class="row">
        <div class="col ">
          <h2>Dashboard</h2>
      </div>
      <div class="col ">
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewEmployee">
          Add New Employee
      </button> 
  </div>
</div>

</div>

<!-- Notification Message -->
<div class="col-md-12">
    @include('Employee.sucessMsg')
    @include('Employee.errorMsg')
</div>
<div class="table-responsive">
    
    <table class="table table-striped">
      <thead>
        <tr>
            <th >Employee ID</th>
            <th >Employee Name</th>
            <th >Employee Contact Number</th>
            <th > Employee Email</th>
            <th > Designation</th>
            <th > Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($employees as $employee)
        <tr>
            <th >{{$employee->id}}</th>
            <td>{{$employee->name}}</td>
            <td>{{$employee->mobile_number}}</td>
            <td>{{$employee->email}}</td>
            <td>{{$employee->designation}}</td>
            <td>  
               <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".showemployee{{$employee->id}}" >View</button>
               <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target=".editemployee{{$employee->id}}" >Edit</button>

               <a href="{{ url('/employee/delete/'.$employee->id)}}"  class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this');">
                Delete<span class="glyphicon glyphicon-trash"></span>
            </a>
        </td>

    </tr>
    @endforeach

</tbody>
</table>
 <h3>{{ $employees->count() }} Out Off {{ $employees->total() }}</h3>
 {{ $employees->links() }}
</div>
</main>


<!-- Add New Employee --> 
@include('Employee.addEmployee')
@foreach ($employees as $employee)
@include('Employee.showEmployee')
@endforeach
@foreach ($employees as $employee)
@include('Employee.editEmployee')
@endforeach

</div>
</div>
@endsection
