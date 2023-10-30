@extends('admin')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb"
            style="margin-top: 30px; display: flex; justify-content: space-between; align-items: center;">
            <a href="{{ route('add.role.permission') }}" class="btn btn-primary">Role in Permission</a>

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a>Permission Under Role</a></li>
            </ol>
        </nav>
    </div>

    <div class="container my-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>All Roles</h3>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Role Name</th>
                                    <th>Permissions</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $sl => $role)
                                    <tr>
                                        <td>{{ $sl + 1 }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            @forelse ($role->permissions as $permission)
                                                <span class="badge badge-primary m-1">
                                                    {{ $permission->name }}
                                                </span>
                                            @empty
                                                <span>NA</span>
                                            @endforelse
                                        </td>
                                        <td>
                                            <a href="{{ route('edit.role.permission', $role->id) }}" class="btn btn-primary"
                                                width="40">Edit</a>
                                            <a data-delete="{{ route('delete.role.permission', $role->id) }}"
                                                class="btn btn-danger delete">X</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
