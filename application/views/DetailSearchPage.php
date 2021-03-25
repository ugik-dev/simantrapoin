<style>
    .display-5 {
        font-size: 40px !important;
        font-weight: bold !important;
    }

    @media (max-width: 500px) and (min-width: 500px) {
        .jumbotron {
            padding: 10px 0px 0px 0px !important;
            margin: 10px 0px 0px 0px !important;
        }

        #logo_login {
        /* width: 100px; */
        padding: 30px 30px 30px !important;
        }
        .display-5 {
            font-size: 20px !important;
            font-weight: bold !important;
        }
    }

    @media (max-width: 800px) {
        .jumbotron {
            padding: 10px 0px 0px 0px !important;
            margin: 10px 0px 0px 0px !important;
        }

        #logo_login {
        /* width: 100px; */
        padding: 1rem !important;
        }
        .display-5 {
            font-size: 20px !important;
            font-weight: bold !important;
        }
    }
</style>
<?php $this->load->view('Fragment/HeaderFragment', ['title' => $title]); ?>
<div class="jumbotron " style="height: 95%">
    <div class="background_login" id="login_page"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-2 d-flex justify-content-center" id='logo_login' style="padding: 10px 10px 10px 10px">
                        <img src="<?php echo base_url('assets/img/logo-bangka.png'); ?>" style="width : 100px; height: auto">
                    </div>
                    <div class="col-md-10">
                        <h1 class="display-5 shadowed">SISTEM INFORMASI DAN TRACKING DISPOSISI PERIZINAN</h1>
                        <!-- <h1 class="display-5 shadowed">DINAS PENANAMAN MODAL, PELAYANAN PERIZINAN TERPADU SATU PINTU</h1> -->
                        <h4 class="shadowed">DINAS PENANAMAN MODAL, PELAYANAN PERIZINAN TERPADU SATU PINTU, KOPERASI USAHA MIKRO KECIL DAN MENENGAH</h4>
                        <h4 class="shadowed">KABUPATEN BANGKA</h4>
                    </div>
                </div>
                <!-- <img class="col-md-3" src="<?php echo base_url('assets/img/logo-comeexplore.png'); ?>" >
          <img class="col-md-3" src="<?php echo base_url('assets/img/logo-pesona-indonesia.png'); ?>" > -->
                <!-- <div class="row">
              <div class="col-md-6">
                  Pemerintah KABUPATEN BANGKA
              </div>
              <div class="col-md-6 text-right">
                <small>© 2019</small>
              </div>
            </div> -->

            </div>
            <div class="col-md-12">
                <div class="ibox-content">
                    <!-- <button onclick="goBack()">Go Back</button> -->
                    <button type="button" id="backBtn" class="btn btn-primary block full-width col-md-1" data-loading-text="Seaching.."><i class="fa fa-backward"></i> Kembali </button>
                    <br>
                    <div class="col-md-12" id='layout_pengiriman'>

                        <div id="profil">
                            <form>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="formGroupExampleInput">Tanggal Terdata</label>
                                        <h4 id='created_at'> </h4>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="nama">Nama :</label>
                                        <h4 id='nama'> </h4>
                                        <hr>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="nama_badan">Nama Badan :</label>
                                        <h4 id='nama_badan'> </h4>
                                        <hr>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="formGroupExampleInput">Perizinan</label>
                                        <h4 id='tujuan'> </h4>
                                        <hr>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="nib">NIB :</label>
                                        <h4 id='nib'> </h4>
                                        <hr>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="formGroupExampleInput">Alamat</label>

                                        <h4 id='alamat'></h4>
                                        <hr>
                                    </div>

                                    <div class="form-group  col-sm-6">
                                        <label for="formGroupExampleInput">Deskripsi</label>
                                        <h4 id='deskripsi'></h4>
                                        <hr>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="status_proposal">Status :</label>
                                    <h4 id='status_proposal'> </h4>
                                    <hr>

                                </div>

                            </form>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="FDataTable" class="table table-dark table-sm">
                            <thead>
                                <tr>
                                    <th style="width: 10%; text-align:center!important">Tanggal</th>
                                    <th style="width: 10%; text-align:center!important">Nama</th>
                                    <th style="width: 12%; text-align:center!important">Jabatan</th>
                                    <th style="width: 15%; text-align:center!important">Catatan</th>
                                    <th style="width: 5%; text-align:center!important">Status</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <p class="m-t">
                        <small style="color: black;">DINPMP2KUKM KAB BANGKA</small>
                    </p>
                </div>

            </div>
        </div>

    </div>
    <br>
