@extends('admin')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb"
            style="margin-top: 30px; display: flex; justify-content: space-between; align-items: center;">
            <a></a>

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a>Update Role in Permission</a></li>
            </ol>
        </nav>
    </div>

    <div class="container my-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Update Role in Permission</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('role.permission.update') }}" method="POST">
                            @csrf


                            <input type="hidden" name="id" value="{{ $role->id }}">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <h2 class="badge badge-info">{{ $role->name }}</h2>
                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <div class="form-gorup mb-3 pl-4">
                                        <input type="checkbox" class="form-check-input" id="check">Primary
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                @foreach ($group_names as $group)
                                    @php
                                        $permissions = App\Models\User::getPermissionByGroupName($group->group_name);
                                    @endphp

                                    <div class="col-lg-6">
                                        <div class="form-group mb-3 pl-4">
                                            <input type="checkbox" class="form-check-input"
                                                {{ App\Models\User::roleHasPermission($role, $permissions) ? 'checked' : '' }}>
                                            {{ $group->group_name }}
                                        </div>


                                    </div>

                                    <div class="col-lg-6">
                                        @foreach ($permissions as $permission)
                                            <div class="form-group mb-3">
                                                <input {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}
                                                    type="checkbox" name="permission_id[]"
                                                    class="form-check-input @error('permission_id')  is-invalid @enderror"
                                                    value="{{ $permission->id }}">
                                                {{ $permission->name }}
                                            </div>
                                        @endforeach
                                        <br>

                                        @error('permission_id')
                                            <strong class="text-danger">
                                                {{ $message }}
                                            </strong>
                                        @enderror
                                    </div>
                                @endforeach
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

@section('footer_scripts')
    <script>
        $('#check').click(function(event) {
            if (this.checked) {
                $(':checkbox').prop('checked', true);
            } else {
                $(':checkbox').prop('checked', false);
            }
        });
    </script>
@endsection
