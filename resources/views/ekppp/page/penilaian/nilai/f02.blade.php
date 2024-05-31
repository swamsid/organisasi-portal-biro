@extends('ekppp.app')

@section('content')
    <!-- Users List Table -->
    <div class="card">
        <div class="card-header border-bottom">
            <div class="row">
                <div class="col-3">
                    <h5 class="card-title mb-3">Nilai F02</h5>
                </div>
            </div>
        </div>
        <div class="card-datatable table-responsive">
            <table class="datatables table" id="zero_config1">
                <thead class="border-top">
                    <tr>
                        <th>NO</th>
                        <th>ASPEK</th>
                        <th>NILAI ASPEK</th>
                        <th>NILAI BOBOT</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $sum = 0;
                    @endphp
                    @foreach ($kategori as $key => $item)
                        @php
                            $sum += $data->{'aspek' . ($key + 1) . '_average_percentage'};
                        @endphp
                        @if ($item->soal->count() != 0)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $data->{'aspek' . ($key + 1) . 'Average'} }}</td>
                                <td>{{ $data->{'aspek' . ($key + 1) . '_average_percentage'} }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <div class="table-responsive text-nowrap mt-3">
                <table class="table">
                    <thead class="border-top">
                        <tr class="text-center">
                            <th colspan="2">NILAI INDEX FORMULIR-02</th>
                            <td>{{ $sum }}</td>
                        </tr>
                        <tr class="text-center">
                            <th colspan="2">NILAI BOBOT FORMULIR-02 (75%)</th>
                            <td>{{ ($sum / 100) * 75}}</td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
