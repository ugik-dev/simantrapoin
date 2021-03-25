<button type="button" class="btn btn-primary" id='btn_act' data-toggle="modal" data-target=".step1-modal">Ambil Keputusan</button>
<div class="modal fade step1-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id='form_act_1' role="form" onsubmit="return false;" type="multipart" autocomplete="off">
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
                        <select class="form-control mb-3" id="act_1" name="keputusan" required>
                            <option selected=""></option>
                            <option value="terima">Terima</option>
                            <option value="tolak">Tolak</option>
                            <!-- <option value="3">Three</option> -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tujuan</label>
                        <select class="form-control mb-3" id="tujuan_act_1" name='tujuan' required>
                            <option selected=""></option>
                            <option value="umum">Perizinan Umum</option>
                            <option value="usaha">Perizinan Usaha</option>
                            <!-- <option value="3">Three</option> -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Catatan</label>
                        <textarea class="form-control" name="catatan" rows="3"></textarea>
                    </div>
                    <!-- <p>Modal body text goes here.</p> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="act_1_btn_submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    var act_1_form = $('#form_act_1');
    var act_1_btn_submit = $('#act_1_btn_submit');
    var act_1 = $('#act_1');
    act_1.on('change', (ev) => {
        console.log(act_1.val())
        if (act_1.val() == 'tolak') {
            document.getElementById("tujuan_act_1").disabled = true;
            $('#tujuan_act_1').val('')
            document.getElementById("tujuan_act_1").required = false;
        } else {
            $('#tujuan_act_1').val('terima')
            document.getElementById("tujuan_act_1").disabled = false;
            document.getElementById("tujuan_act_1").required = true;
        }
    })


    act_1_form.submit(function(event) {
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
                url: `<?= site_url('Service/act_1') ?>`,
                'type': 'POST',
                data: act_1_form.serialize(),
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