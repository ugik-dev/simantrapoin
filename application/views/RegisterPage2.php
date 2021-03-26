<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SIMANTRAPOIN</title>
  <!-- Favicon -->

  <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/icon/') ?>apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/icon/') ?>favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/icon/') ?>favicon-16x16.png">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/css/') ?>bootstrap.min.css">
  <!-- Typography CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/css/') ?>typography.css">
  <!-- Style CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/css/') ?>style.css">
  <!-- Responsive CSS -->

  <link rel="stylesheet" href="<?= base_url('assets/css/') ?>responsive.css">
  <script src="<?= base_url('assets/') ?>js/plugins/sweetalert/sweetalert2.all.min.js"></script>
  <script src="<?= base_url('assets/') ?>js/jquery-3.3.1.min.js"></script>
  <script src="<?= base_url('assets/') ?>js/FileUploader.js"></script>



</head>

<body>
  <!-- loader Start -->
  <!-- <div id="loading">
         <div id="loading-center">
         </div>
      </div> -->
  <!-- loader END -->
  <!-- Sign in Start -->
  <section class="sign-in-">
    <div class="container mt-5 p-0 bg-white">
      <div class="row no-gutters">
        <div class="col-sm-6 align-self-center">
          <div class="sign-in-from">
            <h1 class="mb-0">Daftar</h1>
            <p>SISTEM INFORMASI DAN TRACKING DISPOSISI PERIZINAN.</p>
            <!-- <p class="shadowed">DINAS PENANAMAN MODAL, PELAYANAN PERIZINAN TERPADU SATU PINTU, KOPERASI USAHA MIKRO KECIL DAN MENENGAH</p> -->
            <p class="shadowed">KABUPATEN BANGKA</p>
            <form id="registerForm" class="m-t" role="form">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" placeholder="NIK" class="form-control" id="nik" name="username" required="required" autocomplete="nik">
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
                    <input type="password" placeholder="Password" class="form-control" id="password" name="password" required="required" autocomplete="new-password">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="repassword">
                      Konfirmasi Password
                    </label>
                    <input type="password" placeholder="Konfirmasi Password" class="form-control" id="repassword" name="repassword" required="required" autocomplete="new-password">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" placeholder="Email" class="form-control" id="email" name="email" required="required">
              </div>


              <div class="form-group">
                <label for="alamat_user">
                  Alamat</label>
                <textarea rows="4" type="text" placeholder="" class="form-control" id="alamat_user" name="alamat_user" required="required"></textarea>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="no_telp">No Telepon / HP</label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="No Telepon / HP" required="required">
                  </div>
                </div>
                <!-- <div class="col-sm-6">
                        <div class="form-group">
                          <label for="no_fax">No Fax</label>
                          <input type="text" class="form-control" id="no_fax" name="no_fax" placeholder="No Fax">
                        </div>
                      </div> -->
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-6">
                  <label for="">KTP <small>.jpeg .jpg .png</small></label>
                  <p class="no-margins"><span id="ktp">-</span></p>

                </div>
                <div class="col-sm-6">
                  <label for="">Pass Photo <small>.jpeg .jpg .png</small></label>

                  <p class="no-margins"><span id="pas_photo">-</span></p>
                </div>
              </div>
              <hr>
              <!-- <input type="file" accept="image/*" capture="camera" /> -->

              <div class="row">
                <div class="col-sm-6">
                  <!-- <div class="form-group" id="kpt"> -->
                  <label for="">SWA <small>*foto diri bersamaan dengan KTP</small></label>
                  <p class="no-margins"><span id="swa">-</span></p>
                  <!-- </div> -->
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">NPWP<small></small></label>

                    <p class="no-margins"><span id="npwp">-</span></p>
                  </div>
                </div>
              </div>
              <button type="submit" id="registerBtn" class="btn btn-primary block full-width m-b" data-loading-text="Registering In...">
                Daftar</button>
              <a class="btn btn-default block full-width m-b" href="<?= site_url('login') ?>">Login</a>
            </form>

          </div>
        </div>
        <div class="col-sm-6 text-center">
          <div class="sign-in-detail text-white">
            <a class="sign-in-logo mb-8" href="#"><img src="<?= base_url('assets/') ?>images/logo-bangka.png" class="img-fluid" alt="logo"></a>
            <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1" data-margin="0">
              <div class="item">
                <img src="<?= base_url('assets/') ?>images/logo-bangka.png" class="img-fluid mb-2" alt="logo">
                <h4 class="mb-1 text-white">Manage your orders</h4>
                <p>It is a long established fact that a reader will be distracted by the readable content.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php $this->load->view('Fragment/whatsapp') ?>
  <script>
    $(document).ready(function() {

      var registerForm = $('#registerForm');
      var password = $('#password');
      var repassword = $('#repassword');

      var submitBtn = registerForm.find('#registerBtn');
      ktp = $('#ktp');
      swa = $('#swa');
      pas_photo = $('#pas_photo');
      npwp = $('#npwp');
      ktp = new FileUploader($('#ktp'), "", 'ktp', ".png , .jpg , .jpeg", false, true, true);
      swa = new FileUploader($('#swa'), "", 'swa', ".png , .jpg , .jpeg", false, true, true);
      pas_photo = new FileUploader($('#pas_photo'), "", 'pas_photo', ".png , .jpg , .jpeg", false, true, true);
      npwp = new FileUploader($('#npwp'), "", 'npwp', ".png , .jpg , .jpeg", false, true, true);

      registerForm.on('submit', (ev) => {
        ev.preventDefault();
        if (password.val() != repassword.val()) {
          swal("Password Salah", 'Periksa Password dan Re-Password', "error");

        } else {
          swal.fire({
            title: 'Harap Tunggu !',
            html: 'data sedang di upload', // add html attribute if you want or remove
            allowOutsideClick: false,
            onBeforeOpen: () => {
              Swal.showLoading()
            },
          });
          $.ajax({
            url: "<?= site_url() . 'register-process' ?>",
            type: "POST",
            // data: registerForm.serialize(),
            data: new FormData(registerForm[0]),
            contentType: false,
            processData: false,
            success: (data) => {
              // buttonIdle(submitBtn);
              json = JSON.parse(data);
              if (json['error']) {
                swal("Pendaftaran Gagal", json['message'], "error");
                return;
              } else {
                swal("Pendaftaran Berhasil", 'data akan diverifikasi kurang dari 24 jam dalam hari kerja', "success").then((result) => {
                  // if (!result.value) {;
                  //  return;
                  $(location).attr('href', '<?= base_url() ?>');
                  // }
                })
              }
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
  </script>
  <script src="<?= base_url('assets/js/') ?>jquery.min.js"></script>
  <script src="<?= base_url('assets/js/') ?>popper.min.js"></script>
  <script src="<?= base_url('assets/js/') ?>bootstrap.min.js"></script>
  <!-- Appear JavaScript -->
  <script src="<?= base_url('assets/js/') ?>jquery.appear.js"></script>
  <!-- Countdown JavaScript -->
  <script src="<?= base_url('assets/js/') ?>countdown.min.js"></script>
  <!-- Counterup JavaScript -->
  <script src="<?= base_url('assets/js/') ?>waypoints.min.js"></script>
  <script src="<?= base_url('assets/js/') ?>jquery.counterup.min.js"></script>
  <!-- Wow JavaScript -->
  <script src="<?= base_url('assets/js/') ?>wow.min.js"></script>
  <!-- Apexcharts JavaScript -->
  <script src="<?= base_url('assets/js/') ?>apexcharts.js"></script>
  <!-- Slick JavaScript -->
  <script src="<?= base_url('assets/js/') ?>slick.min.js"></script>
  <!-- Select2 JavaScript -->
  <script src="<?= base_url('assets/js/') ?>select2.min.js"></script>
  <!-- Owl Carousel JavaScript -->
  <script src="<?= base_url('assets/js/') ?>owl.carousel.min.js"></script>
  <!-- Magnific Popup JavaScript -->
  <script src="<?= base_url('assets/js/') ?>jquery.magnific-popup.min.js"></script>
  <!-- Smooth Scrollbar JavaScript -->
  <script src="<?= base_url('assets/js/') ?>smooth-scrollbar.js"></script>
  <!-- Chart Custom JavaScript -->
  <!-- <script src="<?= base_url('assets/js/') ?>chart-custom.js"></script> -->
  <!-- Custom JavaScript -->
  <script src="<?= base_url('assets/js/') ?>custom.js"></script>
</body>

</html>