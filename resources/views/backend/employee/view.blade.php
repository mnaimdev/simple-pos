@extends('admin')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb"
            style="margin-top: 30px; display: flex; justify-content: space-between; align-items: center;">
            <a href="{{ route('employee') }}" class="btn btn-info">List</a>

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('employee') }}">Employee</a></li>
                <li class="breadcrumb-item"><a>Show</a></li>
            </ol>
        </nav>
    </div>

    <div class="container my-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item"><b>Name : </b> {{ $employee_info->name }}</li>
                            <li class="list-group-item"><b>Email : </b> {{ $employee_info->email }}</li>
                            <li class="list-group-item"><b>Phone : </b> {{ $employee_info->phone }}</li>
                            <li class="list-group-item"><b>Address : </b> {{ $employee_info->address }}</li>
                            <li class="list-group-item"><b>Country : </b> {{ $employee_info->country }}</li>
                            <li class="list-group-item"><b>City : </b> {{ $employee_info->city }}</li>
                            <li class="list-group-item"><b>Salary : </b> {{ $employee_info->salary }}</li>
                            <li class="list-group-item"><b>Experience : </b> {{ $employee_info->experience }}</li>
                            <li class="list-group-item"><b>Vacation : </b> {{ $employee_info->vacation }}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">

            </div>
        </div>
    </div>
@endsection
