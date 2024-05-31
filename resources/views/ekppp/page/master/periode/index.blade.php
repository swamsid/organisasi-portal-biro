@extends('ekppp.app')

@section('content')
    <!-- Users List Table -->
    <div class="card">
        <div class="card-header border-bottom">
            <div class="row">
                <div class="col-3">
                    <h5 class="card-title mb-3">List Periode</h5>
                </div>
                <div class="col-9 d-flex justify-content-end">
                    <a class="btn btn-primary btn-sm" href="{{ route('pekppp.master.periode.create') }}"><i
                            class="ti ti-plus me-sm-1"></i>
                        Tambah Periode</a>
                </div>
            </div>
        </div>
        <div class="card-datatable table-responsive">
            <table class="datatables table" id="zero_config1">
                <thead class="border-top">
                    <tr>
                        <th></th>
                        <th>Judul</th>
                        <th>File</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($periode as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>
                                <img src="{{ asset('uploads/' . $item->file) }}"
                                    alt="Preview File" style="width: 30%">
                            </td>
                            <td>{{ status($item->status) }}</td>
                            <td>
                                <a href="{{ route('pekppp.master.periode.edit', $item->id) }}"
                                    class="btn btn-warning btn-sm mb-2">
                                    <i class="ti ti-pencil"></i>
                                </a>
                                <a href="javascript:void(0)" class="btn btn-danger btn-sm"
                                    onclick="deleteData({{ $item->id }})">
                                    <i class="ti ti-trash"></i>
                                </a>
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
                        url: "{{ url('pekppp/master/periode') }}/" + id,
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
