@extends('admin')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb"
            style="margin-top: 30px; display: flex; justify-content: space-between; align-items: center;">
            <a href="{{ route('permission') }}" class="btn btn-info">List</a>

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('permission') }}">Permission</a></li>
                <li class="breadcrumb-item"><a>Edit</a></li>
            </ol>
        </nav>
    </div>

    <div class="container my-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Permission</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('permission.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $permission->id }}">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Name</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name')
                                            is-invalid
                                        @enderror"
                                            value="{{ $permission->name }}" placeholder="Name">
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
                                            <option {{ $permission->group_name == 'Employee' ? 'selected' : '' }}
                                                value="Employee">Employee</option>
                                            <option {{ $permission->group_name == 'Salary' ? 'selected' : '' }}
                                                value="Salary">Salary</option>
                                            <option {{ $permission->group_name == 'Customer' ? 'selected' : '' }}
                                                value="Customer">Customer</option>
                                            <option {{ $permission->group_name == 'Supplier' ? 'selected' : '' }}
                                                value="Supplier">Supplier</option>
                                            <option {{ $permission->group_name == 'Attendence' ? 'selected' : '' }}
                                                value="Attendence">Attendence</option>
                                            <option {{ $permission->group_name == 'Category' ? 'selected' : '' }}
                                                value="Category">Category</option>
                                            <option {{ $permission->group_name == 'Product' ? 'selected' : '' }}
                                                value="Product">Product</option>
                                            <option {{ $permission->group_name == 'Expense' ? 'selected' : '' }}
                                                value="Expense">Expense</option>
                                            <option {{ $permission->group_name == 'Pos' ? 'selected' : '' }}
                                                value="Pos">Pos</option>
                                            <option {{ $permission->group_name == 'Stock' ? 'selected' : '' }}
                                                value="Stock">Stock</option>
                                            <option {{ $permission->group_name == 'Role' ? 'selected' : '' }}
                                                value="Role">Role</option>
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
