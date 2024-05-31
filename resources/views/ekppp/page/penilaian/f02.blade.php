@extends('ekppp.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center  mb-4 mt-4">
                    <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                        <img src="{{ asset('uploads/' . $data->unit->opd->logo) }}" alt="user image" height="100px"
                            width="103px" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
                    </div>
                    <div class="flex-grow-1 mt-3 mt-sm-5">
                        <div
                            class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                            <div class="user-profile-info">
                                <h4>Form Survey 02 {{ $jenis == 'A' ? 'Luring' : 'Daring' }}</h4>
                                <ul
                                    class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                    <li class="list-inline-item d-flex gap-1">
                                        <i class='ti ti-color-swatch'></i> {{ $data->unit->nama }}
                                    </li>
                                    <li class="list-inline-item d-flex gap-1">
                                        <i class='ti ti-map-pin'></i> {{ $data->unit->opd->nama }}
                                    </li>
                                    <li class="list-inline-item d-flex gap-1">
                                        <i class='ti ti-calendar'></i> {{ $data->periode->judul }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Form 2</h5>
                </div>
                @if ($datas == null)
                    <form action="{{ route('pekppp.penilaian.f02.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="basic-default-fullname">Berita Acara <span
                                            class="text-danger">*</span></label>
                                    <input type="file" class="form-control" name="file" accept="application/pdf"
                                        id="basic-default-fullname" required />
                                    <input type="hidden" class="form-control" name="form_id" value="{{ $data->id }}">
                                    <input type="hidden" class="form-control" name="jenis" value="{{ $jenis }}">
                                </div>
                                @foreach ($f02 as $key => $item)
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label" for="basic-default-email">{{ $item->indikator }}<span
                                                class="text-danger">*</span></label>
                                        @foreach ($item->jawaban as $items)
                                            <div class="form-check mt-3">
                                                <input name="u_{{ $key + 1 }}" class="form-check-input" type="radio"
                                                    value="{{ $items->value }}" id="defaultRadio1" />
                                                <label class="form-check-label" for="defaultRadio1">
                                                    {{ $items->value }} - {{ $items->jawaban }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                @else
                    <form action="{{ route('pekppp.penilaian.f02.update', $datas->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="basic-default-fullname">Berita Acara <span
                                            class="text-danger">*</span></label>
                                    <input type="file" class="form-control" name="file" accept="application/pdf"
                                        id="basic-default-fullname" value="{{ $datas->file }}"/>
                                    <input type="hidden" class="form-control" name="form_id" value="{{ $data->id }}">
                                    <input type="hidden" class="form-control" name="jenis" value="{{ $jenis }}">
                                </div>
                                @foreach ($f02 as $key => $item)
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label" for="basic-default-email">{{ $item->indikator }}<span
                                                class="text-danger">*</span></label>
                                        @foreach ($item->jawaban as $items)
                                            <div class="form-check mt-3">
                                                <input name="u_{{ $key + 1 }}" class="form-check-input" type="radio"
                                                    value="{{ $items->value }}" id="defaultRadio1" {{ $datas->{'u_'.$key + 1} == $items->value ? 'checked' : '' }}/>
                                                <label class="form-check-label" for="defaultRadio1">
                                                    {{ $items->value }} - {{ $items->jawaban }} -
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
