@extends('admin.app')

@section('content')
    <!-- Users List Table -->
    <div class="card">
        <div class="card-header border-bottom">
            <div class="row">
                <div class="col-3">
                    <h5 class="card-title mb-3">Pembuatan Menu</h5>
                </div>
                {{-- <div class="col-9 d-flex justify-content-end">
                    <a class="btn btn-primary btn-sm" href="{{ route('master.kabkot.create') }}"><i class="ti ti-plus me-sm-1"></i>
                        Tambah Menu</a>
                </div> --}}
            </div>
        </div>
        <div class="card-body">
            <div class="mb-3"></div>
            <div class="col-6">
                <form action="{{ route('menu.menu.store') }}" method="post">
                    @csrf
                    <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">Nama <span class="text-danger">*</span></label>
                        <div class="col-md-10">
                            <input class="form-control" name="nama" type="text">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">URL</label>
                        <div class="col-md-10">
                            <input class="form-control" name="url" type="text">
                        </div>
                        <div id="defaultFormControlHelp" class="form-text">Digunakan Untuk tidak Memiliki Sub Menu.</div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-10">
                            <button type="submit" class="btn btn-primary btn-sm">SIMPAN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
