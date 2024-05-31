@extends('admin.app')

@section('content')
<!-- Users List Table -->
<div class="card">
    <div class="card-header border-bottom">
        <div class="row">
            <div class="col-lg-3">
                <h5 class="card-title mb-0 mb-lg-3">Pembuatan Sub Menu</h5>
            </div>
            {{-- <div class="col-9 d-flex justify-content-end">
                <a class="btn btn-primary btn-sm" href="{{ route('master.kabkot.create') }}"><i
                        class="ti ti-plus me-sm-1"></i>
                    Tambah Menu</a>
            </div> --}}
        </div>
    </div>
    <div class="card-body">
        <div class="mb-3"></div>
        <div class="col-lg-7">
            <form action="{{ route('menu.sub-menu.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 row">
                    <label for="html5-text-input" class="col-lg-4 col-form-label">Menu <span
                            class="text-danger">*</span></label>
                    <div class="col-lg-8">
                        <select name="menu_id" class="select2 form-select" data-allow-clear="true" required>
                            @foreach ($menus as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="html5-text-input" class="col-lg-4 col-form-label">Nama <span
                            class="text-danger">*</span></label>
                    <div class="col-lg-8">
                        <input class="form-control" name="nama" type="text">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="html5-text-input" class="col-lg-4 col-form-label">File Icon <span
                            class="text-danger">(PNG, JPG, SVG)*</span></label>
                    <div class="col-lg-8">
                        <input class="form-control" type="file" name="file_icon">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="html5-text-input" class="col-lg-4 col-form-label">Deskripsi singkat <span
                            class="text-danger">*</span></label>
                    <div class="col-lg-8">
                        <textarea name="deskripsi" class="form-control" cols="20" rows="5"></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-lg-8">
                        <button type="submit" class="btn btn-primary btn-sm">SIMPAN</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection