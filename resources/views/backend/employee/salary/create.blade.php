@extends('admin')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb"
            style="margin-top: 30px; display: flex; justify-content: space-between; align-items: center;">
            <a href="{{ route('advance.salary') }}" class="btn btn-info">List</a>

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('advance.salary') }}">Advance Salary</a></li>
                <li class="breadcrumb-item"><a>Create</a></li>
            </ol>
        </nav>
    </div>

    <div class="container my-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Create Advance Salary</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('advance.salary.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

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
                                                <option @if (old('employee_id') == $employee->id) selected="selected" @endif
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


                                            @php
                                                use Carbon\Carbon;
                                                $currentDate = Carbon::now();
                                                $currentMonth = $currentDate->month;
                                                $currentYear = $currentDate->year;

                                            @endphp


                                            @for ($month = 1; $month <= 12; $month++)
                                                @php
                                                    $currentDate->month($month);
                                                @endphp
                                                @if ($currentDate->year == $currentYear && $month >= $currentMonth)
                                                    <option value="{{ $month }}">
                                                        {{ $currentDate->monthName }}
                                                    </option>
                                                @endif
                                            @endfor


                                            {{-- <option @if (old('month') == 'January') selected="selected" @endif
                                                value="January">January</option>

                                            <option @if (old('month') == 'February') selected="selected" @endif
                                                value="February">February</option>

                                            <option @if (old('month') == 'March') selected="selected" @endif
                                                value="March">March</option>

                                            <option @if (old('month') == 'April') selected="selected" @endif
                                                value="April">April</option>

                                            <option @if (old('month') == 'May') selected="selected" @endif
                                                value="May">May</option>

                                            <option @if (old('month') == 'June') selected="selected" @endif
                                                value="June">June</option>

                                            <option @if (old('month') == 'July') selected="selected" @endif
                                                value="July">July</option>

                                            <option @if (old('month') == 'August') selected="selected" @endif
                                                value="August">August</option>

                                            <option @if (old('month') == 'September') selected="selected" @endif
                                                value="September">September</option>

                                            <option @if (old('month') == 'October') selected="selected" @endif
                                                value="October">October</option>

                                            <option @if (old('month') == 'November') selected="selected" @endif
                                                value="November">November</option>

                                            <option @if (old('month') == 'December') selected="selected" @endif
                                                value="December">December</option> --}}

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
                                    <input type="text" name="year" id=""
                                        class="form-control @error('year')
                                        is-invalid
                                    @enderror"
                                        value="{{ $currentYear }}" readonly>


                                    {{-- <option @if (old('year') == 2023) selected="selected" @endif value="2023">
                                            2023</option>

                                        <option @if (old('year') == 2024) selected="selected" @endif value="2024">
                                            2024</option>

                                        <option @if (old('year') == 2025) selected="selected" @endif value="2025">
                                            2025</option>

                                        <option @if (old('year') == 2026) selected="selected" @endif value="2026">
                                            2026</option>

                                        <option @if (old('year') == 2027) selected="selected" @endif value="2027">
                                            2027</option> --}}
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
                                            name="amount" placeholder="Amount">
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
