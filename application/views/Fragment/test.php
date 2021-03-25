<style>
    @media (max-width: 800px) {
        .jumbotron {
            padding: 30px 0px 0px 0px !important;
            margin: 30px 0px 0px 0px !important;
        }

        #logo_login {
            width: 100px;
        }
    }
</style>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DINPMP2KUKM | Masuk</title>


    <link rel="apple-touch-icon" sizes="180x180" href="http://localhost:85/ptsp/assets/icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="http://localhost:85/ptsp/assets/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="http://localhost:85/ptsp/assets/icon/favicon-16x16.png">
    <link rel="manifest" href="http://localhost:85/ptsp/assets/icon/site.webmanifest?v=0.0.1">
    <link rel="mask-icon" href="http://localhost:85/ptsp/assets/icon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="apple-mobile-web-app-title" content="Bangka Musi Tekno">
    <meta name="application-name" content="Bangka Musi Tekno">
    <meta name="msapplication-TileColor" content="#00aba9">
    <meta name="theme-color" content="#ffffff">


    <!-- <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet"> -->
    <link href="http://localhost:85/ptsp/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost:85/ptsp/assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="http://localhost:85/ptsp/assets/css/plugins/c3/c3.min.css" rel="stylesheet">
    <link href="http://localhost:85/ptsp/assets/font-awesome/css/fontawesome5.7-all.min.css" rel="stylesheet">
    <link href="http://localhost:85/ptsp/assets/css/animate.css" rel="stylesheet">
    <link href="http://localhost:85/ptsp/assets/css/style.css" rel="stylesheet">
    <link href="http://localhost:85/ptsp/assets/css/custom.css" rel="stylesheet">
    <script src="http://localhost:85/ptsp/assets/js/jquery-3.1.1.min.js"></script>
    <script src="http://localhost:85/ptsp/assets/js/plugins/dataTables/datatables.min.js"></script>
    <script src="http://localhost:85/ptsp/assets/js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>
    <script src="http://localhost:85/ptsp/assets/js/plugins/dataTables/dataTables.rowsGroup.js"></script>
    <script src="http://localhost:85/ptsp/assets/js/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="http://localhost:85/ptsp/assets/js/plugins/bootstrap-notify-master/bootstrap-notify.min.js"></script>
    <script src="http://localhost:85/ptsp/assets/js/plugins/typeahead/bootstrap3-typeahead.min.js"></script>
    <script src="http://localhost:85/ptsp/assets/js/plugins/popper/popper.min.js"></script>
    <script src="http://localhost:85/ptsp/assets/js/plugins/chartJs/Chart.min.js"></script>
    <script src="http://localhost:85/ptsp/assets/js/plugins/d3/d3.min.js"></script>
    <script src="http://localhost:85/ptsp/assets/js/plugins/d3/d3-save-svg.min.js"></script>
    <script src="http://localhost:85/ptsp/assets/js/plugins/c3/c3.min.js"></script>
    <script src="http://localhost:85/ptsp/assets/js/custom.js"></script>
    <script src="http://localhost:85/ptsp/assets/js/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="http://localhost:85/ptsp/assets/js/plugins/bootstrap-notify-master/bootstrap-notify.min.js"></script>
    <script src="http://localhost:85/ptsp/assets/js/FileUploader.js"></script>

    <!-- Data Picker -->
    <link href="http://localhost:85/ptsp/assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="http://localhost:85/ptsp/assets/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">

    <link href="http://localhost:85/ptsp/assets/css/plugins/jquery-autocomplete.css" rel="stylesheet">
</head>
<!-- </head> -->

