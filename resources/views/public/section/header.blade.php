<header id="site-header" class="header">
    <div id="header-wrap">
        <div class="container">
            <div class="row">
                <div class="col">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand logo" href="{{ route('home') }}">
                            <img id="logo-img" class="img-fluid" src="{{ asset('assets') }}/images/logo-jatim.png"
                                alt="">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation"> <span></span>
                            <span></span>
                            <span></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item active"> <a class="nav-link" href="{{ route('home') }}">Beranda </a>
                                </li>
                                @foreach ($kategori as $item)
                                <li class="nav-item dropdown has-megamenu">
                                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                        {{ $item->nama }}</a>
                                    <div class="dropdown-menu megamenu" role="menu">
                                        <div class="card-header">
                                            <h5>{{ $item->nama }}</h5>
                                        </div>
                                        <div class="mega_container mt-lg-4">
                                            @foreach ($item->submenu as $submenu)
                                            <div class="card-body">
                                                <a href="{{ route('dynamic.content', $submenu->slug) }}"
                                                    class="mega_wrapper">
                                                    <div class="mega_icon">
                                                        <img width="45px" height="45px"
                                                            src="{{ asset('uploads/' . $submenu->icon) }}" alt="">
                                                    </div>
                                                    <div class="mega_content">
                                                        <h6 class="mb-1">
                                                            <b>
                                                                {{ $submenu->nama }}
                                                            </b>
                                                        </h6>
                                                        <p>
                                                            {{ $submenu->deskripsi }}
                                                        </p>
                                                    </div>
                                                </a>
                                            </div>
                                            @endforeach
                                            {{-- <div class="card-body col-4">
                                                <div class="row">
                                                    <div class="col-2 text-center">

                                                    </div>
                                                    <div class="col-10">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body col-4">
                                                <div class="row">
                                                    <div class="col-2 text-center">

                                                    </div>
                                                    <div class="col-10">

                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                {{-- <li class="navbar-nav ms-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link  dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                        Layanan Publik </a>
                                    <ul class="dropdown-menu dropdown-menu-start">
                                        @foreach ($kategori as $item)
                                        <li><a class="dropdown-item"
                                                href="{{ route('informasi.layanan', Str::slug($item->nama)) }}">{{
                                                $item->nama }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                </li> --}}
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ route('hal.berita') }}">Berita </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ route('rumah-inovasi.login') }}">Rumah Inovasi </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ route('pekppp.login') }}">PEKPPP </a>
                                </li>


                            </ul>
                        </div>
                        <div class="right-nav align-items-center d-flex justify-content-end">
                        </div> <a href="#" class="ht-nav-toggle"><span></span></a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>

<nav id="ht-main-nav"> <a href="#" class="ht-nav-toggle active"><span></span></a>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img class="img-fluid side-logo mb-3" src="{{ asset('assets') }}/images/logo-jatim.png" alt="">
                <p class="mb-5">Portal Jatim</p>
                <div class="form-info">
                    <h4 class="title">Kontak</h4>
                    <ul class="contact-info list-unstyled mt-4">
                        <li class="mb-4"><i class="flaticon-location"></i><span>Alamat:</span>
                            <p>Jl. Pahlawan No. 110 Surabaya</p>
                        </li>
                        <li class="mb-4"><i class="flaticon-call"></i><span>Nomor Telp:</span><a
                                href="tel:+912345678900">031-3533832</a>
                        </li>
                        <li><i class="flaticon-email"></i><span>Email</span><a
                                href="mailto:biro.organisasi@jatimprov.go.id">
                                biro.organisasi@jatimprov.go.id</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>