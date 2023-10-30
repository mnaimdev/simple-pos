@extends('admin')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb"
            style="margin-top: 30px; display: flex; justify-content: space-between; align-items: center;">
            <a href="{{ route('customer') }}" class="btn btn-info">List</a>

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('customer') }}">Customer</a></li>
                <li class="breadcrumb-item"><a>Edit</a></li>
            </ol>
        </nav>
    </div>

    <div class="container my-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Customer</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('customer.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $customer_info->id }}">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Name</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name')
                                            is-invalid
                                        @enderror"
                                            value="{{ $customer_info->name }}">
                                        @error('name')
                                            <strong class="text-danger my-1">
                                                {{ $message }}
                                            </strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Email</label>
                                        <input type="email" name="email"
                                            class="form-control @error('email')
                                            is-invalid
                                        @enderror"
                                            value="{{ $customer_info->email }}">
                                        @error('email')
                                            <strong class="text-danger my-1">
                                                {{ $message }}
                                            </strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Phone</label>
                                        <input type="text" name="phone"
                                            class="form-control @error('phone')
                                            is-invalid
                                        @enderror"
                                            value="{{ $customer_info->phone }}">
                                        @error('phone')
                                            <strong class="text-danger my-1">
                                                {{ $message }}
                                            </strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Address</label>
                                        <input type="text" name="address"
                                            class="form-control @error('address')
                                            is-invalid
                                        @enderror"
                                            value="{{ $customer_info->address }}">
                                        @error('address')
                                            <strong class="text-danger my-1">
                                                {{ $message }}
                                            </strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>country</label>
                                        <input type="text" name="country"
                                            class="form-control @error('country')
                                            is-invalid
                                        @enderror"
                                            value="{{ $customer_info->country }}">
                                        @error('country')
                                            <strong class="text-danger my-1">
                                                {{ $message }}
                                            </strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>City</label>
                                        <input type="text" name="city"
                                            class="form-control @error('city')
                                            is-invalid
                                        @enderror"
                                            value="{{ $customer_info->city }}">
                                        @error('city')
                                            <strong class="text-danger my-1">
                                                {{ $message }}
                                            </strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Shop Name</label>
                                        <input type="text" name="shopname"
                                            class="form-control @error('shopname')
                                            is-invalid
                                        @enderror"
                                            value="{{ $customer_info->shopname }}">
                                        @error('shopname')
                                            <strong class="text-danger my-1">
                                                {{ $message }}
                                            </strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Account Holder</label>
                                        <input type="text" name="account_holder"
                                            class="form-control @error('account_holder')
                                           is-invalid
                                       @enderror"
                                            value="{{ $customer_info->account_holder }}">
                                        @error('account_holder')
                                            <strong class="text-danger my-1">
                                                {{ $message }}
                                            </strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Account Number</label>
                                        <input type="number" name="account_number"
                                            class="form-control @error('account_number')
                                            is-invalid
                                        @enderror"
                                            value="{{ $customer_info->account_number }}">
                                        @error('account_number')
                                            <strong class="text-danger my-1">
                                                {{ $message }}
                                            </strong>
                                        @enderror

                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Bank Name</label>
                                        <input type="text" name="bank_name"
                                            class="form-control @error('bank_name')
                                            is-invalid
                                        @enderror"
                                            value="{{ $customer_info->bank_name }}">
                                        @error('bank_name')
                                            <strong class="text-danger my-1">
                                                {{ $message }}
                                            </strong>
                                        @enderror

                                    </div>
                                </div>

                            </div>



                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Image</label>
                                        <input type="file" name="image"
                                            class="form-control @error('image')
                                            is-invalid
                                        @enderror"
                                            onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                        @error('image')
                                            <strong class="text-danger my-1">
                                                {{ $message }}
                                            </strong>
                                        @enderror
                                        <div class="my-1">
                                            <img src="{{ asset('/uploads/customer') }}/{{ $customer_info->image }}"
                                                id="blah" width="100" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Bank Branch</label>
                                        <input type="text" name="bank_branch"
                                            class="form-control @error('bank_branch')
                                            is-invalid
                                        @enderror"
                                            value="{{ $customer_info->bank_branch }}">
                                        @error('bank_branch')
                                            <strong class="text-danger my-1">
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
