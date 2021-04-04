function render_files(label, dir, filename, format, col = "") {
	if (filename == "" || filename == null) {
		console.log("nama file" + filename);
		return;
	}
	// <iframe src='https://view.officeapps.live.com/op/embed.aspx?src=https://ugik-dev.com/covid19/uploads/photo/doc_tes.docx' width='100%' height='623px' frameborder='0'>This is an embedded <a target='_blank' href='http://office.com'>Microsoft Office</a> document, powered by <a target='_blank' href='http://office.com/webapps'>Office Online</a>.</iframe>
	if (format == "pdf") {
		console.log(format);
		frm = ` <iframe width="100%" height="600px" src="${dir}/${filename}"></iframe>`;
	} else if (format == "doc" || format == "docx") {
		frm = `<iframe src='https://view.officeapps.live.com/op/embed.aspx?src=${dir}/${filename}' width='100%' height='500' frameborder='0'>This is an embedded <a target='_blank' href='http://office.com'>Microsoft Office</a> document, powered by <a target='_blank' href='http://office.com/webapps'>Office Online</a>.</iframe>`;
	} else {
		frm = `<img src="${dir}/${filename}" class="img-fluid" alt="Responsive image">`;
	}
	return ` <div class="iq-card ${col}">
                  <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                          <h4 class="card-title">${label}</h4>
                      </div>
                  </div>
                   <div class="iq-card-body">
                    ${frm}
                  </div>
                </div>
          `;
}
function buttonLoading(btn) {
	if (btn.hasClass("disabled")) {
		return;
	}
	btn.data("original-text", btn.html());
	btn.html(
		'<span class="loading open-circle"></span> ' + btn.data("loading-text")
	);
	btn.addClass("disabled");
}

function buttonIdle(btn) {
	if (!btn.hasClass("disabled")) {
		return;
	}
	btn.html(btn.data("original-text"));
	btn.removeClass("disabled");
}

function status(status) {
	if (status == "DRAFT") return `<i class='fa fa-edit text-warning'> Draft</i>`;
	else if (status == "DIPROSES")
		return `<i class='fa fa-hourglass-start text-primary'> Pengiriman Proposal</i>`;
	else if (status == "DITERIMA")
		return `<i class='fa fa-check text-success'> Selesai</i>`;
	return `<i class='fa fa-times text-danger'> Ditolak</i>`;
}

function arrayToAssociative(arr, key) {
	ret = [];

	if (data == null || !Array.isArray(data) || data.length == 0) {
		console.log("EMPTY ARRAY");
		return ret;
	}

	if (data[0][key] === undefined) {
		console.log("KEY NOT EXIST");
		return ret;
	}

	arr.forEach((e) => {
		ret[e[key]] = e;
	});

	return ret;
}

function capFirstLetter(str) {
	return str
		.split(" ")
		.map((str) => str[0].toUpperCase() + str.slice(1).toLowerCase())
		.reduce((acc, curr) => acc + curr + " ", "")
		.slice(0, -1);
}

function intToDay(val) {
	switch (val) {
		case 0:
			return "Minggu";
		case 1:
			return "Senin";
		case 2:
			return "Selasa";
		case 3:
			return "Rabu";
		case 4:
			return "Kamis";
		case 5:
			return "Jum'at";
		case 6:
			return "Sabtu";
	}
}

function empty(str) {
	if (str == null || str.trim() == "") {
		return true;
	} else {
		return false;
	}
}

MONTHS = [
	"Januari",
	"Februari",
	"Maret",
	"April",
	"Mei",
	"Juni",
	"Juli",
	"Agustus",
	"September",
	"Oktober",
	"November",
	"Desember",
];

MONTHSEN = [
	"January",
	"February",
	"March",
	"April",
	"May",
	"June",
	"July",
	"August",
	"September",
	"October",
	"November",
	"December",
];
function renderDate(date) {
	if (date == "0000-00-00 00:00:00") {
		return "-";
	}
	var date = new Date(date);
	var day = date.getDay();
	// intToDay(day);
	var jam = date.getHours();
	var menit = date.getMinutes();
	return `${intToDay(day)}, ${date.getDate()} ${
		MONTHS[date.getMonth()]
	} ${date.getFullYear()},<br> ${date.getHours()}:${date.getMinutes()} `;
}

function renderDate2(date) {
	if (date == "0000-00-00 00:00:00") {
		return "-";
	}

	var date = new Date(date);
	var day = date.getDay();
	// intToDay(day);
	var jam = date.getHours();
	var menit = date.getMinutes();
	return `${intToDay(day)}, ${date.getDate()} ${
		MONTHS[date.getMonth()]
	} ${date.getFullYear()}, ${date.getHours()}:${date.getMinutes()} `;
}

function renderDateEn(date) {
	var date = new Date(date);
	return `${date.getDate()} ${
		MONTHSEN[date.getMonth()]
	} ${date.getFullYear()}, ${date.getHours()}:${date.getMinutes()} `;
}

function findAssociative(arr, field, value) {
	for (var key in arr) {
		var v = arr[key];
		if (v[field] && v[field] == value) {
			return v;
		}
	}
	return null;
}

function filterAssociative(arr, field, value) {
	var ret = [];
	for (var key in arr) {
		var v = arr[key];
		if (v[field] && v[field] == value) {
			ret.push(v);
		}
	}
	return ret;
}

function convertToRupiah(angka) {
	var rupiah = "";
	var angkarev = angka.toString().split("").reverse().join("");
	for (var i = 0; i < angkarev.length; i++) {
		if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + ",";
	}
	rupiah = rupiah
		.split("", rupiah.length - 1)
		.reverse()
		.join("");
	return rupiah.length < 1 ? "0" : rupiah;
}

