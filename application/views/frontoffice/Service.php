<div id="content-page" class="content-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-body" id="freame_service">
                        <form id="form-wizard1" class="text-center mt-4">
                            <!-- fieldsets -->
                            <div class="form-card text-left">
                                <div class="row">
                                    <div class="col-7">
                                        <h3 class="mb-4">Informasi Perseorangan:</h3>
                                    </div>

                                </div>
                                <!-- SLIDE 1 -->
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="nama">Nama Perseorangan</label>
                                        <input required id="nama" name="nama" type="text" class="form-control" placeholder="Nama Perseorangan">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="nik">NIK</label>
                                        <input id="nik" name="nik" type="number" class="form-control" placeholder="Nomor Induk Kependudukan" required>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="no_telp">No Telp <small>*Rekomendasi No Whatssapp</small></label>
                                        <input required id="no_telp" name="no_telp" type="text" class="form-control" placeholder="No Telp">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="email">Email</label>
                                        <input id="email" name="email" type="email" class="form-control" placeholder="Email" required>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="alamat">Alamat Perseorangan</label>
                                        <textarea required id="alamat" class="form-control" name="alamat" rows="2"></textarea>
                                    </div>

                                </div>
                                <!-- END SLIDE 1 -->
                            </div>

                            <div class="form-card text-left">
                                <div class="row">
                                    <div class="col-7">
                                        <h3 class="mb-4">Informasi Layanan:</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="id_service">Pilih Layanan</label>
                                        <select class="form-control mr-sm-2" id="id_service" name="id_service" required>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="nama_badan">Nama Badan Usaha</label>
                                        <input id="nama_badan" name="nama_badan" type="text" class="form-control" placeholder="Nama Badan Usaha">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="nib">NIB</label>
                                        <input id="nib" name="nib" type="text" class="form-control" placeholder="Nomor Induk Berusaha" required>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="exampleFormControlTextarea1">Alamat / Lokasi Perizinan</label>
                                        <textarea id="lokasi_perizinan" class="form-control" name="lokasi_perizinan" rows="2"></textarea>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="exampleFormControlTextarea1">Deskripsi Lainnya</label>
                                        <textarea id="deskripsi" class="form-control" name="deskripsi" rows="2"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-card text-left">
                                <div class="row">
                                    <div class="col-7">
                                        <h3 class="mb-4">Upload File:</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="nib">File Pendukung</label>
                                        <p id="file_pendukung"></p>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="nib">File NIB</label>
                                        <p id="nib_file"></p>
                                    </div>

                                </div>
                            </div>
                            <div class="form-card text-left">
                                <button type="submit" class="btn btn-primary float-right">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade show" id="persyaratan_teknis_modal" tabindex="-1" role="dialog" aria-labelledby="persyaratan_teknis_modalLabel" style="display: none; padding-right: 8px;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="persyaratan_teknis_modalLabel">Persyaratan Teknis Izin Pembuangan Air Limbah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>
                    <p>dijadikan satu file berformat pdf
                    <p>
                        1. Kajian pembuangan Air Limbah ke air
                        permukaan
                    <p>
                        2. Informasi mengenai tata letak industri
                        keseluruhan dan penandaan unit yang
                        berkaitan dengan pengelolaan Air Limbah
                    <p>
                        3. Neraca air dan Air Limbah yang
                        menggambarkan keseluruhan sistem
                        yangberkaitan dengan pengelolaan Air
                        Limbah
                    <p>
                        4. Informasi mengenai deskripsi sistem IPAL
                    <p>
                        5. Informasi yang menjelaskan upaya yang
                        dilakukan dalam melakukan pengelolaan
                        Air Limbah
                    <p>
                        6. Informasi uraian penanganan kondisi
                        darurat Pencemaran Air
                    <p>
                        7. Prosedur operasional standar tanggap
                        darurat IPAL
                    <p>
                        8. Pakta integritas
                </h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        freame_service = $('#freame_service')
        id_service = $('#id_service')

        var ipal = {
            'form': $('#form-wizard1'),
            'nib': $('#form-wizard1').find('#nib'),
            'file_pendukung': new FileUploader($('#form-wizard1').find('#file_pendukung'), "", "file_pendukung", ".png , .pdf , .jpg , .jpeg", false, false),
            'nib_file': new FileUploader($('#form-wizard1').find('#nib_file'), "", "nib_file", ".png , .pdf , .jpg , .jpeg", false, false),
        }

        var swalLoading = {
            title: 'Harap Tunggu !',
            html: 'data sedang di upload', // add html attribute if you want or remove
            allowOutsideClick: false,
            onBeforeOpen: () => {
                Swal.showLoading()
            },
        };
        var swalKonfirmasi = {
            title: "Konfirmasi",
            text: "Yakin akan melakukan pengajuan perizinan ini?",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#18a689",
            confirmButtonText: "Ya! Ajukan",
        }

        ipal.form.on('submit', (ev) => {
            ev.preventDefault();
            // console.log('s')
            swal(swalKonfirmasi).then((result) => {
                if (!result.value) {
                    return;
                }

                // swal.fire(swalLoading);
                $.ajax({
                    url: "<?= base_url() . 'Service/process' ?>",
                    type: "POST",
                    // data: registerForm.serialize(),
                    data: new FormData(ipal.form[0]),
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        json = JSON.parse(data);
                        if (json['error']) {
                            swal("Pengajuan Gagal", json['message'], "error");
                            return;
                        } else {
                            swal("Pengajuan Berhasil", 'data akan segera di prosess', "success").then((result) => {
                                $(location).attr('href', '<?= base_url() ?>/PengirimanController/DetailPengiriman?id_pengiriman=' + json['data']);
                                // }
                            })
                        }
                    },
                });
            });

        })
        getServiceCategory()

        function getServiceCategory() {
            return $.ajax({
                url: "<?= base_url() . 'Service/getServiceCategory' ?>",
                type: "GET",
                // data: registerForm.serialize(),
                data: {},
                success: (data) => {
                    json = JSON.parse(data);
                    if (json['error']) {
                        // swal("Pengajuan Gagal", json['message'], "error");
                        return;
                    }
                    data = json['data']
                    id_service.append($('<option>', {
                        value: '',
                        text: '',
                    }));
                    Object.values(data).forEach((d) => {

                        id_service.append($('<option>', {
                            value: d['id_perizinan'],
                            text: d['id_perizinan'] + ' :: ' + d['nama_perizinan'],
                        }));
                    })

                },
            });
        }

    });
</script>