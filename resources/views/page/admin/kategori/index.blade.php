@extends('admin.app')

@section('content')
    <!-- Users List Table -->
    <div class="card">
        <div class="card-header border-bottom">
            <div class="row">
                <div class="col-3">
                    <h5 class="card-title mb-3">List Kategori</h5>
                </div>
                <div class="col-9 d-flex justify-content-end">
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addNewCCModal"><i
                            class="ti ti-plus me-sm-1"></i> Tambah Kategori</button>
                </div>
            </div>
        </div>
        <div class="card-datatable table-responsive">
            <table class="datatables table" id="zero_config1">
                <thead class="border-top">
                    <tr>
                        <th></th>
                        <th>Nama</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategori as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>
                                <a href="javascript:void(0)" class="btn btn-warning btn-sm editPost"
                                    data-id="{{ $item->id }}">
                                    <i class="ti ti-edit"></i>
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
    <div class="modal fade" id="addNewCCModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="mb-2">Tambah Kategori</h3>
                    </div>
                    <form id="addNewCCForm" class="row g-3" action="{{ route('portal.master.kategori.store') }}" method="POST">
                        @csrf
                        <div class="col-12 col-md-12">
                            <label class="form-label" for="modalAddCardName">Nama Kategori</label>
                            <input type="text" id="modalAddCardName" name="nama" class="form-control"
                                placeholder="John Doe" required />
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                            <button type="reset" class="btn btn-label-secondary btn-reset" data-bs-dismiss="modal"
                                aria-label="Close">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="mb-2">Edit Kategori</h3>
                    </div>
                    <form id="postForm" name="postForm" method="post">
                        @csrf
                        <div class="col-12 col-md-12 mb-3">
                            <label class="form-label" for="modalAddCardName">Nama Kategori</label>
                            <input type="text" id="namaa" name="nama" class="form-control" placeholder="John Doe"
                                required />
                            <input type="hidden" name="id" id="id">
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" id="savedata" class="btn btn-primary me-sm-3 me-1">Submit</button>
                            <button type="reset" class="btn btn-label-secondary btn-reset" data-bs-dismiss="modal"
                                aria-label="Close">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $('body').on('click', '.editPost', function() {
            var id = $(this).data('id');
            $.get("{{ route('portal.master.kategori.index') }}" + '/' + id + '/edit', function(data) {
                console.log(data)
                $('#editModal').modal('show');
                $('#id').val(data.id);
                $('#namaa').val(data.nama);
            })
        });

        $('#savedata').click(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var isi = {
                'id': $('#id').val(),
                'nama': $('#namaa').val()
            }
            isi['_method'] = 'PUT';
            e.preventDefault();
            $(this).html('Sending..');
            let id_jenis = isi.id;
            $.ajax({
                url: "{{ url('portal/master/kategori') }}/" + id_jenis,
                method: "PUT",
                dataType: 'json',
                data: isi,
                success: function(data) {
                    Swal.fire({
                        icon: "success",
                        title: "Updated!",
                        text: data.message,
                        customClass: {
                            confirmButton: "btn btn-success"
                        },
                    });
                    $('#postForm').trigger("reset");
                    $('#editModal').modal('hide');
                    setTimeout(function() {
                        location.reload();
                    }, 1500);
                },
                error: function(data) {
                    console.log('Error:', data.message);
                    Swal.fire({
                        icon: 'error',
                        title: "Data gagal di update",
                        showConfirmButton: false,
                        timer: 3000
                    });
                    $('#savedata').html('Save Changes');
                }
            });
        });
    </script>
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
                        url: "{{ url('portal/master/kategori') }}/" + id,
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
