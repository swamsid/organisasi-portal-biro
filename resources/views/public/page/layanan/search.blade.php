@extends('public.app')
@section('content')
    <!--page title start-->

    <section class="page-title overflow-hidden text-center light-bg bg-contain animatedBackground"
        data-bg-img="{{ asset('assets/images/pattern/05.png') }}">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <h1 class="title">Halaman Pencarian Layanan</h1>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">Halaman Pencarian Layanan dari Kata Kunci {{ $request->keyword }}</li>
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

        <section>
            <div class="container mb-3">
                <div class="widget-search">
                    <form action="{{ route('cari.layanan') }}" class="form-inline form">
                        <div class="widget-searchbox">
                            <button type="submit" class="search-btn"> <i class="fas fa-search"></i>
                            </button>
                            <input type="text" name="keyword" placeholder="Cari..." class="form-control">
                        </div>
                    </form>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    @foreach ($postingan as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="post">
                                <div class="post-image">
                                    <img class="img-fluid h-100 w-100" src="{{ asset('uploads/' . $item->gambar) }}" alt="">
                                </div>
                                <div class="post-desc">
                                    <div class="post-date">{{ tglIndo($item->created_at) }}
                                    </div>
                                    <div class="post-title">
                                        <h5><a href="{{ route('detail.berita', $item->slug) }}">{{ $item->judul }}</a></h5>
                                    </div>
                                    <p>
                                        {!! Str::words($item->isi , 20, ' ...') !!}
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
        </section>
    </div>
@endsection
