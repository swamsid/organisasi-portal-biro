@extends('admin.app')

@section('content')
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    @if (Route::is('portal.master.user.create'))
                        <h5 class="mb-0">Tambah User</h5> <small class="text-muted float-end">Default label</small>
                    @else
                        <h5 class="mb-0">Edit User</h5> <small class="text-muted float-end">Default label</small>
                    @endif
                </div>
                <div class="card-body">
                    @if (Route::is('portal.master.user.create'))
                        <form action="{{ route('portal.master.user.store') }}" method="POST" enctype="multipart/form-data">
                        @else
                            <form action="{{ route('portal.master.user.update', $user->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                    @endif
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="select2Basic" class="form-label">Role</label>
                            <select id="role" name="role" class="select2 form-select form-select-lg"
                                data-allow-clear="true" onchange="showStatus(this)" required>
                                <option value="">Belum Ada Pilihan</option>
                                @foreach ($role as $item)
                                    @hasanyrole('superadmin|admin')
                                        <option value="{{ $item->name }}"
                                            {{ old('role', $user->getRoleNames()[0] ?? '') == $item->name ? 'selected' : null }}>
                                            {{ $item->name }}</option>
                                    @else
                                        <option value="{{ $item->name }}" selected>
                                            {{ $item->name }}</option>
                                    @endhasanyrole
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="basic-default-fullname">Name</label>
                            <input type="text" class="form-control" name="name" id="basic-default-fullname"
                                placeholder="Dinas/OPD/UPT" value="{{ old('name', $user->name) }}" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="basic-default-email">Email</label>
                            <div class="input-group input-group-merge">
                                <input type="text" id="basic-default-email" name="email" class="form-control"
                                    aria-label="john.doe" value="{{ old('email', $user->email) }}"
                                    aria-describedby="basic-default-email2" required />
                            </div>
                            <div class="form-text"> You can use letters, numbers & periods </div>
                        </div>
                        @if (Route::is('portal.master.user.create'))
                            <div class="col-md-6 mb-3">
                                <div class="form-password-toggle">
                                    <label class="form-label" for="multicol-password">Password</label>
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
                                    <label class="form-label" for="multicol-confirm-password">Confirm Password</label>
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
                        <div id="hidden_div" style="display:none">
                            <div class="row">
                                @hasanyrole('superadmin|admin')
                                    <div class="col-md-6 mb-3">
                                        <label for="select2Basic" class="form-label">Kabupaten/Kota</label>
                                        <select id="kab_id" name="kabkot_id" class="select2 form-select form-select-lg"
                                            data-allow-clear="true" onchange="changeRegencie(this)" required>
                                            <option value="">Belum Ada Pilihan</option>
                                            @foreach ($regency as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('kabkot_id', $user->opd->kabkot_id ?? '') == $item->id ? 'selected' : null }}>
                                                    {{ $item->regency->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3" id="a2" style="display: none">
                                        <label for="select2Basic3" class="form-label">Opd</label>
                                        <select id="opd_id" name="opd_id" class="select2 form-select form-select-lg"
                                            data-allow-clear="true">
                                            <option value="">Belum Ada Pilihan</option>
                                        </select>
                                    </div>
                                @else
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="basic-default-email">Kabupaten/Kota</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" class="form-control" value="{{ $regency[1] }}"
                                                readonly />
                                        </div>
                                        <input type="hidden" name="kabkot_id" value="{{ old('kabkot_id', $regency[0]) }}">
                                    </div>
                                @endhasanyrole
                                <input type="hidden" id="opds" value="{{ $user->opd->opd->user->id ?? '' }}">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="basic-default-email">Kategori</label>
                                    <select id="kat" name="sub_menu_id" class="select2 form-select form-select-lg"
                                        required>
                                        <option value="">Belum Ada Pilihan</option>
                                        @foreach ($submenu as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('sub_menu_id', $user->opd->sub_menu_id ?? '') == $item->id ? 'selected' : null }}>
                                                {{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="basic-default-email">Alamat</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="alamat1" name="alamat" class="form-control"
                                            placeholder="Masukan Alamat"
                                            value="{{ old('alamat', $user->opd->alamat ?? '') }}" required />
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="basic-default-email">No Telp</label>
                                    <div class="input-group input-group-merge">
                                        <input type="tel" id="tel1" name="no_telp" class="form-control"
                                            placeholder="Masukan Nomor Telp"
                                            value="{{ old('no_telp', $user->opd->no_telp ?? '') }}" required />
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="basic-default-email">Logo <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="file" id="logo1" name="logo" class="form-control" />
                                    </div>
                                    <span class="text-danger">Jika tidak ada maka akan secara otomatis terisi logo
                                        kabkot yang di pilih</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            // Panggil changeRegencie secara otomatis saat halaman dimuat
            changeRegencie($('#kab_id'));
        });

        function changeRegencie(e) {
            $('#opd_id').empty();
            let id = $(e).val();
            $.get("{{ url('portal/master/getoptid') }}/" + id, function(data) {
                let html = '<option value="" selected disabled>PILIH</option>';
                data.forEach(element => {
                    if ((element.id == $('#opds').val())) {
                        html += `<option value="${element.id}" selected>${element.name}</option>`;
                    }else{
                        html += `<option value="${element.id}">${element.name}</option>`;
                    }
                });

                $('#opd_id').append(html);
            });
        }

        var role = $('#role').find(":selected").val();

        if (role == 'opd' || role == 'admin' || role == 'upt') {

            document.getElementById('hidden_div').style.display = "block"

            const kabid = document.getElementById('kab_id');
            kabid.setAttribute('required', 'required');

            const alam1 = document.getElementById('alamat1');
            alam1.setAttribute('required', 'required');

            const tels1 = document.getElementById('tel1');
            alam1.setAttribute('required', 'required');

            const kkat = document.getElementById('kat');
            alam1.setAttribute('required', 'required');

            if (role == 'upt') {
                document.getElementById('a2').style.display = "block"
                const opd = document.getElementById('opd_id');
                kabid.setAttribute('required', 'required');
            }

        } else {

            document.getElementById('hidden_div').style.display = "none"

            const kabid = document.getElementById('kab_id');
            kabid.removeAttribute('required');

            const alam1 = document.getElementById('alamat1');
            alam1.removeAttribute('required');

            const tels1 = document.getElementById('tel1');
            tels1.removeAttribute('required');

            const kkat = document.getElementById('kat');
            kkat.removeAttribute('required');

            if (role != 'upt') {
                document.getElementById('a2').style.display = "none"
                const opd = document.getElementById('opd_id');
                opd.removeAttribute('required');
            }
        }

        function showStatus(select) {
            if (select.value == 'opd' || select.value == 'admin' || select.value == 'upt') {

                document.getElementById('hidden_div').style.display = "block"

                const kabid = document.getElementById('kab_id');
                kabid.setAttribute('required', 'required');

                const alam1 = document.getElementById('alamat1');
                alam1.setAttribute('required', 'required');

                const tels1 = document.getElementById('tel1');
                alam1.setAttribute('required', 'required');

                const kkat = document.getElementById('kat');
                alam1.setAttribute('required', 'required');

                if (select.value == 'upt') {
                    document.getElementById('a2').style.display = "block";
                    const opd = document.getElementById('opd_id');
                    kabid.setAttribute('required', 'required');
                }

            } else {

                document.getElementById('a2').style.display = "block"
                const opd = document.getElementById('opd_id');

                kabid.removeAttribute('required', 'required');
                document.getElementById('hidden_div').style.display = "none"

                const kabid = document.getElementById('kab_id');
                kabid.removeAttribute('required', 'required');

                const alam1 = document.getElementById('alamat1');
                alam1.removeAttribute('required', 'required');

                const tels1 = document.getElementById('tel1');
                alam1.removeAttribute('required', 'required');

                const kkat = document.getElementById('kat');
                alam1.removeAttribute('required', 'required');
            }
        }
    </script>
@endpush
