@extends('admin')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb"
            style="margin-top: 30px; display: flex; justify-content: space-between; align-items: center;">
            <a href="{{ route('pay.salary') }}" class="btn btn-primary">List</a>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('pay.salary') }}">Pay Salary</a></li>
                <li class="breadcrumb-item"><a>Paid</a></li>
            </ol>
        </nav>
    </div>

    <div class="container my-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Paid Now</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('pay.salary.store') }}" method="POST">
                            @csrf

                            <input type="hidden" name="employee_id" value="{{ $employees->id }}">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group-mb-3">
                                        <label>Month</label>
                                        <input type="text" class="form-control" name="month"
                                            value="{{ date('F', strtotime('-1 month')) }}" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group-mb-3">
                                        <label>Salary</label>
                                        <input type="text" class="form-control" name="paid_amount"
                                            value="{{ $employees->salary }}" readonly>
                                    </div>
                                </div>


                            </div>


                            <div class="row mt-3">


                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>
                                            Advance Salary
                                        </label>

                                        @php
                                            $advanceSalary = App\Models\EmployeeAdvanceSalary::where('employee_id', $employees->id)
                                                ->where('year', Carbon\Carbon::now()->year)
                                                ->first();
                                        @endphp

                                        @if (!empty($advanceSalary->amount))
                                            @php
                                                $advance = $advanceSalary->amount;
                                                $due = $employees->salary - $advance;
                                                $advanceMonth = $advanceSalary->month;
                                                $advanceYear = $advanceSalary->year;
                                            @endphp
                                        @else
                                            @php
                                                $advance = 0;
                                                $due = 0;
                                                $advanceMonth = 0;
                                                $advanceYear = 0;
                                            @endphp
                                        @endif

                                        <input type="text" class="form-control" name="amount"
                                            value="{{ $advance }}" readonly>
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>
                                            Due Amount
                                        </label>

                                        <input type="text" class="form-control" name="due_amount"
                                            value="{{ $due }}" readonly>

                                        <input type="hidden" name="advance_amount" value="{{ $advance }}">
                                        <input type="hidden" name="advance_month" value="{{ $advanceMonth }}">
                                        <input type="hidden" name="advance_year" value="{{ $advanceYear }}">
                                    </div>
                                </div>

                            </div>

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>

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
        $(document).ready(function() {
            $('.select').select2();
        });
    </script>
@endsection
