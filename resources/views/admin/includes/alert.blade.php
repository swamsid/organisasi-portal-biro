@if (session()->get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong> Sukses! </strong> {{ session()->get('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"
        aria-label="Close"></button>
</div>
@endif
@if (session()->get('danger'))
<div class="alert alert-danger alert-dismissible fade show mb-xl-0" role="alert">
    <strong> Gagal! </strong> {{ session()->get('danger') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"
        aria-label="Close"></button>
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif