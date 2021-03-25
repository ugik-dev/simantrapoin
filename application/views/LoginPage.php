<style>
     .display-5 {
        font-size: 40px !important;
        font-weight: bold !important;
    }

    @media (max-width: 800px) {
        .jumbotron {
            padding: 10px 0px 0px 0px !important;
            margin: 10px 0px 0px 0px !important;
        }

        /* #logo_login { */
        /* width: 100px; */
        /* } */
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
      <div class="col-md-8">
        <div class="row">
          <div class="col-sm-3 justify-content-center" id='logo_login' style="margin-bottom: 10px;">
            <img src="<?php echo base_url('assets/img/logo-bangka.png'); ?>" style="width : 90%; height: auto">
          </div>
          <div class="col-md-9">
            <h1 class="display-5 shadowed">SISTEM INFORMASI DAN TRACKING DISPOSISI PERIZINAN</h1>
            <!-- <h1 class="display-5 shadowed">DINAS PENANAMAN MODAL, PELAYANAN PERIZINAN TERPADU SATU PINTU</h1> -->
            <p class="shadowed">DINAS PENANAMAN MODAL, PELAYANAN PERIZINAN TERPADU SATU PINTU, KOPERASI USAHA MIKRO KECIL DAN MENENGAH</p>
            <p class="shadowed">KABUPATEN BANGKA</p>

            <!-- <h1 class="display-5 shadowed">DINAS PENANAMAN MODAL, PELAYANAN PERIZINAN TERPADU SATU PINTU</h1>
            <p class="lead shadowed">KABUPATEN BANGKA</p> -->
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
      <div class="col-md-4">
        <div class="ibox-content" style="background-color:#ffffff61">
          <form id="loginForm" class="m-t" role="form">
            <h3 style="color: black;">Login / Masuk</h3>
            <div class="form-group">
              <input type="text" class="form-control" name="username" placeholder="Username" required="required">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>
            <button type="submit" id="loginBtn" class="btn btn-primary block full-width m-b" data-loading-text="Loging In...">Login</button>
            <a type="button" href="daftar" class="btn btn-info block full-width m-b" data-loading-text=""><i class="fa fa-pencil"></i> Daftar</a>
            <!-- <a type="button" href="search" class="btn btn-info block full-width m-b" data-loading-text=""><i class="fa fa-search"></i> Cari Data</a> -->
          </form>
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

    var loginForm = $('#loginForm');
    var submitBtn = loginForm.find('#loginBtn');
    var login_page = $('#login_page');

    loginForm.on('submit', (ev) => {
      ev.preventDefault();
      // buttonLoading(submitBtn);
      $.ajax({
        url: "<?= site_url() . 'login-process' ?>",
        type: "POST",
        data: loginForm.serialize(),
        success: (data) => {
          // buttonIdle(submitBtn);
          json = JSON.parse(data);
          if (json['error']) {
            swal("Login Gagal", json['message'], "error");
            return;
          }
          $(location).attr('href', '<?= site_url() ?>' + json['user']['nama_controller']);
        },
        error: () => {
          buttonIdle(submitBtn);
        }
      });
    });

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
    background-image: url('assets/img/background/1-Lomba-Foto-Babar-2017_Menangkis-Tantangan_Lintang-Tatang.jpg');
  }

  .img_1 {
    background-image: url('assets/img/background/1-Sardy_Pesanggrahan-Menumbing.jpg');
  }

  .img_2 {
    background-image: url('assets/img/background/2-Agus-Ramdhany_Batu-penunggu-pantai.jpg');
  }

  .img_3 {
    background-image: url('assets/img/background/2--Lomba-Foto-Babar-2017_Dendang-Rampak_Guzairi-Linggarjati.jpg');
  }

  .img_4 {
    background-image: url('assets/img/background/3--Lomba-Foto-Babar-2017_3000-obor_Aswandi.jpg');
  }

  .img_5 {
    background-image: url('assets/img/background/5-Media-Nusantara_Pelabuhan-Tanjung-Kalian.jpg');
  }

  .img_6 {
    background-image: url('assets/img/background/6-Lomba-Foto-Babar_Dwi-Hardiansyah_-Perang-Ketupat.jpg');
  }

  .img_7 {
    background-image: url('assets/img/background/6-Rizky-Saputra_MTI-Muntok.jpg');
  }

  .img_8 {
    background-image: url('assets/img/background/Batu-Berlayar---Kabupaten-Belitung-by-Jeffry-Surianto.jpg');
  }

  .img_9 {
    background-image: url('assets/img/background/De-Locomotief-5.jpg');
  }

  .img_10 {
    background-image: url('assets/img/background/Dermaga-Pulau-Buku-Limau---Kabupaten-Belitung-Timur-by-Mina-Arvah.jpg');
  }

  .img_11 {
    background-image: url('assets/img/background/DSC_0900.jpg');
  }

  .img_12 {
    background-image: url('assets/img/background/GERBANG-LIKUR,-Deni-Syafutra-,jl.jpg');
  }

  .img_13 {
    background-image: url('assets/img/background/KEMBANG-LIKUR,GINDA-HUWAYAN-PULUNGAN,-SUNGAILIAT,-085379290989,-DESA-MANCUNG-KECAMATAN-KELAPA-BAN.jpg');
  }

  .img_14 {
    background-image: url('assets/img/background/landscape.jpg');
  }

  .img_15 {
    background-image: url('assets/img/background/Landscape-Kaolin_Pelangi-IG-ok.jpg');
  }

  .img_16 {
    background-image: url('assets/img/background/Museum-Timah---Lastriazi2017-(3).jpg');
  }

  .img_17 {
    background-image: url('assets/img/background/PAHLAWAN-KECIL,-ADITTIYA-SAPUTRA,-JL.jpg');
  }

  .img_18 {
    background-image: url('assets/img/background/PantaiBatuKapur-.jpg');
  }

  .img_19 {
    background-image: url('assets/img/background/Pantai-Pasir-Padi---Kota-Pangkalpinang-by-Muttaqin.jpg');
  }

  .img_20 {
    background-image: url('assets/img/background/Pesanggrahan-Muntok---Kabupaten-Bangka-Barat.jpg');
  }

  .img_21 {
    background-image: url('assets/img/background/Pulau-Dapur---Kabupaten-Bangka-Selatan.jpg');
  }

  .img_22 {
    background-image: url('assets/img/background/Pulau-Lengkuas---Belitung.jpg');
  }

  .img_23 {
    background-image: url('assets/img/background/RANGGAM_TAUFIQHIDAYAT_08127171822.jpg');
  }

  .img_24 {
    background-image: url('assets/img/background/Tanjung-Berikat---Bangka-Tengah-by-Setiadi--Darmawan.jpg');
  }

  .img_25 {
    background-image: url('assets/img/background/tanjung-labu.jpg');
  }

  .img_26 {
    background-image: url('assets/img/background/Tarsius-Bancanus-Saltator.jpg');
  }

  .img_27 {
    background-image: url('assets/img/background/Teluk-Limau---Kabupaten-Bangka-by-Iksander.jpg');
  }

  .jumbotron {
    background-size: cover;
    height: 750px;
    border-radius: 0px;
    padding: 130px;
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
    opacity: 0.6;
    filter: alpha(opacity=60);
    /* For IE8 and earlier */
  }
</style>
<?php $this->load->view('Fragment/FooterFragment'); ?>