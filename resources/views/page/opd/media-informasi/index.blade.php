@extends('admin.app')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .social_media a {
        width: 35px;
        height: 35px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #7367f0;
        color: #fff;
        border-radius: 50%;
    }
</style>
@endpush

@section('content')
<!-- Users List Table -->
<div class="card">
    <div class="card-header border-bottom">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-end">
                <h5 class="card-title mb-0">List Media Informasi</h5>
                <a href="{{ route('portal.pembuatan.media-informasis.create') }}" class="btn btn-primary">Tambah Media
                    Informasi</a>
            </div>
        </div>
    </div>
    <div class="card-datatable table-responsive">
        <table class="datatables table" id="zero_config1">
            <thead class="border-top">
                <tr>
                    <th></th>
                    <th>Layanan</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Telp</th>
                    <th>Hotline</th>
                    <th>Tarif</th>
                    <th>Media Social</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($media_informasis as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->layanan->judul }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->telp }}</td>
                    <td>{{ $item->hotline }}</td>
                    <td>{{ $item->tarif }}</td>
                    <td class="social_media">
                        <div class="d-flex gap-2">
                            <a href="{{$item->link_embed}}" target="_blank" data-toggle="tooltip" data-placement="top"
                                title="Link Embed"><i class="fa-brands fa-youtube"></i></a>
                            <a href="{{$item->link_akses}}" target="_blank" data-toggle="tooltip" data-placement="top"
                                title="Link Akses"><i class="fa-solid fa-blog"></i></a>
                            <a href="{{$item->link_web}}" target="_blank" data-toggle="tooltip" data-placement="top"
                                title="Link Website"><i class="fa-solid fa-globe"></i></a>
                            <a href="{{$item->twitter}}" target="_blank" data-toggle="tooltip" data-placement="top"
                                title="Link Twitter"><i class="fa-brands fa-twitter"></i></a>
                            <a href="{{$item->facebook}}" target="_blank" data-toggle="tooltip" data-placement="top"
                                title="Link Facebook"><i class="fa-brands fa-facebook"></i></a>
                            <a href="{{$item->instagram}}" target="_blank" data-toggle="tooltip" data-placement="top"
                                title="Link Instagram"><i class="fa-brands fa-instagram"></i></a>
                            <a href="{{$item->tiktok}}" target="_blank" data-toggle="tooltip" data-placement="top"
                                title="Link Tiktok"><i class="fa-brands fa-tiktok"></i></a>
                            <a href="{{$item->youtube}}" target="_blank" data-toggle="tooltip" data-placement="top"
                                title="Link Youtube"><i class="fa-brands fa-square-youtube"></i></a>
                        </div>
                    </td>
                    <td class="d-flex gap-2">
                        <a href="{{ route('portal.pembuatan.media-informasis.edit', $item->id) }}"
                            class="btn btn-primary btn-sm">
                            <i class="menu-icon tf-icons ti ti-pencil"></i>
                        </a>
                        <button class="btn btn-danger btn-sm">
                            <i class="menu-icon tf-icons ti ti-trash" onclick="deleteData('{{ $item->id }}')"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('js')
<script>
    $('[data-toggle="tooltip"]').tooltip();
    function deleteData(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: !0,
                confirmButtonText: "Yes, delete it!",
                customClass: {
                    confirmButton: "btn btn-primary me-3",
                    cancelButton: "btn btn-label-secondary",
                },
                buttonsStyling: !1,
            }).then(function(e) {

                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: 'DELETE',
                        url: "{{ url('portal/pembuatan/media-informasis') }}/" + id,
                        data: {
                            _token: CSRF_TOKEN,
                            id: id
                        },
                        dataType: 'JSON',
                        success: function(results) {
                            console.log(results)

                            if (results.success === true) {
                                console.log(results)
                                Swal.fire({
                                    icon: "success",
                                    title: "Deleted!",
                                    text: results.message,
                                    customClass: {
                                        confirmButton: "btn btn-success"
                                    },
                                });
                                // refresh page after 2 seconds
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else {
                                Swal.fire({
                                    title: "Gagal",
                                    text: results.message,
                                    icon: "error",
                                    customClass: {
                                        confirmButton: "btn btn-success"
                                    },
                                });
                            }
                        }
                    });

                } else {
                    console.log(e)

                    e.dismiss;
                }

            }, function(dismiss) {
                return false;
            })
        }
</script>
@endpush