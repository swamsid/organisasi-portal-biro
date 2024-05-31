@extends('ekppp.app')
@section('content')
    <div class="row">
        <div class="col-12 col-lg-12">
            <!-- Product Information -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-tile mb-0">Form data Unit Lokus</h5>
                </div>
                <div class="card-body">
                    @if (Route::is('pekppp.master.unit-lokus.create'))
                        <form action="{{ route('pekppp.master.unit-lokus.store') }}" method="post"
                            enctype="multipart/form-data">
                        @else
                            <form action="{{ route('pekppp.master.unit-lokus.update', $unit->id) }}" method="post"
                                enctype="multipart/form-data">
                                @method('PUT')
                    @endif
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="ecommerce-product-name">Pilih Opd</label>
                        <select id="select2Basic" name="opd_id" class="select2 form-select form-select-lg"
                            data-allow-clear="true" required>
                            <option value="">Pilih Opd</option>
                            @foreach ($opd as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('opd_id', $unit->opd_id) == $item->id ? 'selected' : null }}>
                                    {{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="ecommerce-product-name">Jenis Layanan</label>
                        <select id="select2Basic3" name="jenis" class="select2 form-select form-select-lg"
                            data-allow-clear="true" required>
                            <option value="">Jenis Layanan</option>
                            <option value="A" {{ $unit->jenis == 'A' ? 'selected' : '' }}>Luring</option>
                            <option value="B" {{ $unit->jenis == 'B' ? 'selected' : '' }}>Daring</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="ecommerce-product-sku">Nama Unit</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="{{ $unit->nama }}"
                            required>
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
