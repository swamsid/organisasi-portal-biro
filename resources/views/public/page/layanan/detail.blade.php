@extends('public.app')

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css"
    integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    /* .layanan_detail_side_menu {
        position: relative;
    }

    .layanan_detail_side_menu .side_menu {
        position: absolute;
        right: 0;
        top: 0;
    }

    .layanan_detail_side_menu .side_menu .content {
        position: fixed;
        top: 120px;
    } */

    .layanan_detail_side_menu h5 {
        font-size: 1rem;
        color: #1f2937;
        font-weight: bold;
    }

    .layanan_detail_side_menu ul {
        list-style: none;
        border-left: 2px solid #e5e7eb;
        padding-left: 0.5rem;
    }

    .layanan_detail_side_menu ul li {
        margin-bottom: 0.5rem;
    }

    .layanan_detail_side_menu ul li a {
        color: #6b7280;
        font-weight: 500;
    }

    .layanan_detail_side_menu ul li a.green {
        color: #166534;
        position: relative;
    }

    .layanan_detail_side_menu ul li a.green::after {
        content: "";
        width: 3px;
        height: 30px;
        background-color: #166534;
        position: absolute;
        left: -10px;
    }

    .layanan_detail_content .card_gray {
        background-color: #f3f4f6;
        padding: 1rem;
        border-radius: 1rem;
    }

    .layanan_detail_content .card_gray .layanan_detail_media_light_box_image img {
        width: 100%;
        /* height: 10rem; */
        border-radius: 1rem;
    }

    .layanan_detail_content .card_gray img {
        border-radius: 1rem;
    }

    .layanan_detail_cover_image {
        height: 100%;
        object-fit: fill;
    }

    .layanan_detail_media_light_box_image {
        height: 23.8rem;
        display: flex;
        flex-direction: column;
        gap: 1rem;
        overflow-y: scroll;
    }

    .layanan_detail_media_light_box_image a {
        min-height: 7rem;
        border-radius: 1rem;
        overflow: hidden;
        position: relative;
        transition: 200ms !important;
    }

    .layanan_detail_media_light_box_image a img {
        border: 1px solid #d1d5db;
        transition: 200ms !important;
    }

    .layanan_detail_media_light_box_image a:hover img {
        transform: scale(1.1);
        border: 1px solid #d1d5db;
    }

    .layanan_detail_media_light_box_image a:hover::after {
        content: "";
        background-color: #00000080;
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }

    .layanan_detail_media_light_box_image a .plus i {
        transition: 200ms !important;
    }

    .layanan_detail_media_light_box_image a .plus {
        width: 50px;
        height: 50px;
        background-color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        margin: auto;
        z-index: 1;
        visibility: hidden;
    }

    .layanan_detail_media_light_box_image a:hover .plus {
        visibility: visible;
        transition: 200ms !important;
    }

    .layanan_detail_media_light_box_image a:hover .plus i {
        transition: 200ms !important;
    }

    .card {
        border-radius: 1rem;
    }

    .layanan_detail_content .card_green {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #20A05B;
        border-radius: 1rem;
        position: relative;
        padding: 0.875rem;
        padding-left: 5rem;
        overflow: hidden;
    }

    .layanan_detail_content .card_green .people {
        position: absolute;
        left: 0;
        bottom: 0;
    }

    .layanan_detail_content .card_green .pattern {
        position: absolute;
        left: 0;
    }

    .layanan_detail_content .card_green p {
        font-size: 0.8rem;
        color: #fff;
        margin-bottom: 0;
    }

    .layanan_detail_content .card_green a {
        background-color: #fff;
        color: #20A05B;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        font-weight: 600;
    }

    .layanan_detail_content .card_green p:hover i {
        cursor: pointer;
    }

    .card_jam_operasional .card_gray {
        background-color: #f3f4f6;
        padding: 1rem;
        border-radius: 1rem;
    }

    .card_jam_operasional .card_gray p,
    .card_address p {
        font-size: 0.8rem;
        margin-bottom: 0.5rem;
    }

    .card_gray .dropdown-toggle {
        width: 100%;
        animation: none !important;
        background-color: #f0fdf4;
        font-size: 0.8rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: none;
    }

    .card_gray .dropdown-toggle.close {
        background-color: #fee2e2 !important;
    }

    .card_gray .dropdown-toggle:active,
    .card_gray .dropdown-toggle.show {
        background-color: #f0fdf4 !important;
        color: #000;
    }

    .card_gray .dropdown-toggle.close:active,
    .card_gray .dropdown-toggle.close.show {
        background-color: #fee2e2 !important;
        color: #000;
    }

    .card_gray .dropdown-toggle p {
        margin-bottom: 0.5rem;
    }

    .card_gray .dropdown-toggle .green {
        color: #16a34a;
    }

    .card_gray .dropdown-toggle .red {
        color: #ef4444;
    }

    .card_gray .dropdown-toggle:hover {
        background-color: #f0fdf4;
    }

    .card_gray .dropdown-toggle:hover {
        color: #000;
    }

    .card_gray .dropdown-toggle::after {
        content: none;
    }

    .dropdown .dropdown-menu {
        width: 100% !important;
        margin-top: 0.5rem !important;
        font-size: 0.8rem;
    }

    .dropdown .dropdown-menu .dropdown-item {
        width: 42%;
    }

    .dropdown .dropdown-menu .dropdown-item {
        display: flex;
        justify-content: space-between;
    }

    .dropdown .dropdown-menu .dropdown-item .green {
        color: #16a34a;
    }

    .card_jam_operasional .card_gray .free_badge {
        color: #1e3a8a;
        background-color: #dbeafe;
        padding: 0.8rem 0.5rem;
    }

    .card_address img {
        width: 1.2rem;
    }

    .card_address p,
    .card_address a,
    .card_social p {
        font-size: 0.8rem;
        margin-bottom: 0;
    }

    .akses_unduh {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border: 1px solid #16a34a;
        border-radius: 1rem;
        padding: 0.5rem 1rem;
        transition: 300ms;
    }

    .akses_unduh:hover {
        background-color: #e6f6ec;
    }

    .akses_unduh div p {
        font-size: 0.65rem;
        color: #4b5563;
    }

    .akses_unduh div p:nth-child(2) {
        font-size: 0.8rem;
        font-weight: bold;
    }

    .social {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
    }

    .social a {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem;
        color: #000;
        transition: 300ms;
    }

    .social a:hover {
        background-color: #f0fdf4;
    }

    .social a p {
        font-size: 0.8rem;
    }

    .iframe_wrapper {
        border-radius: 1rem;
        overflow: hidden;
    }

    .layanan_content {
        margin-top: 3rem;
        scroll-margin-top: 10rem;
    }

    .layanan_content h1 {
        font-size: 1.2rem;
        text-align: center
    }


    .render_html ul {
        width: 100%;
        display: grid;
        list-style: none;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }

    .render_html ul li {
        display: flex;
        align-items: start;
        padding: 1rem;
        background: #F9FAFB;
        padding-left: 2.5rem;
        position: relative;
        font-size: 0.8rem;
        border-radius: 1rem;
    }

    .render_html ul li::before {
        content: '';
        width: 10px;
        height: 10px;
        background-color: #4DC27E;
        position: absolute;
        top: 1.45rem;
        bottom: 0;
        left: 1rem;
        border-radius: 50%;
    }

    .page-title {
        padding-top: 9.5rem;
        padding-bottom: 3rem;
    }

    .media_layanan_jumbotron img {
        width: 5rem;
        height: 5rem;
        aspect-ratio: 2/3;
        object-fit: fill;
        border-radius: 50%;
    }

    .media_layanan_jumbotron h1 {
        font-size: 1.5rem;
        line-height: 2rem;
        text-transform: uppercase;
    }

    .media_layanan_jumbotron p {
        font-size: 0.8rem;
    }

    .opd {
        width: fit-content;
        background-color: rgba(103, 103, 108, 0.2);
        padding: 0.2rem 0.8rem;
        border-radius: 1rem;
        margin-bottom: 0.5rem;
        font-weight: 500;
        font-size: 0.7rem !important;
    }

    @media (max-width: 576px) {
        /* .layanan_detail_media_light_box_image {
            overflow-y: unset !important;
        } */

        .page-title {
            padding-top: 12rem;
        }

        .render_html ul {
            grid-template-columns: 1fr;
        }

        .dropdown .dropdown-menu .dropdown-item {
            width: 100%;
        }

        .layanan_detail_content .card_green {
            display: flex;
            flex-direction: column;
            align-items: end;
        }
    }
