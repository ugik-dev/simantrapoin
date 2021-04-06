<button type="button" class="btn btn-primary" style="display: none" id='btn_act' data-toggle="modal" data-target=".step1-modal">Ambil Keputusan</button>
<div class="modal fade step1-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id='form_act_4' role="form" onsubmit="return false;" type="multipart" autocomplete="off">
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
                        <input hidden id='email_user_survey' name="email_user">
                        <label>Keputusan</label>
                        <select class="form-control mb-3" id="act_4" name="keputusan" required>
                            <option selected=""></option>
                            <option value="terima">Terima</option>
                            <option value="tolak">Tolak</option>
                            <!-- <option value="3">Three</option> -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_survey">Tanggal Survey</label>
                        <input type="datetime-local" class="form-control" name="date_survey" rows="3"></input>
                    </div>

                    <div class="form-group">
                        <label>Pilih Tim</label>
                        <div class="row col-md-12" id='render_team'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Catatan</label>
                        <textarea class="form-control" name="catatan" rows="3"></textarea>
                    </div>
                    <!-- <p>Modal body text goes here.</p> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="act_4_btn_submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<button type="button" class="btn btn-primary" style="display: none" id='btn_act_b' data-toggle="modal" data-target=".step1-modal_b">Survey Selesai</button>
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
                    <div class="form-group">
                        <input hidden value="<?= $contentData['id_pengiriman'] ?>" name="id_pengiriman">
                        <label>Keputusan</label>
                        <select class="form-control mb-3" id="act_5" name="keputusan" required>
                            <option selected=""></option>
                            <option value="terima">Terima</option>
                            <option value="tolak">Tolak</option>
                        </select>
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
    var act_4_form = $('#form_act_4');
    var act_4_btn_submit = $('#act_4_btn_submit');

    var act_5_form = $('#form_act_5');
    var act_5_btn_submit = $('#act_5_btn_submit');

    var render_team = $('#render_team');

    getTimSurvey()

    function getTimSurvey() {
        return $.ajax({
            url: `<?php echo site_url('Service/getTimSurvey/') ?>`,
            'type': 'GET',
            data: {},
            success: function(data) {
                var json = JSON.parse(data);
                if (json['error']) {
                    return;
                }
                i = 1;
                data = json['data'];
                title = '';
                Object.values(data).forEach((d) => {
                    if (title != d['title_role']) {

                        render_team.append(`
                        <div class="col-md-12">
                        <hr>
                        <label><strong>${d['title_role']}</strong></label><br>
                        </div>
                        `);
                        title = d['title_role'];

                    }

                    render_team.append(`
                      <div class="col-md-6 col-lg-4 custom-control custom-switch">
                                <input type="hidden" name="email_tim_${i}" value="${d['email']}" >
                                <input type="checkbox" class="custom-control-input" id="tim_${i}" name="tim_${i}" value="${d['id_user']}" >
                                <label class="custom-control-label" for="tim_${i}" > ${d['nama']}</label>
                            </div>
                    `)
                    i++;
                })

                render_team.append(`
                                <input hidden type="number" name="count_tim" value="${(i-1)}" >
                    `)
            },
            error: function(e) {}
        });
    }

    act_4_form.submit(function(event) {
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
                url: `<?= site_url('Service/act_4') ?>`,
                'type': 'POST',
                data: act_4_form.serialize(),
                // contentType: false,
                // processData: false,
                success: function(data) {
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
                html: '', // add html attribute if you want or remove
                allowOutsideClick: false,
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
            });
            $.ajax({
                url: `<?= site_url('Service/act_5') ?>`,
                'type': 'POST',
                data: act_5_form.serialize(),
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
                    // $('.step1-modal').modal('hide');
                    location.reload()
                },
                error: function(e) {}
            });
        });
    });
</script>