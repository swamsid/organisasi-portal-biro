@extends('public.app')
@push('css')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<style>
    body {
        position: relative;
    }

    .landing_statistic {
        display: flex;
        position: fixed;
        top: 20%;
        left: -20rem;
        border-radius: 0.5rem;
        padding: 1rem;
        background-color: #1565C0;
        z-index: 99;
    }

    .landing_statistic.open {
        left: 0 !important;
    }

    .landing_statistic .content h2 {
        font-size: 1.2rem;
        color: #fff;
        margin-bottom: 0;
    }

    .landing_statistic .content p {
        font-size: 0.8rem;
        color: #fff;
    }

    .landing_statistic .content .card_statistic {
        background-color: #0D47A1;
        border-radius: 0.5rem;
        padding: 1.5rem;
    }

    .landing_statistic .content .card_statistic img {
        background-color: #1565C0;
        padding: 0.5rem;
        border-radius: 0.5rem;
    }

    .landing_statistic .content .card_statistic h3 {
        font-size: 1rem;
        color: #fff;
    }

    .landing_statistic .content .card_statistic h1 {
        font-size: 2.5rem;
        color: #fff;
        font-weight: 500;
    }

    .landing_statistic .content .card_statistic .badge_statistic {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        width: fit-content;
        background-color: #1565C0;
        padding: 0 0.5rem;
        border-radius: 0.5rem;
    }

    .landing_statistic .content .card_statistic .badge_statistic .circle_green {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background-color: #22c55e;
    }

    .landing_statistic .content .card_statistic .badge_statistic h3 {
        font-size: 0.8rem;
        color: #fff;
    }

    .landing_statistic .toggle_button {
        position: absolute;
        right: -7rem;
        top: 15rem;
        background-color: #1565C0;
        padding: 0 1rem;
        transform: rotate(90deg);
        border-top-right-radius: 1rem;
        border-top-left-radius: 1rem;
        z-index: -1;
    }

    .landing_statistic .toggle_button:hover {
        cursor: pointer;
    }

    .landing_statistic .toggle_button h1 {
        font-size: 0.8rem;
        color: #fff;
        transform: rotate(180deg);
    }

    .bnr-imga img {
        width: 40%;
    }

    .submenu_logo_container img {
        width: 5rem;
        height: 5rem;
        border-radius: 50%;
        object-fit: cover;
        aspect-ratio: 2/3;
    }

    .page-content {
        margin-top: 10rem;
    }

    .post-image img {
        height: 15rem !important;
        aspect-ratio: 2/3;
        object-fit: cover;
    }

    .pagination .small.text-muted {
        margin-bottom: 0 !important;
    }

    .post .post-desc {
        padding: 30px 30px 30px !important;
    }

    .post-author {
        position: relative !important;
        left: 0 !important;
        bottom: 0 !important;
        /* display: grid;
        grid-template-columns: 1fr 3fr;
        align-items: center; */
    }

    .post-date {
        font-size: 0.8rem !important;
    }

    .post-created-by {
        width: fit-content;
        background-color: rgba(103, 103, 108, 0.2);
        padding: 0.4rem;
        border-radius: 5px;
        margin-bottom: 0.5rem;
        font-weight: 500;
        font-size: 0.7rem !important;
    }

    /* Media query for smaller screens */
    @media (max-width: 767px) {
        .bnr-imga img {
            width: 100%;
            margin-left: 10px;
        }

        .landing_statistic .toggle_button {
            right: -6rem;
        }
    }
</style>
@endpush
@section('content')
<div class="landing_statistic" x-data="{ open: false }" x-bind:class="open ? 'open' : ''">
    <div class="content">
        <h2>Statistik kunjungan</h2>
        <p>Perhitungan jumlah kunjungan website</p>
        <div class="card_statistic mb-3">
            <img src="https://jabarprov.go.id/icons/three-people.svg" alt="three-people">
            <h3>Total Visitor</h3>
            <h1>{{number_format($visit_visitor_count)}}</h1>
            {{-- <div class="badge_statistic">
                <div class="circle_green"></div>
                <h3>9 Online</h3>
            </div> --}}
        </div>
        <div class="card_statistic">
            <img src="https://jabarprov.go.id/icons/chart.svg" alt="chart">
            <h3>Total View</h3>
            <h1>{{number_format($visit_visitor_view_count)}}</h1>
        </div>
    </div>
    <div class="toggle_button" x-on:click="open = ! open">
        <h1>Statistik Kunjungan</h1>
    </div>
</div>

