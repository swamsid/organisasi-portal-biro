@extends('admin.app')

@section('content')
<!-- Users List Table -->
<div class="card">
    <div class="card-header border-bottom">
        <div class="row">
            <div class="col d-flex flex-lg-row flex-column justify-content-between align-items-lg-end">
                <h5 class="card-title mb-0">List Verifikasi Berita</h5>
                @role(['superadmin', 'admin', 'opd'])
                <a href="{{ route('portal.verifikasi.all.berita') }}" class="btn btn-success">
                    Verifikasi Semua Berita
                </a>
                @endrole
            </div>
        </div>
    </div>
    <div class="card-datatable table-responsive">
        <table class="datatables table" id="zero_config1">
            <thead class="border-top">
                <tr>
                    <th></th>
                    <th>Judul</th>
                    <th>Pembuat</th>
                    <th>Status Verifikasi</th>
                    <th>Verifikator</th>
                    <th>Tanggal Dibuat</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($berita as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ verif($item->verif) }}</td>
                    <td>{{ $item->verifs->name ?? '-' }}</td>
                    <td>{{ tglIndo($item->created_at) }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            @role(['superadmin', 'admin', 'opd'])
                            <button class="btn btn-secondary btn-sm" onclick="diProses('{{ $item->id }}')">
                                <i class="menu-icon tf-icons ti ti-check me-0"></i>
                            </button>
                            @endrole
                            <a href="{{ route('portal.pembuatan.beritas.show', $item->id) }}"
                                class="btn btn-info btn-sm">
                                <i class="menu-icon tf-icons ti ti-eye me-0"></i>
                            </a>
                        </div>
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
    function diProses(id) {
            Swal.fire({
                title: "Yakin?",
                text: "Apakah anda yakin memverifikasi?",
                icon: "warning",
                showCancelButton: !0,
                confirmButtonText: "Ya, verifikasi!",
                customClass: {
                    confirmButton: "btn btn-primary me-3",
                    cancelButton: "btn btn-label-secondary",
                },
            }).then(function(e) {

                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: 'PUT',
                        url: "{{ url('portal/verifikasi/berita') }}/" + id,
                        data: {
                            _token: CSRF_TOKEN,
                            id: id,
                            status: 'diproses'
                        },
                        dataType: 'JSON',
                        success: function(results) {
                            console.log(results)

                            if (results.success === true) {
                                console.log(results)
                                Swal.fire(
                                    'Terupdate!',
                                    results.message,
                                    'success'
                                )
                                // refresh page after 2 seconds
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else {
                                Swal.fire("Error!", results.message, "error");
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