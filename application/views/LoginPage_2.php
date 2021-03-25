<!doctype html>
<html lang="en">
   <head>
   <title>SIMANTRAPOIN</title>
      <!-- Favicon -->

      <link rel="shortcut icon" href="<?=base_url('assets/images/')?>favicon.ico" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="<?=base_url('assets/css/')?>bootstrap.min.css">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="<?=base_url('assets/css/')?>typography.css">
      <!-- Style CSS -->
      <link rel="stylesheet" href="<?=base_url('assets/css/')?>style.css">
      <!-- Responsive CSS -->

      <link rel="stylesheet" href="<?=base_url('assets/css/')?>responsive.css">
    <script src="<?= base_url('assets/') ?>js/plugins/sweetalert/sweetalert2.all.min.js"></script>
      <script src="<?= base_url('assets/') ?>js/jquery-3.3.1.min.js"></script>
   </head>
   <body>
      <!-- loader Start -->
      <!-- <div id="loading">
         <div id="loading-center">
         </div>
      </div> -->
      <!-- loader END -->
        <!-- Sign in Start -->
        <section class="sign-in-page">
            <div class="container bg-white mt-5 p-0">
                <div class="row no-gutters">
                    <div class="col-sm-6 align-self-center">
                        <div class="sign-in-from">
                            <h1 class="mb-0">Log in</h1>
                            <p>DINPMP2KUKM KAB BANGKA</p>
                            <form class="mt-4"  id="loginForm" role="form">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">NIK</label>
                                    <input type="text" class="form-control mb-0" id="exampleInputEmail1" name="username" placeholder="Username" required="required">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <!-- <a href="#" class="float-right">Lupa password?</a> -->
                                    <input type="password" class="form-control mb-0" name="password" placeholder="Password" required="required">
                                </div>
                                <div class="d-inline-block w-100">
                                    <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Ingatkan saya</label>
                                    </div>
            <button type="submit" id="loginBtn" class="btn btn-primary float-right" data-loading-text="Loging In...">Masuk</button>
                                    <!-- <button type="submit" class="btn btn-primary float-right">Masuk</button> -->
                                </div>
                                <div class="sign-info">
                                    <span class="dark-color d-inline-block line-height-2">Belum memiliki akun? <a href="daftar">Daftar sekarang</a></span>
                                    <ul class="iq-social-media">
                                        <li><a href="#"><i class="ri-facebook-box-line"></i></a></li>
                                        <li><a href="#"><i class="ri-twitter-line"></i></a></li>
                                        <li><a href="#"><i class="ri-instagram-line"></i></a></li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-6 text-center">
                        <div class="sign-in-detail text-white">
                            <a class="sign-in-logo mb-5" href="#"><img src="<?=base_url('assets/')?>images/logo-bangka.png" class="img-fluid" alt="logo"></a>
                            <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1" data-margin="0">
                                <div class="item">
                                    <img src="<?=base_url('assets/')?>images/login/1.png" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">Cepat</h4>
                                    <p>Lakukan perizinan pengajuan anda dengan cerdas dan cepat.</p>
                                </div>
                                <div class="item">
                                    <img src="<?=base_url('assets/')?>images/login/1.png" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">Transparan</h4>
                                    <p>Anda dapat melihat progress perizinan anda.</p>
                                </div>
                                <div class="item">
                                    <img src="<?=base_url('assets/')?>images/login/1.png" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">Integration</h4>
                                    <p>Bekerja sama dengan berbagai macam badan lainnya.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
        <!-- Sign in END -->
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="<?=base_url('assets/js/')?>jquery.min.js"></script>
      <script src="<?=base_url('assets/js/')?>popper.min.js"></script>
      <script src="<?=base_url('assets/js/')?>bootstrap.min.js"></script>
      <!-- Appear JavaScript -->
      <script src="<?=base_url('assets/js/')?>jquery.appear.js"></script>
      <!-- Countdown JavaScript -->
      <script src="<?=base_url('assets/js/')?>countdown.min.js"></script>
      <!-- Counterup JavaScript -->
      <script src="<?=base_url('assets/js/')?>waypoints.min.js"></script>
      <script src="<?=base_url('assets/js/')?>jquery.counterup.min.js"></script>
      <!-- Wow JavaScript -->
      <script src="<?=base_url('assets/js/')?>wow.min.js"></script>
      <!-- Apexcharts JavaScript -->
      <script src="<?=base_url('assets/js/')?>apexcharts.js"></script>
      <!-- Slick JavaScript -->
      <script src="<?=base_url('assets/js/')?>slick.min.js"></script>
      <!-- Select2 JavaScript -->
      <script src="<?=base_url('assets/js/')?>select2.min.js"></script>
      <!-- Owl Carousel JavaScript -->
      <script src="<?=base_url('assets/js/')?>owl.carousel.min.js"></script>
      <!-- Magnific Popup JavaScript -->
      <script src="<?=base_url('assets/js/')?>jquery.magnific-popup.min.js"></script>
      <!-- Smooth Scrollbar JavaScript -->
      <script src="<?=base_url('assets/js/')?>smooth-scrollbar.js"></script>
      <!-- Chart Custom JavaScript -->
      <!-- <script src="<?=base_url('assets/js/')?>chart-custom.js"></script> -->
      <!-- Custom JavaScript -->
      <script src="<?=base_url('assets/js/')?>custom.js"></script>
   </body>
</html>