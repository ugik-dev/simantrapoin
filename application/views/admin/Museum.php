<div class="wrapper wrapper-content animated fadeInRight">
  <div class="ibox ssection-container">
    <div class="ibox-content">
      <form class="form-inline" id="toolbar_form" onsubmit="return false;">
        
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
        
                  <th style="width: 15%; text-align:center!important">Nama Museum</th>
                  <th style="width: 12%; text-align:center!important">Kepemilikan</th>
                  <th style="width: 12%; text-align:center!important">Status Registrasi</th>
                  <th style="width: 10%; text-align:center!important">Kabupaten / Kota</th>
                  <th style="width: 12%; text-align:center!important">Tahun Terdata</th>
                  <th style="width: 10%; text-align:center!important">Approval</th>
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


<div class="modal inmodal" id="museum_modal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Kelola Museum</h4>
        <span class="info"></span>
      </div>
      <div class="modal-body" id="modal-body">              
        <form role="form" id="user_form" onsubmit="return false;" type="multipart" autocomplete="off">
          <input type="hidden" id="id_museum" name="id_museum">
          <div class="form-group">
            <label for="nama">Nama Museum</label> 
            <input type="text" placeholder="Nama Museum" class="form-control" id="nama" name="nama" required="required">
          </div>
          <div class="form-group">
            <label for="kabupaten">Kabupaten / Kota</label> 
            <select class="form-control mr-sm-2" id="kabupaten" name="id_kabupaten" required="required">
            </select>
          </div>

          <div class="form-group">
            <label for="id_kepemilikan_museum">Kepemilikan</label> 
            <select class="form-control mr-sm-2" id="id_kepemilikan_museum" name="id_kepemilikan_museum" required="required">
            </select>
          </div>
          <div class="form-group">
            <label for="id_status_museum">Status Registrasi</label> 
            <select class="form-control mr-sm-2" id="id_status_museum" name="id_status_museum" required="required">
            </select>
          </div>

          <div class="form-group">
            <label for="deskripsi">Deskripsi</label> 
            <textarea rows="4" type="text" placeholder="Deskripsi" class="form-control" id="deskripsi" name="deskripsi" required="required"></textarea>
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
  $('#museum').addClass('active');

  var toolbar = {
    'form': $('#toolbar_form'),
    'showBtn': $('#show_btn'),
    'addBtn': $('#show_btn'),
  }

  var FDataTable = $('#FDataTable').DataTable({
    'columnDefs': [],
    deferRender: true,
    "order": [[ 0, "desc" ]]
  });


  var MuseumModal = {
    'self': $('#museum_modal'),
    'info': $('#museum_modal').find('.info'),
    'form': $('#museum_modal').find('#user_form'),
    'addBtn': $('#museum_modal').find('#add_btn'),
    'saveEditBtn': $('#museum_modal').find('#save_edit_btn'),
    'id_museum': $('#museum_modal').find('#id_museum'),
    'nama': $('#museum_modal').find('#nama'),
    'id_kepemilikan_museum': $('#museum_modal').find('#id_kepemilikan_museum'),
    'nama_kepemilikan_museum': $('#museum_modal').find('#nama_kepemilikan_museum'),
    'id_status_museum': $('#museum_modal').find('#id_status_museum'),
    'nama_status': $('#museum_modal').find('#nama_status'),
    'file': $('#museum_modal').find('#file'),
    'lokasi': $('#museum_modal').find('#lokasi'),
    'deskripsi': $('#museum_modal').find('#deskripsi'),
    'kabupaten': $('#museum_modal').find('#kabupaten'),
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

  var dataMuseum = {};
  var dataKepemilikan = {};
  var dataStatus = {};

  toolbar.form.submit(function(event){
    event.preventDefault();
    switch(toolbar.form[0].target){
      case 'show':
        getMuseum();
        break;
      case 'add':
        showMuseumModal();
        break;
    }
  });

  getAllKepemilikan();  
  function getAllKepemilikan(){
    return $.ajax({
      url: `<?php echo site_url('MuseumController/getAllKepemilikanOption/')?>`, 'type': 'GET',
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

  getAllStatus();  
  function getAllStatus(){
    return $.ajax({
      url: `<?php echo site_url('MuseumController/getAllStatusOption/')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        dataStatus = json['data'];
        renderStatusSelection(dataStatus);
      },
      error: function(e) {}
    });
  }

   function renderKepemilikanSelection(data){
    MuseumModal.id_kepemilikan_museum.empty();
    MuseumModal.id_kepemilikan_museum.append($('<option>', { value: "", text: "-- Pilih Kepemilikan --"}));
    Object.values(data).forEach((d) => {
      MuseumModal.id_kepemilikan_museum.append($('<option>', {
        value: d['id_kepemilikan_museum'],
        text: d['id_kepemilikan_museum'] + ' :: ' + d['nama_kepemilikan_museum'],
      }));
    });
  }

   function renderStatusSelection(data){
    MuseumModal.id_status_museum.empty();
    MuseumModal.id_status_museum.append($('<option>', { value: "", text: "-- Pilih Status Registrasi --"}));
    Object.values(data).forEach((d) => {
      MuseumModal.id_status_museum.append($('<option>', {
        value: d['id_status_museum'],
        text: d['id_status_museum'] + ' :: ' + d['nama_status'],
      }));
    });
  }
  

  function getMuseum(){
    buttonLoading(toolbar.showBtn);
    $.ajax({
      url: `<?=site_url('MuseumController/getAllMuseum')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        buttonIdle(toolbar.showBtn);
        var json = JSON.parse(data);
        if(json['error']){
          swal("Simpan Gagal", json['message'], "error");
          return;
        }
        dataMuseum = json['data'];
        renderMuseum(dataMuseum);
      },
      error: function(e) {}
    });
  }

  function renderMuseum(data){
    if(data == null || typeof data != "object"){
      console.log("User::UNKNOWN DATA");
      return;
    }
    var i = 0;
    
    var renderData = [];
    Object.values(data).forEach((museum) => {
      var apprv;
      if(museum['id_user_approv']=='0'){
        apprv= "Belum Di Approv"
        }else{
          apprv = "Sudah Di Approv";
        };
      var detailButton =`
      <a class="detail dropdown-item" href='<?=site_url()?>AdminController/DetailMuseum?id_museum=${museum['id_museum']}'><i class='fa fa-share'></i> Detail Museum</a>
      `; 
      var editButton = `
        <a class="edit dropdown-item" data-id='${museum['id_museum']}'><i class='fa fa-pencil'></i> Edit Museum</a>
      `;
      var deleteButton = `
        <a class="delete dropdown-item" data-id='${museum['id_museum']}'><i class='fa fa-trash'></i> Hapus Museum</a>
      `;
      var button = `
        <div class="btn-group" role="group">
          <button id="action" type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class='fa fa-bars'></i></button>
          <div class="dropdown-menu" aria-labelledby="action">
            ${detailButton}
           
          </div>
        </div>
      `;
      renderData.push([ museum['nama'], museum['nama_kepemilikan_museum'], museum['nama_status'], museum['nama_kabupaten'],museum['tahun_terdata'],apprv, button]);
    });
    FDataTable.clear().rows.add(renderData).draw('full-hold');
  }

  
  FDataTable.on('click','.edit', function(){
    event.preventDefault();
    MuseumModal.form.trigger('reset');
    MuseumModal.self.modal('show');
    MuseumModal.addBtn.hide();
    MuseumModal.saveEditBtn.show();
    var id = $(this).data('id');
    var museum = dataMuseum[id];
    MuseumModal.id_museum.val(museum['id_museum']);
    MuseumModal.nama.val(museum['nama']);
    MuseumModal.id_kepemilikan_museum.val(museum['id_kepemilikan_museum']);
    MuseumModal.id_status_museum.val(museum['id_status_museum']);
    MuseumModal.file.val(museum['file']);
    MuseumModal.lokasi.val(museum['lokasi']);
    MuseumModal.deskripsi.val(museum['deskripsi']);
    MuseumModal.kabupaten.val(museum['id_kabupaten']);
  });

  FDataTable.on('click','.delete', function(){
    event.preventDefault();
    var id = $(this).data('id');
    swal(swalDeleteConfigure).then((result) => {
      if(!result.value){ return; }
      $.ajax({
        url: "<?=site_url('MuseumController/deleteMuseum')?>", 'type': 'POST',
        data: {'id_museum': id},
        success: function (data){
          var json = JSON.parse(data);
          if(json['error']){
            swal("Delete Gagal", json['message'], "error");
            return;
          }
          delete dataMuseum[id];
          swal("Delete Berhasil", "", "success");
          renderMuseum(dataMuseum);
        },
        error: function(e) {}
      });
    });
  });
  document.getElementById("export_btn").href = '<?= site_url('AdminController/Pdfallmuseum?id_museum=')?>'+id_museum;


  function showMuseumModal(){
    MuseumModal.self.modal('show');
    MuseumModal.addBtn.show();
    MuseumModal.saveEditBtn.hide();
    MuseumModal.form.trigger('reset');
  }

  MuseumModal.form.submit(function(event){
    event.preventDefault();
    switch(MuseumModal.form[0].target){
      case 'add':
        addMuseum();
        break;
      case 'edit':
        editMuseum();
        break;
    }
  });

  function addMuseum(){
    swal(swalSaveConfigure).then((result) => {
      if(!result.value){ return; }
      buttonLoading(MuseumModal.addBtn);
      $.ajax({
        url: `<?=site_url('MuseumController/addMuseum')?>`, 'type': 'POST',
        data: MuseumModal.form.serialize(),
        success: function (data){
          buttonIdle(MuseumModal.addBtn);
          var json = JSON.parse(data);
          if(json['error']){
            swal("Simpan Gagal", json['message'], "error");
            return;
          }
          var museum = json['data']
          dataMuseum[museum['id_museum']] = museum;
          swal("Simpan Berhasil", "", "success");
          renderMuseum(dataMuseum);
          MuseumModal.self.modal('hide');
        },
        error: function(e) {}
      });
    });
  }

    getAllKabupaten();  
  function getAllKabupaten(){
    return $.ajax({
      url: `<?php echo site_url('AdminController/getAllKabupaten/')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        dataKabupaten = json['data'];
        renderKabupatenSelection(dataKabupaten);
      },
      error: function(e) {}
    });
  }

  function renderKabupatenSelection(data){
    MuseumModal.kabupaten.empty();
    MuseumModal.kabupaten.append($('<option>', { value: "", text: "-- Pilih Kabupaten --"}));
    Object.values(data).forEach((d) => {
      MuseumModal.kabupaten.append($('<option>', {
        value: d['id_kabupaten'],
        text: d['id_kabupaten'] + ' :: ' + d['nama_kabupaten'],
      }));
    });
  }
  
  function editMuseum(){
    swal(swalSaveConfigure).then((result) => {
      if(!result.value){ return; }
      buttonLoading(MuseumModal.saveEditBtn);
      $.ajax({
        url: `<?=site_url('MuseumController/editMuseum')?>`, 'type': 'POST',
        data: MuseumModal.form.serialize(),
        success: function (data){
          buttonIdle(MuseumModal.saveEditBtn);
          var json = JSON.parse(data);
          if(json['error']){
            swal("Simpan Gagal", json['message'], "error");
            return;
          }
          var museum = json['data']
          dataMuseum[museum['id_museum']] = museum;
          swal("Simpan Berhasil", "", "success");
          renderMuseum(dataMuseum);
          MuseumModal.self.modal('hide');
        },
        error: function(e) {}
      });
    });
  }
});
</script>