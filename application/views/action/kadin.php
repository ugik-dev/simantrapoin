<button type="button" class="btn btn-primary" style="display: none" id='btn_act' data-toggle="modal" data-target=".step1-modal">Lanjurkan</button>
<div class="modal fade step1-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id='form_act_3' role="form" onsubmit="return false;" type="multipart" autocomplete="off">
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
                        <label for="exampleFormControlTextarea1">Catatan</label>
                        <textarea class="form-control" name="catatan" rows="3"></textarea>
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
    var act_3_form = $('#form_act_3');
    var act_3_btn_submit = $('#act_3_btn_submit');
    var act_3 = $('#act_3');

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
                url: `<?= site_url('Service/act_9') ?>`,
                'type': 'POST',
                data: act_3_form.serialize(),
                // contentType: false,
                // processData: false,
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
</script>