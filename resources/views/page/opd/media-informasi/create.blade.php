@extends('admin.app')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <h3>Form Media Informasi</h3>
    </div>
    <div class="card-body">
        @if (Route::is('portal.pembuatan.media-informasis.create'))
        <form action="{{ route('portal.pembuatan.media-informasis.store') }}" method="post"
            enctype="multipart/form-data">
            @else
            <form action="{{ route('portal.pembuatan.media-informasis.update', $media_informasi->id) }}" method="post"
                enctype="multipart/form-data">
                @method('PUT')
                @endif
                @csrf
                <div class="row col-12">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div>
                                    <label for="defaultFormControlInput" class="form-label">Layanan</label>
                                    <select id="select2Basic" name="layanan_id"
                                        class="select2 form-select form-select-lg" data-allow-clear="true" required>
                                        <option value="">Pilih Layanan</option>
                                        @foreach ($layanan as $item)
                                        @if($item->id == $media_informasi->layanan_id)
                                        <option value="{{$item->id}}" selected>{{$item->judul}}</option>
                                        @else
                                        <option value="{{$item->id}}">{{$item->judul}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div>
                                    <label for="defaultFormControlInput" class="form-label">Link Embed</label>
                                    <input type="text" class="form-control" name="link_embed"
                                        id="defaultFormControlInput" aria-describedby="defaultFormControlHelp"
                                        value="{{ old('link_embed', $media_informasi->link_embed) }}" />
                                    @error('link_embed') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                            </div>
                            <div class=" col-md-12 mb-3">
                                <div>
                                    <label for="defaultFormControlInput" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        value="{{ old('email', $media_informasi->email) }}" required />
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div>
                                    <label for="defaultFormControlInput" class="form-label">Telp</label>
                                    <input type="text" class="form-control" name="telp" id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        value="{{ old('telp', $media_informasi->telp) }}" required />
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div>
                                    <label for="defaultFormControlInput" class="form-label">Hot Line</label>
                                    <input type="text" class="form-control" name="hotline" id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        value="{{ old('hotline', $media_informasi->hotline) }}" required />
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div>
                                    <label for="defaultFormControlInput" class="form-label">Link Web</label>
                                    <input type="text" class="form-control" name="link_web" id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        value="{{ old('link_web', $media_informasi->link_web) }}" required />
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div>
                                    <label for="defaultFormControlInput" class="form-label">Link Whatsapp</label>
                                    <input type="text" class="form-control" name="whatsapp" id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        value="{{ old('whatsapp', $media_informasi->whatsapp) }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div>
                                    <label for="defaultFormControlInput" class="form-label">Tarif</label>
                                    <select id="select2Basic2" name="tarif" class="select2 form-select form-select-lg"
                                        data-allow-clear="true" required>
                                        <option value="">Pilih Layanan</option>
                                        @foreach ($tarifs as $item)
                                        @if($item == $media_informasi->tarif)
                                        <option value="{{$item}}" selected>{{$item}}</option>
                                        @else
                                        <option value="{{$item}}">{{$item}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div>
                                    <label for="defaultFormControlInput" class="form-label">Link Akses</label>
                                    <input type="text" class="form-control" name="link_akses"
                                        id="defaultFormControlInput" aria-describedby="defaultFormControlHelp"
                                        value="{{ old('link_akses', $media_informasi->link_akses) }}" required />
                                    @error('link_akses') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div>
                                    <label for="defaultFormControlInput" class="form-label">Link Twitter</label>
                                    <input type="text" class="form-control" name="twitter" id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        value="{{ old('twitter', $media_informasi->twitter) }}" />
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div>
                                    <label for="defaultFormControlInput" class="form-label">Link Facebook</label>
                                    <input type="text" class="form-control" name="facebook" id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        value="{{ old('facebook', $media_informasi->facebook) }}" />
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div>
                                    <label for="defaultFormControlInput" class="form-label">Link Instagram</label>
                                    <input type="text" class="form-control" name="instagram"
                                        id="defaultFormControlInput" aria-describedby="defaultFormControlHelp"
                                        value="{{ old('instagram', $media_informasi->instagram) }}" />
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div>
                                    <label for="defaultFormControlInput" class="form-label">Link Tik Tok</label>
                                    <input type="text" class="form-control" name="tiktok" id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        value="{{ old('tiktok', $media_informasi->tiktok) }}" />
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div>
                                    <label for="defaultFormControlInput" class="form-label">Link Youtube</label>
                                    <input type="text" class="form-control" name="youtube" id="defaultFormControlInput"
                                        aria-describedby="defaultFormControlHelp"
                                        value="{{ old('youtube', $media_informasi->youtube) }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="col-md-12 mb-3">
                            <div>
                                <label for="defaultFormControlInput" class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" id="defaultFormControlInput"
                                    aria-describedby="defaultFormControlHelp"
                                    value="{{ old('alamat', $media_informasi->alamat) }}" required />
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div>
                                <div class="d-flex justify-content-between align-items-end">
                                    <label for="defaultFormControlInput" class="form-label">Jam Operasional</label>
                                    <button type="button" class="btn btn-success"><i
                                            class="fa-solid fa-plus"></i></button>
                                </div>
                                <div class="row mt-4 data_operasional_wrapper">
                                    @if(count($media_informasi->operasional) != 0)
                                    @foreach ($media_informasi->operasional as $itemOperasional)
                                    <div class="col-12 data_operasional mb-3" data-operasional="{{$loop->iteration}}">
                                        <div class="row">
                                            <div class="col">
                                                <select id="select_{{$loop->iteration}}" name="hari[]"
                                                    class="form-select" data-allow-clear="true" required>
                                                    <option value="">Pilih Hari</option>
                                                    @foreach ($haris as $item)
                                                    @if($item == $itemOperasional->hari)
                                                    <option value="{{$item}}" selected>{{$item}}</option>
                                                    @else
                                                    <option value="{{$item}}">{{$item}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col">
                                                <input type="time" class="form-control" name="jam_awal[]"
                                                    id="defaultFormControlInput"
                                                    aria-describedby="defaultFormControlHelp" required
                                                    value="{{$itemOperasional->jam_awal}}" />
                                            </div>
                                            <div class="col">
                                                <input type="time" class="form-control" name="jam_akhir[]"
                                                    id="defaultFormControlInput"
                                                    aria-describedby="defaultFormControlHelp" required
                                                    value="{{$itemOperasional->jam_akhir}}" />
                                            </div>
                                            <div class="col-2 d-flex justify-content-end">
                                                @if($loop->iteration != 1)
                                                <button type="button" class="btn btn-danger"
                                                    data-operasional="{{$loop->iteration}}"><i
                                                        class="fa-solid fa-trash"></i></button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="col-12 data_operasional mb-3" data-operasional="1">
                                        <div class="row">
                                            <div class="col">
                                                <select id="select_1" name="hari[]" class="form-select"
                                                    data-allow-clear="true" required>
                                                    <option value="">Pilih Hari</option>
                                                    @foreach ($haris as $item)
                                                    <option value="{{$item}}">{{$item}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col">
                                                <input type="time" class="form-control" name="jam_awal[]"
                                                    id="defaultFormControlInput"
                                                    aria-describedby="defaultFormControlHelp" required />
                                            </div>
                                            <div class="col">
                                                <input type="time" class="form-control" name="jam_akhir[]"
                                                    id="defaultFormControlInput"
                                                    aria-describedby="defaultFormControlHelp" required />
                                            </div>
                                            <div class="col-2 d-flex justify-content-end">
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div>
                                <label for="defaultFormControlInput" class="form-label">Gambar Media</label>
                                <input class="form-control" type="file" id="formFileMultiple" name="gambar[]" multiple>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div>
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
    </div>
</div>
@endsection

@push('js')
<script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/super-build/ckeditor.js"></script>

<script>
    // This sample still does not showcase all CKEditor 5 features (!)
    // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
    CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
        // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
        toolbar: {
            items: [
                'exportPDF', 'exportWord', '|',
                'findAndReplace', 'selectAll', '|',
                'heading', '|',
                'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript',
                'removeFormat', '|',
                'bulletedList', 'numberedList', 'todoList', '|',
                'outdent', 'indent', '|',
                'undo', 'redo',
                '-',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                'alignment', '|',
                'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock',
                'htmlEmbed', '|',
                'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                'textPartLanguage', '|',
                'sourceEditing'
            ],
            shouldNotGroupWhenFull: true
        },
        // Changing the language of the interface requires loading the language file using the <script> tag.
        // language: 'es',
        list: {
            properties: {
                styles: true,
                startIndex: true,
                reversed: true
            }
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
        heading: {
            options: [{
                    model: 'paragraph',
                    title: 'Paragraph',
                    class: 'ck-heading_paragraph'
                },
                {
                    model: 'heading1',
                    view: 'h1',
                    title: 'Heading 1',
                    class: 'ck-heading_heading1'
                },
                {
                    model: 'heading2',
                    view: 'h2',
                    title: 'Heading 2',
                    class: 'ck-heading_heading2'
                },
                {
                    model: 'heading3',
                    view: 'h3',
                    title: 'Heading 3',
                    class: 'ck-heading_heading3'
                },
                {
                    model: 'heading4',
                    view: 'h4',
                    title: 'Heading 4',
                    class: 'ck-heading_heading4'
                },
                {
                    model: 'heading5',
                    view: 'h5',
                    title: 'Heading 5',
                    class: 'ck-heading_heading5'
                },
                {
                    model: 'heading6',
                    view: 'h6',
                    title: 'Heading 6',
                    class: 'ck-heading_heading6'
                }
            ]
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
        placeholder: 'Welcome to CKEditor 5!',
        // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
        fontFamily: {
            options: [
                'default',
                'Arial, Helvetica, sans-serif',
                'Courier New, Courier, monospace',
                'Georgia, serif',
                'Lucida Sans Unicode, Lucida Grande, sans-serif',
                'Tahoma, Geneva, sans-serif',
                'Times New Roman, Times, serif',
                'Trebuchet MS, Helvetica, sans-serif',
                'Verdana, Geneva, sans-serif'
            ],
            supportAllValues: true
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
        fontSize: {
            options: [10, 12, 14, 'default', 18, 20, 22],
            supportAllValues: true
        },
        // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
        // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
        htmlSupport: {
            allow: [{
                name: /.*/,
                attributes: true,
                classes: true,
                styles: true
            }]
        },
        // Be careful with enabling previews
        // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
        htmlEmbed: {
            showPreviews: true
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
        link: {
            decorators: {
                addTargetToExternalLinks: true,
                defaultProtocol: 'https://',
                toggleDownloadable: {
                    mode: 'manual',
                    label: 'Downloadable',
                    attributes: {
                        download: 'file'
                    }
                }
            }
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
        mention: {
            feeds: [{
                marker: '@',
                feed: [
                    '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes',
                    '@chocolate', '@cookie', '@cotton', '@cream',
                    '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread',
                    '@gummi', '@ice', '@jelly-o',
                    '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding',
                    '@sesame', '@snaps', '@soufflé',
                    '@sugar', '@sweet', '@topping', '@wafer'
                ],
                minimumCharacters: 1
            }]
        },
        // The "super-build" contains more premium features that require additional configuration, disable them below.
        // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
        removePlugins: [
            // These two are commercial, but you can try them out without registering to a trial.
            // 'ExportPdf',
            // 'ExportWord',
            'CKBox',
            'CKFinder',
            'EasyImage',
            // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
            // Storing images as Base64 is usually a very bad idea.
            // Replace it on production website with other solutions:
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
            // 'Base64UploadAdapter',
            'RealTimeCollaborativeComments',
            'RealTimeCollaborativeTrackChanges',
            'RealTimeCollaborativeRevisionHistory',
            'PresenceList',
            'Comments',
            'TrackChanges',
            'TrackChangesData',
            'RevisionHistory',
            'Pagination',
            'WProofreader',
            // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
            // from a local file system (file://) - load this site via HTTP server if you enable MathType
            'MathType'
        ]
    });

    const dataOperasionalWrapper = document.querySelector('.data_operasional_wrapper');
    const addOperasionalButton = document.querySelector('.btn-success');
    const deleteOperasionalButtons = document.querySelectorAll('.btn-danger');
    let currentDataOperasional = parseInt("{{count($media_informasi->operasional)}}");
    currentDataOperasional = currentDataOperasional == 0 ? 1 : currentDataOperasional;
    
    addOperasionalButton.addEventListener('click', function(e){
        currentDataOperasional += 1;

        const newHtmlOperasional = `
            <div class="col-12 data_operasional mb-3" data-operasional="${currentDataOperasional}">
                <div class="row">
                    <div class="col">
                        <select id="select_${currentDataOperasional}" name="hari[]"
                            class="form-select" data-allow-clear="true"
                            required>
                            <option value="">Pilih Hari</option>
                            @foreach ($haris as $item)
                            <option value="{{$item}}">{{$item}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <input type="time" class="form-control" name="jam_awal[]"
                            id="defaultFormControlInput"
                            aria-describedby="defaultFormControlHelp" required />
                    </div>
                    <div class="col">
                        <input type="time" class="form-control" name="jam_akhir[]"
                            id="defaultFormControlInput"
                            aria-describedby="defaultFormControlHelp" required />
                    </div>
                    <div class="col-2 d-flex justify-content-end">
                        <button type="button" class="btn btn-danger" data-operasional="${currentDataOperasional}"><i
                                class="fa-solid fa-trash"></i></button>
                    </div>
                </div>
            </div>
        `;

        dataOperasionalWrapper.innerHTML += newHtmlOperasional;
        
        const deleteOperasionalButtons = document.querySelectorAll('.btn-danger');
        deleteOperasionalButtons.forEach(function(button){
            button.addEventListener('click', function(e){
                const deleteOperasional = e.target.dataset.operasional;
                const deleteElementOperasional = document.querySelector(`.data_operasional[data-operasional='${deleteOperasional}']`);
                deleteElementOperasional.remove();
            });
        });
    });

    deleteOperasionalButtons.forEach(function(button){
        button.addEventListener('click', function(e){
            const deleteOperasional = e.target.dataset.operasional;
            const deleteElementOperasional = document.querySelector(`.data_operasional[data-operasional='${deleteOperasional}']`);
            deleteElementOperasional.remove();
        });
    });
</script>
@endpush