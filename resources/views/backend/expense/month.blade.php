@extends('admin')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb"
            style="margin-top: 30px; display: flex; justify-content: space-between; align-items: center;">
            <div>
                <a href=""></a>

            </div>

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('expense') }}">Expense</a></li>
                <li class="breadcrumb-item"><a href="{{ route('expense') }}">Month</a></li>
            </ol>
        </nav>
    </div>

    <div class="container my-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>This Month Expense</h3>
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($months as $sl => $month)
                                    <tr>
                                        <td>{{ $sl + 1 }}</td>
                                        <td>{{ $month->amount }}</td>
                                        <td>{{ $month->details }}</td>
                                        <td>{{ $month->date }}</td>
                                        <td>{{ $month->month }}</td>
                                        <td>{{ $month->year }}</td>
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
