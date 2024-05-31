<!DOCTYPE html>

<html lang="en" class="light-style layout-wide  customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('backend') }}/" data-template="vertical-menu-template">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @include('admin.includes.head')
    <style>
        body {
            position: relative;
        }

        .login_mockup {
            position: absolute;
            bottom: 0;
            left: 0;
        }

        .cetar_and_bangkit_wrapper img {
            width: 40%;
            aspect-ratio: 3/2;
            object-fit: contain;
        }

        input.form-control {
            height: 3.5rem;
            padding-left: 3.5rem;
            border-left: 0.4rem solid #f4742a;
        }

        .form-control:hover:not([disabled]):not([focus]),
        .input-group:focus-within .form-control,
        .input-group:focus-within .input-group-text,
        .form-control:focus,
        .form-select:focus {
            border-color: #f4742a !important;
        }

        .input_wrapper {
            position: relative;
        }

        .input_wrapper .icon_input {
            position: absolute;
            top: 1.4rem;
            left: 1.5rem;
            margin: auto 0;
            transform: scale(1.2);
        }

        /* #background-video {
            width: 100vw;
            height: 100vh;
            object-fit: cover;
            position: fixed;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            z-index: -1;
        } */

        .authentication-wrapper.authentication-basic .authentication-inner:before,
        .authentication-wrapper.authentication-basic .authentication-inner:after {
            display: none;
        }
    </style>
</head>

<body style="background: url('{{asset('assets/images/login-bg.jpg')}}'); background-size: cover;">
    <div class="login_mockup">
        <img src="{{asset('assets/images/login-mockup.png')}}" alt="mockup">
    </div>
    {{-- <video id="background-video" autoplay loop muted>
        <source src="{{asset('assets/videos/portal-login-background.mp4')}}" type="video/mp4">
    </video> --}}

    <!-- Content -->
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-4">
                <!-- Login -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between cetar_and_bangkit_wrapper">
                            <img src="{{asset('assets/images/cetar.png')}}" alt="cetar" class="img-fluid">
                            <img src="{{asset('assets/images/bangkit.png')}}" alt="bangkit" class="img-fluid">
                        </div>
                        <!-- Logo -->
                        <div class="app-brand justify-content-center mb-4 mt-2">
                            <a href="{{ route('home') }}" class="app-brand-link gap-2">
                                <h4 class="app-brand-text demo text-body fw-bold mb-0 ms-0"
                                    style="color: #f4742a!important; font-size: 2.5rem;">
                                    Portal Jatim
                                </h4>
                            </a>
                        </div>
                        <!-- /Logo -->
                        {{-- <h4 class="mb-1 pt-2">Login</h4>
                        <p class="mb-4">Silahkan Masukan Email dan Password anda</p> --}}
                        @include('admin.includes.alert')
                        <form id="formAuthentication" class="mb-3" action="{{ route('portal.postLogin') }}"
                            method="POST">
                            @csrf
                            <div class="mb-3 input_wrapper">
                                <i class="fa-regular fa-envelope icon_input"></i>
                                {{-- <label for="email" class="form-label">Email </label> --}}
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Masukan email" autofocus>
                            </div>
                            <div class="mb-3 input_wrapper form-password-toggle">
                                <i class="fa-solid fa-key icon_input"></i>
                                {{-- <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                </div> --}}
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mt-5">
                                <button class="btn" style="background-color: #f4742a; color: #fff;" type="submit">
                                    <i class="fa-solid fa-right-to-bracket me-2"></i> LOG IN
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.includes.javascript')
</body>

</html>