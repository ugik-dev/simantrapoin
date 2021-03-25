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
                <div class="ibox-content" style="background-color:#ffffff61">
                    <form id="SearchForm" class="m-t" role="form">
                        <h3 style="color: black;">Pencarian NIB</h3>
                        <div class="row">
                            <div class="form-group col-md-9">
                                <input type="text" class="form-control" id='nib' name="nib" placeholder="NIB" required="required">
                            </div>
                            <!-- <div class="form-group">
              <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div> -->
                            <div class="form-group col-md-3">

                                <button type="submit" id="searchBtn" class="btn btn-primary block full-width m-b" data-loading-text="Seaching..">Search <i class="fa fa-search"></i> </button>
                            </div>
                            <!-- 
                            <a type="button" href="search" class="btn btn-info block full-width col-md-3" data-loading-text="Seaching.."><i class="fa fa-search"></i> Cari Data Siswa</a>
                             -->
                        </div>
                    </form>

                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="FDataTable" class="table table-dark table-sm">
                                <thead>
                                    <tr>
                                        <th style="width: 10%; text-align:center!important">Tanggal Dibuat</th>
                                        <th style="width: 15%; text-align:center!important">Nama Perseorangan / Badan / NIB</th>
                                        <th style="width: 10%; text-align:center!important">Perizinan</th>
                                        <th style="width: 10%; text-align:center!important">Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <p class="m-t">
                        <small style="color: black;">DINPMP2KUKM KAB BANGKA</small>
                    </p>
                </div>
            </div>




        </div>
        <br>
    </div>
</div>


