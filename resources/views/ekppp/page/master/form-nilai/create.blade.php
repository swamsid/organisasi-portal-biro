@extends('ekppp.app')
@section('content')
    <div class="row">
        <div class="col-12 col-lg-12">
            <!-- Product Information -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-tile mb-0">Form data Form Nilai</h5>
                </div>
                <div class="card-body">
                    @if (Route::is('pekppp.master.form-nilai.create'))
                        <form action="{{ route('pekppp.master.form-nilai.store') }}" method="post" enctype="multipart/form-data">
                        @else
                            <form action="{{ route('pekppp.master.form-nilai.update', $master->id) }}" method="post"
                                enctype="multipart/form-data">
                                @method('PUT')  
                    @endif
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="ecommerce-product-name">Pilih Unit Lokus</label>
                        <select id="select2Basic3" name="unit_id" class="select2 form-select form-select-lg"
                            data-allow-clear="true" required>
                            <option value="">Pilih</option>
                            @foreach ($unit as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('unit_id', $master->unit_id) == $item->id ? 'selected' : null }}>
                                    {{ $item->nama }} / {{ $item->opd->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="ecommerce-product-name">Pilih Periode</label>
                        <select id="select2Basic" name="periode_id" class="select2 form-select form-select-lg"
                            data-allow-clear="true" required>
                            <option value="">Pilih</option>
                            @foreach ($periode as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('periode_id', $master->periode_id) == $item->id ? 'selected' : null }}>
                                    {{ $item->judul }}</option>
                            @endforeach
                        </select>
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