<!--hero section start-->
<section class="fullscreen-banner p-0 banner overflow-hidden" data-bg-img="{{ asset('assets') }}/images/pattern/01.png">
    <div class="insideText">Portal Jatim</div>
    <div class="align-center">
        <div class="container mb-3">
            <div class="col-lg-12 col-md-12 order-lg-1">
                <div class="mouse-parallax">
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
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-12 order-lg-1 position-relative">
                    <div class="mouse-parallax">
                        <div class="bnr-img1 animated fadeInRight delay-4 duration-4">
                            <img class="img-fluid rotateme" src="{{ asset('assets') }}/images/banner/01.png" alt="">
                        </div>
                        <img class="img-fluid bnr-img2 animated zoomIn delay-5 duration-4"
                            src="{{ asset('assets/images/gubernur.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 mt-5 mt-lg-0">
                    {{-- <h1 class="mb-4 animated bounceInLeft delay-2 duration-4">Portal Jatim</h1> --}}
                    <h1 class="mb-4 animated bounceInLeft delay-2 duration-4"><span class="font-w-5">Portal
                            Jatim</span> MENJAWAB KEBUTUHAN INFORMASI PUBLIK WARGA JAWA TIMUR</h1>
                    <p class="lead animated fadeInUp delay-3 duration-4">Temukan informasi publik terkini dari
                        Pemerintah Daerah Provinsi Jawa Timur</p>
                    {{-- <div class="d-flex align-items-center animated fadeInUp delay-4 duration-5"> <a
                            class="btn btn-theme" href="#"><span>Learn More</span></a>
                        <a class="play-btn popup-youtube ms-4 d-flex align-items-center"
                            href="https://www.youtube.com/watch?v=P_wKDMcr1Tg"><span>Play Now</span><img
                                class="img-fluid pulse radius-4" src="{{ asset('assets') }}/images/play.png" alt=""></a>
                    </div> --}}
                    <div class="align-items-center animated fadeInUp delay-4 duration-5">
                        <div class="widget-search">
                            <form action="{{ route('cari.berita') }}" class="form-inline form">
                                <div class="widget-searchbox">
                                    <button type="submit" class="search-btn"> <i class="fas fa-search"></i>
                                    </button>
                                    <input type="text" name="keyword" placeholder="Search Here..." class="form-control">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<!--hero section end-->


<!--body content start-->

