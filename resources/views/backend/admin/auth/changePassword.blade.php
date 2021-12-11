<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lupet Spa</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('backend.includes.style')
</head>

<body>

    <body class="scrollstyle1">
        <section class="vh-100">
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-9 col-lg-6 col-xl-5 m-5">
                        <img src="{{ asset('frontend/images/img-new_service.png ') }}" alt="" class="w-100"
                            srcset="" class="img-fluid">
                    </div>
                    <div class="col-md-8 col-lg-6 col-xl-4 ">
                        <h1 class="title w-100">Đổi mật khẩu</h1>
                        <form class="w-100" method="POST" action="{{ route('backend.auth.postchangePassword') }}">
                            @csrf
                            <!-- Password input -->
                            <div class="form-outline mb-3">
                                <input type="password" placeholder="Password" id="password"
                                    class="form-control form-control-lg" name="password" >
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            @if (session('msg'))
                            <span class="text-danger"> {{session('msg')  }}</span>
                            @endif
                            <!--New Password input -->
                            <div class="form-outline mb-3">
                                <input type="password" placeholder="newpassword" id="newpassword"
                                    class="form-control form-control-lg" name="newpassword" >
                                @if ($errors->has('newpassword'))
                                    <span class="text-danger">{{ $errors->first('newpassword') }}</span>
                                @endif
                            </div>
                            <!--Confirm new Password input -->
                            <div class="form-outline mb-3">
                                <input type="password" placeholder="comfirm-password" id="comfirm-password"
                                    class="form-control form-control-lg" name="comfirm-password">
                                @if ($errors->has('comfirm-password'))
                                    <span class="text-danger">{{ $errors->first('comfirm-password') }}</span>
                                @endif
                            </div>
                            <div class="text-center text-lg-start mt-4 pt-2">
                                <button type="submit" class="btn btn-primary btn-lg"
                                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Đổi mật khẩu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>
        @include('backend.includes.footer')
        @include('backend.includes.script')
        @yield('js')

    </body>


</html>
