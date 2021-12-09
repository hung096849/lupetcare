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
                        <h1 class="title w-100">Đăng nhập</h1>
                        <form class="w-100" method="POST" action="{{ route('backend.auth.login') }}">
                            @csrf
                            <!-- Email input -->
                            <div class="form-outline mb-4">

                                <input type="text" placeholder="Email" id="email" class="form-control form-control-lg"
                                    name="email">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <!-- Password input -->
                            <div class="form-outline mb-3">
                                <input type="password" placeholder="Mật khẩu" id="password"
                                    class="form-control form-control-lg" name="password">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Checkbox -->
                                <div class="form-check mb-0">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                    <label class="form-check-label" for="form2Example3">
                                        Ghi nhớ
                                    </label>
                                </div>
                                <a href="#!" class="text-body">Đổi mật khẩu</a>
                            </div>

                            <div class="text-center text-lg-start mt-4 pt-2">
                                <button type="submit" class="btn btn-primary btn-lg"
                                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Đăng Nhập</button>
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
