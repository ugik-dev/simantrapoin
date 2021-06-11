<button type="button" class="btn btn-primary" style="display: none" id='btn_act_b' data-toggle="modal" data-target=".step1-modal">Evaluasi</button>
<div class="modal fade step1-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id='form_act_3' role="form">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Evaluasi Survey</h5>
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
                            <option value="1">Terima</option>
                            <option value="2">Tolak</option>
                            <!-- <option value="3">Three</option> -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Catatan</label>
                        <textarea class="form-control" name="catatan" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="nib">Lampiran <small>*jika ada</small></label>
                        <p id="doc_survey"></p>
                    </div>
                    <!-- <p>Modal body text goes here.</p> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="act_3_btn_submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {

        var act_3_form = $('#form_act_3');
        var act_3_btn_submit = $('#act_3_btn_submit');
        var act_3 = $('#act_3');
        new FileUploader($('#form_act_3').find('#doc_survey'), "", "doc_survey", ".png , .pdf , .jpg , .jpeg, .doc, .docx, .pdf, .excel", false, false)

        act_3_form.submit(function(event) {
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
                    url: `<?= site_url('Service/act_tim_survey') ?>`,
                    'type': 'POST',
                    data: new FormData(act_3_form[0]),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        // buttonIdle(PengirimanModal.addBtn);
                        var json = JSON.parse(data);
                        if (json['error']) {
                            swal("Simpan Gagal", json['message'], "error");
                            return;
                        }
                        swal("Simpan Berhasil", "", "success");
                        location.reload();
                        $('.step1-modal').modal('hide');
                    },
                    error: function(e) {}
                });
            });
        });
    })
</script>