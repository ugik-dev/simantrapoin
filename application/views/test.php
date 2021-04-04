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

</head>

<body>


    <hr>
    <h3>Lokasi</h3>
    <div id="categorySideMap" class="map-full map-layout single-listing-map" style="z-index: 50;"></div>
    <!-- End Map -->


    <script>
        function edit_review(review_id) {
            $("#" + review_id).slideToggle("slow");
        }
        // $(document).ready(function(){
        //   $("#edit_review_button").click(function(){
        //     $("#edit_review_form").slideToggle("slow");
        //   });
        // });
    </script>
    <!-- /section -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id="></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', '');
    </script>
    </div>
    <!-- /col -->

    <!-- Contact Form Base On Package-->

    </div>
    <!-- /row -->
    </div>
    <!-- /container -->

    <!-- This map-category.php file has all the fucntions for showing the map, marker, map info and all the popup markups -->
    <script type="text/javascript">
        'use strict';

        function createListingsMap(options) {
            var defaults = {
                markerPath: 'https://umkm.imamdev.com/assets/frontend/images/marker.png',
                markerPathHighlight: 'https://umkm.imamdev.com/assets/frontend/images/marker-hover.png',
                markerShadow: 'https://umkm.imamdev.com/assets/frontend/images/location-pin.svg',
                imgBasePath: 'https://umkm.imamdev.com/uploads/listing_thumbnails/',
                mapPopupType: 'venue',
                useTextIcon: false
            }

            var settings = $.extend({}, defaults, options);

            var dragging = false,
                tap = false;

            if ($(window).width() > 700) {
                dragging = true;
                tap = true;
            }

            /*
            ====================================================
              Create and center the base map
            ====================================================
            */

            var map = L.map(settings.mapId, {
                zoom: 14,
                scrollWheelZoom: false,
                dragging: dragging,
                tap: tap,
                scrollWheelZoom: false
            });

            map.once('focus', function() {
                map.scrollWheelZoom.enable();
            });

            L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '',
                minZoom: 1,
                maxZoom: 18 // It controls the maximum zoom level of the map
            }).addTo(map);

            /*
            ====================================================
              Load GeoJSON file with the data
              about the listings
            ====================================================
            */

            $.getJSON(settings.jsonFile).done(function(json) {
                    L.geoJSON(json, {
                        pointToLayer: pointToLayer,
                        onEachFeature: onEachFeature
                    }).addTo(map);

                    if (markersGroup) {
                        var featureGroup = new L.featureGroup(markersGroup);
                        map.fitBounds(featureGroup.getBounds());
                    }

                })
                .fail(function(jqxhr, textStatus, error) {
                    console.log(error);
                });

            /*
            ====================================================
              Bind popup and highlighting features
              to each marker
            ====================================================
            */

            var markersGroup = []

            var defaultIcon = L.icon({
                iconUrl: settings.markerPath,
                // shadowUrl: settings.markerShadow,
                iconSize: [25, 37.5], // default size was 25, 37.5
                popupAnchor: [0, -18],
                tooltipAnchor: [0, 19],
                // shadowSize: [25, 37.5],
                // shadowAnchor: [-3, 30]
            });

            var highlightIcon = L.icon({
                iconUrl: settings.markerPathHighlight,
                iconSize: [25, 37.5],
                popupAnchor: [0, -18],
                tooltipAnchor: [0, 19]
            });


            function onEachFeature(feature, layer) {

                layer.on({
                    mouseover: highlightMarker,
                    mouseout: resetMarker,
                    click: scrollToListing
                });

                if (feature.properties && feature.properties.about) {
                    //This is the code for represent the popover

                    layer.bindPopup(getPopupContent(feature.properties), {
                        minwidth: 200,
                        maxWidth: 600,
                        className: 'map-custom-popup'
                    });

                    if (settings.useTextIcon) {
                        layer.bindTooltip('<div id="customTooltip-' + feature.properties.id + '">$' + feature.properties.price + '</div>', {
                            direction: 'top',
                            permanent: true,
                            opacity: 1,
                            interactive: true,
                            className: 'map-custom-tooltip'
                        });
                    }
                }
                markersGroup.push(layer);
            }

            function pointToLayer(feature, latlng) {
                if (settings.useTextIcon) {
                    var markerOpacity = 0
                } else {
                    var markerOpacity = 1
                }

                return L.marker(latlng, {
                    icon: defaultIcon,
                    id: feature.properties.id,
                    opacity: markerOpacity
                });
            }

            function highlightMarker(e) {
                highlight(e.target);
            };

            function resetMarker(e) {
                reset(e.target);
            };

            // this function triggers after clicking on a marker
            function scrollToListing(e) {
                var listing_code = e.target.defaultOptions.id;
                var toFocusId = '#listing-banner-image-for-' + listing_code; // this is the id of the link where hovering gives an animation

                if ($("#" + listing_code).length > 0) { // this if condition checks if "#"+listing_code this id exists in the view. We've done this to avoid a console error in single listing page
                    // to focust the listing
                    $('html, body').animate({
                        scrollTop: $('#' + listing_code).offset().top - 110
                    }, 'slow', function() {
                        // adding a class where listing banner will be scaled up a little bit
                        $(toFocusId).addClass('focus-a-listing');
                        // Removing the class after seconds
                        setTimeout(function() {
                            $(toFocusId).removeClass('focus-a-listing');
                        }, 300);
                    });
                }
            }

            function highlight(marker) {
                marker.setIcon(highlightIcon);
                if (settings.useTextIcon) {
                    findTooltip(marker).addClass('active');
                }
            }

            function reset(marker) {
                marker.setIcon(defaultIcon);
                if (settings.useTextIcon) {
                    findTooltip(marker).removeClass('active');
                }
            }

            function findTooltip(marker) {
                var tooltip = marker.getTooltip()
                var id = $(tooltip._content).filter("div").attr("id")
                return $('#' + id).parents('.leaflet-tooltip')
            }

            /*
            ====================================================
              Construct popup content based on the JSON data
              for each marker
            ====================================================
            */

            function getPopupContent(properties) {

                if (properties.name) {
                    var title = '<h6><a href="' + properties.link + '">' + properties.name + '</a></h6>'
                } else {
                    title = ''
                }

                if (properties.about) {
                    var about = '<p class="">' + properties.about + '</p>'
                } else {
                    about = ''
                }

                if (properties.image) {

                    var imageClass = 'image';
                    if (settings.mapPopupType == 'venue') {
                        imageClass += ' d-none d-md-block'
                    }

                    var image = '<div class="' + imageClass + '"style="height: 150px; background-image: url(\'' + settings.imgBasePath + properties.image + '\'); background-size: cover; background-position: center;"></div>';
                } else {
                    image = '<div class="image"></div>'
                }

                if (properties.address) {
                    var address = '<p class="text-muted"><i class="fas fa-map-marker-alt fa-fw text-dark mr-2"></i>' + properties.address + '</p>'
                } else {
                    address = ''
                }
                if (properties.email) {
                    var email = '<p class="text-muted"><i class="fas fa-envelope-open fa-fw text-dark mr-2"></i><a href="mailto:' + properties.email + '" class="text-muted">' + properties.email + '</a></p>'
                } else {
                    email = ''
                }
                if (properties.phone) {
                    var phone = '<p class="text-muted"><i class="fa fa-phone fa-fw text-dark mr-2"></i>' + properties.phone + '</p>'
                } else {
                    phone = ''
                }

                if (properties.stars) {
                    var stars = '<div class="text-xs">'
                    for (var step = 1; step <= 5; step++) {
                        if (step <= properties.stars) {
                            stars += "<i class='fas fa-star text-warning'></i>"
                        } else {
                            stars += "<i class='fas fa-star' style = 'color: #BDBDBD'></i>"
                        }
                    }
                    stars += "</div>"
                } else {
                    stars = ''
                }

                if (properties.url) {
                    var url = '<a href="' + properties.url + '">' + properties.url + '</a><br>'

                } else {
                    url = ''
                }

                var popupContent = '';

                if (settings.mapPopupType == 'venue') {
                    popupContent =

                        '<div class="popup-venue card">' +
                        '<div style = "overflow: hidden; height: 150px; background-image: url(\'' + settings.imgBasePath + properties.image + '\'); background-size: cover; background-position: center;" class="map-direction-image">' + '</div>' +
                        '<div class="card-body">' +
                        '<div class="">' + title + ' </div>' +
                        '<div>' + address + '</div>' +
                        '<div>' + phone + '</div>' +
                        '</div>' +
                        '</div>';


                    //OLD CODE OF MAPH LISTING POPUP VIEW

                    // '<div class="popup-venue card">' +
                    //     '<div style = "overflow: hidden;">' +'<img src="' + settings.imgBasePath + properties.image + '" class="card-img-top">'+ '</div>'+
                    //     '<div class="card-body">'+
                    //         '<div class="">' +title +' </div>' +
                    //         '<div>'+ address +'</div>'+
                    //         '<div>'+ phone +'</div>'+
                    //     '</div>' +
                    // '</div>';

                } else if (settings.mapPopupType == 'rental') {
                    popupContent =
                        '<div class="popup-rental">' +
                        image +
                        '<div class="text">' +
                        title +
                        stars +
                        '</div>' +
                        '</div>';
                }


                return popupContent;
            }
            /*
            ====================================================
              Highlight marker when users hovers above
              corresponding .card in the listing
            ====================================================
            */

            L.Map.include({
                getMarkerById: function(id) {
                    var marker = null;
                    this.eachLayer(function(layer) {
                        if (layer instanceof L.Marker) {
                            if (layer.options.id === id) {
                                marker = layer;
                            }
                        }
                    });
                    return marker;
                }
            });


            // This function hightlights the marker on hovering over a certain listing

            /*
            $('[data-marker-id!=""][data-marker-id]').on('mouseenter', function () {
                var markerId = $(this).data('marker-id');
                var marker = map.getMarkerById(markerId);
                if (marker) {
                    highlight(marker);
                }
            });
            */


            // This function remove the highlightness from map marker after mouseleaving event

            /*$('[data-marker-id!=""][data-marker-id]').on('mouseleave', function () {
                var markerId = $(this).data('marker-id');
                var marker = map.getMarkerById(markerId);
                if (marker) {
                    reset(marker);
                }
            });*/

            // This function highlights the map marker for a certain listing after clicking on the get direction button
            var previousHighLightedMarkerId;
            $('[button-direction-id!=""][button-direction-id]').on('click', function() {
                var markerId = $(this).attr('button-direction-id');
                var marker = map.getMarkerById(markerId);
                if (marker) {
                    marker.openPopup(); // this line of code opens up the pop on map
                    highlight(marker);
                    if (previousHighLightedMarkerId != markerId) {
                        var marker = map.getMarkerById(previousHighLightedMarkerId);
                        if (marker) {
                            reset(marker);
                        }
                    }
                    previousHighLightedMarkerId = markerId;
                }
            });
        }
    </script>

    <!-- This script is needed for providing the json file which has all the listing points and required information -->
    <script>
        createListingsMap({
            mapId: 'categorySideMap',
            jsonFile: 'https://umkm.imamdev.com/assets/frontend/js/map/listing-geojson.json'
        });
    </script>
    </main>

    <!-- Site footer -->
    <footer class="plus_border">
        <div class="container margin_60_35">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <a data-toggle="collapse" data-target="#collapse_ft_1" aria-expanded="false" aria-controls="collapse_ft_1" class="collapse_bt_mobile">
                        <h3>Tautan Cepat</h3>
                        <div class="circle-plus closed">
                            <div class="horizontal"></div>
                            <div class="vertical"></div>
                        </div>
                    </a>
                    <div class="collapse show" id="collapse_ft_1">
                        <ul class="links">
                            <li><a href="https://umkm.imamdev.com/home/about">Tentang</a></li>
                            <li><a href="https://umkm.imamdev.com/home/terms_and_conditions">Syarat Dan Ketentuan</a></li>
                            <li><a href="https://umkm.imamdev.com/home/privacy_policy">Kebijakan Privasi</a></li>
                            <li><a href="https://umkm.imamdev.com/home/faq">Tanya Jawab</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <a data-toggle="collapse" data-target="#collapse_ft_2" aria-expanded="false" aria-controls="collapse_ft_2" class="collapse_bt_mobile">
                        <h3>Kategori</h3>
                        <div class="circle-plus closed">
                            <div class="horizontal"></div>
                            <div class="vertical"></div>
                        </div>
                    </a>
                    <div class="collapse show" id="collapse_ft_2">
                        <ul class="links">
                            <li><a href="https://umkm.imamdev.com/home/filter_listings?category=jasa-amp-layanan&&amenity=&&video=0&&status=all">Jasa &amp; Layanan</a></li>
                            <li><a href="https://umkm.imamdev.com/home/filter_listings?category=kuliner&&amenity=&&video=0&&status=all">Kuliner</a></li>
                            <li><a href="https://umkm.imamdev.com/home/filter_listings?category=fashion&&amenity=&&video=0&&status=all">Fashion</a></li>
                            <li><a href="https://umkm.imamdev.com/home/filter_listings?category=otomotif&&amenity=&&video=0&&status=all">Otomotif</a></li>
                            <li><a href="https://umkm.imamdev.com/home/filter_listings?category=kecantikan&&amenity=&&video=0&&status=all">Kecantikan</a></li>
                            <li><a href="https://umkm.imamdev.com/home/filter_listings?category=kerajinan&&amenity=&&video=0&&status=all">Kerajinan</a></li>
                            <li><a href="https://umkm.imamdev.com/home/filter_listings?category=travel&&amenity=&&video=0&&status=all">Travel</a></li>
                            <li><a href="https://umkm.imamdev.com/home/filter_listings?category=agribisnis&&amenity=&&video=0&&status=all">Agribisnis</a></li>
                            <li><a href="https://umkm.imamdev.com/home/filter_listings?category=pendidikan&&amenity=&&video=0&&status=all">Pendidikan</a></li>
                            <li><a href="https://umkm.imamdev.com/home/filter_listings?category=toko-amp-oleh-oleh&&amenity=&&video=0&&status=all">Toko &amp; Oleh-oleh</a></li>
                            <li><a href="https://umkm.imamdev.com/home/filter_listings?category=rental&&amenity=&&video=0&&status=all">Rental</a></li>
                            <li><a href="https://umkm.imamdev.com/home/filter_listings?category=properti&&amenity=&&video=0&&status=all">Properti</a></li>
                            <li><a href="https://umkm.imamdev.com/home/filter_listings?category=internet&&amenity=&&video=0&&status=all">Internet</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <a data-toggle="collapse" data-target="#collapse_ft_3" aria-expanded="false" aria-controls="collapse_ft_3" class="collapse_bt_mobile">
                        <h3>Kontak</h3>
                        <div class="circle-plus closed">
                            <div class="horizontal"></div>
                            <div class="vertical"></div>
                        </div>
                    </a>
                    <div class="collapse show" id="collapse_ft_3">
                        <ul class="contacts">
                            <li><i class="ti-home"></i>Telukjambe Timur, Karawang</li>
                            <li><i class="ti-headphone-alt"></i>0896563445</li>
                            <li><i class="ti-email"></i><a href="mailto:isya40@gmail.com">admin@imamdev.com</a></li>
                            <li><i class="ti-mobile"></i><a href="https://api.whatsapp.com/send?phone=6283814305092&text=Saya%20tertarik%20untuk%20memesan%20paket%20gerai%20UMKM">Kontak Via Whatsapp</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="social-links">
                        <h5>Ikuti Kami</h5>
                        <ul>
                            <li><a href=""><i class="ti-facebook"></i></a></li>
                            <li><a href=""><i class="ti-twitter-alt"></i></a></li>
                            <li><a href=""><i class="ti-google"></i></a></li>
                            <li><a href=""><i class="ti-pinterest"></i></a></li>
                            <li><a href=""><i class="ti-instagram"></i></a></li>

                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row-->
            <hr>
            <div class="row justify-content-end">
                <div class="col-lg-6">
                    <ul id="additional_links">
                        <li><a href="https://umkm.imamdev.com/home/about">Tentang</a></li>
                        <li><a href="https://umkm.imamdev.com/home/terms_and_conditions">Syarat Dan Ketentuan</a></li>
                        <li><a href="https://umkm.imamdev.com/home/privacy_policy">Kebijakan Privasi</a></li>
                        <li><a href="https://umkm.imamdev.com/home/faq">Tanya Jawab</a></li>
                        <li><a href="https://imamdev.com/">E-UMKM</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <style>
            .float {
                position: fixed;
                width: 60px;
                height: 60px;
                bottom: 20px;
                left: 20px;
                background-color: #25d366;
                color: #FFF;
                border-radius: 50px;
                text-align: center;
                font-size: 30px;
                box-shadow: 2px 2px 3px #999;
                z-index: 100;
            }

            .my-float {
                margin-top: 16px;
            }
        </style>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <a href="https://api.whatsapp.com/send?phone=6283814305092&text=Saya%20tertarik%20untuk%20memesan%20paket%20gerai%20UMKM" class="float" target="_blank">
            <i class="fa fa-whatsapp my-float"></i>
        </a>
    </footer>
    <!--/footer-->
    </div>

    <!-- Signin popup -->
    <div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">
        <div class="small-dialog-header">
            <h3>Sign In</h3>
        </div>
        <form action="https://umkm.imamdev.com/login/validate_login" method="post">
            <div class="sign-in-wrapper">
                <a href="#0" class="social_bt facebook">Login with Facebook</a>
                <a href="#0" class="social_bt google">Login with Google</a>
                <div class="divider"><span>Or</span></div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" id="email">
                    <i class="icon_mail_alt"></i>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" id="password" value="">
                    <i class="icon_lock_alt"></i>
                </div>
                <div class="clearfix add_bottom_15">
                    <div class="checkboxes float-left">
                        <label class="container_check">Remember me
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="float-right mt-1"><a id="forgot" href="javascript:void(0);">Forgot Password?</a></div>
                </div>
                <div class="text-center"><input type="submit" value="Log In" class="btn_1 full-width"></div>
                <div class="text-center">
                    Don’t have an account? <a href="register.html">Sign up</a>
                </div>
                <div id="forgot_pw">
                    <div class="form-group">
                        <label>Please confirm login email below</label>
                        <input type="email" class="form-control" name="email_forgot" id="email_forgot">
                        <i class="icon_mail_alt"></i>
                    </div>
                    <p>You will receive an email containing a link allowing you to reset your password to a new preferred one.</p>
                    <div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
                </div>
            </div>
        </form>
        <!--form -->
    </div>

    <!-- Back to top button -->
    <div id="toTop"></div>

    <!-- Bottom js library files -->
    <!-- COMMON SCRIPTS -->
    <script src="https://umkm.imamdev.com/assets/frontend/js/common_scripts.js"></script>
    <script src="https://umkm.imamdev.com/assets/frontend/js/functions.js"></script>
    <script src="https://umkm.imamdev.com/assets/frontend/js/validate.js"></script>
    <script src="https://umkm.imamdev.com/assets/frontend/js/bootstrap-tagsinput.min.js" charset="utf-8"></script>
    <!-- INPUT QUANTITY  -->
    <script src="https://umkm.imamdev.com/assets/frontend/js/input_qty.js"></script>
    <script src="https://umkm.imamdev.com/assets/frontend/js/custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script src="https://umkm.imamdev.com/assets/frontend/js/markerclusterer.js"></script>
    <script src="https://umkm.imamdev.com/assets/frontend/js/listing_map.js"></script>
    <script src="https://umkm.imamdev.com/assets/frontend/js/infobox.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

    <!-- SHOW TOASTR NOTIFIVATION -->



    <script type="text/javascript">
        $(function() {
            $('.date-range-picker').daterangepicker({
                autoUpdateInput: false,
                parentEl: '#input-dates',
                opens: 'left',
                locale: {
                    cancelLabel: 'Clear'
                }
            });
            $('.date-range-picker').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('MM-DD-YY') + ' > ' + picker.endDate.format('MM-DD-YY'));
            });
            $('.date-range-picker').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });
        });

        $('.date-picker').daterangepicker({
            "singleDatePicker": true,
            "parentEl": '#input-dates',
            "opens": "left"
        }, function(start, end, label) {
            console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
        });

        function loginAlert() {
            toastr.error('Anda Harus Login Terlebih Dahulu')
        }
    </script>

    <!--modal-->
    <script type="text/javascript">
        function showAjaxModal(url, header) {
            // SHOWING AJAX PRELOADER IMAGE
            jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="https://umkm.imamdev.com/assets/global/bg-pattern-light.svg" /></div>');
            jQuery('#modal_ajax .modal-title').html('...');
            // LOADING THE AJAX MODAL
            jQuery('#modal_ajax').modal('show', {
                backdrop: 'true'
            });

            // SHOW AJAX RESPONSE ON REQUEST SUCCESS
            $.ajax({
                url: url,
                success: function(response) {
                    jQuery('#modal_ajax .modal-body').html(response);
                    jQuery('#modal_ajax .modal-title').html(header);
                }
            });
        }
    </script>

</body>

</html>