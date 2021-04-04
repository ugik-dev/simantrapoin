<div id="content-page" class="content-page">


  <div class="container">
    <div class="iq-card col-lg-12">
      <div class="iq-card-header flex justify-content-between">
        <div class="ibox-content">
          <div class="table-responsive">
            <table id="FDataTable" class="table table-bordered table-hover" style="padding:0px">
              <thead>
                <tr>
                  <th style="width: 5%; text-align:center!important">ID</th>
                  <th style="width: 10%; text-align:center!important">Tanggal Dibuat</th>
                  <th style="width: 15%; text-align:center!important">NIK</th>
                  <th style="width: 12%; text-align:center!important">Lokasi</th>
                  <th style="width: 10%; text-align:center!important">Perizinan</th>
                  <th style="width: 10%; text-align:center!important">Status</th>
                  <th style="width: 7%; text-align:center!important">Action</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
  $(document).ready(function() {
    // $('#pariwisata').addClass('active');
    // $('#biro').addClass('active');

    var toolbar = {
      'form': $('#toolbar_form'),
      'status_proposal': $('#status_proposal'),
      'addBtn': $('#show_btn'),
    }

    var FDataTable = $('#FDataTable').DataTable({
      // dom: 'Bfrtip',
      // button : ['excel'],
      dom: 'Bfrtip',
      buttons: [{
          extend: 'print',
          exportOptions: {
            columns: [0, 1, 2, 3, 4, 5]
          },
        },
        {
          extend: 'pdf',
          exportOptions: {
            columns: [0, 1, 2, 3, 4, 5]
          }
        },
      ],
      responsive: true,
      'columnDefs': [],
      deferRender: true,
      "order": [
        [0, "desc"]
      ]
    });


    var swalSaveConfigure = {
      title: "Konfirmasi simpan",
      text: "Yakin akan menyimpan data ini?",
      type: "info",
      showCancelButton: true,
      confirmButtonColor: "#18a689",
      confirmButtonText: "Ya, Simpan!",
    };

    var swalDeleteConfigure = {
      title: "Konfirmasi hapus",
      text: "Yakin akan menghapus data ini?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Ya, Hapus!",
    };

    var dataPengiriman = {};
    var dataNomor = {};

    getPengiriman();


    function getPengiriman() {
      $.ajax({
        url: `<?= site_url('PengirimanController/getAllPengiriman') ?>`,
        'type': 'POST',
        data: toolbar.form.serialize(),
        success: function(data) {
          // buttonIdle(toolbar.showBtn);s
          var json = JSON.parse(data);
          if (json['error']) {
            swal("Simpan Gagal", json['message'], "error");
            return;
          }
          dataPengiriman = json['data'];
          renderPengiriman(dataPengiriman);
        },
        error: function(e) {}
      });
    }



    function renderPengiriman(data) {
      if (data == null || typeof data != "object") {
        console.log("User::UNKNOWN DATA");
        return;
      }
      var i = 0;

      var renderData = [];
      Object.values(data).forEach((biro) => {
        var apprv;
        if (biro['id_user_approv'] == '0') {
          apprv = "Belum Di Approv"
        } else {
          apprv = "Sudah Di Approv";
        };
        var detailButton = `
      <a class="detail dropdown-item" href='<?= site_url() ?>PengirimanController/DetailPengiriman?id_pengiriman=${biro['id_pengiriman']}'><i class='fa fa-share'></i> Detail Pengiriman</a>
      `;
        var editButton = `
        <a class="edit dropdown-item" data-id='${biro['id_pengiriman']}'><i class='fa fa-pencil'></i> Edit Pengiriman</a>
      `;
        var deleteButton = `
        <a class="delete dropdown-item" data-id='${biro['id_pengiriman']}'><i class='fa fa-trash'></i> Hapus Pengiriman</a>
      `;
        var button = `
        <div class="btn-group" role="group">
          <button id="action" type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class='fa fa-bars'></i></button>
          <div class="dropdown-menu" aria-labelledby="action">
            ${detailButton}
            <?php if ($this->session->userdata()['nama_role'] == 'frontoffice') { ?>

              ${editButton}
              ${deleteButton}
              <?php  } ?>   
          </div>
        </div>
      `;
        renderData.push([biro['id_pengiriman'], renderDate(biro['created_at']), biro['nama_badan'] + '<br>NIB :' + biro['nib'], biro['lokasi_perizinan'], biro['tujuan'] == 'usaha' ? "Usaha" : 'Umum', statusPermohonan(biro['status_proposal']), button]);
      });
      FDataTable.clear().rows.add(renderData).draw('full-hold');
    }

    function statusPermohonan(status) {
      if (status == 'DRAFT')
        return `<i class='fa fa-edit text-warning'> Draft</i>`;
      else if (status == 'DIPROSES')
        return `<i class='fa fa-hourglass-start text-primary'> Diproses</i>`;
      else if (status == 'DITERIMA')
        return `<i class='fa fa-check text-success'> Diterima</i>`;
      return `<i class='fa fa-times text-danger'> Ditolak</i>`;
    }

    FDataTable.on('click', '.delete', function() {
      event.preventDefault();
      var id = $(this).data('id');
      swal(swalDeleteConfigure).then((result) => {
        if (!result.value) {
          return;
        }
        $.ajax({
          url: "<?= site_url('PengirimanController/deletePengiriman') ?>",
          'type': 'POST',
          data: {
            'id_pengiriman': id
          },
          success: function(data) {
            var json = JSON.parse(data);
            if (json['error']) {
              swal("Delete Gagal", json['message'], "error");
              return;
            }
            delete dataPengiriman[id];
            swal("Delete Berhasil", "", "success");
            renderPengiriman(dataPengiriman);
          },
          error: function(e) {}
        });
      });
    });

  });
</script>