<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{ asset('/dashboard_assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/dashboard_assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/dashboard_assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/dashboard_assets/css/style.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{ asset('/dashboard_assets/js/modernizr.min.js') }}"></script>

</head>


<body class="account-pages">

    <!-- Begin page -->
    <div class="accountbg"
        style="background: url('{{ asset('/dashboard_assets/images/bg-1.jpg') }}');background-size: cover;"></div>

    <div class="wrapper-page account-page-full">

        <div class="card">
            <div class="card-block">

                <div class="account-box">

                    <div class="card-box p-5">
                        <h2 class="text-uppercase text-center pb-4">
                            <a href="index.html" class="text-success">
                                <span><img src="{{ asset('/dashboard_assets/images/logo.png') }}" alt=""
                                        height="26"></span>
                            </a>
                        </h2>


                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            @if (session('logout'))
                                <div class="alert alert-success">
                                    <strong>{{ session('logout') }}</strong>
                                </div>
                            @endif


                            <div class="form-group m-b-20 row">
                                <div class="col-12">
                                    <label for="email">Email Address</label>
                                    <input
                                        class="form-control @error('email')
                                         is-invalid
                                        @enderror"
                                        name="email" type="email" id="email" required
                                        placeholder="Enter your email" :value="old('email')" autofocus
                                        autocomplete="username">
                                    @error('email')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group m-b-20 row">
                                <div class="col-12">
                                    <label for="password">Password</label>
                                    <input
                                        class="form-control @error('password')
                                                is-invalid
                                        @enderror"
                                        name="password" type="password" id="password" required
                                        placeholder="Enter your password" :value="old('password')" autofocus
                                        autocomplete="username">
                                    @error('password')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>



                            <div class="block mt-4 d-flex justify-content-between">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                        name="remember">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                </label>

                                @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif

                            </div>




                            <div class="form-group row text-center mt-10">
                                <div class="col-12">
                                    <button class="btn btn-block btn-custom waves-effect waves-light"
                                        type="submit">Sign In</button>
                                </div>
                            </div>

                        </form>



                    </div>
                </div>

            </div>
        </div>


    </div>



    <!-- jQuery  -->
    <script src="{{ asset('/dashboard_assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/dashboard_assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('/dashboard_assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/dashboard_assets/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('/dashboard_assets/js/waves.js') }}"></script>
    <script src="{{ asset('/dashboard_assets/js/jquery.slimscroll.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('/dashboard_assets/js/jquery.core.js') }}"></script>
    <script src="{{ asset('/dashboard_assets/js/jquery.app.js') }}"></script>

</body>

</html>
