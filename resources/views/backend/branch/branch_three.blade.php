@extends('admin')

@section('content')
    <div class="container mt-5">

        <!-- Button to Open the Modal -->
        <button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#myModal">
            Add Branch Employee
        </button>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Branch Details
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <th>SL</th>
                                <th>Employee Name</th>
                                <th>Branch Name</th>
                                <th>Branch Location</th>
                            </tr>
                            @foreach ($employees as $sl => $employee)
                                <tr>
                                    <td>{{ $sl + 1 }}</td>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->branch->name }}</td>
                                    <td>{{ $employee->branch->location }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>







        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add New</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="{{ route('branch.employee.store') }}" method="POST">
                            @csrf

                            <input type="hidden" name="branch_id" value="{{ $branch->id }}">


                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Employee Name</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Employee Name">
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Employee Email</label>
                                        <input type="email" name="email" class="form-control"
                                            placeholder="Employee Email">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control"
                                            placeholder="Employee Address">
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Phone Number</label>
                                        <input type="text" name="phone" class="form-control"
                                            placeholder="Employee Phone">
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-danger" type="submit">Submit</button>


                    </div>


                    </form>

                </div>
            </div>
        </div>


    </div>
@endsection
