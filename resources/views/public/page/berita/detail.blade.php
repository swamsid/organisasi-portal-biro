@extends('public.app')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    .page-title {
        padding-top: 9.5rem;
        padding-bottom: 3rem;
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

    .post-desc {
        padding: 1rem !important;
    }

    .post-desc p {
        margin-top: 0 !important;
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

    .devider {
        width: 100%;
        height: 0.2rem;
        position: relative;
        background-color: #7a7a7a30;
    }

    .devider::after {
        content: '';
        width: 25%;
        height: 0.2rem;
        background-color: #26b126;
        position: absolute;
    }

    .berita_terkait_card {
        display: grid;
        grid-template-columns: 1fr 3fr;
        gap: 1rem;
        margin-top: 1rem;
    }

    .berita_terkait_card img {
        width: 100%;
        height: 6rem;
        object-fit: cover;
        border-radius: 0.5rem;
    }

    .berita_terkait_card h6 {
        font-size: 1rem;
        margin-bottom: 0;
    }

    .berita_terkait_card p {
        font-size: 0.8rem;
    }

    .berita_terkait_card .berita_terkait_card_badge {
        width: fit-content;
        background-color: rgba(103, 103, 108, 0.2);
        padding: 0.2rem 0.8rem;
        border-radius: 1rem;
        margin-bottom: 0.5rem;
        font-weight: 500;
        font-size: 0.7rem !important;
        color: #575757;
    }

    @media (max-width: 576px) {
        .page-title {
            padding-top: 12rem;
        }

        .berita_terkait_container {
            display: none;
        }
    }
</style>
@endpush

@section('content')
<!--page title start-->
<section class="page-title light-bg bg-contain media_layanan_jumbotron" data-bg-img="">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="mb-2">{{$berita->judul}}</h1>
                <p class="opd">{{ $berita->user->name }}</p>
                <div class="d-flex flex-column flex-lg-row gap-2">
                    <p class="mb-0" style="font-size: 0.7rem;">
                        <i class="fa-regular fa-clock"></i>
                        Terakhir diupdate {{$berita->updated_at->translatedFormat('l, j F Y')}}
                    </p>
                    <p class="mb-0">
                        <i class="fa-solid fa-boxes-stacked"></i>
                        @foreach (json_decode($berita->tags, true) as $index => $item)
                        @if($index != (count(json_decode($berita->tags, true)) - 1))
                        <a href="{{route('cari.berita.by.tag', $item['value'])}}">{{$item['value']}}</a>,
                        @else
                        <a href="{{route('cari.berita.by.tag', $item['value'])}}">{{$item['value']}}</a>
                        @endif
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--page title end-->


<!--body content start-->

<div class="page-content">
    <!--blog start-->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="left-side">
                        <div class="post">
                            <div class="post-image">
                                <img class="img-fluid" src="{{ asset('uploads/' . $berita->gambar) }}" alt=""
                                    style="width: 100%;">
                            </div>
                            <div class="post-desc">
                                {!! $berita->isi !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 sidebar mt-5 mt-lg-0">
                    <div class="d-flex gap-2 align-items-start mt-4">
                        <img src="https://jabarprov.go.id/icons/share.svg" alt="share" class="mt-1">
                        <p class="mb-0" style="font-size: 0.8rem;">
                            Social Media
                        </p>
                    </div>
                    <div class="social mt-2">
                        <a href="{{'https://twitter.com/intent/tweet?url=' . request()->url()}}" target="_blank">
                            <img src="https://jabarprov.go.id/icons/social-media/twitter-logo.svg" alt="twitter-logo">
                            <p>Twitter</p>
                        </a>
                        <a href="{{'https://www.facebook.com/sharer/sharer.php?u=' . request()->url()}}"
                            target="_blank">
                            <img src="{{asset('assets/images/facebook-logo.png')}}" alt="facebook-logo"
                                style="width: 20px;">
                            <p>Facebook</p>
                        </a>
                        <a href="{{'https://wa.me/?text=' . request()->url()}}" target="_blank">
                            <img src="{{asset('assets/images/whatsapp-logo.png')}}" alt="whatsapp-logo"
                                style="width: 20px;">
                            <p>Whatsapp</p>
                        </a>
                    </div>
                    <div class="widget">
                        <div class="widget-search">
                            <form action="{{route('cari.berita')}}" class="form-inline form">
                                <div class="widget-searchbox">
                                    <button type="submit" class="search-btn"> <i class="fas fa-search"></i>
                                    </button>
                                    <input type="text" placeholder="Search Here..." class="form-control" name="keyword">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="berita_terkait_container">
                        <h6 style="font-size: 0.8rem; font-weight: 500;">BERITA TERKAIT</h6>
                        <div class="devider"></div>
                        @foreach ($all_berita as $item)
                        <div class="berita_terkait_card">
                            <img src="{{asset('uploads/'.$item->gambar)}}" alt="" class="img-fluid">
                            <div>
                                <h6 style="overflow: hidden;
                            display: -webkit-box;
                            -webkit-line-clamp: 2;
                            -webkit-box-orient: vertical;">
                                    <a href="{{ route('detail.berita', $item->slug) }}">{{$item->judul}}</a>
                                </h6>
                                <p class="mb-2 mt-2">
                                    {{$item->updated_at->translatedFormat('l, j F Y')}}
                                </p>
                                @foreach (json_decode($item->tags, true) as $index => $tag)
                                <a href="{{route('cari.berita.by.tag', $tag['value'])}}"
                                    class="berita_terkait_card_badge">
                                    {{$tag['value']}}
                                </a>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection