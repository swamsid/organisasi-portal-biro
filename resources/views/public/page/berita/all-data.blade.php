@extends('public.app')
@push('css')
<style>
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

    /* .post-author .post-author-img {
        width: 3rem;
        height: 3rem;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .post-author .post-author-img img {
        transform: scale(0.7);
    } */

    /* .post-author span {
        padding: 0;
        font-size: 0.8rem;
    } */
</style>
@endpush

@section('content')
<!--page title start-->
{{-- <section class="page-title overflow-hidden text-center light-bg bg-contain animatedBackground"
    data-bg-img="{{ asset('assets/images/pattern/05.png') }}">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12">
                <h1 class="title">Halaman Berita</h1>
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Halaman Berita</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="page-title-pattern"><img class="img-fluid" src="{{ asset('assets/images/bg/06.png') }}" alt="">
    </div>
</section> --}}
<!--page title end-->


<!--body content start-->

<div class="page-content">
    <!--blog start-->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-4 col-md-12 sidebar mt-5 mt-lg-0">
                        <div class="widget">
                            <div class="widget-search">
                                <form action="{{route('cari.berita')}}" class="form-inline form">
                                    <div class="widget-searchbox">
                                        <button type="submit" class="search-btn"> <i class="fas fa-search"></i>
                                        </button>
                                        <input type="text" placeholder="Search Here..." class="form-control"
                                            name="keyword">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
                <div class="col-lg-12">
                    <nav aria-label="Page navigation" class="mt-8">
                        <ul class="pagination">
                            {{ $berita->links('pagination::bootstrap-5') }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection