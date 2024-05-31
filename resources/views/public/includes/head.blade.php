<meta charset="utf-8">
<meta name="keywords" content="portal jatim,biro organisasi, jatim, jatim prov" />
<meta name="description" content="Portal organisasi" />
<meta name="author" content="scopmtec" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Title -->
<title>Portal Jatim</title>

<!-- favicon icon -->
<link rel="shortcut icon" href="{{ asset('assets') }}/images/logo-jatim.png" />

<!-- inject css start -->

<!--== bootstrap -->
<link href="{{ asset('assets') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<!--== animate -->
<link href="{{ asset('assets') }}/css/animate.css" rel="stylesheet" type="text/css" />

<!--== fontawesome -->
<link href="{{ asset('assets') }}/css/fontawesome-all.css" rel="stylesheet" type="text/css" />

<!--== themify -->
<link href="{{ asset('assets') }}/css/themify-icons.css" rel="stylesheet" type="text/css" />

<!--== magnific-popup -->
<link href="{{ asset('assets') }}/css/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />

<!--== owl-carousel -->
<link href="{{ asset('assets') }}/css/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css" />

<!--== spacing -->
<link href="{{ asset('assets') }}/css/spacing.css" rel="stylesheet" type="text/css" />

<!--== base -->
<link href="{{ asset('assets') }}/css/base.css" rel="stylesheet" type="text/css" />

<!--== shortcodes -->
<link href="{{ asset('assets') }}/css/shortcodes.css" rel="stylesheet" type="text/css" />

<!--== default-theme -->
<link href="{{ asset('assets') }}/css/style.css" rel="stylesheet" type="text/css" />

<!--== responsive -->
<link href="{{ asset('assets') }}/css/responsive.css" rel="stylesheet" type="text/css" />

<style>
    .navbar-nav .megamenu {
        padding: 1rem;
    }

    /* ============ desktop view ============ */
    @media all and (min-width: 992px) {

        .navbar-nav .has-megamenu {
            position: static !important;
        }

        .navbar-nav .megamenu {
            left: 0;
            right: 0;
            width: 100%;
            margin-top: 0;
        }

    }

    /* ============ desktop view .end// ============ */

    /* ============ mobile view ============ */
    @media(max-width: 991px) {

        .navbar.fixed-top .navbar-collapse,
        .navbar.sticky-top .navbar-collapse {
            overflow-y: auto;
            max-height: 90vh;
            margin-top: 10px;
        }
    }

    div.row.g-3.mt-lg-2 {
        margin-left: 0.3rem;
    }

    .cases-item img {
        aspect-ratio: 3/2 !important;
        object-fit: contain !important;
    }

    .card-body {
        flex: unset !important;
    }

    .dropdown-menu.megamenu.show {
        overflow-y: scroll;
        max-height: 65vh;
    }

    .mega_container {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 1rem;
    }

    .mega_wrapper {
        display: flex;
        gap: 1rem;
    }

    .mega_icon img {
        width: 50px;
        height: 50px;
        aspect-ratio: 2/3;
        object-fit: contain;
    }

    .mega_content h6 {
        font-size: 1rem;
    }

    .mega_content p {
        font-size: 0.7rem;
        line-height: 1rem;
        color: #000;
        text-align: justify;
    }

    @media (max-width: 575.98px) {
        .dropdown-menu.megamenu.show {
            overflow-y: auto;
            max-height: unset;
        }

        .mega_container {
            grid-template-columns: 1fr;
        }

        .ht-nav-toggle,
        .mega_icon,
        .mega_content p {
            display: none !important;
        }

        .mega_content h6 {
            font-size: 0.8rem;
            /* margin: 0 1rem; */
            color: #4b5563;
        }
    }
</style>
@stack('css')