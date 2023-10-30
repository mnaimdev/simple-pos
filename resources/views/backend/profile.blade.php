@extends('admin')


@section('content')
    <div class="container mt-5">
        <div class="row">


            <div class="col-lg-4 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3>Login Info</h3>
                    </div>
                    <div class="card-body">
                        @if (Auth::user()->photo == '')
                            <img src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" />
                        @else
                            <img src="{{ asset('/uploads/user') }}/{{ Auth::user()->photo }}" alt=""
                                class="rounded-circle" width="50" height="50">
                        @endif

                        <h5>Name: {{ Auth::user()->name }}</h5>
                        <h5>Email: {{ Auth::user()->email }}</h5>
                        <h5>Phone: {{ Auth::user()->phone == '' ? 'NA' : Auth::user()->phone }}</h5>
                    </div>
                </div>
            </div>


            <div class="col-lg-8 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3>Update Profile Info</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update.info') }}" method="POST" enctype="multipart/form-data">
                            @csrf



                            <div class="form-group mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                            </div>


                            <div class="form-group mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                            </div>


                            <div class="form-group mb-3">
                                <label>Phone Number</label>
                                <input type="text" name="phone" class="form-control" value="{{ Auth::user()->phone }}">
                            </div>


                            <div class="form-group mb-3">
                                <label>Photo</label>
                                <input type="file" name="photo" class="form-control"
                                    onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">

                                <img id="blah" width="100" class="mt-3" />
                            </div>


                            <div class="form-group mb-3">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>



                <div class="card mt-3">
                    <div class="card-header">
                        <h3>Update Password</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update.password') }}" method="POST">
                            @csrf



                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Current Password">
                            </div>


                            <div class="form-group">
                                <input type="password" name="new_password" class="form-control" placeholder="New Password">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
