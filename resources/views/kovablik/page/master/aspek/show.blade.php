@extends('kovablik.app')

@section('content')
    <!-- Users List Table -->
    <div class="card">
        <div class="card-header border-bottom">
            <div class="row">
                <div class="col-8">
                    <h5 class="card-title mb-3">List Detail {{ $aspek->nama }}</h5>
                </div>
                <div class="col-4 d-flex justify-content-end">
                    <a href="{{ route('rumah-inovasi.master.aspek.index') }}" class="btn btn-primary btn-sm">Kembali</a>
                </div>
            </div>
        </div>
        <div class="card-datatable table-responsive">
            <table class="datatables table" id="zero_config1">
                <thead class="border-top">
                    <tr>
                        <th></th>
                        <th>Nama</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!$aspek->details->isEmpty())
                        @foreach ($aspek->details as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ $item->nama }}
                                </td>
                            </tr>
                        @endforeach
                    @else
                    <tr>
                        <td>Tidak memiliki detail aspek</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
