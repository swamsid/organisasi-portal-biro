@extends('ekppp.app')

@section('content')
    <!-- Users List Table -->
    <div class="card">
        <div class="card-header border-bottom">
            <div class="row">
                <div class="col-3">
                    <h5 class="card-title mb-3">List Verifikator</h5>
                </div>
                <div class="col-9 d-flex justify-content-end">
                    <a class="btn btn-primary btn-sm" href="{{ route('pekppp.master.verifikator.create') }}"><i class="ti ti-plus me-sm-1"></i>
                        Tambah Verifikator</a>
                </div>
            </div>
        </div>
        <div class="card-datatable table-responsive">
            <table class="datatables table" id="zero_config1">
                <thead class="border-top">
                    <tr>
                        <th></th>
                        <th>User</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->getRoleNames()[0] }}</td>
                            <td>
                                <a href="{{ route('pekppp.master.verifikator.edit', $item->id) }}" class="btn btn-warning btn-sm"> <i class="ti ti-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