<body>
    <div class="jumbotron " style="height: 95%">
        <div class="background_login" id="login_page"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-3 col-sm-12" id='logo_login'>
                            <img src="http://localhost:85/ptsp/assets/img/logo-bangka.png" style="width : 90%; height: auto">
                        </div>
                        <div class="col-md-9">
                            <h1 class="display-5 shadowed">DINAS PENANAMAN MODAL, PELAYANAN PERIZINAN TERPADU SATU PINTU</h1>
                            <p class="lead shadowed">KABUPATEN BANGKA</p>
                        </div>
                    </div>
                    <!-- <img class="col-md-3" src="http://localhost:85/ptsp/assets/img/logo-comeexplore.png" >
          <img class="col-md-3" src="http://localhost:85/ptsp/assets/img/logo-pesona-indonesia.png" > -->
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
                buttonLoading(submitBtn);
                $.ajax({
                    url: "http://localhost:85/ptsp/index.php/login-process",
                    type: "POST",
                    data: loginForm.serialize(),
                    success: (data) => {
                        buttonIdle(submitBtn);
                        json = JSON.parse(data);
                        if (json['error']) {
                            swal("Login Gagal", json['message'], "error");
                            return;
                        }
                        $(location).attr('href', 'http://localhost:85/ptsp/index.php/' + json['user']['nama_controller']);
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
            background-image: url('../assets/img/background/1-Lomba-Foto-Babar-2017_Menangkis-Tantangan_Lintang-Tatang.jpg');
        }

        .img_1 {
            background-image: url('../assets/img/background/1-Sardy_Pesanggrahan-Menumbing.jpg');
        }

        .img_2 {
            background-image: url('../assets/img/background/2-Agus-Ramdhany_Batu-penunggu-pantai.jpg');
        }

        .img_3 {
            background-image: url('../assets/img/background/2--Lomba-Foto-Babar-2017_Dendang-Rampak_Guzairi-Linggarjati.jpg');
        }

        .img_4 {
            background-image: url('../assets/img/background/3--Lomba-Foto-Babar-2017_3000-obor_Aswandi.jpg');
        }

        .img_5 {
            background-image: url('../assets/img/background/5-Media-Nusantara_Pelabuhan-Tanjung-Kalian.jpg');
        }

        .img_6 {
            background-image: url('../assets/img/background/6-Lomba-Foto-Babar_Dwi-Hardiansyah_-Perang-Ketupat.jpg');
        }

        .img_7 {
            background-image: url('../assets/img/background/6-Rizky-Saputra_MTI-Muntok.jpg');
        }

        .img_8 {
            background-image: url('../assets/img/background/Batu-Berlayar---Kabupaten-Belitung-by-Jeffry-Surianto.jpg');
        }

        .img_9 {
            background-image: url('../assets/img/background/De-Locomotief-5.jpg');
        }

        .img_10 {
            background-image: url('../assets/img/background/Dermaga-Pulau-Buku-Limau---Kabupaten-Belitung-Timur-by-Mina-Arvah.jpg');
        }

        .img_11 {
            background-image: url('../assets/img/background/DSC_0900.jpg');
        }

        .img_12 {
            background-image: url('../assets/img/background/GERBANG-LIKUR,-Deni-Syafutra-,jl.jpg');
        }

        .img_13 {
            background-image: url('../assets/img/background/KEMBANG-LIKUR,GINDA-HUWAYAN-PULUNGAN,-SUNGAILIAT,-085379290989,-DESA-MANCUNG-KECAMATAN-KELAPA-BAN.jpg');
        }

        .img_14 {
            background-image: url('../assets/img/background/landscape.jpg');
        }

        .img_15 {
            background-image: url('../assets/img/background/Landscape-Kaolin_Pelangi-IG-ok.jpg');
        }

        .img_16 {
            background-image: url('../assets/img/background/Museum-Timah---Lastriazi2017-(3).jpg');
        }

        .img_17 {
            background-image: url('../assets/img/background/PAHLAWAN-KECIL,-ADITTIYA-SAPUTRA,-JL.jpg');
        }

        .img_18 {
            background-image: url('../assets/img/background/PantaiBatuKapur-.jpg');
        }

        .img_19 {
            background-image: url('../assets/img/background/Pantai-Pasir-Padi---Kota-Pangkalpinang-by-Muttaqin.jpg');
        }

        .img_20 {
            background-image: url('../assets/img/background/Pesanggrahan-Muntok---Kabupaten-Bangka-Barat.jpg');
        }

        .img_21 {
            background-image: url('../assets/img/background/Pulau-Dapur---Kabupaten-Bangka-Selatan.jpg');
        }

        .img_22 {
            background-image: url('../assets/img/background/Pulau-Lengkuas---Belitung.jpg');
        }

        .img_23 {
            background-image: url('../assets/img/background/RANGGAM_TAUFIQHIDAYAT_08127171822.jpg');
        }

        .img_24 {
            background-image: url('../assets/img/background/Tanjung-Berikat---Bangka-Tengah-by-Setiadi--Darmawan.jpg');
        }

        .img_25 {
            background-image: url('../assets/img/background/tanjung-labu.jpg');
        }

        .img_26 {
            background-image: url('../assets/img/background/Tarsius-Bancanus-Saltator.jpg');
        }

        .img_27 {
            background-image: url('../assets/img/background/Teluk-Limau---Kabupaten-Bangka-by-Iksander.jpg');
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
    <div class="footer">
        <div class="float-right">
            Kabupaten Bangka
        </div>
        <div>
            <strong>Copyright</strong> DINAS PENANAMAN MODAL, PELAYANAN PERIZINAN TERPADU SATU PINTU &copy; 2020
        </div>
    </div>

    </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#tmtdate .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                calendarWeeks: true,
                format: "yyyy-mm-dd"
            });
            $('#tmtdate2 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                calendarWeeks: true,
                format: "yyyy-mm-dd"
            });
        });
    </script>


    <!-- Mainly scripts -->
    <script src="http://localhost:85/ptsp/assets/js/popper.min.js"></script>
    <script src="http://localhost:85/ptsp/assets/js/bootstrap.js"></script>
    <script src="http://localhost:85/ptsp/assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="http://localhost:85/ptsp/assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Date Picker-->
    <script src="http://localhost:85/ptsp/assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="http://localhost:85/ptsp/assets/js/inspinia.js"></script>
    <script src="http://localhost:85/ptsp/assets/js/plugins/pace/pace.min.js"></script>

    <script src="http://localhost:85/ptsp/assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="http://localhost:85/ptsp/assets/js/plugins/jquery-autocomplete.js"></script>

    <script>
    </script>
</body>

</html>