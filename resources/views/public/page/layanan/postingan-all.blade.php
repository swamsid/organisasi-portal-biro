@extends('public.app')
@section('content')
    <!--page title start-->

    <section class="page-title overflow-hidden text-center light-bg bg-contain animatedBackground"
        data-bg-img="{{ asset('assets/images/pattern/05.png') }}">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <h1 class="title">Halaman Layanan</h1>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Halaman Layanan</li>
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
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 order-lg-1">
                        @foreach ($postingan as $item)
                            <div class="blog-classic">
                                <div class="post">
                                    <div class="post-image">
                                        <img class="img-fluid h-100 w-100" src="{{ asset('uploads/' . $item->gambar) }}"
                                            alt="">
                                    </div>
                                    <div class="post-desc">
                                        <div class="post-date">{{ tglIndo($item->created_at) }}
                                        </div>
                                        <div class="post-title">
                                            <h5><a href="{{ route('detail.layanan', $item->slug) }}">{{ $item->judul }}</a></h5>
                                        </div>
                                        <p>
                                            {!! Str::words($item->isi , 20, ' ...') !!}
                                        </p>
                                        <div class="post-author">
                                            <div class="post-author-img">
                                                {{-- <img class="img-fluid" src="{{ asset('assets/images/thumbnail/03.png') }}" alt=""> --}}
                                                <img src="https://ui-avatars.com/api/{{ $item->user->name }}"
                                                    class="rounded-circle" width="80" height="80" alt="" />
                                            </div> <span>{{ $item->user->name }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <nav aria-label="Page navigation" class="mt-8">
                            <ul class="pagination">
                                {{ $postingan->links('pagination::bootstrap-5') }}
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-4 col-md-12 sidebar mt-5 mt-lg-0">
                        <div class="widget">
                            <div class="widget-search">
                                <form action="{{ route('cari.layanan') }}" class="form-inline form">
                                    <div class="widget-searchbox">
                                        <button type="submit" class="search-btn"> <i class="fas fa-search"></i>
                                        </button>
                                        <input type="text" name="keyword" placeholder="Search Here..." class="form-control">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="widget light-bg px-4 py-4">
                            <h5 class="widget-title">Kategori</h5>
                            <ul class="widget-categories list-unstyled">
                                @foreach ($kats as $item)
                                    <li> <a href="{{ route('informasi.layanan', Str::slug($item->nama)) }}">{{ $item->nama }} <span>({{ $item->postingan->count() }})</span></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
