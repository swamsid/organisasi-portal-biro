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
                <h5 class="card-title mb-0">List Content</h5>
                <a href="{{ route('portal.pembuatan.contents.create') }}" class="btn btn-primary">Tambah
                    Content</a>
            </div>
        </div>
    </div>
    <div class="card-datatable table-responsive">
        <table class="datatables table" id="zero_config1">
            <thead class="border-top">
                <tr>
                    <th></th>
                    <th>Layanan</th>
                    <th>Nama</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contents as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->layanan->judul }}</td>
                    <td>{{ $item->nama }}</td>
                    <td class="d-flex gap-2">
                        <a href="{{ route('portal.pembuatan.contents.edit', $item->id) }}"
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
                        url: "{{ url('portal/pembuatan/contents') }}/" + id,
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