<div class="page-content">

    <!--feature start-->
    <section data-bg-img="{{ asset('assets') }}/images/pattern/02.png">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-8 col-md-12 ms-auto me-auto">
                    <div class="section-title">
                        <h2 class="title">Kategori Pelayanan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($kategori as $item)
                @foreach ($item->submenu as $submenu)
                <div class="col-lg-3 col-md-6" data-toggle="tooltip" data-placement="top" title="{{ $submenu->nama }}">
                    <div class="featured-item style-4">
                        <div class="submenu_logo_container">
                            <img src="{{asset('uploads/' . $submenu->icon)}}" alt="{{$submenu->nama}}">
                        </div>
                        {{-- <div class="featured-icon">
                            <i class="ti-rss-alt"></i>
                        </div> --}}
                        <div class="featured-title">
                            <h5 style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1;
                            line-clamp: 1; -webkit-box-orient: vertical;">{{ $submenu->nama }}</h5>
                        </div>
                        <div class="featured-desc">
                            <p>{{ $submenu->layanans->count() }} Layanan tersedia</p>
                            <a class="btn-simple mt-3" href="{{ route('dynamic.content', $submenu->slug) }}">
                                <span>Selengkapnya <i class="fas fa-long-arrow-alt-right"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
                @endforeach
                {{-- @foreach ($kategori as $item)
                <div class="col-lg-3 col-md-6">
                    <div class="featured-item style-4">
                        <div class="featured-icon">
                            <i class="ti-rss-alt"></i>
                        </div>
                        <div class="featured-title">
                            <h5>{{ $item->nama }}</h5>
                        </div>
                        <div class="featured-desc">
                            <p>{{ $item->submenu->count() }} Layanan tersedia</p>
                            <a class="btn-simple mt-3"
                                href="{{ route('informasi.layanan', Str::slug($item->nama)) }}"><span>Selengkapnya
                                    <i class="fas fa-long-arrow-alt-right"></i></span></a>
                        </div>
                    </div>
                </div>
                @endforeach --}}
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-8 col-md-12 ms-auto me-auto">
                    <div class="section-title">
                        <h2 class="title">Top Layanan berdasarkan pengunjung</h2>
                        {{-- <p class="mb-0 text-black">Deos et accusamus et iusto odio dignissimos qui blanditiis
                            praesentium voluptatum dele corrupti quos dolores et quas molestias.</p> --}}
                    </div>
                </div>
            </div>
            <div class="row post-wrapper">
                @foreach ($mostLayanan as $data)
                <div class="col-lg-4 col-md-12">
                    <div class="post">
                        <div class="post-image">
                            <img class="img-fluid h-100 w-100" src="{{ asset('uploads/' . $data->layanan->gambar) }}"
                                alt="">
                        </div>
                        <div class="post-desc">
                            <div class="post-date">
                                {{ tglIndo($data->layanan->created_at) }}
                            </div>
                            <div class="post-title">
                                <h5><a href="{{ route('detail.berita', $data->layanan->slug) }}">{{
                                        $data->layanan->judul }}</a>
                                </h5>
                            </div>
                            <div style="text-align: justify;">
                                {!! Str::words($data->layanan->isi, 20, ' ...') !!}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="overflow-hidden dark-bg custom-pb-18 animatedBackground"
        data-bg-img="{{ asset('assets/images/pattern/06.png') }}">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8 col-md-12">
                    <div class="section-title mb-0">
                        <h6>PORTAL-JATIM</h6>
                        <h2 class="title">Daftar Kota / Kabupaten</h2>
                        <div class="widget-search">
                            <div class="widget-searchbox text-center">
                                <input type="text" id="searchInput" placeholder="Search Here..." class="form-control">
                            </div>
                        </div>
                        {{-- <p class="mb-0 text-white">Deos et accusamus et iusto odio dignissimos qui blanditiis
                            praesentium voluptatum dele corrupti quos dolores et quas molestias.</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="overflow-hidden pt-0 custom-mt-10 position-relative z-index-1">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="owl-carousel owl-center" data-items="4" data-md-items="2" data-sm-items="1"
                        data-center="true" data-dots="false" data-nav="true" data-autoplay="true">
                        @foreach ($kabkot as $item)
                        <div class="item" data-search="{{ strtolower($item->regency->name) }}">
                            <div class="cases-item">
                                <div class="cases-images">
                                    <img class="img-fluid" src="{{ asset('uploads/' . $item->logo) }}" alt=""
                                        width="90">
                                </div>
                                <div class="cases-description">
                                    <h5><a href="{{ route('cari.kabkot', $item->id) }}">{{ $item->regency->name }}</a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-8 col-md-12 ms-auto me-auto">
                    <div class="section-title">
                        <h2 class="title">Berita Terbaru</h2>
                        {{-- <p class="mb-0 text-black">Deos et accusamus et iusto odio dignissimos qui blanditiis
                            praesentium voluptatum dele corrupti quos dolores et quas molestias.</p> --}}
                    </div>
                </div>
            </div>
            <div class="row post-wrapper">
                @foreach ($berita as $item)
                <div class="col-lg-3">
                    <div class="blog-classic">
                        <div class="post">
                            <div class="post-image">
                                <img class="img-fluid h-100 w-100" src="{{ asset('uploads/' . $item->gambar) }}" alt="">
                            </div>
                            <div class="post-desc">
                                <div class="post-title mb-2">
                                    <h5 style="overflow: hidden;
                                    display: -webkit-box;
                                    -webkit-line-clamp: 1;
                                    -webkit-box-orient: vertical;">{{ $item->judul }}</h5>
                                </div>
                                <div class="post-created-by">
                                    <span style="overflow: hidden;
                                    display: -webkit-box;
                                    -webkit-line-clamp: 1;
                                    -webkit-box-orient: vertical;">{{ $item->user->name }}</span>
                                </div>
                                <div class="post-date">
                                    {{ tglIndo($item->created_at) }}
                                </div>
                                <div class="mb-2" style="text-align: justify;">
                                    {{ mb_substr(strip_tags($item->isi), 0, 30) }}...
                                </div>
                                <a href="{{ route('detail.berita', $item->slug) }}">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!--feature end-->

</div>

<!--body content end-->
@endsection
@push('js')
<script src="//unpkg.com/alpinejs" defer></script>
<script>
    $(document).ready(function() {
            // console.log("Document is ready");

            var owl = $('.owl-carousel').owlCarousel({
                items: 1,
                loop: false,
                margin: 10,
                nav: true,
                touchDrag: true, // Aktifkan fitur drag pada layar sentuh
                mouseDrag: true,
                autoplay: false,
            });

            var input = document.getElementById('searchInput');

            input.addEventListener('input', handleSearch);
            input.addEventListener('change', handleSearch);

            function handleSearch() {
                var searchTerm = input.value.toLowerCase();
                $('.item').each(function() {
                    var itemSearchTerm = $(this).data('search').toLowerCase();
                    if (itemSearchTerm.includes(searchTerm)) {
                        owl.trigger('stop.owl.autoplay');
                        owl.trigger('to.owl.carousel', [$(this).parent().index(), 0, true]);
                        owl.trigger('stop.owl.autoplay');
                        return false; // Hentikan iterasi setelah menemukan item yang sesuai
                    }
                    owl.trigger('play.owl.autoplay');
                });
            }
        });
</script>
{{-- <script>
    var maxHeight = 0;
        $(".post-wrapper .post").each(function() {
            maxHeight = Math.max(maxHeight, $(this).height());
        });

        $(".post-wrapper .post").height(maxHeight);
</script> --}}
@endpush