<div class="wrapper wrapper-content animated fadeInRight">
  <div class="ibox ssection-container">
    <div class="ibox-content">
      <form class="form-inline" id="toolbar_form" onsubmit="return false;">
        <input type="hidden" id="sort" name="sort" value='1'>

        <select class="form-control mr-sm-2" id="self_status" name="self_status">
          <option class="form-control mr-sm-2" value="all">Semua</option>
          <!-- <option class="form-control mr-sm-2"  value="diproses">Diproses</option> -->
          <option class="form-control mr-sm-2" value="menunggu" selected>Menunggu</option>
          <option class="form-control mr-sm-2" value="approv">Approval</option>
          <option class="form-control mr-sm-2" value="ditolak">Ditolak</option>
          <!-- <option class="form-control mr-sm-2"  value="finish">Selesai</option> -->
        </select>
        <button type="submit" class="btn btn-success my-1 mr-sm-2" id="show_btn" data-loading-text="Loading..." onclick="this.form.target='show'"><i class="fal fa-eye"></i> Tampilkan</button>
        <button type="submit" class="btn btn-primary my-1 mr-sm-2" id="add_btn" data-loading-text="Loading..." <?php if ($this->session->userdata()['nama_role'] != 'frontoffice') echo 'style="display: none"' ?> onclick="this.form.target='add'"><i class="fal fa-plus"></i> Tambah</button>
        <a type="" class="btn btn-light my-1 mr-sm-2" id="export_btn" data-loading-text="Loading..."><i class="fal fa-download"></i> Export PDF</a>

      </form>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="ibox">
        <div class="ibox-content">
          <div class="table-responsive">
            <table id="FDataTable" class="table table-bordered table-hover" style="padding:0px">
              <thead>
                <tr>
                  <th style="width: 3%; text-align:center!important">ID</th>

                  <th style="width: 10%; text-align:center!important">Tanggal</th>
                  <th style="width: 15%; text-align:center!important">Nama Perseorangan / Badan / NIB</th>
                  <th style="width: 15%; text-align:center!important">Alamat</th>
                  <th style="width: 4%; text-align:center!important">Jenis Perizinan</th>
                  <th style="width: 4%; text-align:center!important">Approval</th>
                  <th style="width: 2%; text-align:center!important">Action</th>
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


