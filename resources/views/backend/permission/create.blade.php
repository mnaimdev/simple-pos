@extends('admin')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb"
            style="margin-top: 30px; display: flex; justify-content: space-between; align-items: center;">
            <a href="{{ route('permission') }}" class="btn btn-info">List</a>

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('permission') }}">Permission</a></li>
                <li class="breadcrumb-item"><a>Create</a></li>
            </ol>
        </nav>
    </div>

    <div class="container my-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Create Permission</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('permission.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Name</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name')
                                            is-invalid
                                        @enderror"
                                            value="{{ old('name') }}" placeholder="Name">
                                        @error('name')
                                            <strong class="text-danger my-1">
                                                {{ $message }}
                                            </strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Group Name</label>
                                        <select name="group_name"
                                            class="form-control @error('group_name')
                                            is-invalid
                                        @enderror"
                                            id="group_name">
                                            <option disabled selected>-- Select Group --</option>
                                            <option value="Employee">Employee</option>
                                            <option value="Salary">Salary</option>
                                            <option value="Customer">Customer</option>
                                            <option value="Supplier">Supplier</option>
                                            <option value="Attendence">Attendence</option>
                                            <option value="Category">Category</option>
                                            <option value="Product">Product</option>
                                            <option value="Expense">Expense</option>
                                            <option value="Pos">Pos</option>
                                            <option value="Stock">Stock</option>
                                            <option value="Role">Role</option>
                                            <option value="Branch">Branch</option>
                                        </select>

                                        @error('group_name')
                                            <strong class="text-danger my-1">
                                                {{ $message }}
                                            </strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>



                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
