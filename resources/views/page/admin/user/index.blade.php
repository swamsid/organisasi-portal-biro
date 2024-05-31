@extends('admin.app')

@section('content')
<!-- Users List Table -->
<div class="card">
    <div class="card-header border-bottom">
        <div class="row">
            <div class="col-3">
                <h5 class="card-title mb-3">List User</h5>
            </div>
            <div class="col-9 d-flex justify-content-end">
                <a class="btn btn-primary btn-sm" href="{{ route('portal.master.user.create') }}"><i
                        class="ti ti-plus me-sm-1"></i>
                    Tambah User</a>
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
                    <td class="text-uppercase">{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td class="text-uppercase">{{ $item->getRoleNames()[0] }}</td>
                    <td class="d-flex gap-2">
                        <a href="{{ route('portal.master.user.edit', $item->id) }}" class="btn btn-warning btn-sm"> <i
                                class="ti ti-edit"></i></a>
                        @if($item->getRoleNames()[0] != 'superadmin' && auth()->user()->getRoleNames()[0] ==
                        'superadmin')
                        <a href="{{ route('portal.master.user.edit.password.view', $item->id) }}"
                            class="btn btn-danger btn-sm px-3">
                            <i class="fa-solid fa-unlock-keyhole"></i>
                        </a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection