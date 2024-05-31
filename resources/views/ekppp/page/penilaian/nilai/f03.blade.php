@extends('ekppp.app')

@section('content')
    <!-- Users List Table -->
    @if ($data != null)
        <div class="card">
            <div class="card-header border-bottom">
                <div class="row">
                    <div class="col-3">
                        <h5 class="card-title mb-3">Nilai F03</h5>
                    </div>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <table class="datatables table" id="zero_config1">
                    <thead class="border-top">
                        <tr>
                            <th></th>
                            <th>Nama</th>
                            <th>No Hp</th>
                            @if ($data[0]->jenis == 'A')
                                @for ($i = 1; $i <= 14; $i++)
                                    <th>{{ 'u_' . $i }}</th>
                                @endfor
                            @else
                                @for ($i = 1; $i <= 11; $i++)
                                    <th>{{ 'u_' . $i }}</th>
                                @endfor
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->no_hp }}</td>
                                @if ($data[0]->jenis == 'A')
                                    @for ($ia = 1; $ia <= 14; $ia++)
                                        <td>{{ $item->{'u_' . $ia} ?? 'tidak isi' }}</td>
                                    @endfor
                                @else
                                    @for ($ia = 1; $ia <= 11; $ia++)
                                        <td>{{ $item->{'u_' . $ia} ?? 'tidak isi' }}</td>
                                    @endfor
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @if ($data[0]->jenis == 'B')
            <div class="card mt-3">
                <div class="card-body">
                    <div class="table-responsive text-nowrap mt-3">
                        <table class="table">
                            <thead class="border-top">
                                <tr class="text-center">
                                    <th colspan="2">NILAI RATA RATA</th>
                                    @for ($ia = 1; $ia <= 11; $ia++)
                                        <td>{{ $data->avg('u_' . $ia) }}</td>
                                    @endfor
                                </tr>
                                <tr class="text-center">
                                    <th colspan="2">ASPEK</th>
                                    <th colspan="4">A1</th>
                                    <th>A2</th>
                                    <th colspan="4">A3</th>
                                    <th>A4</th>
                                    <th>A5</th>
                                </tr>
                                <tr class="text-center">
                                    <th colspan="2">NILAI ASPEK</th>
                                    <th colspan="4">{{ $data[0]->aspek1Average }}</th>
                                    <th>{{ $data[0]->aspek2Average }}</th>
                                    <th colspan="4">{{ $data[0]->aspek3Average }}</th>
                                    <th>{{ $data[0]->aspek4Average }}</th>
                                    <th>{{ $data[0]->aspek5Average }}</th>
                                </tr>
                                <tr class="text-center">
                                    <th colspan="2">NILAI INDEX F-03</th>
                                    <th colspan="11">{{ $data[0]->IndexAverage }}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        @else
            <div class="card mt-3">
                <div class="card-body">
                    <div class="table-responsive text-nowrap mt-3">
                        <table class="table">
                            <thead class="border-top">
                                <tr class="text-center">
                                    <th colspan="2">NILAI RATA RATA</th>
                                    @for ($ia = 1; $ia <= 14; $ia++)
                                        <td>{{ $data->avg('u_' . $ia) }}</td>
                                    @endfor
                                </tr>
                                <tr class="text-center">
                                    <th colspan="2">ASPEK</th>
                                    <th colspan="4">A1</th>
                                    <th colspan="3">A2</th>
                                    <th colspan="4">A3</th>
                                    <th colspan="2">A4</th>
                                    <th>A5</th>
                                </tr>
                                <tr class="text-center">
                                    <th colspan="2">NILAI ASPEK</th>
                                    <th colspan="4">{{ $data[0]->aspek1AverageLuring }}</th>
                                    <th colspan="3">{{ $data[0]->aspek2AverageLuring }}</th>
                                    <th colspan="4">{{ $data[0]->aspek3AverageLuring }}</th>
                                    <th colspan="2">{{ $data[0]->aspek4AverageLuring }}</th>
                                    <th>{{ $data[0]->aspek5AverageLuring }}</th>
                                </tr>
                                <tr class="text-center">
                                    <th colspan="2">NILAI INDEX F-03</th>
                                    <th colspan="15">{{ $data[0]->IndexAverageLuring }}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    @else
        <div class="card">
            <div class="alert alert-danger alert-dismissible fade show mb-xl-0" role="alert">
                <strong> Gagal! </strong> Belum ada penilaian!
            </div>
        </div>
    @endif
@endsection