function createListingsMap(options, dataProfil) {
	var defaults = {
		markerPath: "https://umkm.imamdev.com/assets/frontend/images/marker.png",
		markerPathHighlight:
			"https://umkm.imamdev.com/assets/frontend/images/marker-hover.png",
		markerShadow:
			"https://umkm.imamdev.com/assets/frontend/images/location-pin.svg",
		mapPopupType: "venue",
		useTextIcon: false,
	};

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
		zoom: 5,
		scrollWheelZoom: false,
		dragging: dragging,
		tap: tap,
		scrollWheelZoom: false,
	});

	map.once("focus", function () {
		map.scrollWheelZoom.enable();
	});

	L.tileLayer("http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
		attribution: "",
		minZoom: 1,
		maxZoom: 14,
		zoom: 2,
	}).addTo(map);

	var markersGroup = [];

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
		tooltipAnchor: [0, 19],
	});

	function onEachFeature(feature, layer) {
		console.log(layer);

		layer.on({
			mouseover: highlightMarker,
			mouseout: resetMarker,
			click: scrollToListing,
		});

		layer.bindPopup(getPopupContent(), {
			minwidth: 200,
			maxWidth: 600,
			className: "map-custom-popup",
		});

		if (settings.useTextIcon) {
			layer.bindTooltip(
				'<div id="customTooltip-' +
					feature.properties.id +
					'">$' +
					feature.properties.price +
					"</div>",
				{
					direction: "top",
					permanent: true,
					opacity: 1,
					interactive: true,
					className: "map-custom-tooltip",
				}
			);
		}
		markersGroup.push(layer);
	}

	function pointToLayer(feature, latlng) {
		console.log(latlng);
		if (settings.useTextIcon) {
			var markerOpacity = 0;
		} else {
			var markerOpacity = 1;
		}

		return L.marker(latlng, {
			icon: defaultIcon,
			id: feature.properties.id,
			opacity: markerOpacity,
		});
	}

	function highlightMarker(e) {
		highlight(e.target);
	}

	function resetMarker(e) {
		reset(e.target);
	}

	function scrollToListing(e) {
		var listing_code = e.target.defaultOptions.id;
		var toFocusId = "#listing-banner-image-for-" + listing_code; // this is the id of the link where hovering gives an animation

		if ($("#" + listing_code).length > 0) {
			$("html, body").animate(
				{
					scrollTop: $("#" + listing_code).offset().top - 110,
				},
				"slow",
				function () {
					$(toFocusId).addClass("focus-a-listing");
					setTimeout(function () {
						$(toFocusId).removeClass("focus-a-listing");
					}, 300);
				}
			);
		}
	}

	function highlight(marker) {
		marker.setIcon(highlightIcon);
		if (settings.useTextIcon) {
			findTooltip(marker).addClass("active");
		}
	}

	function reset(marker) {
		marker.setIcon(defaultIcon);
		if (settings.useTextIcon) {
			findTooltip(marker).removeClass("active");
		}
	}

	function findTooltip(marker) {
		var tooltip = marker.getTooltip();
		var id = $(tooltip._content).filter("div").attr("id");
		return $("#" + id).parents(".leaflet-tooltip");
	}

	function getPopupContent() {
		var popupContent = "";

		// https://www.google.com/maps/search/?api=1&query=-1.877488,106.105444
		//href direction
		// popupContent =
		// 	'<div class="popup-venue card">' +
		// 	"<div style = \"overflow: hidden; height: 100px; background-image: url('" +
		// 	settings.imgBasePath +
		// 	properties.image +
		// 	'\'); background-size: cover; background-position: center;" class="map-direction-image">' +
		// 	"</div>" +
		// 	'<div class="card-body">' +
		// 	'<div class="">' +
		// 	title +
		// 	" </div>" +
		// 	"<div>" +
		// 	address +
		// 	"</div>" +
		// 	"<div>" +
		// 	phone +
		// 	"</div>" +
		// 	"</div>" +
		// 	"</div>";

		// to image
		// <div style="overflow: hidden; height: 100px; background-image: url('https://umkm.imamdev.com/uploads/listing_thumbnails/dfc75d47f960c7eb5529d9c4ffdb6085.jpg'); background-size: cover; background-position: center;" class="map-direction-image"></div>
		// <div><p class="text-muted"><i class="fas fa-map-marker-alt fa-fw text-dark mr-2"></i>${dataProfil["lokasi_perizinan"]}</p></div>
		// 	<div><p class="text-muted"><i class="fa fa-phone fa-fw text-dark mr-2"></i>${dataProfil["no_telp"]}</p></div>

		popupContent = `
			<div class="popup-venue card">
				<div class="card-body">
					<div class="">
						<h6><a href="https://www.google.com/maps/search/?api=1&query=${dataProfil["longitude"]},${dataProfil["latitude"]}">${dataProfil["nama_badan"]} <br>(Open in Googlemaps)</a></h6>
					</div>
				</div>
			</div>`;

		return popupContent;
	}

	var geojsonFeature = {
		type: "Feature",
		properties: {
			name: "Coors Field",
			amenity: "Baseball Stadium",
			popupContent: "This is where the Rockies play!",
		},
		geometry: {
			type: "Point",
			coordinates: [dataProfil["latitude"], dataProfil["longitude"]],
		},
	};
	L.geoJSON(geojsonFeature, {
		pointToLayer: pointToLayer,
		onEachFeature: onEachFeature,
	}).addTo(map);
	if (markersGroup) {
		var featureGroup = new L.featureGroup(markersGroup);
		map.fitBounds(featureGroup.getBounds());
	}
}
