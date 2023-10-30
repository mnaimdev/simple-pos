@extends('admin')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb"
            style="margin-top: 30px; display: flex; justify-content: space-between; align-items: center;">
            <a href="{{ route('category') }}" class="btn btn-info">List</a>

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('category') }}">Category</a></li>
                <li class="breadcrumb-item"><a>Edit</a></li>
            </ol>
        </nav>
    </div>

    <div class="container my-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Category</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('category.update') }}" method="POST">
                            @csrf

                            <input type="hidden" name="id" value="{{ $category->id }}">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label>Category Name</label>
                                        <input type="text" name="category_name"
                                            class="form-control @error('category_name')
                                            is-invalid
                                        @enderror"
                                            value="{{ $category->category_name }}">
                                        @error('category_name')
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
