@extends('admin')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb"
            style="margin-top: 30px; display: flex; justify-content: space-between; align-items: center;">
            <a href=""></a>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a>Pay Salary</a></li>
            </ol>
        </nav>
    </div>

    <div class="container my-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Pay Salary List</h3>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped" id="table_id">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Month</th>
                                    <th>Salary</th>
                                    <th>Advance Salary</th>
                                    <th>Due Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $sl => $employee)
                                    <tr>
                                        <td>{{ $sl + 1 }}</td>
                                        <td>{{ $employee->name }}</td>

                                        <td>{{ date('F', strtotime('-1 month')) }}</td>
                                        <td>{{ $employee->salary }}</td>
                                        <td>

                                            @php
                                                $advanceSalary = App\Models\EmployeeAdvanceSalary::where('employee_id', $employee->id)
                                                    ->where('year', Carbon\Carbon::now()->year)
                                                    ->first();
                                            @endphp




                                            @if (!empty($advanceSalary->amount))
                                                <span>{{ $advanceSalary->amount }}</span>
                                            @else
                                                <span>No Advance</span>
                                            @endif
                                        </td>

                                        <td>

                                            @if (!empty($advanceSalary->amount))
                                                @php
                                                    $salary = $employee->salary;
                                                    $due = $salary - $advanceSalary->amount;
                                                @endphp
                                                {{ $due }}
                                            @else
                                                @php
                                                    $due = $employee->salary;
                                                @endphp
                                                {{ $due }}
                                            @endif


                                        </td>
                                        <td>


                                            @php
                                                $status = App\Models\EmployeePaySalary::where('employee_id', $employee->id)->exists();
                                            @endphp

                                            @if (!empty($status))
                                                <div class="badge badge-primary">paid</div>
                                            @else
                                                <a href="{{ route('pay.now', $employee->id) }}" class="btn btn-primary">Pay
                                                    Now</a>
                                            @endif

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
