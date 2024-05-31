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
            <h3>Form Layanan</h3>
        </div>
        <div class="card-body">
            @if (Route::is('portal.pembuatan.layanans.create'))
                <form action="{{ route('portal.pembuatan.layanans.store') }}" method="post" enctype="multipart/form-data">
                @else
                    <form action="{{ route('portal.pembuatan.layanans.update', $layanan->id) }}" method="post"
                        enctype="multipart/form-data">
                        @method('PUT')
            @endif
            @csrf
            <div class="row col-lg-12">
                @role('opd')
                    <div class="col-md-12 mb-3">
                        <label class="form-label" for="basic-default-email">Kategori</label>
                        <select id="select2Basic" name="submenu_id" class="select2 form-select form-select-lg"
                            data-allow-clear="true" required>
                            <option value="">Pilih Kategori</option>
                            @foreach ($submenu as $item)
                                @if ($item->id == auth()->user()->opd->sub_menu_id)
                                    <option value="{{ $item->id }}" selected>{{ $item->nama }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endif
                            @endforeach
                        </select>
                        {{-- <div class="input-group input-group-merge">
                            <input type="hidden" name="submenu_id" value="{{ old('submenu_id', $submenu[0]) }}">
                            <input type="text" class="form-control" value="{{ $submenu[1] }}" readonly />
                        </div> --}}
                    </div>
                @endrole
                @hasanyrole('superadmin|admin')
                    <div class="col-md-12 mb-3">
                        <div>
                            <label for="defaultFormControlInput" class="form-label">Opd</label>
                            <select id="select2Basic3" name="user_id" class="select2 form-select form-select-lg"
                                data-allow-clear="true" required>
                                <option value="">Pilih Opd</option>
                                @foreach ($opds as $item)
                                    @if ($item->id == $layanan?->user?->opd->id)
                                        <option value="{{ $item->user_id }}" selected>{{ $item->nama }}</option>
                                    @else
                                        <option value="{{ $item->user_id }}">{{ $item->nama }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div>
                            <label for="defaultFormControlInput" class="form-label">Kategori</label>
                            <select id="select2Basic" name="submenu_id" class="select2 form-select form-select-lg"
                                data-allow-clear="true" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($submenu as $item)
                                    @if ($item->id == $layanan->sub_menu_id)
                                        <option value="{{ $item->id }}" selected>{{ $item->nama }}</option>
                                    @else
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endif
                                @endforeach
                                {{-- @if (Route::is('portal.pembuatan.layanans.edit'))
                                <option value="{{$submenu->id}}" selected>{{$submenu->nama}}</option>
                                @endif --}}
                                {{-- <option value="">Pilih Kategori</option> --}}
                                {{-- @foreach ($submenu as $item)
                                <option value="[{{ $item->sub_menu_id }}, {{ $item->user_id }}]" {{ old('submenu',
                                    $layanan->submenu_id) ==
                                    $item->sub_menu_id ?
                                    'selected' : null }}>
                                    {{$item->nama_user}} - {{ $item->nama }}
                                </option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>
                @endhasanyrole
                <div class="col-md-12 mb-3">
                    <div>
                        <label for="defaultFormControlInput" class="form-label">Icon <span class="text-danger">(Svg,
                                JPG, PNG)*</span></label>
                        <input type="file" class="form-control" name="icon" />
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <div>
                        <label for="defaultFormControlInput" class="form-label">Judul</label>
                        <input type="text" class="form-control" name="judul" id="defaultFormControlInput"
                            aria-describedby="defaultFormControlHelp" value="{{ old('judul', $layanan->judul) }}"
                            required />
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <div>
                        <label for="defaultFormControlInput" class="form-label">Isi</label>
                        <textarea class="form-control" name="isi">{{ $layanan->isi }}</textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div>
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script>
        // $('#select2Basic3').on('select2:select', function (e) {
        //     $.get(`/sub-menu/${e.target.value}`, function(res){
        //         const {id, nama} = res.data;

        //         $('#select2Basic').empty();
        //         $('#select2Basic').append(`<option value="${id}" selected>${nama}</option>`);
        //     });
        // });
    </script>
@endpush
