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

                  <th style="width: 15%; text-align:center!important">Nama Usaha dan Restoran</th>
                  <th style="width: 12%; text-align:center!important">Jenis</th>
                  <th style="width: 12%; text-align:center!important"> Kabupaten / Kota</th>
                  <th style="width: 12%; text-align:center!important"> Tahun Terdata</th>

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


<div class="modal inmodal" id="usaha_modal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Kelola Usaha dan Jasa</h4>
        <span class="info"></span>
      </div>
      <div class="modal-body" id="modal-body">              
        <form role="form" id="user_form" onsubmit="return false;" type="multipart" autocomplete="off">
          <input type="hidden" id="id_usaha" name="id_usaha">
          <div class="form-group">
            <label for="nama">Nama Usaha</label> 
            <input type="text" placeholder="Nama Usaha" class="form-control" id="nama" name="nama" required="required">
          </div>
          <div class="form-group">
            <label for="kabupaten">Kabupaten / Kota</label> 
            <select class="form-control mr-sm-2" id="kabupaten" name="id_kabupaten" required="required">
            </select>
          </div>
          <div class="form-group">
            <label for="id_jenis_usaha">Jenis</label> 
            <select class="form-control mr-sm-2" id="id_jenis_usaha" name="id_jenis_usaha" required="required">
            </select>
          </div>
          <div class="form-group">
            <label for="id_item_usaha">Item</label> 
            <select class="form-control mr-sm-2" id="id_item_usaha" name="id_item_usaha" required="required">
            </select>
          </div>
          <!-- <div class="form-group  mr-sm-2" for="id_item_usaha" type="checkbox" id="id_item_usaha" name="id_item_usaha" required="required" >
          </div> -->
          <div class="form-group">
            <label for="alamat">Alamat</label> 
            <input type="text" placeholder="Alamat" class="form-control" id="alamat" name="alamat" required="required">
          </div>
       
          <div class="form-group">
            <label for="deskripsi">Deskripsi</label> 
            <textarea rows="5" type="text" placeholder="Deskripsi" class="form-control" id="deskripsi" name="deskripsi" required="required"></textarea>
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
  $('#usaha').addClass('active');

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


  var UsahaModal = {
    'self': $('#usaha_modal'),
    'info': $('#usaha_modal').find('.info'),
    'form': $('#usaha_modal').find('#user_form'),
    'addBtn': $('#usaha_modal').find('#add_btn'),
    'saveEditBtn': $('#usaha_modal').find('#save_edit_btn'),
    'id_usaha': $('#usaha_modal').find('#id_usaha'),
    'nama': $('#usaha_modal').find('#nama'),
    'id_jenis_usaha': $('#usaha_modal').find('#id_jenis_usaha'),
    'nama_jenis_usaha': $('#usaha_modal').find('#nama_jenis_usaha'),
    'id_item_usaha': $('#usaha_modal').find('#id_item_usaha'),
    'nama_item_usaha': $('#usaha_modal').find('#nama_item_usaha'),
    'alamat': $('#usaha_modal').find('#alamat'),
    'lokasi': $('#usaha_modal').find('#lokasi'),
    'deskripsi': $('#usaha_modal').find('#deskripsi'),
    'kabupaten': $('#usaha_modal').find('#kabupaten'),
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

  var dataUsaha = {};
  var dataJenis = {};

  toolbar.form.submit(function(event){
    event.preventDefault();
    switch(toolbar.form[0].target){
      case 'show':
        getUsaha();
        break;
      case 'add':
        showUsahaModal();
        break;
    }
  });

  getAllJenis();  
  function getAllJenis(){
    return $.ajax({
      url: `<?php echo site_url('UsahaController/getAllJenisOption/')?>`, 'type': 'GET',
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

    getAllItem();  
    function getAllItem(){
    return $.ajax({
      url: `<?php echo site_url('UsahaController/getAllItemOption/')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        dataItem = json['data'];
        renderItemSelection(dataItem);
      },
      error: function(e) {}
    });
    }


   function renderJenisSelection(data){
    UsahaModal.id_jenis_usaha.empty();
    UsahaModal.id_jenis_usaha.append($('<option>', { value: "", text: "-- Pilih Jenis --"}));
    Object.values(data).forEach((d) => {
      UsahaModal.id_jenis_usaha.append($('<option>', {
        value: d['id_jenis_usaha'],
        text: d['id_jenis_usaha'] + ' :: ' + d['nama_jenis_usaha'],
      }));
    });
    }

    function renderItemSelection(data){
    UsahaModal.id_item_usaha.empty();
    //UsahaModal.id_item_usaha.append($('<label for="id_jenis_usaha">Item</label> <br>'));
    UsahaModal.id_item_usaha.append($('<option>', { value: "", text: "-- Pilih Item --"}));
    // Object.values(data).forEach((d) => {
    //   UsahaModal.id_item_usaha.append($('<input name="check_lisk[]" type="checkbox">', {
    //     value: d['id_jenis_usaha'],}),
    //   $("<label width=100px >  "+d['nama_item_usaha']+"  ::</label>"),
    //    );

    Object.values(data).forEach((d) => {
      UsahaModal.id_item_usaha.append($('<option>', {
        value: d['id_item_usaha'],
        text: d['id_item_usaha'] + ' :: ' + d['nama_item_usaha'],
      }));
    });
    }
  
    document.getElementById("export_btn").href = '<?= site_url('AdminController/PdfAllUsaha')?>';

  function getUsaha(){
    buttonLoading(toolbar.showBtn);
    $.ajax({
      url: `<?=site_url('UsahaController/getAllUsaha')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        buttonIdle(toolbar.showBtn);
        var json = JSON.parse(data);
        if(json['error']){
          swal("Simpan Gagal", json['message'], "error");
          return;
        }
        dataUsaha = json['data'];
        renderUsaha(dataUsaha);
      },
      error: function(e) {}
    });
  }

  function renderUsaha(data){
    if(data == null || typeof data != "object"){
      console.log("User::UNKNOWN DATA");
      return;
    }
    var i = 0;
    
    var renderData = [];
    Object.values(data).forEach((usaha) => {
      var apprv;
      if(usaha['id_user_approv']=='0'){
        apprv= "Belum Di Approv"
        }else{
          apprv = "Sudah Di Approv";
        };
      var detailButton =`
      <a class="detail dropdown-item" href='<?=site_url()?>AdminController/DetailUsaha?id_usaha=${usaha['id_usaha']}'><i class='fa fa-share'></i> Detail Usaha</a>
      `; 
      var editButton = `
        <a class="edit dropdown-item" data-id='${usaha['id_usaha']}'><i class='fa fa-pencil'></i> Edit Usaha</a>
      `;
      var deleteButton = `
        <a class="delete dropdown-item" data-id='${usaha['id_usaha']}'><i class='fa fa-trash'></i> Hapus Usaha</a>
      `;
      var button = `
        <div class="btn-group" role="group">
          <button id="action" type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class='fa fa-bars'></i></button>
          <div class="dropdown-menu" aria-labelledby="action">
            ${detailButton}

          </div>
        </div>
      `;
      renderData.push([usaha['nama'],usaha['nama_jenis_usaha'],usaha['nama_kabupaten'],usaha['tahun_terdata'],apprv, button]);
    });
    FDataTable.clear().rows.add(renderData).draw('full-hold');
  }

  
  FDataTable.on('click','.edit', function(){
    event.preventDefault();
    UsahaModal.form.trigger('reset');
    UsahaModal.self.modal('show');
    UsahaModal.addBtn.hide();
    UsahaModal.saveEditBtn.show();
    var id = $(this).data('id');
    var usaha = dataUsaha[id];
    UsahaModal.id_usaha.val(usaha['id_usaha']);
    UsahaModal.nama.val(usaha['nama']);
    UsahaModal.id_jenis_usaha.val(usaha['id_jenis_usaha']);
    UsahaModal.id_item_usaha.val(usaha['id_item_usaha']);
    UsahaModal.alamat.val(usaha['alamat']);
    UsahaModal.lokasi.val(usaha['lokasi']);
    UsahaModal.deskripsi.val(usaha['deskripsi']);
    UsahaModal.kabupaten.val(usaha['id_kabupaten']);
  });

  FDataTable.on('click','.delete', function(){
    event.preventDefault();
    var id = $(this).data('id');
    swal(swalDeleteConfigure).then((result) => {
      if(!result.value){ return; }
      $.ajax({
        url: "<?=site_url('UsahaController/deleteUsaha')?>", 'type': 'POST',
        data: {'id_usaha': id},
        success: function (data){
          var json = JSON.parse(data);
          if(json['error']){
            swal("Delete Gagal", json['message'], "error");
            return;
          }
          delete dataUsaha[id];
          swal("Delete Berhasil", "", "success");
          renderUsaha(dataUsaha);
        },
        error: function(e) {}
      });
    });
  });

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
    UsahaModal.kabupaten.empty();
    UsahaModal.kabupaten.append($('<option>', { value: "", text: "-- Pilih Kabupaten --"}));
    Object.values(data).forEach((d) => {
      UsahaModal.kabupaten.append($('<option>', {
        value: d['id_kabupaten'],
        text: d['id_kabupaten'] + ' :: ' + d['nama_kabupaten'],
      }));
    });
  }
  function showUsahaModal(){
    UsahaModal.self.modal('show');
    UsahaModal.addBtn.show();
    UsahaModal.saveEditBtn.hide();
    UsahaModal.form.trigger('reset');
  }

  UsahaModal.form.submit(function(event){
    event.preventDefault();
    switch(UsahaModal.form[0].target){
      case 'add':
        addUsaha();
        break;
      case 'edit':
        editUsaha();
        break;
    }
  });

  function addUsaha(){
    swal(swalSaveConfigure).then((result) => {
      if(!result.value){ return; }
      buttonLoading(UsahaModal.addBtn);
      $.ajax({
        url: `<?=site_url('UsahaController/addUsaha')?>`, 'type': 'POST',
        data: UsahaModal.form.serialize(),
        success: function (data){
          buttonIdle(UsahaModal.addBtn);
          var json = JSON.parse(data);
          if(json['error']){
            swal("Simpan Gagal", json['message'], "error");
            return;
          }
          var usaha = json['data']
          dataUsaha[usaha['id_usaha']] = usaha;
          swal("Simpan Berhasil", "", "success");
          renderUsaha(dataUsaha);
          UsahaModal.self.modal('hide');
        },
        error: function(e) {}
      });
    });
  }

  
  function editUsaha(){
    swal(swalSaveConfigure).then((result) => {
      if(!result.value){ return; }
      buttonLoading(UsahaModal.saveEditBtn);
      $.ajax({
        url: `<?=site_url('UsahaController/editUsaha')?>`, 'type': 'POST',
        data: UsahaModal.form.serialize(),
        success: function (data){
          buttonIdle(UsahaModal.saveEditBtn);
          var json = JSON.parse(data);
          if(json['error']){
            swal("Simpan Gagal", json['message'], "error");
            return;
          }
          var usaha = json['data']
          dataUsaha[usaha['id_usaha']] = usaha;
          swal("Simpan Berhasil", "", "success");
          renderUsaha(dataUsaha);
          UsahaModal.self.modal('hide');
        },
        error: function(e) {}
      });
    });
  }
});
</script>