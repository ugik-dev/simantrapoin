<div id="content-page" class="content-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-body" id="freame_service">
                        <form id="form-wizard1" class="text-center mt-4">
                            <!-- fieldsets -->
                            <?php if ($this->session->userdata()['nama_role'] != 'customer') {
                            ?>
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
                                            <input required hidden id="id_pengiriman" name="id_pengiriman" type="text" class="form-control" value="<?= $dataContent2['id_pengiriman'] ?>" placeholder="Nama Perseorangan">
                                            <input required id="nama" name="nama" type="text" class="form-control" value="<?= $dataContent2['nama'] ?>" placeholder="Nama Perseorangan">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="nik">NIK</label>
                                            <input id="nik" name="nik" type="number" class="form-control" value="<?= $dataContent['nik'] ?>" placeholder="Nomor Induk Kependudukan" required>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="no_telp">No Telp <small>*Rekomendasi No Whatssapp</small></label>
                                            <input required id="no_telp" name="no_telp" type="text" value="<?= $dataContent2['no_telp'] ?>" class="form-control" placeholder="No Telp">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="email">Email</label>
                                            <input id="email" name="email" type="email" class="form-control" value="<?= $dataContent2['email'] ?>" placeholder="Email" required>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="alamat">Alamat Perseorangan</label>
                                            <textarea required id="alamat" class="form-control" name="alamat" rows="2"><?= $dataContent2['alamat'] ?></textarea>
                                        </div>

                                    </div>
                                    <!-- END SLIDE 1 -->
                                </div>
                            <?php } ?>
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
                                        <input id="nama_badan" name="nama_badan" value="<?= $dataContent['nama_badan'] ?>" type="text" class="form-control" placeholder="Nama Badan Usaha">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="nib">NIB</label>
                                        <input id="nib" name="nib" type="text" class="form-control" value="<?= $dataContent['nib'] ?>" placeholder="Nomor Induk Berusaha" required>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group col-lg-12">
                                                    <label for="latitude">Latitude </label>
                                                    <input id="latitude" placeholder="Contoh : -1.863012" value="<?= $dataContent['latitude'] ?>" name="latitude" type="text" class="form-control" placeholder="Latitude">
                                                </div>
                                                <div class="form-group col-lg-12">
                                                    <label for="longitude"> Longitude </label>
                                                    <input id="longitude" placeholder="Contoh : 106.105571" value="<?= $dataContent['longitude'] ?>" name="longitude" type="text" class="form-control" placeholder="Longitude">
                                                </div>
                                                <div class="form-group col-lg-12">
                                                    <label for="longitude"><a class="btn btn-outline-success mb-3" data-toggle="modal" data-target="#exampleModal">
                                                            <i class="ion-help"></i> <strong> panduan Google maps</strong></a></label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div id="mapid" style="height: 300px; width: 100%; z-index: 0"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="exampleFormControlTextarea1">Alamat / Lokasi Perizinan</label>
                                        <textarea id="lokasi_perizinan" class="form-control" name="lokasi_perizinan" rows="2"><?= $dataContent['lokasi_perizinan'] ?></textarea>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="exampleFormControlTextarea1">Deskripsi Lainnya</label>
                                        <textarea id="deskripsi" class="form-control" name="deskripsi" rows="2"><?= $dataContent['deskripsi'] ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-card text-left">
                                <div class="row">
                                    <div class="col-7">
                                        <h3 class="mb-4">Upload File
                                        </h3>
                                        <p style="color : black"><small>*Jika file lama tidak di ganti kosongkan saja </small></p>
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Panduan Longitude Latitude</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="<?= base_url() ?>assets/images/maps2.png" class="img-fluid" alt="Responsive image">
                <p>Open Google Maps
                    <a target="_blank" href="https://www.google.com/maps/place/Kabupaten+Bangka,+Kepulauan+Bangka+Belitung/@-1.858292,106.0809889,13.24z/data=!4m5!3m4!1s0x2e22e513edf0a7ad:0x3039d80b220cf30!8m2!3d-1.874294!4d105.92299">
                        Klik ini untuk buka maps
                    </a>
                </p>
                <p>Arahkan area map ke wilaya perizinan yang dituju.</p>
                <p>no. 1 Digunakan untuk memperbesar dan memperkecil map atau bisa menggunakan scrol pada mouse</p>
                <p>klik pada titik perizinan, sehingga muncul titik seperti pada no. 2</p>
                <p>pada no. 3 digit pertama merupakan longitude sedangkan digit kedua merupakan latitude, copy masing digit </p>
                <p>contoh longitude : -1.885676 (tanda - jangan dihilangkan) </p>
                <p>contoh latitude : 106.105595</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        <?php if (!empty($dataContent['latitude']) && !empty($dataContent['longitude'])) { ?>
            var curLocation = [<?= $dataContent['latitude'] . ', ' . $dataContent['longitude'] ?>]
        <?php } else { ?>
            var curLocation = [-1.8509798, 106.0596408]
        <?php } ?>

        var map = L.map('mapid').setView(curLocation, 13)

        L.tileLayer("http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution: "",
            minZoom: 1,
            maxZoom: 19,
        }).addTo(map);

        map.attributionControl.setPrefix(false)

        marker = new L.marker(curLocation, {
            draggable: 'true'
        });

        marker.on('dragend', function(event) {
            var position = marker.getLatLng();
            marker.setLatLng(position, {
                draggable: 'true'
            }).bindPopup(position).update();
            $('#latitude').val(position.lat)
            $('#longitude').val(position.lng)
        })

        map.on('click', function(e) {
            var lat = e.latlng.lat;
            var lng = e.latlng.lng;
            if (!marker) {
                marker = L.marker(e.latlng).addTo(map);
            } else {
                marker.setLatLng(e.latlng);
            }

            var position = marker.getLatLng();
            $('#latitude').val(position.lat)
            $('#longitude').val(position.lng)
        })
        $('#latitude').on('change', function(e) {
            reRender()
        });
        $('#longitude').on('change', function(e) {
            reRender()
        });

        function reRender() {
            if ($('#latitude').val() != 0 && $('#longitude').val() != 0 && $('#latitude').val() != '' && $('#longitude').val() != '') {
                curlat = $('#latitude').val();
                curlng = $('#longitude').val();
                curLocation = [curlat, curlng]
                console.log('curLocation :' + curLocation)
                if (!marker) {
                    marker = L.marker(curLocation).addTo(map);
                } else {
                    marker.setLatLng(curLocation);
                }

            }
        }
        map.addLayer(marker)

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
                $.ajax({
                    url: "<?= base_url() . 'Service/processedit' ?>",
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

                    id_service.val(<?= $dataContent['id_service'] ?>)

                },
            });
        }

    });
</script>