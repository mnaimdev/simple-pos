@extends('admin')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb"
            style="margin-top: 30px; display: flex; justify-content: space-between; align-items: center;">
            <div>
                <a href="{{ route('product') }}" class="btn btn-primary">List</a>

            </div>

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('product') }}">Product</a></li>
                <li class="breadcrumb-item"><a>Inventory</a></li>
            </ol>
        </nav>
    </div>

    <div class="container my-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Inventory of - <span class="badge badge-primary">{{ $product->product_name }}</span></h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('inventory.store') }}" method="POST">
                            @csrf


                            <input type="hidden" name="id" value="{{ $product->id }}">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Branch</label>
                                        <select name="branch_id"
                                            class="form-control @error('branch_id')
                                            is-invalid
                                        @enderror">
                                            <option selected disabled>-- Select Branch --</option>
                                            @foreach ($branches as $branch)
                                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('branch_id')
                                            <strong class="text-danger">
                                                {{ $message }}
                                            </strong>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Quantity</label>
                                        <input type="number" name="quantity"
                                            class="form-control @error('quantity')
                                        is-invalid
                                        @enderror"
                                            placeholder="Quantity">
                                        @error('quantity')
                                            <strong class="text-danger">
                                                {{ $message }}
                                            </strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Colors</label>
                                        <select name="color_id"
                                            class="form-control @error('color_id')
                                            is-invalid
                                        @enderror">
                                            <option selected disabled>-- Select Color --</option>
                                            @foreach ($colors as $color)
                                                <option value="{{ $color->id }}">{{ $color->color_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('color_id')
                                            <strong class="text-danger">
                                                {{ $message }}
                                            </strong>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Sizes</label>
                                        <select name="size_id"
                                            class="form-control @error('size_id')
                                            is-invalid
                                        @enderror">
                                            <option selected disabled>-- Select Size --</option>
                                            @foreach ($sizes as $size)
                                                <option value="{{ $size->id }}">{{ $size->size_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('size_id')
                                            <strong class="text-danger">
                                                {{ $message }}
                                            </strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Add</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
