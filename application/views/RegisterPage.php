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
          <div class="row">
            <div class="col-md-12">
              <span class="text-center">
                <h3 class="font-bold" style="margin-bottom:16px">
                  Pendaftaran Sistem Informasi Kantor Pelayanan Terpadu Satu Pintu </h3>
              </span>
            </div>
            <div class="col-md-12">
              <div class="ibox-content">
                <form id="registerForm" class="m-t" role="form">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" placeholder="NIK" class="form-control" id="nik" name="nik" required="required" autocomplete="nik">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" placeholder="Nama" class="form-control" id="nama" name="nama" required="required" autocomplete="nama">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" placeholder="" class="form-control" id="password" name="password" required="required" autocomplete="new-password">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="repassword">
                          Konfirmasi Password
                        </label>
                        <input type="password" placeholder="Password" class="form-control" id="repassword" name="repassword" required="required" autocomplete="new-password">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" placeholder="Email" class="form-control" id="email" name="email" required="required">
                  </div>

           
                  <div class="form-group">
                    <label for="alamat">
                      Alamat</label>
                    <textarea rows="4" type="text" placeholder="" class="form-control" id="alamat" name="alamat" required="required"></textarea>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="no_telp">No Telepon / HP</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="No Telepon / HP" required="required">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="no_fax">No Fax</label>
                        <input type="text" class="form-control" id="no_fax" name="no_fax" placeholder="No Fax">
                      </div>
                    </div>
                  </div>
                  <hr>
                  <label for="">KTP <small>.jpeg .jpg .png</small></label>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- <div class="form-group" id="kpt"> -->
                      <p class="no-margins"><span id="ktp">-</span></p>
                      <!-- </div> -->
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <input type="text" class="form-control" id="no_ktp" name="no_ktp" placeholder="No KTP" required="required">
                      </div>
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- <div class="form-group" id="kpt"> -->
                      <label for="">SWA <small>.jpeg .jpg .png</small></label>

                      <p class="no-margins"><span id="swa">-</span></p>
                      <!-- </div> -->
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="">SWA <small>.jpeg .jpg .png</small></label>

                        <p class="no-margins"><span id="kk">-</span></p>
                      </div>
                    </div>
                  </div>
                  <button type="submit" id="registerBtn" class="btn btn-primary block full-width m-b" data-loading-text="Registering In...">
                    Daftar</button>
                  <a class="btn btn-default block full-width m-b" href="<?= site_url('login') ?>">Login</a>
                </form>
                <p class="m-t">
                  <small>Sistem Informasi Kantor Pelayanan Terpadu Satu Pintu </small>
                </p>
              </div>
            </div>
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
<!-- </div> -->

<div id="WAButton"></div>
<script type="text/javascript">
  $(function() {
    $('#WAButton').floatingWhatsApp({
      phone: '+628127123225', //WhatsApp Business phone number
      headerTitle: 'Chat with us on WhatsApp!', //Popup Title
      message: "Nama : \nNIK : \nAlamat : \n\n Pertanyaan / Keluhan : ",
      //  popupMessage: 'Nama : \nNIK:', //Popup Message
      showPopup: true, //Enables popup display
      buttonImage: '<img src="<?= base_url('assets/img/') ?>whatsapp.svg" />', //Button Image
      //headerColor: 'crimson', //Custom header color
      //backgroundColor: 'crimson', //Custom background button color
      position: "right" //Position: left | right

    });
  });
</script>

<script>
  $(document).ready(function() {

    var login_page = $('#login_page');

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
<script>

</script>
<script>
  $(document).ready(function() {

    var registerForm = $('#registerForm');
    var password = $('#password');
    var repassword = $('#repassword');
    var submitBtn = registerForm.find('#registerBtn');
    ktp = $('#ktp');
    swa = $('#swa');
    kk = $('#kk');
    ktp = new FileUploader($('#ktp'), "", 'ktp', ".png , .jpg , .jpeg", false, true);
    swa = new FileUploader($('#swa'), "", 'ktp', ".png , .jpg , .jpeg", false, true);
    kk = new FileUploader($('#kk'), "", 'ktp', ".png , .jpg , .jpeg", false, true);
    // npwp = $('#npwp');
    // npwp = new FileUploader($('#npwp'), "", "npwp", ".png , .jpg , .jpeg", false, true);
    // divregion.attr('hidden', true);
    var btn1 = $('#jenis_akun');
    // btn1.on('change', (ev) => {
    //   if (btn1.val() == 'S') {
    //     divregion.attr('hidden', true);
    //     region.attr('required', false);
    //   }
    //   if (btn1.val() == 'B') {
    //     divregion.attr('hidden', false);
    //     region.attr('required', true);
    //   }
    // });

    registerForm.on('submit', (ev) => {
      ev.preventDefault();
      if (password.val() != repassword.val()) {
        swal("Daftar Gagal", 'Periksa Password', "error");

      } else {
        buttonLoading(submitBtn);
        $.ajax({
          url: "<?= site_url() . 'register-process' ?>",
          type: "POST",
          data: registerForm.serialize(),
          success: (data) => {
            buttonIdle(submitBtn);
            json = JSON.parse(data);
            if (json['error']) {
              swal("Daftar Gagal", json['message'], "error");
              return;
            } else {
              swal("Success Registration", 'check your email to activation', "success");
            }
            // $(location).attr('href', '<?= site_url() ?>' + json['user']['nama_controller']);
          },
          error: () => {
            buttonIdle(submitBtn);
          }
        });
      }

    });

    var lang_in = $('#lang_in');
    var lang_en = $('#lang_en');
    lang_in.on('click', (ev) => {
      document.cookie = "lang_set=in";
      location.reload();
    });
    lang_en.on('click', (ev) => {
      document.cookie = "lang_set=en";
      location.reload();
    });

    function getCookie(cname) {
      var name = cname + "=";
      var ca = document.cookie.split(';');
      for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
          c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
        }
      }
      return "";
    }

  });
</script>
<style>
  body {
    background-color: #f3f3f4 !important;
  }
</style>