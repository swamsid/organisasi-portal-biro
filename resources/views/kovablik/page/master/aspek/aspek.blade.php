@extends('kovablik.app')

@section('content')
    <!-- Users List Table -->
    <div class="card">
        <div class="card-header border-bottom">
            <div class="row">
                <div class="col-3">
                    <h5 class="card-title mb-3">List Aspek</h5>
                </div>
                <div class="col-9 d-flex justify-content-end">
                    <a class="btn btn-primary btn-sm" href=""><i class="ti ti-plus me-sm-1"></i>
                        Tambah Aspek</a>
                </div>
            </div>
        </div>
        <div class="card-datatable table-responsive">
            <table class="datatables table" id="zero_config1">
                <thead class="border-top">
                    <tr>
                        <th></th>
                        <th>Nama</th>
                        <th>Jumlah Detail</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($aspek as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{ $item->nama }}
                            </td>
                            <td>{{ $item->details->count() }}</td>
                            <td>
                                <a href="{{ route('rumah-inovasi.master.aspek.edit', $item->id) }}" class="btn btn-warning btn-sm"> <i class="ti ti-edit"></i></a>
                                <a href="{{ route('rumah-inovasi.master.aspek.show', $item->id) }}" class="btn btn-success btn-sm"> <i class="ti ti-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
