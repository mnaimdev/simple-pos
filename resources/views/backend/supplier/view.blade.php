@extends('admin')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb"
            style="margin-top: 30px; display: flex; justify-content: space-between; align-items: center;">
            <a href="{{ route('supplier') }}" class="btn btn-info">List</a>

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('supplier') }}">Supplier</a></li>
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
                            <li class="list-group-item"><b>Name : </b> {{ $supplier_info->name }}</li>
                            <li class="list-group-item"><b>Email : </b> {{ $supplier_info->email }}</li>
                            <li class="list-group-item"><b>Phone : </b> {{ $supplier_info->phone }}</li>
                            <li class="list-group-item"><b>Address : </b> {{ $supplier_info->address }}</li>
                            <li class="list-group-item"><b>Country : </b> {{ $supplier_info->country }}</li>
                            <li class="list-group-item"><b>City : </b> {{ $supplier_info->city }}</li>
                            <li class="list-group-item"><b>Shop Name : </b> {{ $supplier_info->shopname }}</li>
                            <li class="list-group-item"><b>Account Holder : </b> {{ $supplier_info->account_holder }}</li>
                            <li class="list-group-item"><b>Account Number : </b> {{ $supplier_info->account_number }}</li>
                            <li class="list-group-item"><b>Bank Name : </b> {{ $supplier_info->bank_name }}</li>
                            <li class="list-group-item"><b>Bank Branch : </b> {{ $supplier_info->bank_branch }}</li>
                            <li class="list-group-item"><b>Supplier Type : </b> {{ $supplier_info->type }}</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
