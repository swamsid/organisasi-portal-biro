<!DOCTYPE html>

<html lang="en" class="light-style layout-wide  customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('backend') }}/" data-template="vertical-menu-template">

<head>
    <title>Login PEKPPP</title>
    @include('admin.includes.head')
    <style>
        .bnr-imga img {
            width: 40%;
        }

        /* Media query for smaller screens */
        @media (max-width: 767px) {
            .bnr-imga img {
                width: 100%;
                margin-left: 10px;
            }
        }
    </style>
</head>

<body>
    <!-- Content -->
    <div class="authentication-wrapper authentication-cover authentication-bg">
        <div class="authentication-inner row">
            <!-- /Left Text -->
            <div class="d-none d-lg-flex col-lg-7 p-0">
                <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
                    <img src="{{ asset('assets/images/gubernur.png') }}" alt="auth-login-cover"
                        class="img-fluid my-5 auth-illustration">
                </div>
            </div>
            <!-- /Left Text -->

            <!-- Login -->
            <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
                <div class="w-px-400 mx-auto">
                    <!-- Logo -->
                    <div class="app-brand mb-4">
                        <a href="index.html" class="app-brand-link gap-2">
                            <div class="row">
                                <div class="col-6">
                                    <div class="bnr-imga animated fadeInRight delay-4 duration-4 text-end">
                                        <img class="img-fluid" src="{{ asset('assets') }}/images/cetar.png" alt="">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="bnr-imga animated fadeInRight delay-4 duration-4 text-start">
                                        <img class="img-fluid" src="{{ asset('assets') }}/images/bangkit.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h3 class="mb-1">PEKPPP</h3>
                    <p class="mb-4">Silahkan masukan email / password anda</p>

                    <form id="formAuthentication" class="mb-3" action="{{ route('pekppp.postLogin') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Masukan email"
                                autofocus>
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember-me">
                                <label class="form-check-label" for="remember-me">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <button class="btn btn-primary d-grid w-100">
                            Sign in
                        </button>
                    </form>
                </div>
            </div>
            <!-- /Login -->
        </div>
    </div>

    @include('admin.includes.javascript')
</body>

</html>