<script>
    $(document).ready(function() {

        var searchForm = $('#SearchForm');
        var submitBtn = searchForm.find('#searchBtn');
        var nib = searchForm.find('#nib');
        var login_page = $('#login_page');

        searchForm.on('submit', (ev) => {
            ev.preventDefault();
            buttonLoading(submitBtn);
            $.ajax({
                url: `<?= site_url() . 'search' ?>/${nib.val()}`,
                // type: "POST",
                // data: searchForm.serialize(),
                success: (data) => {
                    buttonIdle(submitBtn);
                    json = JSON.parse(data);
                    if (json['error']) {
                        swal("Data Tidak Ditemukan", json['message'], "error");
                        return;
                    }
                    renderData(json['data']); // $(location).attr('href', '<?= site_url() ?>' + json['user']['nama_controller']);
                },
                error: () => {
                    buttonIdle(submitBtn);
                }
            });
        });

        var FDataTable = $('#FDataTable').DataTable({
            'columnDefs': [],
            deferRender: true,
            'paging': false,
            'searching': false,
            'ordering': false
        });

        function renderData(data) {
            if (data == null || typeof data != "object") {
                console.log("User::UNKNOWN DATA");
                return;
            }
            var i = 0;

            var renderData = [];
            Object.values(data).forEach((pengajuan) => {
                var detailButton = `
      <a href='<?= site_url() ?>search/${pengajuan['nib']}/${pengajuan['id_pengiriman']}'>${renderDate(pengajuan['created_at'])}</a>
      `;

                var col2 = pengajuan['nama'] + (pengajuan['nama_badan'] ? ('<br>' + pengajuan['nama_badan']) : '') + (pengajuan['nib'] ? ('<br>' + pengajuan['nib']) : '');
                renderData.push([detailButton, col2, pengajuan['tujuan'] == 'usaha' ? "Usaha" : 'Umum', statusPermohonan(pengajuan['status_proposal'])]);
            });
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

        var counter = Math.floor(Math.random() * 100) + 1;
        var image_count = 28;
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
        background-image: url('assets/img/background/1-Lomba-Foto-Babar-2017_Menangkis-Tantangan_Lintang-Tatang.jpg');
    }

    .img_1 {
        position: fixed !important;
        background-image: url('assets/img/background/1-Sardy_Pesanggrahan-Menumbing.jpg');
    }

    .img_2 {
        position: fixed !important;
        background-image: url('assets/img/background/2-Agus-Ramdhany_Batu-penunggu-pantai.jpg');
    }

    .img_3 {
        position: fixed !important;
        background-image: url('assets/img/background/2--Lomba-Foto-Babar-2017_Dendang-Rampak_Guzairi-Linggarjati.jpg');
    }

    .img_4 {
        position: fixed !important;
        background-image: url('assets/img/background/3--Lomba-Foto-Babar-2017_3000-obor_Aswandi.jpg');
    }

    .img_5 {
        position: fixed !important;
        background-image: url('assets/img/background/5-Media-Nusantara_Pelabuhan-Tanjung-Kalian.jpg');
    }

    .img_6 {
        position: fixed !important;
        background-image: url('assets/img/background/6-Lomba-Foto-Babar_Dwi-Hardiansyah_-Perang-Ketupat.jpg');
    }

    .img_7 {
        position: fixed !important;
        background-image: url('assets/img/background/6-Rizky-Saputra_MTI-Muntok.jpg');
    }

    .img_8 {
        position: fixed !important;
        background-image: url('assets/img/background/Batu-Berlayar---Kabupaten-Belitung-by-Jeffry-Surianto.jpg');
    }

    .img_9 {
        position: fixed !important;
        background-image: url('assets/img/background/De-Locomotief-5.jpg');
    }

    .img_10 {
        position: fixed !important;
        background-image: url('assets/img/background/Dermaga-Pulau-Buku-Limau---Kabupaten-Belitung-Timur-by-Mina-Arvah.jpg');
    }

    .img_11 {
        position: fixed !important;
        background-image: url('assets/img/background/DSC_0900.jpg');
    }

    .img_12 {
        position: fixed !important;
        background-image: url('assets/img/background/GERBANG-LIKUR,-Deni-Syafutra-,jl.jpg');
    }

    .img_13 {
        position: fixed !important;
        background-image: url('assets/img/background/KEMBANG-LIKUR,GINDA-HUWAYAN-PULUNGAN,-SUNGAILIAT,-085379290989,-DESA-MANCUNG-KECAMATAN-KELAPA-BAN.jpg');
    }

    .img_14 {
        position: fixed !important;
        background-image: url('assets/img/background/landscape.jpg');
    }

    .img_15 {
        position: fixed !important;
        background-image: url('assets/img/background/Landscape-Kaolin_Pelangi-IG-ok.jpg');
    }

    .img_16 {
        position: fixed !important;
        background-image: url('assets/img/background/Museum-Timah---Lastriazi2017-(3).jpg');
    }

    .img_17 {
        position: fixed !important;
        background-image: url('assets/img/background/PAHLAWAN-KECIL,-ADITTIYA-SAPUTRA,-JL.jpg');
    }

    .img_18 {
        position: fixed !important;
        background-image: url('assets/img/background/PantaiBatuKapur-.jpg');
    }

    .img_19 {
        position: fixed !important;
        background-image: url('assets/img/background/Pantai-Pasir-Padi---Kota-Pangkalpinang-by-Muttaqin.jpg');
    }

    .img_20 {
        position: fixed !important;
        background-image: url('assets/img/background/Pesanggrahan-Muntok---Kabupaten-Bangka-Barat.jpg');
    }

    .img_21 {
        position: fixed !important;
        background-image: url('assets/img/background/Pulau-Dapur---Kabupaten-Bangka-Selatan.jpg');
    }

    .img_22 {
        position: fixed !important;
        background-image: url('assets/img/background/Pulau-Lengkuas---Belitung.jpg');
    }

    .img_23 {
        position: fixed !important;
        background-image: url('assets/img/background/RANGGAM_TAUFIQHIDAYAT_08127171822.jpg');
    }

    .img_24 {
        position: fixed !important;
        background-image: url('assets/img/background/Tanjung-Berikat---Bangka-Tengah-by-Setiadi--Darmawan.jpg');
    }

    .img_25 {
        position: fixed !important;
        background-image: url('assets/img/background/tanjung-labu.jpg');
    }

    .img_26 {
        position: fixed !important;
        background-image: url('assets/img/background/Tarsius-Bancanus-Saltator.jpg');
    }

    .img_27 {
        position: fixed !important;
        background-image: url('assets/img/background/Teluk-Limau---Kabupaten-Bangka-by-Iksander.jpg');
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