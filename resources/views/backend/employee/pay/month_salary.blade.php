@extends('admin')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb"
            style="margin-top: 30px; display: flex; justify-content: space-between; align-items: center;">
            <a href="{{ route('pay.salary') }}" class="btn btn-primary">List</a>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('pay.salary') }}">Monthly Salary</a></li>
                <li class="breadcrumb-item"><a>Paid</a></li>
            </ol>
        </nav>
    </div>

    <div class="container my-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Monthly Salary</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Month</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                            @foreach ($month_salaries as $sl => $salary)
                                <tr>
                                    <td>{{ $sl + 1 }}</td>
                                    <td>{{ $salary->rel_to_employee->name }}</td>
                                    <td>{{ $salary->month }}</td>
                                    <td>{{ $salary->paid_amount }}</td>
                                    <td>
                                        <span class="badge badge-primary">Paid</span>
                                    </td>

                                </tr>
                            @endforeach
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