</style>
@endpush

@section('content')
<!--page title start-->

{{-- <section class="page-title overflow-hidden text-center light-bg bg-contain animatedBackground"
    data-bg-img="{{ asset('assets/images/pattern/05.png') }}">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12">
                <h1 class="title">Halaman Detail Layanan</h1>
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $layanan->judul }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="page-title-pattern"><img class="img-fluid" src="{{ asset('assets/images/bg/06.png') }}" alt="">
    </div>
</section> --}}

<section class="page-title light-bg bg-contain media_layanan_jumbotron" data-bg-img="">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex flex-column flex-lg-row gap-3">
                <div>
                    <img src="{{asset('uploads/' . $layanan->file_icon)}}" alt="media_layanan_logo">
                </div>
                <div>
                    <h1 class="mb-2">{{$layanan->judul}}</h1>
                    <p class="opd">{{$layanan->user->opd->nama}}</p>
                    <div class="d-flex flex-column flex-lg-row gap-2">
                        <p class="mb-0" style="font-size: 0.7rem;">
                            <i class="fa-regular fa-clock"></i>
                            Terakhir diupdate {{$layanan->updated_at->translatedFormat('l, j F Y')}}
                        </p>
                        <p class="mb-0">
                            <i class="fa-solid fa-boxes-stacked"></i>
                            {{$submenu->nama}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mt-3">
                <p style="text-align: justify;">{{$layanan->isi}}</p>
            </div>
        </div>
    </div>
</section>

<!--page title end-->


<!--body content start-->

<div class="page-content">

    <!--blog start-->

    <section style="padding-top: 0; margin-top: -2rem;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-2 layanan_detail_side_menu mb-4 mb-lg-0"
                                    x-data="{ open: 'media_dan_informasi' }">
                                    <div class="side_menu">
                                        <div class="content">
                                            <h5 class="mb-0">Konten Layanan</h5>
                                            <ul class="mt-4">
                                                <li>
                                                    <a href="#media_dan_informasi" @click="open = 'media_dan_informasi'"
                                                        x-bind:class="open == 'media_dan_informasi' ? 'green' : ''">Media
                                                        dan
                                                        Informasi</a>
                                                </li>
                                                @foreach ($layanan->contents as $item)
                                                <li>
                                                    <a href="#{{\Str::slug($item->nama, '_')}}"
                                                        @click="open = '{{\Str::slug($item->nama, '_')}}'"
                                                        x-bind:class="open == '{{\Str::slug($item->nama, '_')}}' ? 'green' : ''">
                                                        {{$item->nama}}
                                                    </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col layanan_detail_content">
                                    <div class="card" id="#media_dan_informasi">
                                        <div class="card-body">
                                            <h4>Media dan Informasi</h4>
                                            @if((!empty($media_informasi->link_embed)
                                            ||!empty($media_informasi->detailMedia[0])) ||
                                            (!empty($media_informasi->link_embed)
                                            && !empty($media_informasi->detailMedia[0])))
                                            <div class="card_gray">
                                                <div class="row">
                                                    <div class="col mb-4 mb-lg-0">
                                                        @if(!empty($media_informasi->link_embed))
                                                        <div class="iframe_wrapper">
                                                            <iframe width="560" height="380"
                                                                src="{{$media_informasi->link_embed}}"
                                                                title="YouTube video player" frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                allowfullscreen></iframe>
                                                        </div>
                                                        @else
                                                        @if(!empty($media_informasi->detailMedia[0]))
                                                        <img src="{{asset('uploads/' . $media_informasi->detailMedia[0]->gambar)}}"
                                                            alt="" class="img-fluid layanan_detail_cover_image">
                                                        @endif
                                                        @endif
                                                    </div>
                                                    @if($media_informasi->detailMedia->count() != 0)
                                                    <div class="col-lg-3 layanan_detail_media_light_box_image">
                                                        @foreach($media_informasi->detailMedia as $item)
                                                        <a href="{{asset('uploads/' . $item->gambar)}}"
                                                            data-lightbox="image-3">
                                                            <img src="{{asset('uploads/' . $item->gambar)}}" alt=""
                                                                class="img-fluid">
                                                            <div class="plus">
                                                                <i class="fa-solid fa-magnifying-glass-plus"></i>
                                                            </div>
                                                        </a>
                                                        @endforeach
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                            @endif
                                            <div class="card_green mt-4">
                                                <img src="https://jabarprov.go.id/images/public-sevice/call-illustration.png"
                                                    alt="" class="people">
                                                <img src="https://jabarprov.go.id/images/public-sevice/hotline-pattern.png"
                                                    alt="" class="pattern">
                                                <div>
                                                    <p>Kontak Hotline</p>
                                                    <p>
                                                        {{$media_informasi->hotline}}
                                                        <i class="fa-solid fa-copy"></i>
                                                    </p>
                                                </div>
                                                <a href="tel://{{$media_informasi->hotline}}">
                                                    Hubungi Sekarang
                                                    <i class="fa-solid fa-phone"></i>
                                                </a>
                                            </div>
                                            <div class="card card_jam_operasional mt-4">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-7">
                                                            <div class="card_gray">
                                                                <p>
                                                                    <img src="https://jabarprov.go.id/icons/layanan-publik/clock.svg"
                                                                        alt="clock">
                                                                    Jam Operasional
                                                                    ({{now()->translatedFormat('l, j F Y')}})
                                                                </p>
                                                                <div class="dropdown">
                                                                    <button
                                                                        class="btn btn-secondary dropdown-toggle @if($is_tutup) close @endif"
                                                                        type="button" data-bs-toggle="dropdown"
                                                                        aria-expanded="false">
                                                                        <p class="mb-0">
                                                                            @if($is_tutup)
                                                                            <span class="red">Tutup</span> - Buka
                                                                            Pukul
                                                                            {{date('H:i',
                                                                            strtotime($current_operasional[0]['jam_awal']))}}
                                                                            @else
                                                                            <span class="green">Buka</span> - Tutup
                                                                            Pukul
                                                                            {{date('H:i',
                                                                            strtotime($current_operasional[0]['jam_akhir']))}}
                                                                            @endif
                                                                        </p>
                                                                        <i class="fa-solid fa-chevron-right"></i>
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        @foreach($media_informasi->operasional as $item)
                                                                        <li class="dropdown-item">
                                                                            @if($item->hari ==
                                                                            now()->translatedFormat('l'))
                                                                            <span class="green">{{$item->hari}}</span>
                                                                            @else
                                                                            <span>{{$item->hari}}</span>
                                                                            @endif
                                                                            <span>
                                                                                {{date('H:i',
                                                                                strtotime($item->jam_awal))}}
                                                                                -
                                                                                {{date('H:i',
                                                                                strtotime($item->jam_akhir))}}
                                                                            </span>
                                                                        </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                                <hr>
                                                                <p>
                                                                    <img src="https://jabarprov.go.id/icons/layanan-publik/tag.svg"
                                                                        alt="tag">
                                                                    Tarif Layanan
                                                                </p>
                                                                <span
                                                                    class="badge free_badge">{{$media_informasi->tarif}}</span>
                                                            </div>
                                                            <div class="card card_address my-4">
                                                                <div
                                                                    class="card-body d-flex flex-lg-row flex-column justify-content-between align-items-lg-center">
                                                                    <p>
                                                                        <img src="https://jabarprov.go.id/icons/layanan-publik/global-search.svg"
                                                                            alt="global-search">
                                                                        Alamat Website
                                                                    </p>
                                                                    <a href="{{$media_informasi->link_web}}">
                                                                        {{\Str::limit($media_informasi->link_web,
                                                                        35)}}...
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="card_gray mb-4 mb-lg-0">
                                                                <div class="d-flex gap-2 align-items-start">
                                                                    <img src="https://jabarprov.go.id/icons/layanan-publik/location.svg"
                                                                        alt="location" class="mt-1">
                                                                    <p class="mb-0">
                                                                        Alamat <br>{{$media_informasi->alamat}}
                                                                    </p>
                                                                </div>
                                                                <div class="d-flex gap-2 align-items-start mt-4">
                                                                    <img src="https://jabarprov.go.id/icons/layanan-publik/phone.svg"
                                                                        alt="phone" class="mt-1">
                                                                    <p class="mb-0">
                                                                        Telepon <br>
                                                                        {{$media_informasi->telp}}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-5">
                                                            <div class="card card_social" style="height: 100%;">
                                                                <div class="card-body">
                                                                    <div
                                                                        class="d-flex flex-lg-row flex-column gap-2 align-items-start">
                                                                        <img src="https://jabarprov.go.id/icons/layanan-publik/gmail.svg"
                                                                            alt="gmail" class="mt-1">
                                                                        <p class="mb-0" style="width: 100%;
                                                                        text-wrap: wrap;">
                                                                            Email Hotline <br>
                                                                            {{$media_informasi->email}}
                                                                        </p>
                                                                    </div>
                                                                    <hr>
                                                                    <a href="{{$media_informasi->link_akses}}"
                                                                        class="akses_unduh">
                                                                        <div>
                                                                            <p>Link Akses/Unduh</p>
                                                                            <p>
                                                                                {{$link_akses_format}}
                                                                            </p>
                                                                        </div>
                                                                        <img src="https://jabarprov.go.id/icons/world.svg"
                                                                            alt="world">
                                                                    </a>
                                                                    <div class="d-flex gap-2 align-items-start mt-4">
                                                                        <img src="https://jabarprov.go.id/icons/share.svg"
                                                                            alt="share" class="mt-1">
                                                                        <p class="mb-0">
                                                                            Social Media
                                                                        </p>
                                                                    </div>
                                                                    <div class="social mt-2">
                                                                        @if(!empty($media_informasi->twitter))
                                                                        <a href="{{$media_informasi->twitter}}"
                                                                            target="_blank">
                                                                            <img src="https://jabarprov.go.id/icons/social-media/twitter-logo.svg"
                                                                                alt="twitter-logo">
                                                                            <p>Twitter</p>
                                                                        </a>
                                                                        @endif
                                                                        @if(!empty($media_informasi->instagram))
                                                                        <a href="{{$media_informasi->instagram}}"
                                                                            target="_blank">
                                                                            <img src="https://jabarprov.go.id/icons/social-media/instagram-logo.svg"
                                                                                alt="instagram-logo">
                                                                            <p>Instagram</p>
                                                                        </a>
                                                                        @endif
                                                                        @if(!empty($media_informasi->youtube))
                                                                        <a href="{{$media_informasi->youtube}}"
                                                                            target="_blank">
                                                                            <img src="https://jabarprov.go.id/icons/social-media/youtube-logo.svg"
                                                                                alt="youtube-logo">
                                                                            <p>Youtube</p>
                                                                        </a>
                                                                        @endif
                                                                        @if(!empty($media_informasi->tiktok))
                                                                        <a href="{{$media_informasi->tiktok}}"
                                                                            target="_blank">
                                                                            <img src="https://jabarprov.go.id/icons/social-media/tiktok-logo.svg"
                                                                                alt="tiktok-logo">
                                                                            <p>Tiktok</p>
                                                                        </a>
                                                                        @endif
                                                                        @if(!empty($media_informasi->facebook))
                                                                        <a href="{{$media_informasi->facebook}}"
                                                                            target="_blank">
                                                                            <img src="{{asset('assets/images/facebook-logo.png')}}"
                                                                                alt="facebook-logo"
                                                                                style="width: 20px;">
                                                                            <p>Facebook</p>
                                                                        </a>
                                                                        @endif
                                                                        @if(!empty($media_informasi->whatsapp))
                                                                        <a href="{{$media_informasi->whatsapp}}"
                                                                            target="_blank">
                                                                            <img src="{{asset('assets/images/whatsapp-logo.png')}}"
                                                                                alt="whatsapp-logo"
                                                                                style="width: 20px;">
                                                                            <p>Whatsapp</p>
                                                                        </a>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @foreach ($layanan->contents as $item)
                                    <div class="layanan_content" id="{{\Str::slug($item->nama, '_')}}">
                                        <h1>{{$item->nama}}</h1>
                                        <div class="render_html">
                                            {!! $item->deskripsi !!}
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"
    integrity="sha512-Ixzuzfxv1EqafeQlTCufWfaC6ful6WFqIz4G+dWvK0beHw0NVJwvCKSgafpy5gwNqKmgUfIBraVwkKI+Cz0SEQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="//unpkg.com/alpinejs" defer></script>
@endpush