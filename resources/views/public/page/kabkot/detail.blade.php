@extends('public.app')
@section('content')
    <!--page title start-->

    <section class="page-title overflow-hidden text-center light-bg bg-contain animatedBackground"
        data-bg-img="{{ asset('assets/images/pattern/05.png') }}">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <h1 class="title">Halaman Detail Layanan dan Berita dari {{ $kabkot->regency->name ?? '' }}</h1>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">Halaman Detail Layanan dan Berita dari
                                {{ $kabkot->regency->name ?? '' }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="page-title-pattern"><img class="img-fluid" src="{{ asset('assets/images/bg/06.png') }}" alt="">
        </div>
    </section>

    <!--page title end-->


    <!--body content start-->

    <div class="page-content">

        <!--blog start-->

        @if ($berita->isEmpty() && $layanan->isEmpty())
            <section>
                <div class="text-center">
                    <h5 class="mb-4 text-capitalize mt-3">{{ $kabkot->regency->name }} Belum membuat layanan
                        maupun berita</h5>
                    <a class="btn btn-theme btn-radius btn-iconic" href="{{ route('home') }}"><i
                            class="fas fa-long-arrow-alt-left"></i> <span>Kembali</span></a>
                </div>
            </section>
        @else
            <section>
                <div class="container mb-3">
                    <p>Berita</p>
                </div>
                <div class="container">
                    <div class="row">
                        @foreach ($berita as $item)
                            <div class="col-lg-4 col-md-6">
                                <div class="post">
                                    <div class="post-image">
                                        <img class="img-fluid h-100 w-100" src="{{ asset('uploads/' . $item->gambar) }}"
                                            alt="">
                                    </div>
                                    <div class="post-desc">
                                        <div class="post-date">{{ tglIndo($item->created_at) }}
                                        </div>
                                        <div class="post-title">
                                            <h5><a href="{{ route('detail.berita', $item->slug) }}">{{ $item->judul }}</a>
                                            </h5>
                                        </div>
                                        <p>
                                            {!! Str::words($item->isi, 20, ' ...') !!}
                                        </p>
                                        <div class="post-author">
                                            <div class="post-author-img">
                                                <img src="https://ui-avatars.com/api/{{ $item->user->name }}"
                                                    class="rounded-circle" width="80" height="80" alt="" />
                                            </div> <span>{{ $item->user->name }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="container mt-3 mb-3">
                    <p>Layanan</p>
                </div>
                <div class="container">
                    <div class="row">
                        @foreach ($layanan as $items)
                            <div class="col-lg-4 col-md-6">
                                <div class="post">
                                    <div class="post-image">
                                        <img class="img-fluid h-100 w-100" src="{{ asset('uploads/' . $items->gambar) }}"
                                            alt="">
                                    </div>
                                    <div class="post-desc">
                                        <div class="post-date">{{ tglIndo($items->created_at) }}
                                        </div>
                                        <div class="post-title">
                                            <h5><a
                                                    href="{{ route('detail.berita', $items->slug) }}">{{ $items->judul }}</a>
                                            </h5>
                                        </div>
                                        <p>
                                            {!! Str::words($items->isi, 20, ' ...') !!}
                                        </p>
                                        <div class="post-author">
                                            <div class="post-author-img">
                                                <img src="https://ui-avatars.com/api/{{ $items->user->name }}"
                                                    class="rounded-circle" width="80" height="80" alt="" />
                                            </div> <span>{{ $items->user->name }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    </div>
@endsection
