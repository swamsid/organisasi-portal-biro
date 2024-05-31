@extends('admin.app')

@section('content')
<!-- Users List Table -->
<div class="card">
    <div class="card-header border-bottom">
        <div class="row">
            <div class="col-3">
                <h5 class="card-title mb-3">List Menu</h5>
            </div>
            <div class="col-9 d-flex justify-content-end">
                <a class="btn btn-primary btn-sm" href="{{ route('menu.menu.create') }}"><i
                        class="ti ti-plus me-sm-1"></i>
                    Tambah Menu</a>
            </div>
        </div>
    </div>
    <div class="card-datatable table-responsive">
        <table class="datatables table" id="zero_config1">
            <thead class="border-top">
                <tr>
                    <th>Slug</th>
                    <th>Nama</th>
                    <th>URL</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menu as $item)
                <tr>
                    <td>{{ $item->slug }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->url ?? "-"}}</td>
                    <td class="text-end">
                        <a href="{{ route('menu.menu.edit', $item->id) }}" class="btn btn-info btn-sm">Edit</a>
                        <button type="button" class="btn btn-danger btn-sm"
                            onclick="deleteData('{{ $item->id }}')">Hapus</button>
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
                        url: "{{ url('menu/menu') }}/" + id,
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