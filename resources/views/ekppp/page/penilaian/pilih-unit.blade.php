@extends('ekppp.app')

@section('content')
    <!-- Users List Table -->
    <div class="card">
        <div class="card-header border-bottom">
            <div class="row">
                <div class="col-3">
                    <h5 class="card-title mb-3">Pilih Unit</h5>
                </div>
                @hasanyrole(['superadmin', 'opd'])
                    <div class="col-9 d-flex justify-content-end">
                        <a class="btn btn-primary btn-sm" href="{{ route('pekppp.master.form-nilai.create') }}"><i
                                class="ti ti-plus me-sm-1"></i>
                            Tambah Unit Form</a>
                    </div>
                @endhasanyrole
            </div>
            <div class="card-datatable table-responsive">
                <table class="datatables table" id="zero_config1">
                    <thead class="border-top">
                        <tr>
                            <th></th>
                            <th>Unit Lokus</th>
                            <th>Opd</th>
                            <th>Periode</th>
                            <th>Actions</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($unit as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->unit->nama }}</td>
                                <td>{{ $item->unit->opd->nama }}</td>
                                <td>{{ $item->periode->judul }}</td>
                                <td>
                                    <div class="d-inline p-2">
                                        <a href="{{ route('pekppp.penilaian.f01.create') }}"
                                            class="btn btn-warning mb-2 btn-sm">Form
                                            F-01</a>

                                    </div>
                                    <div class="d-inline p-2">
                                        <a href="{{ route('pekppp.penilaian.formulir2.jenis', [$item->unit->jenis, $item->id]) }}"
                                            class="btn btn-primary mb-2 btn-sm">
                                            @if ($item->f02 != null)
                                                <i class="ti ti-check me-sm-1 bg-success"></i>
                                            @endif
                                            Form F-02
                                        </a>
                                    </div>
                                    <div class="d-inline p-2">
                                        <a href="{{ route('pekppp.penilaian.formulir.jenis', [$item->unit->jenis, $item->uuid]) }}"
                                            target="_blank" class="btn btn-primary mb-2 btn-sm">
                                            @if ($item->f03 != null)
                                                <i class="ti ti-check me-sm-1 bg-success"></i>
                                            @endif
                                            Form F-03
                                        </a>
                                    </div>
                                    <div class="d-inline p-2">
                                        <a href="" class="btn btn-primary mb-2 btn-sm">
                                            Rekomendasi
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    @if (!empty($item->f02) && !empty($item->f03))
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">Nilai</button>
                                            <div class="dropdown-menu">
                                                @if (!empty($item->f02))
                                                    <a class="dropdown-item"
                                                        href="{{ route('pekppp.penilaian.nilai.f02', $item->id) }}"> F02</a>
                                                @endif
                                                @if (!empty($item->f03))
                                                    <a class="dropdown-item"
                                                        href="{{ route('pekppp.penilaian.nilai.f03', $item->id) }}"> F03</a>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
