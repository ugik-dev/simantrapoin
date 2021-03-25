<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-6 col-lg-3">
                <div class="iq-card iq-card-block iq-card-stretch iq-card-height iq-border-box iq-border-box-1 text-primary">
                    <div class="iq-card-body">
                        <a id="service_ipal">
                            <div class="text-center">
                                <h4 class="">IZIN PEMBUANGAN AIR LIMBAH</h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="freame_service">
            <div class="iq-card" id="service_ipal_fm" style="display: none">
                <div class="iq-card-body">
                    <p>Perizinan Pembuangan Air Limbah</p>
                    <form id="form_ipal">
                        <div class="row">
                            <!-- <div class="container"> -->
                            <div class="form-group col-lg-6">
                                <label for="nama">Nama Perseorangan</label>
                                <input id="nama" name="nama" type="text" class="form-control" placeholder="Nama Perseorangan">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="nik">NIK</label>
                                <input id="nik" name="nik" type="number" class="form-control" placeholder="Nomor Induk Kependudukan" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="no_telp">No Telp <small>*Rekomendasi No Whatssapp</small></label>
                                <input id="no_telp" name="no_telp" type="text" class="form-control" placeholder="No Telp">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="email">Email</label>
                                <input id="email" name="email" type="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="alamat">Alamat Perseorangan</label>
                                <textarea id="alamat" class="form-control" name="alamat" rows="2"></textarea>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="exampleFormControlTextarea1">Alamat / Lokasi Perizinan</label>
                                <textarea id="lokasi_perizinan" class="form-control" name="lokasi_perizinan" rows="2"></textarea>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="exampleFormControlTextarea1">Deskripsi Lainnya</label>
                                <textarea id="deskripsi" class="form-control" name="deskripsi" rows="2"></textarea>
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
                                <label for="nib">File Pendukung</label>
                                <p id="file_pendukung"></p>
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="nib">File NIB</label>
                                <p id="nib_file"></p>
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="nib">Izin Lingkungan Definitif</label>
                                <p id="izin_lingkungan"></p>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="nib">Izin Operasional/ Komersial dengan komitmen</label>
                                <p id="izin_komersial"></p>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="pernyataan">Pernyataan pemenuhan Komitmen yang ditanda tangani paling rendah setingkat manajer yang membidangi urusan lingkungan</label>
                                <p id="pernyataan"></p>
                            </div>

                            <div class="form-group col-lg-6">
                                <label data-toggle="modal" data-target="#persyaratan_teknis_modal" for="persyaratan_teknis">Persyaratan Teknis <small>
                                        *dijadikan satu file berformat pdf *klik untuk lihat persyaratan
                                    </small></label>
                                <p id="persyaratan_teknis"></p>
                            </div>


                        </div>
                        <!-- <div class="col-lg-5">
                            <div class="iq-card-body">
                                <p>Creating basic google map</p>
                                <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3902543.2003194243!2d-118.04220880485131!3d36.56083290513502!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80be29b9f4abb783%3A0x4757dc6be1305318!2sInyo%20National%20Forest!5e0!3m2!1sen!2sin!4v1576668158879!5m2!1sen!2sin" height="500" allowfullscreen=""></iframe>
                            </div>
                        </div> -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <!-- <button type="submit" class="btn iq-bg-danger">cancle</button> -->
                    </form>
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
        // service_ipal = $('#service_ipal')

        var ipal = {
            'form': $('#form_ipal'),
            'nib': $('#form_ipal').find('#nib'),
            'file_pendukung': new FileUploader($('#form_ipal').find('#file_pendukung'), "", "file_pendukung", ".png , .pdf , .jpg , .jpeg", false, false),
            'nib_file': new FileUploader($('#form_ipal').find('#nib_file'), "", "nib_file", ".png , .pdf , .jpg , .jpeg", false, false),
            'izin_lingkungan': new FileUploader($('#form_ipal').find('#izin_lingkungan'), "", "izin_lingkungan", ".png , .pdf , .jpg , .jpeg", false, false),
            'izin_komersial': new FileUploader($('#form_ipal').find('#izin_komersial'), "", "izin_komersial", ".png , .pdf , .jpg , .jpeg", false, false),
            'pernyataan': new FileUploader($('#form_ipal').find('#pernyataan'), "", "pernyataan", ".png , .pdf , .jpg , .jpeg", false, false),
            'persyaratan_teknis': new FileUploader($('#form_ipal').find('#persyaratan_teknis'), "", "persyaratan_teknis", ".png , .pdf , .jpg , .jpeg", false, false),
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
                    url: "<?= base_url() . 'Service/ipal' ?>",
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

        $('#service_ipal').on('click', (ev) => {
            document.getElementById('service_ipal_fm').style.display = '';
        })
    });
</script>