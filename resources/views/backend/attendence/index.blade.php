@extends('admin')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb"
            style="margin-top: 30px; display: flex; justify-content: space-between; align-items: center;">
            <a href="{{ route('attendence.create') }}" class="btn btn-primary">Add New</a>

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a>Attendence List</a></li>
            </ol>
        </nav>
    </div>

    <div class="container my-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Attendence List</h3>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped" id="table_id">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                {{-- @foreach ($attendences as $sl => $attendence)
                                    <tr>



                                        <td>{{ $sl + 1 }}</td>
                                        <td>{{ date('Y-m-d', strtotime($attendence->date)) }}</td>

                                    </tr>
                                @endforeach --}}

                                @foreach ($attendances as $sl => $attendance)
                                    <tr>
                                        <td>{{ $sl + 1 }}</td>
                                        <td>{{ $attendance->date }}</td>

                                        <td>
                                            <a href=" {{ route('attendence.edit', $attendance->date) }}"
                                                class="btn btn-primary">Edit</a>
                                            <a href="{{ route('attendence.view', $attendance->date) }}"
                                                class="btn btn-info">View</a>
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


@section('footer_scripts')
    <script>
        $('.delete').click(function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "Delete this record?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var link = $(this).attr('data-delete');
                    location.href = link;
                }
            })
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>
@endsection
