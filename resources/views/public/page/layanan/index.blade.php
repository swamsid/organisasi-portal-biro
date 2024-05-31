@extends('public.app')

@push('css')
<style>
    .page-content {
        margin-top: 10rem;
    }

    .post-title h5 a {
        overflow: hidden !important;
        text-overflow: ellipsis !important;
        display: -webkit-box !important;
        -webkit-line-clamp: 1 !important;
        line-clamp: 1 !important;
        -webkit-box-orient: vertical !important;
    }

    .post-desc {
        color: #000;
        /* overflow: hidden !important;
        text-overflow: ellipsis !important;
        display: -webkit-box !important;
        -webkit-line-clamp: 2 !important;
        line-clamp: 2 !important;
        -webkit-box-orient: vertical !important; */
    }

    .post-desc:hover {
        cursor: pointer;
    }

    .post .post-desc p {
        font-size: 0.8rem !important;
        padding: 0 !important;
    }

    .layanan_detail {
        padding-top: 0;
    }

    @media (max-width: 576px) {
        .layanan_detail {
            padding-top: 2rem;
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
                <h1 class="title">Daftar
                    @foreach (explode('-', $slug) as $item)
                    {{ $item }}
                    @endforeach
                </h1>
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a>
                        </li>
                        @foreach (explode('-', $slug) as $item)
                        <li class="breadcrumb-item" aria-current="page">{{ $item }}</li>
                        @endforeach
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
    <section class="layanan_detail">
        <div class="container">
            <div class="row mb-4">
                <form action="">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="search" name="search"
                            placeholder="Cari Layanan {{$subMenu->nama}}">
                    </div>
                </form>
            </div>
            <div class="row">
                @foreach ($layanans as $item)
                <div class="col-lg-4 col-md-12 order-lg-1" data-toggle="tooltip" data-placement="top"
                    title="{{ $item->judul }}">
                    <a href="{{route('dynamic.content.detail', $item->slug)}}">
                        <div class=" post-desc">
                            <div class="post-date">
                                <img height="52px" width="53px" src="{{ asset('uploads/' . $item->file_icon) }}" alt="">
                            </div>
                            <div class="post-title mt-4">
                                <h5 style="overflow: hidden;
                                text-overflow: ellipsis;
                                display: -webkit-box;
                                -webkit-line-clamp: 1;
                                line-clamp: 2;
                                -webkit-box-orient: vertical; text-transform: uppercase;">{{ $item->judul }}</h5>
                            </div>
                            <p class="post-desc" style="overflow: hidden;
                            text-overflow: ellipsis;
                            display: -webkit-box;
                            -webkit-line-clamp: 2; /* number of lines to show */
                                    line-clamp: 2;
                            -webkit-box-orient: vertical;">
                                {{ $item->isi }}
                            </p>
                            <h6 style="font-size: 1rem;
                            font-weight: 500;
                            color: #15803d;">Selengkapnya <svg width="20" height="20" viewBox="0 0 20 20"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="jds-icon__svg"
                                    style="width: 15px; height: 15px; transform: rotate(0deg); fill: currentcolor;">
                                    <path
                                        d="M12.1854 17.6841L19.1713 10.6982C19.2366 10.6235 19.2904 10.5394 19.3309 10.4487L19.3908 10.3689C19.4323 10.2468 19.4525 10.1185 19.4507 9.98964C19.4601 9.90674 19.4601 9.82305 19.4507 9.74015L19.4507 9.61041C19.4142 9.5459 19.3707 9.48565 19.3209 9.43077L19.2311 9.28108L12.2453 2.2952C12.1525 2.20166 12.0421 2.12742 11.9205 2.07675C11.7989 2.02609 11.6684 2 11.5367 2C11.4049 2 11.2745 2.02609 11.1529 2.07675C11.0313 2.12742 10.9209 2.20166 10.8281 2.2952C10.7346 2.38798 10.6603 2.49835 10.6097 2.61997C10.559 2.74158 10.5329 2.87202 10.5329 3.00377C10.5329 3.13551 10.559 3.26596 10.6097 3.38757C10.6603 3.50918 10.7346 3.61956 10.8281 3.71234L16.0775 8.99166L0.997995 8.99166C0.733314 8.99166 0.479473 9.09681 0.292315 9.28396C0.105157 9.47112 1.31329e-05 9.72496 1.31213e-05 9.98964C1.31097e-05 10.2543 0.105157 10.5082 0.292315 10.6953C0.479473 10.8825 0.733314 10.9876 0.997995 10.9876L16.0376 10.9876L10.7283 16.267C10.6348 16.3597 10.5605 16.4701 10.5099 16.5917C10.4592 16.7133 10.4331 16.8438 10.4331 16.9755C10.4331 17.1073 10.4592 17.2377 10.5099 17.3593C10.5605 17.4809 10.6348 17.5913 10.7283 17.6841C10.8217 17.7838 10.9345 17.8633 11.0598 17.9176C11.1851 17.972 11.3203 18 11.4568 18C11.5934 18 11.7286 17.972 11.8539 17.9176C11.9792 17.8633 12.092 17.7838 12.1854 17.6841V17.6841Z">
                                    </path>
                                </svg></h6>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection

@push('js')
<script>
    // const postElements = document.querySelectorAll('.post-desc');

    // console.log(postElements);
    // postElements.forEach(function(postEl){
    //     postEl.addEventListener('click', function(e){
    //         console.log(e.target);
    //     });
    // });
</script>
@endpush