@extends('ekppp.app')
@section('content')
    <div class="row">
        <!-- Default Wizard -->
        @foreach ($jenisSoal as $item)
            <div class="col-12 mb-2">
                <div class="card">
                    <div class="accordion accordion-flush" id="accordionFlushExample{{ $item->name }}">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne{{ $loop->iteration }}" aria-expanded="false"
                                    aria-controls="flush-collapseOne{{ $loop->iteration }}">
                                    <h4>{{ strtoupper($item->name) }}</h4>
                                </button>
                            </h2>
                            <div id="flush-collapseOne{{ $loop->iteration }}" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingOne"
                                data-bs-parent="#accordionFlushExample{{ $item->name }}">
                                <div class="accordion-body">
                                    <div class="row">
                                        @foreach ($item->jenisSubSoal as $subsoal)
                                            @foreach ($subsoal->soal as $soal)
                                                <form
                                                    action="{{ route('pekppp.penilaian.f01.store', ['idsoal' => $soal->id]) }}"
                                                    method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" value="{{ $request['form_id'] }}" name="form_id">
                                                    <input type="hidden" value="{{ $request['jenis'] }}" name="jenis">
                                                    <div class="col-md-12 mb-3">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h6>{{ strtoupper($subsoal->name) }}</h6>
                                                                <h5 class="card-title">{{ $loop->iteration }}.
                                                                    {{ $soal->keterangan }}</h5>
                                                            </div>
                                                            <div class="card-body">
                                                                <p class="card-text">{{ $soal->soal }}</p>
                                                                @if ($soal->has_child == "true")
                                                                    <div class="form-check">
                                                                        <input type="radio" class="form-check-input"
                                                                            name="answer_{{ $soal->id }}"
                                                                            value="yes" id="yes1">
                                                                        <label class="form-check-label"
                                                                            for="yes1">Ya</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio" class="form-check-input"
                                                                            name="answer_{{ $soal->id }}"
                                                                            value="no" id="no1">
                                                                        <label class="form-check-label"
                                                                            for="no1">Tidak</label>
                                                                    </div>
                                                                    @php
                                                                        $soalDecode = json_decode($soal->child_json_soal);
                                                                    @endphp
                                                                    <div class="additional-form" id="additionalForm1"
                                                                        style="display: none;">
                                                                        <div class="row">
                                                                            @foreach ($soalDecode->child_soal as $childSoal)
                                                                                @if ($childSoal->type_soal == 'radio')
                                                                                    <div class="col-md-12 mb-3">
                                                                                        <label class="form-label"
                                                                                            for="basic-default-fullname">{{ $childSoal->nama_soal }}
                                                                                            <span
                                                                                                class="text-danger">*</span></label>
                                                                                        <div class="form-check">
                                                                                            <input type="radio"
                                                                                                class="form-check-input"
                                                                                                name="{{ $childSoal->nama_soal }}"
                                                                                                value="yes"
                                                                                                id="yes1">
                                                                                            <label class="form-check-label"
                                                                                                for="yes1">Ya</label>
                                                                                        </div>
                                                                                        <div class="form-check">
                                                                                            <input type="radio"
                                                                                                class="form-check-input"
                                                                                                name="{{ $childSoal->nama_soal }}"
                                                                                                value="no"
                                                                                                id="no1">
                                                                                            <label class="form-check-label"
                                                                                                for="no1">Tidak</label>
                                                                                        </div>
                                                                                    </div>
                                                                                @elseif ($childSoal->type_soal == 'multiple')
                                                                                    <div class="col-md-12 mb-3">
                                                                                        <label class="form-label"
                                                                                            for="basic-default-fullname">{{ $childSoal->nama_soal }}
                                                                                            <span
                                                                                                class="text-danger">*</span></label>
                                                                                        <table class="table">
                                                                                            @foreach ($childSoal->jawaban as $jawaban)
                                                                                                <tr>
                                                                                                    <td><input
                                                                                                            type="checkbox"
                                                                                                            name="multiple[{{ $jawaban }}]">
                                                                                                    </td>
                                                                                                    <td>{{ $jawaban }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                            @endforeach
                                                                                        </table>
                                                                                    </div>
                                                                                @endif
                                                                            @endforeach
                                                                            <div class="col-md-12 mb-3">
                                                                                <label class="form-label"
                                                                                    for="basic-default-fullname">Bukti
                                                                                    Pendukung <span
                                                                                        class="text-danger">*</span></label>
                                                                                <input type="file" class="form-control"
                                                                                    name="bukti"
                                                                                    id="basic-default-fullname"
                                                                                    placeholder="Isi" value="" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @else
                                                                    @php
                                                                        $parent_soal = json_decode($soal->parent_json_soal);
                                                                    @endphp
                                                                    @if ($soal->type_soal == 'radio')
                                                                        <div class="col-md-12 mb-3">
                                                                            <label class="form-label"
                                                                                for="basic-default-fullname">{{ $soal->soal }}
                                                                                <span class="text-danger">*</span></label>
                                                                            <div class="form-check">
                                                                                <input type="radio"
                                                                                    class="form-check-input"
                                                                                    name="child_soal_answer_{{ $loop->iteration }}"
                                                                                    value="yes" id="yes1">
                                                                                <label class="form-check-label"
                                                                                    for="yes1">Ya</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input type="radio"
                                                                                    class="form-check-input"
                                                                                    name="child_soal_answer_{{ $loop->iteration }}"
                                                                                    value="no" id="no1">
                                                                                <label class="form-check-label"
                                                                                    for="no1">Tidak</label>
                                                                            </div>
                                                                        </div>
                                                                    @elseif ($soal->type_soal == 'multiple')
                                                                        <div class="col-md-12 mb-3">
                                                                            <label class="form-label"
                                                                                for="basic-default-fullname">{{ $soal->soal }}
                                                                                <span class="text-danger">*</span></label>
                                                                            <table class="table">
                                                                                @foreach ($parent_soal->jawaban as $jawaban)
                                                                                    @php
                                                                                        $countJawaban = 0;
                                                                                    @endphp
                                                                                    <tr>
                                                                                        <td><input type="checkbox"
                                                                                                name="multiple[{{ $jawaban }}]">
                                                                                        </td>
                                                                                        <td>{{ $jawaban }}</td>
                                                                                    </tr>
                                                                                    @php
                                                                                        $countJawaban++;
                                                                                    @endphp
                                                                                @endforeach
                                                                            </table>
                                                                        </div>

                                                                        <div class="col-md-12 mb-3">
                                                                            <label class="form-label"
                                                                                for="basic-default-fullname">Bukti
                                                                                Pendukung <span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="file" class="form-control"
                                                                                name="bukti" id="basic-default-fullname"
                                                                                placeholder="Isi" value="" />
                                                                        </div>
                                                                    @endif
                                                                @endif
                                                                <div class="text-end">
                                                                    <button type="submit"
                                                                        class="btn btn-primary btn-sm">Simpan</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@push('js')
    <script>
        // JavaScript to show additional form when "Yes" is selected
        document.querySelectorAll('input[type=radio]').forEach(function(radio) {
            radio.addEventListener('change', function() {
                var additionalForm = this.parentElement.parentElement.querySelector('.additional-form');
                if (this.value === 'yes') {
                    additionalForm.style.display = 'block';
                } else {
                    additionalForm.style.display = 'none';
                }
            });
        });
    </script>
@endpush
