@extends('admin.app')
@section('content')
    <div class="row">
        <div class="col-12 col-lg-12">
            <!-- Product Information -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-tile mb-0">Form data KabKot</h5>
                </div>
                <div class="card-body">
                    @if (Route::is('portal.master.kabkot.create'))
                        <form action="{{ route('portal.master.kabkot.store') }}" method="post" enctype="multipart/form-data">
                        @else
                            <form action="{{ route('portal.master.kabkot.update', $kabkot->id) }}" method="post"
                                enctype="multipart/form-data">
                                @method('PUT')  
                    @endif
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="ecommerce-product-name">Kabupaten / Kota</label>
                        <select id="select2Basic" name="regency_id" class="select2 form-select form-select-lg"
                            data-allow-clear="true" required>
                            <option value="">Pilih Kabkot</option>
                            @foreach ($regency as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('regency_id', $kabkot->regency_id) == $item->id ? 'selected' : null }}>
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row mb-3">
                        <div class="col"><label class="form-label" for="ecommerce-product-sku">Logo</label>
                            <input type="file" class="form-control" name="logo" id="logo"
                                onchange="previewGambarProduk()">
                        </div>
                        <div class="col">
                            <img id="previewImgBg" src="{{ old('logo', asset('uploads/' . $kabkot->logo)) }}"
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
