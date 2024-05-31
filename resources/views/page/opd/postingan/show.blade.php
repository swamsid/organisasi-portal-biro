@extends('admin.app')
@push('css')
<style>
  .ck-editor__editable[role="textbox"] {
    /* editing area */
    min-height: 200px;
  }

  .ck-content .image {
    /* block images */
    max-width: 80%;
    margin: 20px auto;
  }

  p {
    margin: 1px 0;
    padding: 5px;
  }
</style>
@endpush
@section('content')
<div class="card">
  <div class="card-header">
    <h3>Detail Layanan</h3>
  </div>
  <div class="card-body">
    <div class="row col-lg-6">
      <div class="col-md-12 mb-3">
        <div>
          <label for="defaultFormControlInput" class="form-label">Opd</label>
          <select id="select2Basic3" name="user_id" class="form-select" data-allow-clear="true" required disabled>
            <option value="" selected>{{$layanan->user->opd->nama}}</option>
          </select>
        </div>
      </div>
      <div class="col-md-12 mb-3">
        <div>
          <label for="defaultFormControlInput" class="form-label">Kategori</label>
          <select id="select2Basic" name="submenu_id" class="form-select" data-allow-clear="true" required disabled>
            <option value="" selected>{{$sub_menu->nama}}</option>
          </select>
        </div>
      </div>
      <div class="col-md-12 mb-3">
        <div class="d-flex flex-column">
          <label for="defaultFormControlInput" class="form-label">Icon <span class="text-danger">(Svg,
              JPG, PNG)*</span></label>
          <img height="52px" width="53px" src="{{ asset('uploads/' . $layanan->file_icon) }}" alt="">
        </div>
      </div>
      <div class="col-md-12 mb-3">
        <div>
          <label for="defaultFormControlInput" class="form-label">Judul</label>
          <input type="text" class="form-control" name="judul" id="defaultFormControlInput"
            aria-describedby="defaultFormControlHelp" value="{{ old('judul', $layanan->judul) }}" required disabled />
        </div>
      </div>
      <div class="col-md-12 mb-3">
        <div>
          <label for="defaultFormControlInput" class="form-label">Isi</label>
          <textarea class="form-control" name="isi" disabled>{{ $layanan->isi }}</textarea>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection