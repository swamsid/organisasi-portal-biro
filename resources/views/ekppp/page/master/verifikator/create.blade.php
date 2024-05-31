@extends('ekppp.app')

@section('content')
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    @if (Route::is('pekppp.master.verifikator.create'))
                        <h5 class="mb-0">Tambah Verifikator</h5> <small class="text-muted float-end">Default label</small>
                    @else
                        <h5 class="mb-0">Edit Verifikator</h5> <small class="text-muted float-end">Default label</small>
                    @endif
                </div>
                <div class="card-body">
                    @if (Route::is('pekppp.master.verifikator.create'))
                        <form action="{{ route('pekppp.master.verifikator.store') }}" method="POST">
                        @else
                            <form action="{{ route('pekppp.master.verifikator.update', $user->id) }}" method="POST">
                                @method('PUT')
                    @endif
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="form-label" for="ecommerce-product-name">Kabupaten / Kota</label>
                            <select id="select2Basic" name="kabkot_id" class="select2 form-select form-select-lg"
                                data-allow-clear="true" required>
                                <option value="">Pilih Kabkot</option>
                                @foreach ($kabkot as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('kabkot_id', $user->verifikator->kabkot_id ?? '') == $item->id ? 'selected' : null }}>
                                        {{ $item->regency->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="basic-default-fullname">Nama <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" id="basic-default-fullname"
                                placeholder="John Doe" value="{{ old('name', $user->name) }}" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="basic-default-email">Email<span class="text-danger">*</span></label>
                            <div class="input-group input-group-merge">
                                <input type="text" id="basic-default-email" name="email" class="form-control"
                                    placeholder="john.doe" aria-label="john.doe" value="{{ old('email', $user->email) }}"
                                    aria-describedby="basic-default-email2" required />
                            </div>
                        </div>
                        @if (Route::is('pekppp.master.verifikator.create'))
                            <div class="col-md-6 mb-3">
                                <div class="form-password-toggle">
                                    <label class="form-label" for="multicol-password">Password<span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="multicol-password" name="password" class="form-control"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="multicol-password2" required />
                                        <span class="input-group-text cursor-pointer" id="multicol-password2"><i
                                                class="ti ti-eye-off"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-password-toggle">
                                    <label class="form-label" for="multicol-confirm-password">Konfirmasi Password<span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="multicol-confirm-password" name="conpassword"
                                            class="form-control"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="multicol-confirm-password2" required />
                                        <span class="input-group-text cursor-pointer" id="multicol-confirm-password2"><i
                                                class="ti ti-eye-off"></i></span>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
