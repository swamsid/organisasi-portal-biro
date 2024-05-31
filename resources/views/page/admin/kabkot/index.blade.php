@extends('admin.app')

@section('content')
<!-- Users List Table -->
<div class="card">
    <div class="card-header border-bottom">
        <div class="row">
            <div class="col-3">
                <h5 class="card-title mb-3">List Kabkot</h5>
            </div>
            <div class="col-9 d-flex justify-content-end">
                <a class="btn btn-primary btn-sm" href="{{ route('portal.master.kabkot.create') }}"><i
                        class="ti ti-plus me-sm-1"></i>
                    Tambah kabkot</a>
            </div>
        </div>
    </div>
    <div class="card-datatable table-responsive">
        <table class="datatables table" id="zero_config1">
            <thead class="border-top">
                <tr>
                    <th></th>
                    <th>Logo</th>
                    <th>Nama</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kabkot as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <img src="{{ asset('uploads/'. $item->logo) }}" alt="" width="80">
                    </td>
                    <td>{{ $item->regency->name }}</td>
                    <td>
                        <a href="{{ route('portal.master.kabkot.edit', $item->id) }}" class="btn btn-warning btn-sm"> <i
                                class="ti ti-edit"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection