@extends('admin')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb"
            style="margin-top: 30px; display: flex; justify-content: space-between; align-items: center;">
            <a href="{{ route('advance.salary') }}" class="btn btn-info">List</a>

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('advance.salary') }}">Advance Salary</a></li>
                <li class="breadcrumb-item"><a>Edit</a></li>
            </ol>
        </nav>
    </div>

    <div class="container my-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Advance Salary</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('advance.salary.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf


                            <input type="hidden" name="id" value="{{ $advance_salaries->id }}">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Employee</label>
                                        <select name="employee_id" id=""
                                            class="form-control select @error('employee_id')
                                            is-invalid
                                        @enderror">
                                            <option disabled selected>-- Select Employee --</option>
                                            @foreach ($employees as $employee)
                                                <option
                                                    {{ $advance_salaries->employee_id == $employee->id ? 'selected' : '' }}
                                                    value="{{ $employee->id }}">{{ $employee->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('employee_id')
                                            <strong class="text-danger">
                                                {{ $message }}
                                            </strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Month</label>
                                        <select name="month" id=""
                                            class="form-control select @error('month')
                                            is-invalid
                                        @enderror">
                                            <option selected disabled>-- Select Month --</option>

                                            <option {{ $advance_salaries->month == 'January' ? 'selected' : '' }}
                                                value="January">January</option>

                                            <option {{ $advance_salaries->month == 'February' ? 'selected' : '' }}
                                                value="February">February</option>

                                            <option {{ $advance_salaries->month == 'March' ? 'selected' : '' }}
                                                value="March">March</option>

                                            <option {{ $advance_salaries->month == 'April' ? 'selected' : '' }}
                                                value="April">April</option>

                                            <option {{ $advance_salaries->month == 'May' ? 'selected' : '' }}
                                                value="May">May</option>

                                            <option {{ $advance_salaries->month == 'June' ? 'selected' : '' }}
                                                value="June">June</option>

                                            <option {{ $advance_salaries->month == 'July' ? 'selected' : '' }}
                                                value="July">July</option>

                                            <option {{ $advance_salaries->month == 'August' ? 'selected' : '' }}
                                                value="August">August</option>

                                            <option {{ $advance_salaries->month == 'September' ? 'selected' : '' }}
                                                value="September">September</option>

                                            <option {{ $advance_salaries->month == 'October' ? 'selected' : '' }}
                                                value="October">October</option>

                                            <option {{ $advance_salaries->month == 'November' ? 'selected' : '' }}
                                                value="November">November</option>

                                            <option {{ $advance_salaries->month == 'December' ? 'selected' : '' }}
                                                value="December">December</option>

                                        </select>
                                        @error('month')
                                            <strong class="text-danger">
                                                {{ $message }}
                                            </strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Year</label>
                                    <select name="year" id=""
                                        class="form-control select @error('year')
                                        is-invalid
                                    @enderror">
                                        <option selected disabled>-- Select Year --</option>

                                        <option {{ $advance_salaries->year == 2023 ? 'selected' : '' }} value="2023">2023
                                        </option>

                                        <option {{ $advance_salaries->year == 2024 ? 'selected' : '' }} value="2024">2024
                                        </option>

                                        <option {{ $advance_salaries->year == 2025 ? 'selected' : '' }} value="2025">2025
                                        </option>

                                        <option {{ $advance_salaries->year == 2026 ? 'selected' : '' }} value="2026">2026
                                        </option>

                                        <option {{ $advance_salaries->year == 2027 ? 'selected' : '' }} value="2027">2027
                                        </option>
                                    </select>
                                    @error('year')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Advance Salary</label>
                                        <input type="number"
                                            class="form-control @error('amount')
                                            is-invalid
                                        @enderror"
                                            name="amount" placeholder="Amount" value="{{ $advance_salaries->amount }}">
                                        @error('amount')
                                            <strong class="text-danger">
                                                {{ $message }}
                                            </strong>
                                        @enderror
                                    </div>
                                </div>
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
        $(document).ready(function() {
            $('.select').select2();
        });
    </script>
@endsection
