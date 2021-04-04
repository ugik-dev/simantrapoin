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
<?php $this->load->view('Fragment/HeaderFragment', ['title' => ""]);

?>
<div class="jumbotron " style="height: 5px">

  <div class="background_login" id="login_page"></div>
  <div class="container">
    <div class="col-lg-12 iq-card" style="background-color:#ffffff91">
      <div class="iq-card-body">
        <div class="row align-items-center">
          <div id="logo">
            <img src="<?php echo base_url('assets/img/logo-bangka.png'); ?>" class="align-self-center rounded mr-3" style="max-width: 100%" alt="#">
          </div>
          <div id="info" class="col-lg-9 col-md-8 col-sm-8">
            <!-- <h2 class=""><strong>SIMANTRAPOIN</strong></h2> -->
            <h4 class="display-4">SIMANTRAPOIN</h4>
            <h5 id="des_1">Sistem Informasi dan Tracking Disposisi Perizinan</h5>
            <h5 id="des_2">Dinas Penanaman Modal Pelayanan Perizinan Terpadu Satu Pintu, Koperasi dan Usaha Kecil Menengah</h5>
            <h5 id="des_3">DINPMP2KUKM</h5>
            <!-- <h5>Dinas Penanaman Modal Pelayanan Perizinan Terpadu Satu Pintu Koperasi Usaha Mikro Kecil dan Menengah</h5> -->

          </div>
          <!-- <div class="col-lg-4" style="background-color: blue; height: 100px"></div> -->
        </div>
      </div>
    </div>
    <!-- <div class="row d-flex justify-content-between"> -->

    <!-- <div class="col-lg-3"> -->
    <div class="col-lg-12 d-flex justify-content-center">
      <div class="col-lg-5 iq-card " style="background-color:#ffffff">
        <form class="mt-4" id="loginForm" role="form">
          <div class="form-group">
            <label for="exampleInputEmail1">NIK</label>
            <input type="text" class="form-control mb-0" id="exampleInputEmail1" name="username" placeholder="Username" required="required">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control mb-0" name="password" placeholder="Password" required="required">
          </div>
          <div class="d-inline-block w-100">
            <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
              <input type="checkbox" class="custom-control-input" id="customCheck1">
              <label class="custom-control-label" for="customCheck1">Ingatkan saya</label>
            </div>
            <button type="submit" id="loginBtn" class="btn btn-primary float-right" data-loading-text="Loging In...">Masuk</button>
          </div>
          <div class="sign-info">
            <span class="dark-color d-inline-block line-height-2">Belum memiliki akun? <a href="daftar">Daftar sekarang</a></span>
          </div>
        </form>
      </div>
    </div>
    <!-- <div class="iq-card-body">
        <div class="row">
          <div class="col-md-12">
            <div class="media mb-4">
              <div class="media-body">
                <div class="row">
                  <div class="col-lg-8">
                  
                  </div>
                </div>


              </div>
            </div>
            <div class="col-lg-4">
              <div class="iq-card-body" style="background-color:#ffffff">
         
  </div>
</div>
</div>
</div>
</div> -->
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
          <?php if ($this->session->flashdata('originnalurl')) {  ?>
            $(location).attr('href', '<?= $this->session->flashdata('originnalurl') ?>');
          <?php } else { ?>
            $(location).attr('href', '<?= site_url() ?>' + json['user']['nama_controller']);
          <?php } ?>
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
  @media (max-width: 575.98px) {
    #des_1 {
      display: none !important;
    }

    #des_2 {
      display: none !important;
    }

    #des_3 {
      display: block !important;
    }

    #logo {
      max-width: 3rem;
    }

    #info {
      max-width: 7rem;
    }
  }

  /* // Small devices (landscape phones, 576px and up) */
  @media (min-width: 576px) and (max-width: 767.98px) {
    #des_1 {
      display: block !important;
    }

    #des_2 {
      display: block !important;
    }

    #des_3 {
      display: none !important;
    }

    #logo {
      width: 7rem;
    }
  }

  /* // Medium devices (tablets, 768px and up) */
  @media (min-width: 768px) and (max-width: 991.98px) {
    #des_1 {
      display: block !important;
    }

    #des_2 {
      display: block !important;
    }

    #des_3 {
      display: none !important;
    }

    #logo {
      width: 7rem;
    }
  }

  /* // Large devices (desktops, 992px and up) */
  @media (min-width: 992px) and (max-width: 1199.98px) {
    #des_1 {
      display: block !important;
    }

    #des_2 {
      display: block !important;
    }

    #des_3 {
      display: none !important;
    }

    #logo {
      width: 7rem;
    }
  }

  /* // Extra large devices (large desktops, 1200px and up) */
  @media (min-width: 1200px) {
    #des_1 {
      display: block !important;
    }

    #des_2 {
      display: block !important;
    }

    #des_3 {
      display: none !important;
    }

    #logo {
      width: 7rem;
    }
  }

  /* @media (max-width: 574px) {
    #des_1 {
      display: none !important;
    }

    #des_2 {
      display: none !important;
    }

    #des_3 {
      display: block !important;
    }

    #logo {
      width: 4rem;
    }
  }

  @media (min-width: 575.98px) {
    #des_1 {
      display: none !important;
    }

    #des_2 {
      display: none !important;
    }

    #des_3 {
      display: block !important;
    }

    #logo {
      width: 4rem;
    }
  }

  @media (min-width: 767.98px) {

    #logo {
      max-width: 9rem !important;
    }

    #des_1 {
      display: block !important;
    }

    #des_2 {
      display: none !important;
    }

    #des_3 {
      display: block !important;
    }
  }

  @media (min-width: 991.98px) {
    #des_1 {
      display: block !important;
    }

    #des_2 {
      display: block !important;
    }

    #des_3 {
      display: none !important;
    }
  }

  @media (min-width: 1199.98px) {
    #des_1 {
      display: block !important;
    }

    #des_2 {
      display: block !important;
    }

    #des_3 {
      display: none !important;
    }
  } */

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
    padding-left: 130;
    padding-right: 130;
    padding-top: 10px;
    /* padding: 130px; */
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

  /* .logo-logo {
    margin: 30px;
    background-color: #ffffff;
    border: 1px solid black;
    opacity: 0.6;
    filter: alpha(opacity=60);
  } */
</style>