</div>


<script>
    $(document).ready(function() {

        var id_pengiriman = "<?= $data['id_pengiriman'] ?>";
        var nib = "<?= $data['nib'] ?>";
        var login_page = $('#login_page');

        var backBtn = $('#backBtn')

        backBtn.on('click', function() {
            window.history.back();

        })

        var Layout = {
            'id_pengiriman': $('#layout_pengiriman').find('#id_pengiriman'),
            'nama': $('#layout_pengiriman').find('#nama'),
            'no_dokumen': $('#layout_pengiriman').find('#no_dokumen'),
            'alamat': $('#layout_pengiriman').find('#alamat'),
            'nama_badan': $('#layout_pengiriman').find('#nama_badan'),
            'tujuan': $('#layout_pengiriman').find('#tujuan'),
            'survey': $('#layout_pengiriman').find('#survey'),
            'nib': $('#layout_pengiriman').find('#nib'),

            'deskripsi': $('#layout_pengiriman').find('#deskripsi'),
            'status_proposal': $('#layout_pengiriman').find('#status_proposal'),
            'created_at': $('#layout_pengiriman').find('#created_at'),
            'btn_word': $('#layout_pengiriman').find('#btn_word'),
        }
        var FDataTable = $('#FDataTable').DataTable({
            'columnDefs': [],
            deferRender: true,
            'paging': false,
            'searching': false,
            'ordering': false
        });

        getProfil();

        function getProfil() {
            $.ajax({
                url: `<?= site_url('searchdetail') ?>`,
                'type': 'POST',
                data: {
                    id_pengiriman: id_pengiriman,
                    nib: nib
                },
                success: function(data) {
                    var json = JSON.parse(data);
                    dataProfil = json['data'];
                    console.log(dataProfil)
                    Layout.no_dokumen.html(dataProfil['no_dokumen'])
                    Layout.alamat.html(dataProfil['alamat'].replace('\n', ' <br> '))
                    Layout.deskripsi.html(dataProfil['deskripsi'].replace('\n', ' <br> '))
                    Layout.nama.html(dataProfil['nama'])
                    Layout.nama_badan.html(dataProfil['nama_badan'])
                    Layout.nib.html(dataProfil['nib'])
                    Layout.tujuan.html(dataProfil['tujuan'] == 'usaha' ? "Perizinan Usaha" : "Perizinan Umum")
                    Layout.status_proposal.html(statusPermohonan(dataProfil['status_proposal']))

                    Layout.created_at.html(renderDate2(dataProfil['created_at']))
                    dataProfil['output_no_dokumen'] ? Layout.status_proposal.append("<br>No Dokumen: " + dataProfil['output_no_dokumen']) : '';

                    renderTabel(dataProfil)
                },
                error: function(e) {}
            });
        }

        function renderTabel(data) {
            if (data == null || typeof data != "object") {
                console.log("User::UNKNOWN DATA");
                return;
            }
            var i = 0;
            var renderData = [];

            renderData.push([renderDate(data['date_sending']), data['nama_fo'], 'Front Office', data['catatan_fo'], statusSelf(1)]);
            if (data['status_proposal'] == 'DIPROSES' || data['status_proposal'] == 'DITERIMA') {
                // renderData.push([data['date_acc_1'], data['acc_1'], 'Back Office', statusSelf(2)]);
                if (data['id_tahap_proposal'] == '1') {
                    renderData.push([data['date_acc_1'], data['bo1'], 'Kasi', '-', statusSelf(3)]);
                } else if (data['id_tahap_proposal'] < '1') {
                    renderData.push(['-', '-', '-', statusSelf(4)]);
                } else {
                    renderData.push([renderDate(data['date_acc_1']), data['bo1'], 'Kasi', data['catatan_1'], statusSelf(2)]);
                }
                if (data['survey'] == 'ya') {
                    if (data['id_tahap_proposal'] == '2') {
                        renderData.push([data['date_acc_2'], data['bo2'], 'Kabid', '-', statusSelf(3)]);
                    } else if (data['id_tahap_proposal'] < '2') {
                        renderData.push(['-', '-', '-', '-', statusSelf(4)]);
                    } else {
                        renderData.push([renderDate(data['date_acc_2']), data['bo2'], 'Kabid', data['catatan_2'], statusSelf(2)]);
                    }

                    if (data['id_tahap_proposal'] == '3') {
                        renderData.push([data['date_acc_3'], data['bo3'], 'Kasi', '-', statusSelf(3)]);
                    } else if (data['id_tahap_proposal'] < '3') {
                        renderData.push(['-', '-', '-', '-', statusSelf(4)]);
                    } else {
                        renderData.push([renderDate(data['date_acc_3']), data['bo3'], 'Kasi', data['catatan_3'], statusSelf(2)]);
                    }
                }
                if (data['id_tahap_proposal'] == '4') {
                    renderData.push([data['date_acc_4'], data['bo4'], 'Back Office Draft Perizinan', data['catatan_4'], statusSelf(3)]);
                } else if (data['id_tahap_proposal'] < '4') {
                    renderData.push(['-', '-', '-', '-', statusSelf(4)]);
                } else {
                    renderData.push([renderDate(data['date_acc_4']), data['bo4'], 'Back Office Draft Perizinan', data['catatan_4'], statusSelf(6)]);
                }

                if (data['id_tahap_proposal'] == '5') {
                    renderData.push([data['date_acc_5'], data['bo5'], 'Back Office Pemberkasan', data['catatan_5'], statusSelf(3)]);
                } else if (data['id_tahap_proposal'] < '5') {
                    renderData.push(['-', '-', '-', '-', statusSelf(4)]);
                } else {
                    renderData.push([renderDate(data['date_acc_4']), data['bo5'], 'Back Office Pemberkasan', data['catatan_5'], statusSelf(6)]);
                }

                if (data['id_tahap_proposal'] == '6') {
                    renderData.push(['-', '-', 'Kepala Dinas', '-', statusSelf(3)]);
                } else if (data['id_tahap_proposal'] < '6') {
                    renderData.push(['-', '-', 'Kepala Dinas', '-', statusSelf(4)]);
                } else {
                    renderData.push([renderDate(data['date_kadin']), data['kadin'], 'Kepala Dinas', data['catatan_kadin'], statusSelf(6)]);
                }

            } else if (data['status_proposal'] == 'DITOLAK') {
                if (data['tolak_in'] == '1') {
                    renderData.push([renderDate(data['date_tolak']), data['nama_tolak'],'Kasi', data['catatan'],  statusSelf(5)]);
                } else {
                    renderData.push([renderDate(data['date_acc_1']), data['bo1'], 'Kasi', data['catatan_1'], statusSelf(2)]);
                }
                if (data['survey'] == 'ya') {

                    if (data['tolak_in'] == '2') {
                        renderData.push([renderDate(data['date_tolak']), data['nama_tolak'], 'Kabid', data['catatan'], statusSelf(5)]);
                    } else {
                        if (data['tolak_in'] > '2') renderData.push([renderDate(data['date_acc_2']), data['bo2'], 'Kabid', data['catatan_2'], statusSelf(2)]);
                    }
                    if (data['tolak_in'] == '3') {
                        renderData.push([renderDate(data['date_tolak']), data['nama_tolak'], 'Kasi', data['catatan'], statusSelf(5)]);
                    } else {
                        if (data['tolak_in'] > '3') renderData.push([renderDate(data['date_acc_3']), data['bo3'], 'Kasi', data['catatan_3'], statusSelf(2)]);
                    }

                }
                if (data['tolak_in'] == '6') {
                    renderData.push([renderDate(data['date_tolak']), data['nama_tolak'], 'Kepala Dinas', data['catatan'], statusSelf(5)]);
                    // } else {
                    // if (data['tolak_in'] > '3') renderData.push([renderDate(data['date_acc_3']), data['bo3'], 'Kasi', data['catatan_3'], statusSelf(2)]);
                }
                if (data['id_tahap_proposal'] == '4') {
                    renderData.push(['', '', 'Back Office Draft Penolakan', '-', statusSelf(3)]);
                } else if (data['id_tahap_proposal'] > '4') {
                    renderData.push([renderDate(data['date_acc_4']), data['bo4'], 'Back Office Draft Penolakan', data['catatan_4'], statusSelf(6)]);
                } else {
                    renderData.push(['', '', 'Cetak', '-', statusSelf(4)]);
                }
                if (data['id_tahap_proposal'] == '5') {
                    renderData.push(['', '', 'Back Office Pemberkasan', '-', statusSelf(3)]);
                } else if (data['id_tahap_proposal'] > '5') {
                    renderData.push([renderDate(data['date_acc_5']), data['bo5'], 'Back Office Pemberkasan ', data['catatan_5'], statusSelf(6)]);
                } else {
                    renderData.push(['', '', 'Back Office Pemberkasan', '-', statusSelf(4)]);
                }
                if (data['id_tahap_proposal'] == '6') {
                    renderData.push(['', '', 'Tanda Tangan Kepala Dinas', '-', statusSelf(3)]);
                } else if (data['id_tahap_proposal'] > '6') {
                    renderData.push([renderDate(data['date_kadin']), data['kadin'], 'Tanda Tangan Kepala Dinas', data['catatan_kadin'], statusSelf(6)]);
                } else {
                    renderData.push(['', '', 'Tanda Tangan Kepala Dinas', '-', statusSelf(4)]);
                }
            }
            FDataTable.clear().rows.add(renderData).draw('full-hold');
        }


        function statusPermohonan(status) {
            if (status == 'DRAFT')
                return `<i class='fa fa-edit text-warning'> Draft</i>`;
            else if (status == 'DIPROSES')
                return `<i class='fa fa-hourglass-start text-primary'> Diproses</i>`;
            else if (status == 'DITERIMA')
                return `<i class='fa fa-check text-success'> Diterima</i>`;
            return `<i class='fa fa-times text-danger'> Ditolak</i>`;
        }

        function statusSelf(status) {
            if (status == '1')
                return `<i class='fa fa-edit text-warning'> Diterima</i>`;
            else if (status == '2')
                return `<i class='fa fa-check text-success'> Approv</i>`;
            else if (status == '3')
                return `<i class='fa fa-hourglass-start text-primary'> Menunggu Aksi</i>`;
            else if (status == '4')
                return `<i class='fa fa-hourglass-start text-primary'> Menunggu</i>`;
            else if (status == '5')
                return `<i class='fa fa-times text-danger'> Ditolak </i>`;
            else if (status == '6')
                return `<i class='fa fa-check text-success'> Selesai </i>`;
        }


        var counter = Math.floor(Math.random() * 100) + 1;
        var image_count = 1;
        login_page.addClass(`img_${counter % image_count}`);
        window.setInterval(function() {
            counter += 1;
            var prevIdx = (counter - 1) % image_count;
            var currIdx = counter % image_count;
            login_page.fadeOut('400', function() {
                login_page.removeClass(`img_${prevIdx}`);
                login_page.addClass(`img_${currIdx}`);
                login_page.fadeIn('400', function() {})
            });
        }, 15000);
    });
