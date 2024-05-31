@extends('ekppp.page.penilaian.form-survey')
@section('title', '03')
@push('css')
    <style>
        #form-survei {
            display: none;
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center  mb-4 mt-4">
                    <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                        <img src="{{ asset('uploads/' . $data->unit->opd->logo) }}" alt="user image" height="100px"
                            width="103px" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
                    </div>
                    <div class="flex-grow-1 mt-3 mt-sm-5">
                        <div
                            class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                            <div class="user-profile-info">
                                <h4>Form Survey 03</h4>
                                <ul
                                    class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                    <li class="list-inline-item d-flex gap-1">
                                        <i class='ti ti-color-swatch'></i> {{ $data->unit->nama }}
                                    </li>
                                    <li class="list-inline-item d-flex gap-1">
                                        <i class='ti ti-map-pin'></i> {{ $data->unit->opd->nama }}
                                    </li>
                                    <li class="list-inline-item d-flex gap-1">
                                        <i class='ti ti-calendar'></i> {{ $data->periode->judul }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <form action="{{ route('pekppp.penilaian.f03.store') }}" method="post">
            @csrf
            <div class="col-xl-12" id="form-data-diri">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Data Diri</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label" for="ecommerce-product-sku">Nama</label>
                                <input type="text" class="form-control" name="nama" placeholder="Masukan nama anda"
                                    id="nama1">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label" for="ecommerce-product-sku">Nomor HP</label>
                                <input type="number" class="form-control" name="no_hp"
                                    placeholder="Masukan nomor hp anda" id="no_hp1">
                                <input type="hidden" class="form-control" name="form_id" value="{{ $data->id }}">
                                <input type="hidden" class="form-control" name="jenis" value="{{ $jenis }}">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" id="lanjut" type="button">Lanjut</button>
                    </div>
                </div>
            </div>
            <div class="col-xl-12" id="form-survei">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Form 3</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($f03 as $key => $item)
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="basic-default-email">{{ $item->indikator }}</label>
                                    <br>
                                    @foreach ($item->jawaban->sortBy('value') as $items)
                                        <div class="form-check form-check-inline mt-3">
                                            <input class="form-check-input" type="radio" name="u_{{ $key + 1 }}"
                                                id="inlineRadio1_{{ $key + 1 }}" value="{{ $items->value }}" />
                                            <label class="form-check-label" for="inlineRadio1">{{ $items->value }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" id="kembali" class="btn btn-warning">Kembali</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('js')
    <script>
        document.getElementById('lanjut').addEventListener('click', function() {
            var a = document.getElementById('nama1').value;
            var b = document.getElementById('no_hp1').value;
            console.log(a);
            if (a == '' || b == '') {
                alert('silahkan isi nama/no_hp terlebih dahulu');
            }else{
                document.getElementById('form-data-diri').style.display = 'none';
                document.getElementById('form-survei').style.display = 'block';
            }
            
        });
        document.getElementById('kembali').addEventListener('click', function() {
            document.getElementById('form-data-diri').style.display = 'block';
            document.getElementById('form-survei').style.display = 'none';
        });
    </script>
@endpush
