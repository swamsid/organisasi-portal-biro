<meta charset="utf-8" />
<meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

<meta name="description" content="Start your development with a Dashboard for Bootstrap 5" />
<meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
<meta name="csrf-token" content="{{ csrf_token() }}" />

<!-- Canonical SEO -->
<link rel="canonical" href="https://1.envato.market/vuexy_admin">


<!-- ? PROD Only: Google Tag Manager (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
<script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            '../../../../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-5J3LMKC');
</script>
<!-- End Google Tag Manager -->

<!-- Favicon -->
<link rel="icon" type="image/x-icon"
    href="https://demos.pixinvent.com/vuexy-html-admin-template/assets/img/favicon/favicon.ico" />

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com/">
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap"
    rel="stylesheet">

<!-- Icons -->
<link rel="stylesheet" href="{{ asset('backend') }}/vendor/fonts/fontawesome.css" />
<link rel="stylesheet" href="{{ asset('backend') }}/vendor/fonts/tabler-icons.css" />
<link rel="stylesheet" href="{{ asset('backend') }}/vendor/fonts/flag-icons.css" />

<!-- Core CSS -->
<link rel="stylesheet" href="{{ asset('backend') }}/vendor/css/rtl/core.css" class="template-customizer-core-css" />
<link rel="stylesheet" href="{{ asset('backend') }}/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
<link rel="stylesheet" href="{{ asset('backend') }}/css/demo.css" />

<!-- Vendors CSS -->
<link rel="stylesheet" href="{{ asset('backend') }}/vendor/libs/node-waves/node-waves.css" />
<link rel="stylesheet" href="{{ asset('backend') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
<link rel="stylesheet" href="{{ asset('backend') }}/vendor/libs/typeahead-js/typeahead.css" />
<link rel="stylesheet" href="{{ asset('backend') }}/vendor/libs/apex-charts/apex-charts.css" />
<link rel="stylesheet" href="{{ asset('backend') }}/vendor/libs/swiper/swiper.css" />
<link rel="stylesheet" href="{{ asset('backend') }}/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
<link rel="stylesheet" href="{{ asset('backend') }}/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">
<link rel="stylesheet" href="{{ asset('backend') }}/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css">
<link rel="stylesheet" href="{{ asset('backend') }}/vendor/libs/@form-validation/umd/styles/index.min.css" />
<link rel="stylesheet" href="{{ asset('backend') }}/vendor/libs/select2/select2.css" />
<link rel="stylesheet" href="{{ asset('backend') }}/vendor/libs/tagify/tagify.css" />
<link rel="stylesheet" href="{{ asset('backend') }}/vendor/libs/bootstrap-select/bootstrap-select.css" />
<link rel="stylesheet" href="{{ asset('backend') }}/vendor/libs/animate-css/animate.css" />
<link rel="stylesheet" href="{{ asset('backend') }}/vendor/libs/sweetalert2/sweetalert2.css" />

<link rel="stylesheet" href="{{ asset('backend') }}/vendor/fonts/materialdesignicons.css" />
<link rel="stylesheet" href="{{ asset('backend') }}/vendor/fonts/flag-icons.css" />


<!-- Page CSS -->
<link rel="stylesheet" href="{{ asset('backend') }}/vendor/css/pages/cards-advance.css" />
<link rel="stylesheet" href="{{ asset('backend') }}/vendor/css/pages/page-auth.css">

<!-- Helpers -->
<script src="{{ asset('backend') }}/vendor/js/helpers.js"></script>
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="{{ asset('backend') }}/js/config.js"></script>



@stack('css')
