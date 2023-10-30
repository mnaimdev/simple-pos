@extends('admin')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb"
            style="margin-top: 30px; display: flex; justify-content: space-between; align-items: center;">
            <a href="{{ route('product') }}" class="btn btn-info">List</a>

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('product') }}">Product</a></li>
                <li class="breadcrumb-item"><a>Create</a></li>
            </ol>
        </nav>
    </div>

    <div class="container my-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Create Product</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Product Name</label>
                                        <input type="text" name="product_name"
                                            class="form-control @error('product_name')
                                            is-invalid
                                        @enderror"
                                            value="{{ old('product_name') }}">
                                        @error('product_name')
                                            <strong class="text-danger my-1">
                                                {{ $message }}
                                            </strong>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Product Garage</label>
                                        <input type="number" name="product_garage"
                                            class="form-control @error('product_garage')
                                            is-invalid
                                        @enderror"
                                            value="{{ old('product_garage') }}">
                                        @error('product_garage')
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
                                        <label>Supplier</label>
                                        <select name="supplier_id" class="form-control">
                                            <option selected disabled>-- Select Supplier --</option>
                                            @foreach ($suppliers as $supplier)
                                                <option @if (old('supplier_id') == $supplier->id) selected="selected" @endif
                                                    value="{{ $supplier->id }}">{{ $supplier->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('supplier_id')
                                            <strong class="text-danger my-1">
                                                {{ $message }}
                                            </strong>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Category</label>
                                        <select name="category_id" class="form-control">
                                            <option selected disabled>-- Select Category --</option>
                                            @foreach ($categories as $category)
                                                <option @if (old('category_id') == $category->id) selected="selected" @endif
                                                    value="{{ $category->id }}">{{ $category->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
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
                                        <label>Buying Date</label>
                                        <input type="date" name="buying_date"
                                            class="form-control @error('buying_date')
                                            is-invalid
                                        @enderror"
                                            value="{{ old('buying_date') }}">
                                        @error('buying_date')
                                            <strong class="text-danger my-1">
                                                {{ $message }}
                                            </strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Expire Date</label>
                                        <input type="date" name="expire_date"
                                            class="form-control @error('expire_date')
                                           is-invalid
                                       @enderror"
                                            value="{{ old('expire_date') }}">
                                        @error('expire_date')
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
                                        <label>Buying Price</label>
                                        <input type="number" name="buying_price"
                                            class="form-control @error('buying_price')
                                            is-invalid
                                        @enderror"
                                            value="{{ old('buying_price') }}">
                                        @error('buying_price')
                                            <strong class="text-danger my-1">
                                                {{ $message }}
                                            </strong>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Selling Price</label>
                                        <input type="number" name="selling_price"
                                            class="form-control @error('selling_price')
                                            is-invalid
                                        @enderror"
                                            value="{{ old('selling_price') }}">
                                        @error('selling_price')
                                            <strong class="text-danger my-1">
                                                {{ $message }}
                                            </strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label>Product Image</label>
                                        <input type="file" name="product_image"
                                            class="form-control @error('product_image')
                                            is-invalid
                                        @enderror"
                                            onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                        @error('product_image')
                                            <strong class="text-danger my-1">
                                                {{ $message }}
                                            </strong>
                                        @enderror
                                        <div class="my-1">
                                            <img src="" id="blah" width="100" alt="">
                                        </div>
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
