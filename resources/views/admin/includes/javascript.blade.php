    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="{{ asset('backend') }}/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('backend') }}/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('backend') }}/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('backend') }}/vendor/libs/node-waves/node-waves.js"></script>
    <script src="{{ asset('backend') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ asset('backend') }}/vendor/libs/hammer/hammer.js"></script>
    <script src="{{ asset('backend') }}/vendor/libs/i18n/i18n.js"></script>
    <script src="{{ asset('backend') }}/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="{{ asset('backend') }}/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('backend') }}/vendor/libs/swiper/swiper.js"></script>
    <script src="{{ asset('backend') }}/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="{{ asset('backend') }}/vendor/libs/@form-validation/umd/bundle/popular.min.js"></script>
    <script src="{{ asset('backend') }}/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js"></script>
    <script src="{{ asset('backend') }}/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js"></script>
    <script src="{{ asset('backend') }}/vendor/libs/select2/select2.js"></script>
    <script src="{{ asset('backend') }}/vendor/libs/sweetalert2/sweetalert2.js"></script>
    <script src="{{ asset('backend') }}/vendor/libs/tagify/tagify.js"></script>

    <!-- Main JS -->
    <script src="{{ asset('backend') }}/js/main.js"></script>


    <!-- Page JS -->
    <script src="{{ asset('backend') }}/js/dashboards-analytics.js"></script>
    <script src="{{ asset('backend') }}/js/pages-auth.js"></script>
    <script src="{{ asset('backend') }}/js/forms-selects.js"></script>
    <script src="{{ asset('backend') }}/js/forms-tagify.js"></script>
    <script src="{{ asset('backend') }}/js/forms-typeahead.js"></script>
    <script src="{{ asset('backend') }}/js/extended-ui-sweetalert2.js"></script>    

    <script>
        $('#zero_config1').dataTable({
        });
    </script>

    @stack('js')


    <!-- Mirrored from demos.pixinvent.com/vuexy-html-admin-template/html/vertical-menu-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Oct 2023 07:03:12 GMT -->
