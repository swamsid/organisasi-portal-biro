@extends('ekppp.app')

@section('content')
    <!-- Users List Table -->
    <div class="card">
        <div class="card-header border-bottom">
            <div class="row">
                <div class="col-3">
                    <h5 class="card-title mb-3">Time Line</h5>
                </div>
            </div>
        </div>
        @foreach ($periode as $item)
            <div class="card-body p-4">
                <span>{{ $item->judul }}</span>
                <img src="{{ asset('uploads/'.$item->file) }}" alt="" width="100%">
            </div>
            <hr>
        @endforeach
    </div>
@endsection
