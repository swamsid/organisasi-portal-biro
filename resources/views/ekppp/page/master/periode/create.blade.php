@extends('ekppp.app')
@section('content')
    <div class="row">
        <div class="col-12 col-lg-12">
            <!-- Product Information -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-tile mb-0">Form data Periode</h5>
                </div>
                <div class="card-body">
                    @if (Route::is('pekppp.master.periode.create'))
                        <form action="{{ route('pekppp.master.periode.store') }}" method="post" enctype="multipart/form-data">
                        @else
                            <form action="{{ route('pekppp.master.periode.update', $periode->id) }}" method="post"
                                enctype="multipart/form-data">
                                @method('PUT')
                    @endif
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="ecommerce-product-sku">Judul</label>
                        <input type="text" class="form-control" name="judul" id="judul"
                            value="{{ $periode->judul }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="ecommerce-product-name">Status</label>
                        <select id="select2Basic3" name="status" class="select2 form-select form-select-lg"
                            data-allow-clear="true" required>
                            <option value="">Status</option>
                            <option value="0" {{ $periode->status == '0' ? 'selected' : '' }}>Aktif</option>
                            <option value="1" {{ $periode->status == '1' ? 'selected' : '' }}>Tidak</option>
                        </select>
                    </div>
                    <div class="row mb-3">
                        <div class="col"><label class="form-label" for="ecommerce-product-sku">Gambar</label>
                            <input type="file" class="form-control" accept="image/png, image/jpg, image/jpeg"
                                name="file" id="logo" onchange="previewGambarProduk()">
                        </div>
                        <div class="col">
                            <img id="previewImgBg" src="{{ old('logo', asset('uploads/' . $periode->file)) }}"
                                alt="Preview Logo" style="width: 20%">
                        </div>
                    </div>
                    <div class="text-end">
                        <button class="btn btn-primary" type="submit">Tambah</button>
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
            var file = document.getElementById("logo").files[0];
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
