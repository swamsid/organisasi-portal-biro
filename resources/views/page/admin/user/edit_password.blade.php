@extends('admin.app')

@section('content')
<div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Ubah Password User</h5>
      </div>
      <div class="card-body">
        <form action="{{ route('portal.master.user.edit.password.action', $user->id) }}" method="post">
          @csrf
          @method('put')
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label" for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" />
              @error('password') <small class="text-danger">{{$message}}</small> @enderror
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Ubah Password</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection