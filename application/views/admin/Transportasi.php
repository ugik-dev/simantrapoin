<div class="wrapper wrapper-content animated fadeInRight">
  <div class="ibox ssection-container">
    <div class="ibox-content">
      <form class="form-inline" id="toolbar_form" onsubmit="return false;">

        <!-- <button type="submit" class="btn btn-success my-1 mr-sm-2" id="statistik_btn"  data-loading-text="Loading..." onclick="this.form.target='statistik'"><i class="fal fa-eye"></i> Statistik Data</button>  -->
        <button type="submit" class="btn btn-success my-1 mr-sm-2" id="show_btn"  data-loading-text="Loading..." onclick="this.form.target='show'"><i class="fal fa-eye"></i> Tampilkan</button>
        <button hidden type="submit" class="btn btn-primary my-1 mr-sm-2" id="add_btn"  data-loading-text="Loading..." onclick="this.form.target='add'"><i class="fal fa-plus"></i> Tambah</button>
        <a type="" class="btn btn-light my-1 mr-sm-2" id="export_btn"  data-loading-text="Loading..."><i class="fal fa-download"></i> Export PDF</a>
    
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

                  <th style="width: 20%; text-align:center!important">Nama Cagar Budaya</th>
                  
                  <th style="width: 12%; text-align:center!important">Jenis Cagar Budaya</th>
                 
                  <th style="width: 12%; text-align:center!important">Tahun Terdata</th>
                  <th style="width: 12%; text-align:center!important">Approval</th>
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


  <!-- <div class="row">
    <div class="col-lg-12">
      <div class="ibox">
        <div class="ibox-content">
          <div class="table-responsive">
            <table id="FStatistikTable" class="table table-bordered table-hover" style="padding:0px">
              <thead>
                <tr>
                  <th style="width: 7%; text-align:center!important">ID</th>
                  <th style="width: 15%; text-align:center!important">Nama Transportasi</th>
                  <th style="width: 12%; text-align:center!important">Waktu</th>
                  <th style="width: 12%; text-align:center!important">Pengunjung Mancanegara</th>
                  <th style="width: 12%; text-align:center!important">Pengunjung Domestik</th>
                  <th style="width: 12%; text-align:center!important">Jumlah Pengunjung</th>
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
 -->

