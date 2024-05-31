@extends('ekppp.app')
@section('content')
    <div class="row">
        <div class="col-12 col-lg-12">
            <!-- Product Information -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-tile mb-0">Form data Master F03</h5>
                </div>
                <div class="card-body">
                    @if (Route::is('pekppp.master.master-f03.create'))
                        <form action="{{ route('pekppp.master.master-f03.store') }}" method="post"
                            enctype="multipart/form-data">
                        @else
                            <form action="{{ route('pekppp.master.master-f03.update', $master->id) }}" method="post"
                                enctype="multipart/form-data">
                                @method('PUT')
                    @endif
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="ecommerce-product-name">Pilih Kategori</label>
                        <select id="select2Basic" name="kategori_id" class="select2 form-select form-select-lg"
                            data-allow-clear="true" required>
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('kategori_id', $master->kategori_id) == $item->id ? 'selected' : null }}>
                                    {{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="ecommerce-product-sku">Indikator</label>
                        <input type="text" class="form-control" name="indikator" id="indikator"
                            value="{{ $master->indikator }}" required>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label class="form-label" for="ecommerce-product-sku">Penilaian</label>
                        </div>
                        <div class="col-6 text-end">
                            <button class="btn btn-success btn-sm" type="button" onclick="tambahData()">+</button>
                        </div>
                    </div>
                    @if (!Route::is('pekppp.master.master-f03.create'))
                        <div class="row mb-3 d-flex align-items-end">
                            @foreach ($master->jawaban as $items)
                                <div class="col-11">
                                    <label class="form-label" for="ecommerce-product-sku">Nilai</label>
                                    <input type="number" class="form-control" name="value[]" id="value" value="{{ $items->value }}" required>
                                </div>
                                <div class="col-1">
                                    <button class="btn btn-danger delete_${count}" type="button"
                                        onclick="deleteData({{ $items->id }})">-</button>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <div id="tambahData">

                    </div>
                    <div class="text-end mt-3">
                        <button class="btn btn-primary" type="submit">Tambah</button>
                    </div>
                    </form>
                </div>
            </div>
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
                        type: 'POST',
                        url: "{{ url('pekppp/master/hapus-detailf03') }}/" + id,
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
        let hitung = 0;

        function makeid(length) {
            var result = '';
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for (var i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            return result;
        }


        function tambahData(e) {
            hitung++;
            let count = makeid(10);
            let html = `
            <div id="body_${count}">
                <div class="row mb-3 d-flex align-items-end">
                    <div class="col-10">
                        <label class="form-label" for="ecommerce-product-sku">Nilai</label>
                        <input type="number" class="form-control" name="value[]" id="value" required>
                    </div>
                    <div class="col-1">
                        <button class="btn btn-danger delete_${count}" type="button" data-target="${ count }" onclick="delButton(this)">-</button>
                    </div>
                </div>
            </div>
        `;
            $('#tambahData').append(html);
        }

        function delButton(e) {
            hitung--;
            console.log(e)
            let id = $(e).data('target');
            $('#body_' + id).remove();
        }
    </script>
@endpush
