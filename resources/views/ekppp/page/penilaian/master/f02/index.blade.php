@extends('ekppp.app')

@section('content')
    <!-- Users List Table -->
    <div class="card">
        <div class="card-header border-bottom">
            <div class="row">
                <div class="col-3">
                    <h5 class="card-title mb-3">List Indikator F02 Luring</h5>
                </div>
                <div class="col-9 d-flex justify-content-end">
                    <div class="row">
                        <a class="col-12 mb-3 btn btn-primary btn-sm" href="{{ route('pekppp.master.master-f02.create') }}"><i
                                class="ti ti-plus me-sm-1"></i>
                            Tambah Indikator F02</a>
                            <a class="col-12 btn btn-warning btn-sm" href="{{ route('pekppp.master.f02.daring') }}"><i
                                    class="ti ti-plus me-sm-1"></i>F02-Daring</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-datatable table-responsive">
            <table class="datatables table" id="zero_config1">
                <thead class="border-top">
                    <tr>
                        <th></th>
                        <th>Indikator</th>
                        <th>Kategori</th>
                        <th>Jumlah Skala Nilai</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($master as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->indikator }}</td>
                            <td>{{ $item->kategori->nama }}</td>
                            <td>{{ $item->jawaban->count() }}</td>
                            <td>
                                <a href="{{ route('pekppp.master.master-f02.edit', $item->id) }}"
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
                        url: "{{ url('pekppp/master/master-f02') }}/" + id,
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
