@extends('ekppp.app')
@section('content')
    <div class="row">
        <div class="col-12 col-lg-12">
            <!-- Product Information -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-tile mb-0">Form data Tanda Tangan</h5>
                </div>
                <div class="card-body">
                    @if (Route::is('pekppp.master.tanda-tangan.create') || $ttd == null)
                        <form action="{{ route('pekppp.master.tanda-tangan.store') }}" method="post"
                            enctype="multipart/form-data">
                        @else
                            <form action="{{ route('pekppp.master.tanda-tangan.update', $ttd->id) }}" method="post"
                                enctype="multipart/form-data">
                                @method('PUT')
                    @endif
                    @csrf
                    <div class="row mb-3">
                        <div class="col-12 mb-3">
                            <label class="form-label" for="ecommerce-product-sku">Tanda Tangan</label>
                            <input type="file" class="form-control" name="ttd" id="ttd"
                                onchange="previewGambarProduk()">
                        </div>
                        <div class="col">
                            @if ($ttd != null)
                                <img id="previewImgBg" src="{{ old('ttd', asset('uploads/' . $ttd->tanda_tangan)) }}"
                                    alt="Preview ttd" style="width: 20%">
                            @else
                                <img id="previewImgBg" 
                                    alt="Preview ttd" style="width: 20%">
                            @endif
                        </div>
                    </div>
                    <div class="text-end">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function previewGambarProduk() {
            var file = document.getElementById("ttd").files[0];
            console.log(file)

            if (file) {
                var reader = new FileReader();

                reader.onload = function() {
                    $("#previewImgBg").attr("src", reader.result);
                }

                reader.readAsDataURL(file);
            }
        }
    </script>
@endpush
