@push('js')
    <script>
        $(document).ready(function () {
            $('#type_soal').change(function () {
                let val = $('#type_soal').val();
                if (val == "multiple") {
                    $('#multiple_value').html(`<button type="button" class="btn btn-xs btn-secondary mt-2" data-idform="multiple_value" onclick="addMultipleChoose(this)">+</button>
                            <input type="text" name="multiple_value[]" class="form-control mt-2" placeholder="Isi Checklist">`);
                    
                }
                else{
                    $('#multiple_value').empty();
                }
            });

            $('#flexSwitchCheckDefault').on('change', function() {
                if ($(this).is(':checked') == true) {
                    let idColumn = makeid(10);
                    $('#sub-soal').html(`
                    <button type="button" class="btn btn-xs btn-secondary mt-2" data-idform="sub_multiple_value" onclick="addColumnTable(this)">+</button>
                    <div class="row mt-2">
                        <table class="table">
                            <tbody id="table_sub_soal">
                                <tr id="${idColumn}">
                                    <td style="width: 2%;">
                                        1
                                        <input type="hidden" name="tmp_soal[]" value="${idColumn}" class="form-control">
                                    </td>
                                    <td>
                                        <div class="col">
                                            <label for="">Keterangan Soal</label>
                                            <input type="text" name="sub_name_soal[]" class="form-control">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col">
                                            <label for="">Tipe Soal</label>
                                            <select name="sub_type_soal[]" class="form-control" onchange="addColumChecklistSubSoal(this)" data-idform="${idColumn}" id="sub_type_soal_${idColumn}">
                                                <option value="">Pilih Tipe Soal</option>
                                                <option value="radio">Ya / Tidak</option>
                                                <option value="input">Inputan</option>
                                                <option value="multiple">Checklist</option>
                                            </select>
                    
                                            <div id="sub_multiple_value_${idColumn}"></div>
                                        </div>
                                    </td>
                                    <td style="width: 5%">
                                        <button class="btn btn-danger btn-xs mt-3">-</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    `);
                } else {
                    $('#sub-soal').empty();
                }
            });
        });

        function addColumChecklistSubSoal(e) {
            let val = $(e).val();
            if (val == "multiple") {
                $('#sub_multiple_value_'+$(e).data('idform')).html(`<button type="button" class="btn btn-xs btn-secondary mt-2" data-idform="${$(e).data('idform')}" onclick="addMultipleChooseSub(this)">+</button>
                            <input type="text" name="sub_multiple_value[${$(e).data('idform')}][]" class="form-control mt-2" placeholder="Isi Checklist">`)
            } else {
                $('#sub_multiple_value_'+$(e).data('idform')).empty();
            }
        }

        function addMultipleChoose(e) {
            
            $('#'+$(e).data('idform')).append(`<input type="text" name="${$(e).data('idform')}[]" class="form-control mt-2" placeholder="Isi Checklist">`);
        }
        function addMultipleChooseSub(e) {
            
            $('#sub_multiple_value_'+$(e).data('idform')).append(`<input type="text" name="sub_multiple_value[${$(e).data('idform')}][]" class="form-control mt-2" placeholder="Isi Checklist">`);
        }

        function makeid(length) {
            let result = '';
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            const charactersLength = characters.length;
            let counter = 0;
            while (counter < length) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
            counter += 1;
            }
            return result;
        }

        function addColumnTable() {
            let count = $('#table_sub_soal tr').length + 1;
            let idColumn = makeid(10);
            $('#table_sub_soal').append(`
            <tr id="${idColumn}">
                <td style="width: 2%;">
                    ${count}
                    <input type="hidden" name="tmp_soal[]" value="${idColumn}" class="form-control">
                </td>
                <td>
                    <div class="col">
                        <label for="">Keterangan Soal</label>
                        <input type="text" name="sub_name_soal[]" class="form-control">
                    </div>
                </td>
                <td>
                    <div class="col">
                        <label for="">Tipe Soal</label>
                        <select name="sub_type_soal[]" class="form-control" onchange="addColumChecklistSubSoal(this)" data-idform="${idColumn}" id="sub_type_soal_${idColumn}">
                            <option value="">Pilih Tipe Soal</option>
                            <option value="radio">Ya / Tidak</option>
                            <option value="input">Inputan</option>
                            <option value="multiple">Checklist</option>
                        </select>

                        <div id="sub_multiple_value_${idColumn}"></div>
                    </div>
                </td>
                <td style="width: 5%">
                    <button type="btn_remove_sub_soal_${idColumn}" data-trid="${idColumn}" onclick="removeSubSoal(this)" class="btn btn-danger btn-xs mt-3">-</button>
                </td>
            </tr>
            `);
        }

        

        function removeSubSoal(e) {
            
        }
    </script>
@endpush