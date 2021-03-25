<div id="content-page" class="content-page">
    <div class="container">
        <div class="ibox-content">
            <div class="iq-card iq-card-block iq-card-stretch iq-card-height iq-border-box iq-border-box-1 text-primary">
                <div class="iq-card-body">
                    <div class="col-lg-9 align-items-center justify-content-between">
                        <form class="form-inline" id="toolbar_form" onsubmit="return false;">
                            <input type="hidden" id="sort" name="sort" value='1'>
                            <select class="form-control mr-sm-2" id="status_proposal" name="status_proposal">
                                <option class="form-control mr-sm-2" value="">Semua</option>
                                <!-- <option class="form-control mr-sm-2" value="DRAFT">Menunggu</option> -->
                                <option class="form-control mr-sm-2" value="DIPROSES" selected>Menunggu</option>
                                <option class="form-control mr-sm-2" value="DITERIMA">Diterima</option>
                                <option class="form-control mr-sm-2" value="DITOLAK">Ditolak</option>
                            </select>
                            <button type="submit" class="btn btn-success my-1 mr-sm-2" id="show_btn" data-loading-text="Loading..." onclick="this.form.target='show'"><i class="ri-search-eye-line"></i> Tampilkan</button>
                            <button hidden type="submit" class="btn btn-primary my-1 mr-sm-2" id="add_btn" data-loading-text="Loading..." <?php if ($this->session->userdata()['nama_role'] != 'frontoffice') echo 'style="display: none"' ?> onclick="this.form.target='add'"><i class="ri-add-line"></i> Tambah</button>
                            <!-- <a type="" class="btn btn-light my-1 mr-sm-2" id="export_btn" data-loading-text="Loading..."><i class="fal fa-download"></i> Export PDF</a> -->

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="iq-card col-lg-12">
            <div class="iq-card-header flex justify-content-between">
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table id="FDataTable" class="table table-bordered table-hover" style="padding:0px">
                            <thead>
                                <tr>
                                    <th style="width: 5%; text-align:center!important">ID</th>
                                    <th style="width: 5%; text-align:center!important">Status</th>
                                    <th style="width: 15%; text-align:center!important">Tanggal Dibuat</th>
                                    <th style="width: 15%; text-align:center!important">Nama</th>
                                    <th style="width: 5%; text-align:center!important">No KTP</th>
                                    <th style="width: 5%; text-align:center!important">No Telp</th>
                                    <th style="width: 5%; text-align:center!important">Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-xl" id="fo_modal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-8">
                            <h5 style=" margin: auto;" id="reg_date"></h5>
                            <h5 style=" margin: auto;" id="accept_date"></h5>
                        </div>
                        <div id="footer_modal" class="d-inline-block col-lg-4" style="float: right"></div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-3">
                        <h3>Nama</h3>
                    </div>
                    <div class="col-lg-9">
                        <h2 id="nama"></h2>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-3">
                        <h3>NIK</h3>
                    </div>
                    <div class="col-lg-9">
                        <h2 id="username"></h2>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-3">
                        <h3>Alamat</h3>
                    </div>
                    <div class="col-lg-9">
                        <h2 id="alamat_user"></h2>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-lg-3">
                        <h3>No Telp</h3>
                    </div>
                    <div class="col-lg-6">
                        <h2 id="no_telp"></h2>
                    </div>
                    <div class="col-lg-3">
                        <a id="wa_to" href="" class="btn btn-outline-success btn-block" style="width: 100%;" target="_blank"><i class='fa fa-whatsapp'></i> via Whatsapp</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-3">
                        <h3>Email</h3>
                    </div>
                    <div class="col-lg-6">
                        <h2 id="email"></h2>
                    </div>
                    <div class="col-lg-3">
                        <a id="mail_to" class="btn btn-outline-success btn-block" style="width: 100%;" target="_blank"><i class='fa fa-envelope'></i> via Mail</a>`
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Dokumen</h2>
                    </div>
                    <div class="col-lg-6" id="img_ktp"></div>
                    <div class="col-lg-6" id="img_npwp"></div>
                    <div class="col-lg-12" id="img_swa"></div>
                    <div class="col-lg-12" id="img_pas_photo"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#pariwisata').addClass('active');
        $('#biro').addClass('active');

        var toolbar = {
            'form': $('#toolbar_form'),
            'status_proposal': $('#status_proposal'),
            'addBtn': $('#show_btn'),
        }

        var FDataTable = $('#FDataTable').DataTable({
            // dom: 'Bfrtip',
            // button : ['excel'],
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
                    },
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
                    }
                },
            ],
            responsive: true,
            'columnDefs': [],
            deferRender: true,
            "order": [
                [0, "desc"]
            ]
        });


        var UserTempModal = {
            'self': $('#fo_modal'),
            'terima_btn': $('#fo_modal').find('#terima_btn'),
            'tolak_edit_btn': $('#fo_modal').find('#tolak_edit_btn'),
            'username': $('#fo_modal').find('#username'),
            'nama': $('#fo_modal').find('#nama'),
            'no_telp': $('#fo_modal').find('#no_telp'),
            'email': $('#fo_modal').find('#email'),
            'alamat_user': $('#fo_modal').find('#alamat_user'),
            'wa_to': $('#fo_modal').find('#wa_to'),
            'mail_to': $('#fo_modal').find('#mail_to'),
            'img_ktp': $('#fo_modal').find('#img_ktp'),
            'img_npwp': $('#fo_modal').find('#img_npwp'),
            'img_swa': $('#fo_modal').find('#img_swa'),
            'img_pas_photo': $('#fo_modal').find('#img_pas_photo'),
            'footer': $('#fo_modal').find('#footer_modal'),
            'reg_date': $('#fo_modal').find('#reg_date'),
            'accept_date': $('#fo_modal').find('#accept_date')
        }

        var swalAccept = {
            title: "Konfirmasi Terima",
            text: "Yakin akan verifikasi data ini?",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#18a689",
            confirmButtonText: "Ya!",
        };

        var swalNotAccept = {
            title: "Konfirmasi Tolak",
            // text: "Yakin akan me data ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, Tolak!",
        };

        var dataUserTemp = {};
        var dataNomor = {};

        toolbar.form.submit(function(event) {
            event.preventDefault();
            switch (toolbar.form[0].target) {
                case 'show':
                    getUserTemp();
                    break;
                case 'add':
                    showUserTempModal();
                    break;
            }
        });

        toolbar.status_proposal.on('change', function() {
            getUserTemp();
        })



        toolbar.status_proposal.trigger('change');

        function getUserTemp() {
            // buttonLoading(toolbar.showBtns);
            $.ajax({
                url: `<?= site_url('UserTempController/getAllUserTemp') ?>`,
                'type': 'POST',
                data: toolbar.form.serialize(),
                success: function(data) {
                    // buttonIdle(toolbar.showBtn);s
                    var json = JSON.parse(data);
                    if (json['error']) {
                        swal("Simpan Gagal", json['message'], "error");
                        return;
                    }
                    dataUserTemp = json['data'];
                    renderUserTemp(dataUserTemp);
                },
                error: function(e) {}
            });
        }

        function renderUserTemp(data) {
            if (data == null || typeof data != "object") {
                console.log("User::UNKNOWN DATA");
                return;
            }
            var i = 0;

            var renderData = [];
            Object.values(data).forEach((biro) => {

                //             var detailButton = `
                //   <a class="detail dropdown-item" href='<?= base_url() ?>detail_profile/${biro['id_user_temp']}/${biro['username']}'><i class='fa fa-share'></i> Detail</a>
                //   `;
                var detailButton = `
                                <a class="detail dropdown-item" data-id='${biro['id_user_temp']}' data-toggle="modal" data-target=".bd-example-modal-xl"><i class='fa fa-eye'></i> Detail</a>
                                `;
                var str = biro['no_telp'];
                str = str.replace(/[^0-9]/ig, "");;
                var res = str.substring(0, 2);

                if (res == 08) {
                    var res2 = str.substring(2, 16);
                    res = '628';
                    fx = res + res2;
                } else {
                    fx = str;
                }
                var chatWaButton = `
                            <a href="https://api.whatsapp.com/send?phone=${fx}&text=Salam Sejahterah%21%20 %0ADinas Penanaman Modal, Pelayanan Terpadu Satu Pintu, Koperasi Usaha Mikro Kecil dan Menengah Kab. Bangka %0AMenyampaikan bahwa : " class="dropdown-item" target="_blank"><i class='fa fa-whatsapp'></i>  Chat Whatssapp</a>`
                var button = `
                            <div class="btn-group" role="group">
                            <button id="action" type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class='fa fa-bars'></i></button>
                            <div class="dropdown-menu" aria-labelledby="action">
            ${detailButton}
            ${chatWaButton}
                </div>
            </div>
          `;
                renderData.push([biro['id_user_temp'], status(biro['accept']), renderDate(biro['datetime']), biro['nama'], biro['username'], biro['no_telp'], button]);
            });
            FDataTable.clear().rows.add(renderData).draw('full-hold');
        }

        function status(status) {
            if (status == '0')
                return `<i class='fa fa-hourglass-start text-primary'> Request</i>`;
            else if (status == '1')
                return `<i class='fa fa-check text-success'> Verificated</i>`;
            return `<i class='fa fa-times text-danger'> Not Verificated</i>`;
        }


        FDataTable.on('click', '.detail', function() {
            event.preventDefault();
            UserTempModal.img_ktp.html('');
            UserTempModal.img_npwp.html('');
            UserTempModal.img_swa.html('');
            UserTempModal.img_pas_photo.html('');
            UserTempModal.accept_date.html('');
            UserTempModal.footer.html('')
            var id = $(this).data('id');
            var d = dataUserTemp[id];
            UserTempModal.nama.html(d['nama']);
            UserTempModal.username.html(d['username']);
            UserTempModal.no_telp.html(d['no_telp']);
            UserTempModal.alamat_user.html(d['alamat_user']);
            UserTempModal.email.html(d['email']);
            var str = d['no_telp'];
            str = str.replace(/[^0-9]/ig, "");;
            var res = str.substring(0, 2);
            if (res == 08) {
                var res2 = str.substring(2, 16);
                res = '628';
                fx = res + res2;
            } else {
                fx = str;
            }
            var formattedBody = `Salam Sejahterah! \nHalo ${d['nama']} \nkami Dinas Penanaman Modal, Pelayanan Terpadu Satu Pintu, Koperasi Usaha Mikro Kecil dan Menengah Kabupaten Bangka \nMenyampaikan bahwa :`;
            var waToLink = `https://api.whatsapp.com/send?phone=${fx}&text=` + encodeURIComponent(formattedBody);
            var mailToLink = `mailto:${d['email']}?body=` + encodeURIComponent(formattedBody);

            UserTempModal.wa_to.prop('href', waToLink);
            UserTempModal.mail_to.prop('href', mailToLink);
            if (d['accept'] != '1') {
                $.get(`<?= base_url('upload/ktp/') ?>${d['ktp']}`)
                    .done(function() {
                        UserTempModal.img_ktp.html(`<img style="width: 100%;" src="<?= base_url('upload/ktp/') ?>${d['ktp']}" class="img-fluid" alt="KTP">`);
                    })
                $.get(`<?= base_url('upload/swa/') ?>${d['swa']}`)
                    .done(function() {
                        UserTempModal.img_swa.html(`<img style="width: 100%;" src="<?= base_url('upload/swa/') ?>${d['swa']}" class="img-fluid" alt="SWA Photo">`);
                    })
                $.get(`<?= base_url('upload/npwp/') ?>${d['npwp']}`)
                    .done(function() {
                        UserTempModal.img_npwp.html(`<img style="width: 100%;" src="<?= base_url('upload/npwp/') ?>${d['npwp']}" class="img-fluid" alt="NPWP Photo">`);
                    })
                $.get(`<?= base_url('upload/pas_photo/') ?>${d['pas_photo']}`)
                    .done(function() {
                        UserTempModal.img_pas_photo.html(`<img style="width: 100%;" src="<?= base_url('upload/pas_photo/') ?>${d['pas_photo']}" class="img-fluid" alt="SWA Photo">`);
                    })
                UserTempModal.reg_date.html('Register Date : ' + renderDate2(d['datetime']))
                if (d['accept'] == '2') {
                    UserTempModal.accept_date.html(`<i class='fa fa-times text-danger'>
                Di Tolak oleh : ` + d['user_accept'] + ` - ` + renderDate2(d['date_accept']) + `</i>`)

                } else {
                    var btn = `   
                <button type="button" id="terima_btn" data-id="${d['id_user_temp']}" class="mb-5 terima btn btn-success col-lg-5">Terima</button>
                <button type="button" id="tolak_btn" data-id="${d['id_user_temp']}" class="mb-5 tolak btn btn-danger col-lg-5">Tolak</button>`
                    UserTempModal.footer.html(btn);
                    $('#terima_btn').on('click', (ev) => {
                        var id = $(this).data('id');
                        ev.preventDefault();
                        swal(swalAccept).then((result) => {
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
                                url: "<?= site_url() . 'UserTempController/accept_customer' ?>",
                                type: "POST",
                                data: {
                                    id: id
                                },
                                success: (data) => {
                                    json = JSON.parse(data);
                                    if (json['error']) {
                                        swal("Gagal", json['message'], "error");
                                        return;
                                    } else {
                                        dataUserTemp[id] = json['data'];
                                        renderUserTemp(dataUserTemp);
                                        UserTempModal.footer.html('')

                                        swal("Berhasil", 'customer sudah dapat login, harap hubungi customer melalui whatsapp jika nomor terdaftar di whatsapp', "success").then((result) => {})
                                    }
                                },
                            });
                        });

                    })
                    $('#tolak_btn').on('click', (ev) => {
                        var id = $(this).data('id');
                        ev.preventDefault();
                        swal(swalNotAccept).then((result) => {
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
                                url: "<?= site_url() . 'UserTempController/not_accept' ?>",
                                type: "POST",
                                data: {
                                    id: id
                                },
                                success: (data) => {
                                    json = JSON.parse(data);
                                    if (json['error']) {
                                        swal("Gagal", json['message'], "error");
                                        return;
                                    } else {
                                        dataUserTemp[id] = json['data'];
                                        renderUserTemp(dataUserTemp);
                                        UserTempModal.footer.html('')

                                        swal("Berhasil", 'harap hubungi customer melalui whatsapp jika nomor terdaftar di whatsapp', "success").then((result) => {})
                                    }
                                },
                            });
                        });
                    })
                }


            } else {
                $.get(`<?= base_url('upload/accept_ktp/') ?>${d['ktp']}`)
                    .done(function() {
                        UserTempModal.img_ktp.html(`<img style="width: 100%;" src="<?= base_url('upload/accept_ktp/') ?>${d['ktp']}" class="img-fluid" alt="KTP">`);
                    })
                $.get(`<?= base_url('upload/accept_swa/') ?>${d['swa']}`)
                    .done(function() {
                        UserTempModal.img_swa.html(`<img style="width: 100%;" src="<?= base_url('upload/accept_swa/') ?>${d['swa']}" class="img-fluid" alt="SWA Photo">`);
                    })
                $.get(`<?= base_url('upload/accept_npwp/') ?>${d['npwp']}`)
                    .done(function() {
                        UserTempModal.img_npwp.html(`<img style="width: 100%;" src="<?= base_url('upload/accept_npwp/') ?>${d['npwp']}" class="img-fluid" alt="NPWP Photo">`);
                    })
                $.get(`<?= base_url('upload/accept_pas_photo/') ?>${d['pas_photo']}`)
                    .done(function() {
                        UserTempModal.img_pas_photo.html(`<img style="width: 100%;" src="<?= base_url('upload/accept_pas_photo/') ?>${d['pas_photo']}" class="img-fluid" alt="SWA Photo">`);
                    })
                var btn = `   
                `
                UserTempModal.footer.html(btn);
                UserTempModal.reg_date.html('Register Date : ' + renderDate2(d['datetime']))
                UserTempModal.accept_date.html(`<i class='fa fa-check text-success'>
                Di Verifikasi oleh : ` + d['user_accept'] + ` - ` + renderDate2(d['date_accept']) + `</i>`)
            }
        });

    });
</script>