@extends('admin')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Total Customer</h3>
                    </div>
                    <div class="card-body">
                        <div>
                            <h3>{{ $totalCustomer }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Total Supplier</h3>
                    </div>
                    <div class="card-body">
                        <div>
                            <h3>{{ $totalSupplier }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Total Employee</h3>
                    </div>
                    <div class="card-body">
                        <div>
                            <h3>{{ $totalEmployee }}</h3>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 my-5">
                <div class="card">
                    <div class="card-header">
                        <h3>This Year Expense</h3>
                    </div>
                    <div class="card-body">
                        <div>
                            <h3>{{ $yearlyExpense }} TK</h3>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 my-5">
                <div class="card">
                    <div class="card-header">
                        <h3>This Month Expense</h3>
                    </div>
                    <div class="card-body">
                        <div>
                            <h3>{{ $monthlyExpense }} TK</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
