<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themeht.com/template/loptus/ltr/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Oct 2023 06:28:50 GMT -->

<head>

    <!-- inject head start -->
    @include('public.includes.head')
    <!-- inject head end -->

</head>

<body>

    <!-- page wrapper start -->

    <div class="page-wrapper">

        <!-- preloader start -->

        {{-- <div id="ht-preloader">
            <div class="loader clear-loader">
                <div class="loader-text">Loading</div>
                <div class="loader-dots"> <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div> --}}

        <!-- preloader end -->


        <!--header start-->
        @include('public.section.header', [
            'kategori' => \App\Models\Menu::all()
        ])
        <!--header end-->


        @yield('content')

        <!--footer start-->

        <footer class="footer white-bg z-index-1 overflow-hidden bg-contain"
            data-bg-img="{{ asset('assets') }}/images/pattern/01.png">
            @include('public.section.footer')
        </footer>

        <!--footer end-->


    </div>

    <!-- page wrapper end -->


    <!--back-to-top start-->

    <div class="scroll-top"><a class="smoothscroll" href="#top"><i class="flaticon-upload"></i></a></div>

    <!--back-to-top end-->


    <!-- inject js start -->
    @include('public.includes.javascript')
    <!-- inject js end -->

</body>

</html>