<div class="modal inmodal" id="transportasi_modal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Kelola Cagar Budaya</h4>
        <span class="info"></span>
      </div>
      <div class="modal-body" id="modal-body">              
        <form role="form" id="user_form" onsubmit="return false;" type="multipart" autocomplete="off">
          <input type="hidden" id="id_transportasi" name="id_transportasi">
          <div class="form-group">
            <label for="nama">Nama Transportasi</label> 
            <input type="text" placeholder="Nama Transportasi" class="form-control" id="nama" name="nama" required="required">
          </div>
          <div class="form-group">
            <label for="kabupaten">Kabupaten / Kota</label> 
            <select class="form-control mr-sm-2" id="kabupaten" name="id_kabupaten" required="required">
            </select>
          </div>
          <div class="form-group">
            <label for="jenis">Jenis Cagar budaya</label> 
            <select class="form-control mr-sm-2" id="jenis" name="id_jenis_transportasi" required="required">
            </select>
          </div>
          <div class="form-group">
            <label for="kepemilikan">Kepemilikan Cagar budaya</label> 
            <select class="form-control mr-sm-2" id="kepemilikan" name="id_kepemilikan_transportasi" required="required">
            </select>
          </div>
          <div class="form-group">
            <label for="status_penetapan">Status Penetapan</label> 
            <select class="form-control mr-sm-2" id="status_penetapan" name="id_status_penetapan_transportasi" required="required">
            </select>
          </div>
          <!-- <div class="form-group">
            <label for="file">File</label> 
            <input type="file" placeholder="File" class="form-control" id="file" name="file" required="required">
          </div> -->
          <div class="form-group">
            <label for="lokasi">Lokasi</label> 
            <input type="text" placeholder="Lokasi" class="form-control" id="lokasi" name="lokasi" required="required">
          </div>
          <div class="form-group">
            <label for="deskripsi">Deskripsi</label> 
            <textarea rows="3" type="text" placeholder="Deskripsi" class="form-control" id="deskripsi" name="deskripsi" required="required">
            </textarea>
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
  $('#cagar_dan_budaya').addClass('active');
  $('#transportasi').addClass('active');
  
  var toolbar = {
    'form': $('#toolbar_form'),
    'showBtn': $('#show_btn'),
    'addBtn': $('#add_btn'),
   
 
  }

  var FDataTable = $('#FDataTable').DataTable({
    'columnDefs': [],
    deferRender: true,
    "order": [[ 0, "desc" ]]
  });

  var FStatistikTable = $('#FStatistikTable').DataTable({
    'columnDefs': [],
    deferRender: true,
    "order": [[ 0, "desc" ]]
  });

  var TransportasiModal = {
    'self': $('#transportasi_modal'),
    'info': $('#transportasi_modal').find('.info'),
    'form': $('#transportasi_modal').find('#user_form'),
    'addBtn': $('#transportasi_modal').find('#add_btn'),
    'saveEditBtn': $('#transportasi_modal').find('#save_edit_btn'),
    'id_transportasi': $('#transportasi_modal').find('#id_transportasi'),
    'nama': $('#transportasi_modal').find('#nama'),
    'jenis': $('#transportasi_modal').find('#jenis'),
    'kabupaten': $('#transportasi_modal').find('#kabupaten'),
    'kepemilikan': $('#transportasi_modal').find('#kepemilikan'),
    'status_penetapan': $('#transportasi_modal').find('#status_penetapan'),
    'file': $('#transportasi_modal').find('#file'),
    'lokasi': $('#transportasi_modal').find('#lokasi'),
    'deskripsi': $('#transportasi_modal').find('#deskripsi'),
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

  var dataJenis = {};
  var dataKepemilikan = {};
  var dataStatusPenetapan = {};
  var dataTransportasi = {};
    var dataStatistikTransportasi = {};

  toolbar.form.submit(function(event){
    event.preventDefault();
    switch(toolbar.form[0].target){
      case 'show':
        getTransportasi();
        break;
      case 'add':
        showTransportasiModal();
        break;
      case 'export':
     
      break;
    }
  });

  getAllJenis();  
  function getAllJenis(){
    return $.ajax({
      url: `<?php echo site_url('TransportasiController/getAllJenisOption/')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        dataJenis = json['data'];
        renderJenisSelection(dataJenis);
      },
      error: function(e) {}
    });
  }

  getAllKepemilikan();  
  function getAllKepemilikan(){
    return $.ajax({
      url: `<?php echo site_url('TransportasiController/getAllKepemilikanOption/')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        dataKepemilikan = json['data'];
        renderKepemilikanSelection(dataKepemilikan);
      },
      error: function(e) {}
    });
  }

  function getTransportasi(){
    buttonLoading(toolbar.showBtn);
    $.ajax({
      url: `<?=site_url('TransportasiController/getAllTransportasi')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        buttonIdle(toolbar.showBtn);
        var json = JSON.parse(data);
        if(json['error']){
          swal("Simpan Gagal", json['message'], "error");
          return;
        }
        dataTransportasi = json['data'];
        renderTransportasi(dataTransportasi);
      },
      error: function(e) {}
    });
  }


  function renderTransportasi(data){
    if(data == null || typeof data != "object"){
      console.log("User::UNKNOWN DATA");
      return;
    }
    var i = 0;
    
    var renderData = [];
    Object.values(data).forEach((transportasi) => {
      var apprv;
      if(transportasi['id_user_approv']=='0'){
        apprv= "Belum Di Approv"
        }else{
          apprv = "Sudah Di Approv";
        };
      var detailButton =`
      <a class="detail dropdown-item" href='<?=site_url()?>AdminController/DetailTransportasi?id_transportasi=${transportasi['id_transportasi']}&nama=${transportasi['nama']}'><i class='fa fa-share'></i> Detail Transportasi</a>
      `;  
      var editButton = `
        <a class="edit dropdown-item" data-id='${transportasi['id_transportasi']}'><i class='fa fa-pencil'></i> Edit Transportasi</a>
      `;
      var deleteButton = `
        <a class="delete dropdown-item" data-id='${transportasi['id_transportasi']}'><i class='fa fa-trash'></i> Hapus Transportasi</a>
      `;
      var button = `
        <div class="btn-group" role="group">
          <button id="action" type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class='fa fa-bars'></i></button>
          <div class="dropdown-menu" aria-labelledby="action">
            ${detailButton}
           
          </div>
        </div>
      `;
      renderData.push([transportasi['nama'], transportasi['nama_jenis_transportasi'], transportasi['tahun_terdata'],apprv, button]);
    });
    FDataTable.clear().rows.add(renderData).draw('full-hold');
  }


  
  FDataTable.on('click','.edit', function(){
    event.preventDefault();
    TransportasiModal.form.trigger('reset');
    TransportasiModal.self.modal('show');
    TransportasiModal.addBtn.hide();
    TransportasiModal.saveEditBtn.show();
    var id = $(this).data('id');
    var transportasi = dataTransportasi[id];
    TransportasiModal.id_transportasi.val(transportasi['id_transportasi']);
    TransportasiModal.nama.val(transportasi['nama']);
    TransportasiModal.jenis.val(transportasi['id_jenis_transportasi']);
    TransportasiModal.kepemilikan.val(transportasi['id_kepemilikan_transportasi']);
    TransportasiModal.status_penetapan.val(transportasi['id_status_penetapan_transportasi']);
    TransportasiModal.file.val(transportasi['file']);
    TransportasiModal.lokasi.val(transportasi['lokasi']);
    TransportasiModal.deskripsi.val(transportasi['deskripsi']);
    TransportasiModal.kabupaten.val(transportasi['id_kabupaten']);
  });

  FDataTable.on('click','.delete', function(){
    event.preventDefault();
    var id = $(this).data('id');
    swal(swalDeleteConfigure).then((result) => {
      if(!result.value){ return; }
      $.ajax({
        url: "<?=site_url('TransportasiController/deleteTransportasi')?>", 'type': 'POST',
        data: {'id_transportasi': id},
        success: function (data){
          var json = JSON.parse(data);
          if(json['error']){
            swal("Delete Gagal", json['message'], "error");
            return;
          }
          delete dataTransportasi[id];
          swal("Delete Berhasil", "", "success");
          renderTransportasi(dataTransportasi);
        },
        error: function(e) {}
      });
    });
  });

  function showTransportasiModal(){
    TransportasiModal.self.modal('show');
    TransportasiModal.addBtn.show();
    TransportasiModal.saveEditBtn.hide();
    TransportasiModal.form.trigger('reset');
  }

  TransportasiModal.form.submit(function(event){
    event.preventDefault();
    switch(TransportasiModal.form[0].target){
      case 'add':
        addTransportasi();
        break;
      case 'edit':
        editTransportasi();
        break;
    }
  });

  function addTransportasi(){
    swal(swalSaveConfigure).then((result) => {
      if(!result.value){ return; }
      buttonLoading(TransportasiModal.addBtn);
      $.ajax({
        url: `<?=site_url('TransportasiController/addTransportasi')?>`, 'type': 'POST',
        data: TransportasiModal.form.serialize(),
        success: function (data){
          buttonIdle(TransportasiModal.addBtn);
          var json = JSON.parse(data);
          // if(json['error']){
          //   swal("Simpan Gagal", json['message'], "error");
          //   return;
          // }
          var transportasi = json['data']
          dataTransportasi[transportasi['id_transportasi']] = transportasi;
          swal("Simpan Berhasil", "", "success");
          renderTransportasi(dataTransportasi);
          TransportasiModal.self.modal('hide');
        },
        error: function(e) {}
      });
    });
  }

  
  function editTransportasi(){
    swal(swalSaveConfigure).then((result) => {
      if(!result.value){ return; }
      buttonLoading(TransportasiModal.saveEditBtn);
      $.ajax({
        url: `<?=site_url('TransportasiController/editTransportasi')?>`, 'type': 'POST',
        data: TransportasiModal.form.serialize(),
        success: function (data){
          buttonIdle(TransportasiModal.saveEditBtn);
          var json = JSON.parse(data);
          if(json['error']){
            swal("Simpan Gagal", json['message'], "error");
            return;
          }
          var transportasi = json['data']
          dataTransportasi[transportasi['id_transportasi']] = transportasi;
          swal("Simpan Berhasil", "", "success");
          renderTransportasi(dataTransportasi);
          TransportasiModal.self.modal('hide');
        },
        error: function(e) {}
      });
    });
  }
});
</script>