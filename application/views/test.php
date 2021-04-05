<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Demystifying Email Design</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body style="margin: 0; padding: 0;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
                    <tr>
                        <td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0; width : 130px">
                            <img src="<?= base_url() ?>/assets/img/logo-bangka.png" alt="Creating Email Magic" width="70" style="display: block;" />
                        </td>
                        <td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0;">
                            <h1>
                                <a> SIMANTRAPOIN</a>
                            </h1>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;" colspan="2">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td>
                                        ' . $message . ' </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ee4c50" colspan="2">
                            Copyright 2020 <a href="<?= base_url() ?>">SIMANTRAPOINT</a> All Rights Reserved. </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html> -->


<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta tags and seo configuration -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistem Pendataan dan Pemetaan UMKM">
    <meta name="author" content="Imamdev">
    <title>Sari Ater Hotel &amp; Resort | Temukan UKM disekitar anda</title>

    <!-- Top css library files -->
    <!-- Favicons-->
    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="https://umkm.imamdev.com/assets/frontend/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://umkm.imamdev.com/assets/frontend/css/style.css" rel="stylesheet">
    <link href="https://umkm.imamdev.com/assets/frontend/css/vendors.css" rel="stylesheet">
    <link href="https://umkm.imamdev.com/assets/frontend/css/tables.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">

    <!-- Leaflet js css cdn-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin="">
    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <!-- Timepicker custom css -->
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <!-- YOUR CUSTOM CSS -->
    <link href="https://umkm.imamdev.com/assets/frontend/css/custom.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- The leaflet js CDN -->
    <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA==" crossorigin=""></script>

    <!-- Timepicker js -->
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


</head>

<body>
    <div id="perform"></div>
    <script>
        var options = {
            chart: {
                type: 'line'
            },
            series: [{
                name: 'sales',
                data: [30, 40, 35, 50, 49, 60, 70, 91, 125]
            }],
            xaxis: {
                categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999]
            }
        }

        var chart = new ApexCharts(document.querySelector("#perform"), options);

        chart.render();
    </script>

</body>

</html>