</script>
<style>
    body {
        background-color: #f3f3f4 !important;

    }

    .img_0 {
        position: fixed !important;
        background-image: url('../../assets/img/background/1-Lomba-Foto-Babar-2017_Menangkis-Tantangan_Lintang-Tatang.jpg');
    }

    .img_1 {
        position: fixed !important;
        background-image: url('../../assets/img/background/1-Sardy_Pesanggrahan-Menumbing.jpg');
    }

    .img_2 {
        position: fixed !important;
        background-image: url('../../assets/img/background/2-Agus-Ramdhany_Batu-penunggu-pantai.jpg');
    }

    .img_3 {
        position: fixed !important;
        background-image: url('../../assets/img/background/2--Lomba-Foto-Babar-2017_Dendang-Rampak_Guzairi-Linggarjati.jpg');
    }

    .img_4 {
        position: fixed !important;
        background-image: url('../../assets/img/background/3--Lomba-Foto-Babar-2017_3000-obor_Aswandi.jpg');
    }

    .img_5 {
        position: fixed !important;
        background-image: url('../../assets/img/background/5-Media-Nusantara_Pelabuhan-Tanjung-Kalian.jpg');
    }

    .img_6 {
        position: fixed !important;
        background-image: url('../../assets/img/background/6-Lomba-Foto-Babar_Dwi-Hardiansyah_-Perang-Ketupat.jpg');
    }

    .img_7 {
        position: fixed !important;
        background-image: url('../../assets/img/background/6-Rizky-Saputra_MTI-Muntok.jpg');
    }

    .img_8 {
        position: fixed !important;
        background-image: url('../../assets/img/background/Batu-Berlayar---Kabupaten-Belitung-by-Jeffry-Surianto.jpg');
    }

    .img_9 {
        position: fixed !important;
        background-image: url('../../assets/img/background/De-Locomotief-5.jpg');
    }

    .img_10 {
        position: fixed !important;
        background-image: url('../../assets/img/background/Dermaga-Pulau-Buku-Limau---Kabupaten-Belitung-Timur-by-Mina-Arvah.jpg');
    }

    .img_11 {
        position: fixed !important;
        background-image: url('../../assets/img/background/DSC_0900.jpg');
    }

    .img_12 {
        position: fixed !important;
        background-image: url('../../assets/img/background/GERBANG-LIKUR,-Deni-Syafutra-,jl.jpg');
    }

    .img_13 {
        position: fixed !important;
        background-image: url('../../assets/img/background/KEMBANG-LIKUR,GINDA-HUWAYAN-PULUNGAN,-SUNGAILIAT,-085379290989,-DESA-MANCUNG-KECAMATAN-KELAPA-BAN.jpg');
    }

    .img_14 {
        position: fixed !important;
        background-image: url('../../assets/img/background/landscape.jpg');
    }

    .img_15 {
        position: fixed !important;
        background-image: url('../../assets/img/background/Landscape-Kaolin_Pelangi-IG-ok.jpg');
    }

    .img_16 {
        position: fixed !important;
        background-image: url('../../assets/img/background/Museum-Timah---Lastriazi2017-(3).jpg');
    }

    .img_17 {
        position: fixed !important;
        background-image: url('../../assets/img/background/PAHLAWAN-KECIL,-ADITTIYA-SAPUTRA,-JL.jpg');
    }

    .img_18 {
        position: fixed !important;
        background-image: url('../../assets/img/background/PantaiBatuKapur-.jpg');
    }

    .img_19 {
        position: fixed !important;
        background-image: url('../../assets/img/background/Pantai-Pasir-Padi---Kota-Pangkalpinang-by-Muttaqin.jpg');
    }

    .img_20 {
        position: fixed !important;
        background-image: url('../../assets/img/background/Pesanggrahan-Muntok---Kabupaten-Bangka-Barat.jpg');
    }

    .img_21 {
        position: fixed !important;
        background-image: url('../../assets/img/background/Pulau-Dapur---Kabupaten-Bangka-Selatan.jpg');
    }

    .img_22 {
        position: fixed !important;
        background-image: url('../../assets/img/background/Pulau-Lengkuas---Belitung.jpg');
    }

    .img_23 {
        position: fixed !important;
        background-image: url('../../assets/img/background/RANGGAM_TAUFIQHIDAYAT_08127171822.jpg');
    }

    .img_24 {
        position: fixed !important;
        background-image: url('../../assets/img/background/Tanjung-Berikat---Bangka-Tengah-by-Setiadi--Darmawan.jpg');
    }

    .img_25 {
        position: fixed !important;
        background-image: url('../../assets/img/background/tanjung-labu.jpg');
    }

    .img_26 {
        position: fixed !important;
        background-image: url('../../assets/img/background/Tarsius-Bancanus-Saltator.jpg');
    }

    .img_27 {
        position: fixed !important;
        background-image: url('../../assets/img/background/Teluk-Limau---Kabupaten-Bangka-by-Iksander.jpg');
    }

    .jumbotron {
        background-size: cover;
        height: 250px;
        border-radius: 0px;
        padding: 10px;
    }

    .background_login {
        position: absolute;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 0;
        width: 100%;
        background-position: center;
        background-size: cover;
    }

    .shadowed {
        text-shadow: 2px 2px 1px #000000;
        color: #fff;
    }

    .logo-logo {
        margin: 30px;
        background-color: #ffffff;
        border: 1px solid black;
        /* opacity: 0.1; */
        /* filter: alpha(opacity=10); */
        /* For IE8 and earlier */
    }
</style>