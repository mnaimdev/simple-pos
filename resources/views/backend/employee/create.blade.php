@extends('admin')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb"
            style="margin-top: 30px; display: flex; justify-content: space-between; align-items: center;">
            <a href="{{ route('employee') }}" class="btn btn-info">List</a>

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('employee') }}">Employee</a></li>
                <li class="breadcrumb-item"><a>Create</a></li>
            </ol>
        </nav>
    </div>

    <div class="container my-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Create Employee</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Name</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name')
                                            is-invalid
                                        @enderror"
                                            value="{{ old('name') }}">
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
                                            value="{{ old('email') }}">
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
                                            value="{{ old('phone') }}">
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
                                            value="{{ old('address') }}">
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
                                            value="{{ old('country') }}">
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
                                            value="{{ old('city') }}">
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
                                        <label>Salary</label>
                                        <input type="number" name="salary"
                                            class="form-control @error('salary')
                                            is-invalid
                                        @enderror"
                                            value="{{ old('salary') }}">
                                        @error('salary')
                                            <strong class="text-danger my-1">
                                                {{ $message }}
                                            </strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Experience</label>
                                        <select name="experience"
                                            class="form-control @error('experience')
                                            is-invalid
                                        @enderror">
                                            <option selected disabled>-- Select Experience --</option>
                                            <option @if (old('experience') == 1) selected="selected" @endif
                                                value="1">1 Year</option>
                                            <option @if (old('experience') == 2) selected="selected" @endif
                                                value="2">2 Year</option>
                                            <option @if (old('experience') == 3) selected="selected" @endif
                                                value="3">3 Year
                                            </option>
                                            <option @if (old('experience') == 4) selected="selected" @endif
                                                value="4">4 Year
                                            </option>
                                            <option @if (old('experience') == 5) selected="selected" @endif
                                                value="5">5 Year
                                            </option>
                                        </select>
                                        @error('experience')
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
                                            <img src="" id="blah" width="100" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Vacation</label>
                                        <input type="text" name="vacation"
                                            class="form-control @error('vacation')
                                            is-invalid
                                        @enderror"
                                            value="{{ old('vacation') }}">
                                        @error('vacation')
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
