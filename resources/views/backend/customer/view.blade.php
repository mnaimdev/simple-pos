@extends('admin')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb"
            style="margin-top: 30px; display: flex; justify-content: space-between; align-items: center;">
            <a href="{{ route('customer') }}" class="btn btn-info">List</a>

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('customer') }}">Customer</a></li>
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
                            <li class="list-group-item"><b>Name : </b> {{ $customer_info->name }}</li>
                            <li class="list-group-item"><b>Email : </b> {{ $customer_info->email }}</li>
                            <li class="list-group-item"><b>Phone : </b> {{ $customer_info->phone }}</li>
                            <li class="list-group-item"><b>Address : </b> {{ $customer_info->address }}</li>
                            <li class="list-group-item"><b>Country : </b> {{ $customer_info->country }}</li>
                            <li class="list-group-item"><b>City : </b> {{ $customer_info->city }}</li>
                            <li class="list-group-item"><b>Shop Name : </b> {{ $customer_info->shopname }}</li>
                            <li class="list-group-item"><b>Account Holder : </b> {{ $customer_info->account_holder }}</li>
                            <li class="list-group-item"><b>Account Number : </b> {{ $customer_info->account_number }}</li>
                            <li class="list-group-item"><b>Bank Name : </b> {{ $customer_info->bank_name }}</li>
                            <li class="list-group-item"><b>Bank Branch : </b> {{ $customer_info->bank_branch }}</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
