@extends('admin')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb"
            style="margin-top: 30px; display: flex; justify-content: space-between; align-items: center;">
            <div>
                <a href="{{ route('expense.create') }}" class="btn btn-primary">Add New</a>

            </div>

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a>Expense</a></li>
            </ol>
        </nav>
    </div>

    <div class="container my-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Today Expense</h3>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped" id="table_id">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Amount</th>
                                    <th>Details</th>
                                    <th>Date</th>
                                    <th>Month</th>
                                    <th>Year</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($todays as $sl => $day)
                                    <tr>
                                        <td>{{ $sl + 1 }}</td>
                                        <td>{{ $day->amount }}</td>
                                        <td>{{ $day->details }}</td>
                                        <td>{{ $day->date }}</td>
                                        <td>{{ $day->month }}</td>
                                        <td>{{ $day->year }}</td>
                                        <td>
                                            <a href="{{ route('expense.edit', $day->id) }}" class="btn btn-info">Edit</a>
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
