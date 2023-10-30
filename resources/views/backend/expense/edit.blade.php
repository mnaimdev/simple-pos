@extends('admin')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb"
            style="margin-top: 30px; display: flex; justify-content: space-between; align-items: center;">
            <a href="{{ route('expense') }}" class="btn btn-info">List</a>

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('expense') }}">Expense</a></li>
                <li class="breadcrumb-item"><a>Edit</a></li>
            </ol>
        </nav>
    </div>

    <div class="container my-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Expense</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('expense.update') }}" method="POST">
                            @csrf


                            <input type="hidden" name="id" value="{{ $expense->id }}">

                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label>Details</label>
                                        <textarea name="details" class="form-control" cols="10" rows="5">{{ $expense->details }}</textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label>Date</label>
                                        <input type="date" name="date" class="form-control"
                                            value="{{ date('Y-m-d', strtotime($expense->date)) }}">
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <input type="number" name="amount" class="form-control"
                                            value="{{ $expense->amount }}">
                                        <input type="hidden" name="month" class="form-control"
                                            value="{{ date('F') }}">
                                        <input type="hidden" name="year" class="form-control"
                                            value="{{ date('Y') }}">
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
