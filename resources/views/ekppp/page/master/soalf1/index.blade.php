@extends('ekppp.app')

@section('content')
    <!-- Users List Table -->
    <div class="card">
        <div class="card-header border-bottom">
            <div class="row">
                <div class="col-3">
                    <h5 class="card-title mb-3">List Form F-01</h5>
                </div>
                <div class="col-9 d-flex justify-content-end">
                    <a class="btn btn-primary btn-sm waves-effect waves-light" href="{{ route('pekppp.master.formf1.create') }}"><i class="ti ti-plus me-sm-1"></i>
                        Tambah Soal</a>
                </div>
            </div>
        </div>
        <div class="card-datatable table-responsive">
            <table class="datatables table" id="zero_config1">
                <thead class="border-top">
                    <tr>
                        <th></th>
                        <th>Tanda Tangan</th>
                        <th>Nama</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
@endsection
