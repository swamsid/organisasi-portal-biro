<!--== theme -->
<script src="{{ asset('assets') }}/js/theme.js"></script>

<!--== magnific-popup -->
<script src="{{ asset('assets') }}/js/magnific-popup/jquery.magnific-popup.min.js"></script>

<!--== owl-carousel -->
<script src="{{ asset('assets') }}/js/owl-carousel/owl.carousel.min.js"></script>

<!--== counter -->
<script src="{{ asset('assets') }}/js/counter/counter.js"></script>

<!--== countdown -->
<script src="{{ asset('assets') }}/js/countdown/jquery.countdown.min.js"></script>

<!--== isotope -->
<script src="{{ asset('assets') }}/js/isotope/isotope.pkgd.min.js"></script>

<!--== mouse-parallax -->
<script src="{{ asset('assets') }}/js/mouse-parallax/tweenmax.min.js"></script>
<script src="{{ asset('assets') }}/js/mouse-parallax/jquery-parallax.js"></script>

<!--== wow -->
<script src="{{ asset('assets') }}/js/wow.min.js"></script>

<!--== theme-script -->
<script src="{{ asset('assets') }}/js/theme-script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    @if (session()->has('danger'))
        Swal.fire({
            icon: 'error',
            title: "Eror!",
            text: '{{ session()->get('danger') }}',
        });
    @endif
</script>
@stack('js')