<div class="modal inmodal" id="biro_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Kelola Pengiriman dan Agen</h4>
        <span class="info"></span>
      </div>
      <div class="modal-body" id="modal-body">
        <form role="form" id="user_form" onsubmit="return false;" type="multipart" autocomplete="off">
          <input type="hidden" id="id_pengiriman" name="id_pengiriman">
          <div class="form-group">
            <label for="nama">Nama Pengiriman</label>
            <input type="text" placeholder="Nama Pengiriman" class="form-control" id="nama" name="nama" required="required">
          </div>

          <div class="form-group">
            <label for="no_dokumen">Nomor</label>
            <input type="text" placeholder="Nomor" class="form-control" id="no_dokumen" name="no_dokumen" required="required">

          </div>
          <!-- <div class="form-group">
            <label for="id_sertifikat_biro">jenis</label> 
            <select class="form-control mr-sm-2" id="id_sertifikat_biro" name="id_sertifikat_biro" required="required">
            </select>
          </div> -->

          <!-- <div class="form-group">
            <label for="lokasi">Lokasi</label> 
            <input type="text" placeholder="Lokasi" class="form-control" id="lokasi" name="lokasi" required="required">
          </div> -->
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea rows="4" placeholder="Alamat" class="form-control" id="alamat" name="alamat"></textarea>

          </div>
          <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea rows="4" placeholder="Deskripsi" class="form-control" id="deskripsi" name="deskripsi"></textarea>
          </div>



          <button class="btn btn-success my-1 mr-sm-2" type="submit" id="add_btn" data-loading-text="Loading..." onclick="this.form.target='add'"><strong>Tambah Data</strong></button>
          <button class="btn btn-success my-1 mr-sm-2" type="submit" id="save_edit_btn" data-loading-text="Loading..." onclick="this.form.target='edit'"><strong>Simpan Perubahan</strong></button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#pariwisata').addClass('active');
    $('#biro').addClass('active');

    var toolbar = {
      'form': $('#toolbar_form'),
      'self_status': $('#self_status'),
      'addBtn': $('#show_btn'),
    }

    var FDataTable = $('#FDataTable').DataTable({
      'columnDefs': [],
      deferRender: true,
      "order": [
        [0, "desc"]
      ]
    });


    var PengirimanModal = {
      'self': $('#biro_modal'),
      'info': $('#biro_modal').find('.info'),
      'form': $('#biro_modal').find('#user_form'),
      'addBtn': $('#biro_modal').find('#add_btn'),
      'saveEditBtn': $('#biro_modal').find('#save_edit_btn'),
      'id_pengiriman': $('#biro_modal').find('#id_pengiriman'),
      'nama': $('#biro_modal').find('#nama'),
      'no_dokumen': $('#biro_modal').find('#no_dokumen'),
      'nama_jenis_biro': $('#biro_modal').find('#nama_jenis_biro'),
      'id_sertifikat_biro': $('#biro_modal').find('#id_sertifikat_biro'),
      'nama_sertifikat_biro': $('#biro_modal').find('#nama_sertifikat_biro'),
      'file': $('#biro_modal').find('#file'),
      'alamat': $('#biro_modal').find('#alamat'),
      'lokasi': $('#biro_modal').find('#lokasi'),
      'deskripsi': $('#biro_modal').find('#deskripsi'),

    }

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

    toolbar.form.submit(function(event) {
      event.preventDefault();
      switch (toolbar.form[0].target) {
        case 'show':
          getPengiriman();
          break;
        case 'add':
          showPengirimanModal();
          break;
      }
    });

    toolbar.self_status.on('change', function() {
      getPengiriman();
    })


    function renderNomorSelection(data) {
      PengirimanModal.no_dokumen.empty();
      PengirimanModal.no_dokumen.append($('<option>', {
        value: "",
        text: "-- Pilih Nomor --"
      }));
      Object.values(data).forEach((d) => {
        PengirimanModal.no_dokumen.append($('<option>', {
          value: d['no_dokumen'],
          text: d['no_dokumen'] + ' :: ' + d['nama_jenis_biro'],
        }));
      });
    }

    function renderSertifikatSelection(data) {
      PengirimanModal.id_sertifikat_biro.empty();
      PengirimanModal.id_sertifikat_biro.append($('<option>', {
        value: "",
        text: "-- Pilih Sertifikat --"
      }));
      Object.values(data).forEach((d) => {
        PengirimanModal.id_sertifikat_biro.append($('<option>', {
          value: d['id_sertifikat_biro'],
          text: d['id_sertifikat_biro'] + ' :: ' + d['nama_sertifikat_biro'],
        }));
      });
    }

    toolbar.self_status.trigger('change');

    function getPengiriman() {
      // buttonLoading(toolbar.showBtns);
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


    // document.getElementById("export_btn").href = '<?= site_url('PimpinanController/PdfAllPengiriman') ?>';

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
      <a class="detail btn-success btn-sm " href='<?= site_url() ?>PengirimanController/DetailPengiriman?id_pengiriman=${biro['id_pengiriman']}'><i class='fa fa-angle-double-right'></i></a>
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
        renderData.push([biro['id_pengiriman'], renderDate(biro['created_at']), biro['nama'] + ( biro['nama_badan'] ? ( '<br>'+biro['nama_badan']): '' ) +( biro['nib'] ? ( '<br>'+biro['nib']): '' ) , biro['alamat'],biro['tujuan'] == 'usaha' ? "Usaha": 'Umum' , statusPermohonan(biro['status_proposal']), detailButton]);
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


    FDataTable.on('click', '.edit', function() {
      event.preventDefault();
      PengirimanModal.form.trigger('reset');
      PengirimanModal.self.modal('show');
      PengirimanModal.addBtn.hide();
      PengirimanModal.saveEditBtn.show();
      var id = $(this).data('id');
      var biro = dataPengiriman[id];
      PengirimanModal.id_pengiriman.val(biro['id_pengiriman']);
      PengirimanModal.nama.val(biro['nama']);
      PengirimanModal.no_dokumen.val(biro['no_dokumen']);
      PengirimanModal.id_sertifikat_biro.val(biro['id_sertifikat_biro']);
      PengirimanModal.alamat.val(biro['alamat']);
      PengirimanModal.file.val(biro['file']);
      PengirimanModal.lokasi.val(biro['lokasi']);
      PengirimanModal.deskripsi.val(biro['deskripsi']);

    });

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

    function showPengirimanModal() {
      PengirimanModal.self.modal('show');
      PengirimanModal.addBtn.show();
      PengirimanModal.saveEditBtn.hide();
      PengirimanModal.form.trigger('reset');
    }

    PengirimanModal.form.submit(function(event) {
      event.preventDefault();
      switch (PengirimanModal.form[0].target) {
        case 'add':
          addPengiriman();
          break;
        case 'edit':
          editPengiriman();
          break;
      }
    });

    function addPengiriman() {
      swal(swalSaveConfigure).then((result) => {
        if (!result.value) {
          return;
        }
        buttonLoading(PengirimanModal.addBtn);
        $.ajax({
          url: `<?= site_url('PengirimanController/addPengiriman') ?>`,
          'type': 'POST',
          data: PengirimanModal.form.serialize(),
          success: function(data) {
            buttonIdle(PengirimanModal.addBtn);
            var json = JSON.parse(data);
            if (json['error']) {
              swal("Simpan Gagal", json['message'], "error");
              return;
            }
            var biro = json['data']
            dataPengiriman[biro['id_pengiriman']] = biro;
            swal("Simpan Berhasil", "", "success");
            renderPengiriman(dataPengiriman);
            PengirimanModal.self.modal('hide');
          },
          error: function(e) {}
        });
      });
    }

    function editPengiriman() {
      swal(swalSaveConfigure).then((result) => {
        if (!result.value) {
          return;
        }
        buttonLoading(PengirimanModal.saveEditBtn);
        $.ajax({
          url: `<?= site_url('PengirimanController/editPengiriman') ?>`,
          'type': 'POST',
          data: PengirimanModal.form.serialize(),
          success: function(data) {
            buttonIdle(PengirimanModal.saveEditBtn);
            var json = JSON.parse(data);
            if (json['error']) {
              swal("Simpan Gagal", json['message'], "error");
              return;
            }
            var biro = json['data']
            dataPengiriman[biro['id_pengiriman']] = biro;
            swal("Simpan Berhasil", "", "success");
            renderPengiriman(dataPengiriman);
            PengirimanModal.self.modal('hide');
          },
          error: function(e) {}
        });
      });
    }
  });
</script>