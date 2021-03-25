<button type="button" style="display: none" class="btn btn-primary" id='btn_act' data-toggle="modal" data-target=".step1-modal">Ambil Keputusan</button>
<div class="modal fade step1-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id='form_act_2' role="form" onsubmit="return false;" type="multipart" autocomplete="off">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ACT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input hidden value="<?= $contentData['id_pengiriman'] ?>" name="id_pengiriman">
                        <label>Keputusan</label>
                        <select class="form-control mb-3" id="act_2" name="keputusan" required>
                            <option selected=""></option>
                            <option value="terima">Terima</option>
                            <option value="tolak">Tolak</option>
                            <!-- <option value="3">Three</option> -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Survey</label>
                        <select class="form-control mb-3" id="survery_act_2" name='survey' required>
                            <option selected=""></option>
                            <option value="ya">Melalui Survey</option>
                            <option value="tidak">Tanpa Survey</option>
                            <!-- <option value="3">Three</option> -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Catatan</label>
                        <textarea class="form-control" name="catatan" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="act_2_btn_submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<button type="button" style="display: none" class="btn btn-primary" id='btn_act_b' data-toggle="modal" data-target=".step1-modal_b">Ambil Keputusan</button>
<div class="modal fade step1-modal_b" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id='form_act_5' role="form" onsubmit="return false;" type="multipart" autocomplete="off">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ACT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input hidden value="<?= $contentData['id_pengiriman'] ?>" name="id_pengiriman">

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">File Draft</label>
                        <p id='file_draft'></p>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Catatan</label>
                        <textarea class="form-control" name="catatan" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="act_5_btn_submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>


<script>
    $(document).ready(function() {
        var act_2_form = $('#form_act_2');
        var act_2_btn_submit = $('#act_2_btn_submit');
        var act_2 = $('#act_2');

        var act_5_form = $('#form_act_5');
        var act_5_btn_submit = $('#act_5_btn_submit');
        var act_5 = $('#act_5');
        // file_draft = new FileUploader($('#file_draft'), "", 'file_draft', ".png , .jpg , .jpeg", false, true, true);
        npwp = new FileUploader($('#file_draft'), "", 'file_draft', ".png , .jpg , .jpeg , .pdf , .doc , .docx", false, false);


        act_2.on('change', (ev) => {
            console.log(act_2.val())
            if (act_2.val() == 'tolak') {
                document.getElementById("survery_act_2").disabled = true;
                $('#survery_act_2').val('')
                document.getElementById("survery_act_2").required = false;
            } else {
                $('#survery_act_2').val('terima')
                document.getElementById("survery_act_2").disabled = false;
                document.getElementById("survery_act_2").required = true;
            }
        })


        act_2_form.submit(function(event) {
            event.preventDefault();
            swal({
                title: "Konfirmasi simpan",
                text: "Yakin akan menyimpan data ini?",
                type: "info",
                showCancelButton: true,
                confirmButtonColor: "#18a689",
                confirmButtonText: "Ya, Simpan!",
            }).then((result) => {
                if (!result.value) {
                    return;
                }
                swal.fire({
                    title: 'Loading .. !',
                    html: '', // add html attribute if you want or remove
                    allowOutsideClick: false,
                    onBeforeOpen: () => {
                        Swal.showLoading()
                    },
                });
                $.ajax({
                    url: `<?= site_url('Service/act_2') ?>`,
                    'type': 'POST',
                    data: act_2_form.serialize(),
                    success: function(data) {
                        var json = JSON.parse(data);
                        if (json['error']) {
                            swal("Simpan Gagal", json['message'], "error");
                            return;
                        }
                        swal("Simpan Berhasil", "", "success");
                        $('.step1-modal').modal('hide');
                        location.reload();
                    },
                    error: function(e) {}
                });
            });
        });


        act_5_form.submit(function(event) {
            event.preventDefault();
            swal({
                title: "Konfirmasi simpan",
                text: "Yakin akan menyimpan data ini?",
                type: "info",
                showCancelButton: true,
                confirmButtonColor: "#18a689",
                confirmButtonText: "Ya, Simpan!",
            }).then((result) => {
                if (!result.value) {
                    return;
                }
                swal.fire({
                    title: 'Loading .. !',
                    html: '',
                    allowOutsideClick: false,
                    onBeforeOpen: () => {
                        Swal.showLoading()
                    },
                });
                $.ajax({
                    url: `<?= site_url('Service/act_6') ?>`,
                    'type': 'POST',
                    data: new FormData(act_5_form[0]),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        var json = JSON.parse(data);
                        if (json['error']) {
                            swal("Simpan Gagal", json['message'], "error");
                            return;
                        }
                        swal("Simpan Berhasil", "", "success");
                        // $('.step1-modal').modal('hide');
                        location.reload();
                    },
                    error: function(e) {}
                });
            });
        });
    });
</script>