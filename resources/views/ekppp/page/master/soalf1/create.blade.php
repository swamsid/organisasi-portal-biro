@extends('ekppp.app')

@section('content')
    <!-- Users List Table -->
    <div class="card">
        <div class="card-header border-bottom">
            <div class="row">
                <div class="col-3">
                    <h5 class="card-title mb-3">Pembauatan F1</h5>
                </div>
            </div>
        </div>
        <div class="card-body mt-2">
            <form action="{{ route('pekppp.master.formf1.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <label for="">Nama Layanan</label>
                        <input type="text" name="name_layanan" class="form-control" list="layanans" autocomplete="off">
                        <datalist id="layanans">
                            @foreach ($layanans as $item)
                                <option value="{{ $item->name }}">
                            @endforeach
                        </datalist>
                    </div>
                    <div class="col-6">
                        <label for="">Nama Sub Layanan</label>
                        <input type="text" name="nama_sub_layanan" class="form-control" list="sub_layanans" autocomplete="off">
                        <datalist id="sub_layanans">
                            @foreach ($sub_layanans as $item)
                                <option value="{{ $item->name }}">
                            @endforeach
                        </datalist>
                    </div>
                    <div class="col mt-2">
                        <input type="radio" name="jenis" value="A"> Luring
                        <input type="radio" name="jenis" value="B"> Daring
                    </div>
                </div>

                <div class="row mt-3">
                    <hr>
                    <h5>Soal</h5>
                    <div class="col-12 mb-2">
                        <label for="">Keterangan Soal <span class="text-danger">*</span></label>
                        <input type="text" name="keterangan" class="form-control">
                    </div>
                    <div class="col">
                        <label for="">Nama Soal <span class="text-danger">*</span></label>
                        <input type="text" name="name_soal" class="form-control">
                    </div>
                    <div class="col">
                        <label for="">Tipe Soal</label>
                        <select name="type_soal" class="form-control" id="type_soal">
                            <option value="">Pilih Tipe Soal</option>
                            <option value="radio">Ya / Tidak</option>
                            <option value="input">Inputan</option>
                            <option value="multiple">Checklist</option>
                        </select>

                        <div id="multiple_value"></div>
                    </div>
                </div>

                <div class="form-check form-switch mt-3">
                    <input class="form-check-input" type="checkbox" role="switch" name="has_child" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Sub Soal</label>
                </div>

                <div id="sub-soal">
                    <div class="row mt-2">
                        <table class="table" id="table_sub_soal">
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>

                <button class="btn btn-primary mt-3">Simpan</button>
            </form>
        </div>
    </div>
@endsection
@include('ekppp.page.master.soalf1.javascript')
