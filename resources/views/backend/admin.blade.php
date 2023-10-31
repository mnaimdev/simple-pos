@extends('admin')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb"
            style="margin-top: 30px; display: flex; justify-content: space-between; align-items: center;">
            <div>
                <a href="{{ route('assign.role') }}" class="btn btn-primary">Assign Role</a>
            </div>

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a>Admin</a></li>
            </ol>
        </nav>
    </div>

    <div class="container my-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Admin List</h3>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped" id="table_id">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Image</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $sl => $user)
                                    <tr>
                                        <td>{{ $sl + 1 }}</td>
                                        <td>{{ $user->name }}</td>

                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone == '' ? 'No Number' : $user->phone }}</td>
                                        <td>
                                            @if ($user->photo == '')
                                                <img width="32" src="{{ Avatar::create($user->name)->toBase64() }}">
                                            @else
                                                <img width="50" height="50"
                                                    src="{{ asset('/uploads/user') }}/{{ $user->photo }}" alt="">
                                            @endif

                                        </td>
                                        <td>

                                            @forelse ($user->getRoleNames() as $role)
                                                <span class="badge badge-primary">
                                                    {{ $role }}
                                                </span>
                                            @empty
                                                <span>No Role</span>
                                            @endforelse
                                        </td>
                                        <td>
                                            <a href="{{ route('edit.assign.role', $user->id) }}"
                                                class="btn btn-primary">Edit</a>

                                            <a data-delete="{{ route('delete.assign.role', $user->id) }}"
                                                class="btn btn-danger delete">Delete</a>
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
