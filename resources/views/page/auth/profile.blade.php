@extends('admin.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h4 class="card-header">Profile Details</h4>
                <!-- Account -->
                @hasanyrole('opd|admin')
                    <form action="{{ route('portal.setting.updateLogo') }}" id="profileForm1" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <img src="{{ asset('uploads/' . $user->opd->logo) }}" alt="user-avatar"
                                    class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
                                <div class="button-wrapper">    
                                    <input type="file" name="logo">
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                    <button type="submit" class="btn btn-primary">
                                        {{-- <i class="ti ti-refresh-dot d-block d-sm-none"></i> --}}
                                        <span class="d-none d-sm-block">Upload</span>
                                      </button>
                                    <div class="text-muted">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-0">
                    </form>
                @endhasanyrole
                <div class="card-body pt-2 mt-1">
                    <form id="formAccountSettings" method="POST" action="{{ route('portal.setting.updateProfile') }}">
                        @csrf
                        <div class="row mt-2 gy-4">
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control" type="text" id="name" name="name"
                                        value="{{ $user->name }}" required />
                                    <label for="name">First Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control" type="text" id="email" name="email"
                                        value="{{ $user->email }}" placeholder="john.doe@example.com" required />
                                    <label for="email">E-mail</label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-password-toggle">
                                    <label class="form-label" for="multicol-password">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="multicol-password" name="password" class="form-control"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="multicol-password2" />
                                        <span class="input-group-text cursor-pointer" id="multicol-password2"><i
                                                class="ti ti-eye-off"></i></span>
                                    </div>
                                    <span class="text-danger">(isi jika ingin mengganti password)</span>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-password-toggle">
                                    <label class="form-label" for="multicol-confirm-password">Confirm Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="multicol-confirm-password" name="conpassword"
                                            class="form-control"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="multicol-confirm-password2" />
                                        <span class="input-group-text cursor-pointer" id="multicol-confirm-password2"><i
                                                class="ti ti-eye-off"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>
        </div>
    </div>
@endsection
{{-- 
@push('js')
    <script>
        $(document).ready(function() {
            $('#upload-image').change(function() {
                // Mendapatkan formulir
                var formData = new FormData($('#profileForm1')[0]);

                // Mengirim data gambar ke server
                $.ajax({
                    url: "{{ url('update-logo') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // Handle respons dari server (jika diperlukan)
                        console.log(response);

                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil merubah data',
                            timer: 1500
                        })
                        setTimeout(function() {
                            location.reload();
                        }, 1500);
                    },
                    error: function(xhr, status, error) {
                        // Handle kesalahan (jika diperlukan)
                        console.error(xhr.responseText);
                        Swal.fire({
                            icon: 'error',
                            title: "Data gagal di update",
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                });
            });
        });
    </script>
@endpush --}}
