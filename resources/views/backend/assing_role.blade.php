@extends('admin')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb"
            style="margin-top: 30px; display: flex; justify-content: space-between; align-items: center;">
            <div>
                <a href="{{ route('admin') }}" class="btn btn-primary">Admin</a>
            </div>

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a>Assign Role</a></li>
            </ol>
        </nav>
    </div>

    <div class="container my-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Assign Role</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('assign.role.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Name</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name')
                                            is-invalid
                                        @enderror"
                                            placeholder="Name">
                                    </div>
                                    @error('name')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>



                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Email</label>
                                        <input type="email" name="email"
                                            class="form-control @error('email')
                                            is-invalid
                                        @enderror"
                                            placeholder="Email">
                                    </div>
                                    @error('email')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>


                            </div>


                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Password</label>
                                        <input type="password" name="password"
                                            class="form-control @error('password')
                                            is-invalid
                                        @enderror"
                                            placeholder="Password">
                                    </div>
                                    @error('password')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>



                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Role</label>
                                        <select name="role_id"
                                            class="form-control @error('role_id')
                                            is-invalid
                                        @enderror">
                                            <option selected disabled>-- Select Role --</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    @error('role_id')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Branch Name</label>
                                        <select name="branch_id" class="form-control">
                                            <option selected disabled>-- Select Branch --</option>
                                            @foreach ($branches as $branch)
                                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>




                            <div class="form-group mb-3">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
