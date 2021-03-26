function render_files(label, dir, filename, format, col = "") {
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
