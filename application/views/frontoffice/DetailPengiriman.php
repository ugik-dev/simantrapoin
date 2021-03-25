<div id="content-page" class="content-page">
  <div class="container">
    <!-- <iframe src='https://view.officeapps.live.com/op/embed.aspx?src=https://ugik-dev.com/covid19/uploads/photo/doc_tes.docx' width='1366px' height='623px' frameborder='0'>This is an embedded <a target='_blank' href='http://office.com'>Microsoft Office</a> document, powered by <a target='_blank' href='http://office.com/webapps'>Office Online</a>.</iframe> -->
    <div class="col-lg-12" id='layout_pengiriman'>
      <div class="iq-card">

        <!-- <div class="iq-card-header d-flex justify-content-between"> -->
        <!-- <div class="iq-header-title">
            <h4 class="card-title">Basic</h4> -->
        <!-- </div>
        </div> -->
        <!-- <div class="ibox">
           -->

        <br>
        <div class="ibox-content">
          <div id="profil">
            <div class="iq-card-body">
              <ul class="nav nav-tabs" id="myTab-three" role="tablist">
                <li class="nav-item">
                  <a class="nav-link" id="disposisi-tab" data-toggle="tab" href="#tab-disposisi" role="tab" aria-controls="disposisi" aria-selected="false">Disposisi</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab-three" data-toggle="tab" href="#home-three" role="tab" aria-controls="home" aria-selected="false">Info</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab-three" data-toggle="tab" href="#profile-three" role="tab" aria-controls="profile" aria-selected="false">Dokumen</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="contact-tab-three" data-toggle="tab" href="#contact-three" role="tab" aria-controls="contact" aria-selected="true">Persyaratan Teknis</a>
                </li>
              </ul>

              <div class="tab-content" id="myTabContent-4">
                <!-- TAB Disposisi -->
                <div class="tab-pane fade active show" id="tab-disposisi" role="tabpanel" aria-labelledby="profile-tab-three">
                  <div class="table-responsive">
                    <table id="FDataTable" class="table table-bordered table-hover" style="padding:0px">
                      <thead>
                        <tr>

                          <th style="width: 10%; text-align:center!important">Tanggal</th>
                          <th style="width: 10%; text-align:center!important">Nama</th>
                          <th style="width: 12%; text-align:center!important">Jabatan</th>
                          <th style="width: 15%; text-align:center!important">Catatan</th>
                          <th style="width: 5%; text-align:center!important">Status</th>
                        </tr>
                      </thead>
                      <tbody></tbody>
                    </table>
                  </div>
                </div>
                <!-- END TAB Disposisi -->

                <!-- TABS 1 -->
                <div class="tab-pane fade" id="home-three" role="tabpanel" aria-labelledby="home-tab-three">
                  <form>
                    <!-- <div class="row"> -->
                    <div class="col-lg-6">
                      <label for="formGroupExampleInput">Tanggal Terdata</label>
                      <h4 id='created_at'> </h4>
                      <hr>
                      <!-- </div> -->
                    </div>
                    <div class="row iq-card-body">
                      <div class="form-group col-sm-6">
                        <label for="nama">Nama :</label>
                        <h4 id='nama'> </h4>
                        <hr>
                      </div>
                      <div class="form-group col-sm-6">
                        <label for="nama_badan">Nama Badan :</label>
                        <h4 id='nama_badan'> </h4>
                        <hr>
                      </div>
                    </div>

                    <div class="row iq-card-body">
                      <div class="form-group col-sm-6">
                        <label for="formGroupExampleInput">Perizinan</label>
                        <h4 id='tujuan'> </h4>
                        <hr>
                      </div>
                      <div class="form-group col-sm-6">
                        <label for="nib">NIB :</label>
                        <h4 id='nib'> </h4>
                        <hr>
                      </div>
                    </div>


                    <div class="row iq-card-body">
                      <div class="form-group col-sm-6">
                        <label for="formGroupExampleInput">Alamat</label>

                        <h4 id='alamat'></h4>
                        <hr>
                      </div>

                      <div class="form-group  col-sm-6">
                        <label for="formGroupExampleInput">Deskripsi</label>
                        <h4 id='deskripsi'></h4>
                        <hr>

                      </div>
                    </div>
                    <div class="form-group iq-card-body">
                      <label for="status_proposal">Status :</label>
                      <h4 id='status_proposal'> </h4>
                      <hr>

                    </div>

                  </form>
                </div>
                <!-- END TABS 1 -->
                <!-- TABS 2 -->
                <div class="tab-pane fade" id="profile-three" role="tabpanel" aria-labelledby="profile-tab-three">
                  <div class="row">
                    <div id="ktp"></div>
                    <div id="npwp"></div>
                  </div>
                  <div id="nib_file"></div>
                  <div id="file_pendukung"></div>
                </div>
                <!-- END TABS 2 -->
                <!-- END TABS 3 -->
                <div class="tab-pane fade " id="contact-three" role="tabpanel" aria-labelledby="contact-tab-three">
                  <div class="row" id="dok_service"></div>
                </div>
                <!-- END TABS 3 -->

              </div>
            </div>
            <div class="iq-card-body">
              <?php $this->load->view('action/' . $this->session->userdata('nama_role')) ?>

              <button class="btn btn-warning my-1 mr-sm-2" type="submit" id="de_approv_btn" data-loading-text="Loading..."><strong>Batalkan Aksi</strong></button>
              <!-- <button class="btn btn-danger my-1 mr-sm-2" type="submit" id="not_approv_btn" data-loading-text="Loading..."><strong>Tolak</strong></button> -->
              <!-- <div id='btn_word'> -->
            </div>
          </div>
        </div>
      </div>
      <!-- </div>
  </div> -->


      <div class="col-lg-12">
        <div class="ibox">
          <div class="ibox-content">

          </div>
        </div>
        <div id="dok_permohonan"></div>

      </div>

    </div>
  </div>
</div>
<!-- </div> -->

<!-- modal STEP1 -->
<!-- 
<div class="modal fade step1-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->

<!-- End Step1 -->
<div class="modal inmodal" id="tolak_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" id='close2'><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Tolak Pengiriman</h4>
        <span class="info"></span>
      </div>
      <div class="modal-body" id="modal-body">
        <form role="form" id="tolak_form" onsubmit="return false;" type="multipart" autocomplete="off">
          <input type="hidden" id="id_pengiriman" name="id_pengiriman">
          <div class="form-group">
            <label for="catatan">Catatan</label>
            <textarea rows="3" type="text" placeholder="Catatan" class="form-control" id="catatan" name="catatan"></textarea>
          </div>

          <button class="btn btn-danger my-1 mr-sm-2" type="submit" id="add_btn" data-loading-text="Loading..."><strong>Tolak</strong></button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white" data-dismiss="modal" id='close1'>Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal inmodal" id="acc_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" id='close2'><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Form Persetujuan</h4>
        <span class="info"></span>
      </div>
      <div class="modal-body" id="modal-body">
        <form role="form" id="penomoran_form" onsubmit="return false;" type="multipart" autocomplete="off">
          <input type="hidden" id="id_pengiriman" name="id_pengiriman">
          <div class="form-group">
            <label for="catatan_23">Catatan</label>
            <textarea rows="3" type="text" placeholder="Catatan" class="form-control" id="catatan_23" name="catatan_23"></textarea>
          </div>
          <button class="btn btn-info my-1 mr-sm-2" type="submit" id="add_btn" data-loading-text="Loading..."><strong>Approv</strong></button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white" data-dismiss="modal" id='close1'>Close</button>
      </div>
    </div>
  </div>
</div>


<div class="modal inmodal" id="survey_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" id='close2'><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Survey Form</h4>
        <span class="info"></span>
      </div>
      <div class="modal-body" id="modal-body">
        <form role="form" id="survey_form" onsubmit="return false;" type="multipart" autocomplete="off">
          <input type="hidden" id="id_pengiriman" name="id_pengiriman">
          <div class="form-group">
            <select class="form-control mr-sm-2" id="survey_fm" name="survey" required="required">
              <option class="form-control mr-sm-2" value="">-- Pilih Tindkan --</option>
              <option class="form-control mr-sm-2" value="ya">Survey</option>
              <option class="form-control mr-sm-2" value="tidak">Tidak Survey</option>
            </select>
          </div>
          <div class="form-group">
            <label for="catatan_1">Catatan</label>
            <textarea rows="3" type="text" placeholder="Catatan" class="form-control" id="catatan_1" name="catatan_1"></textarea>
          </div>
          <button class="btn btn-info my-1 mr-sm-2" type="submit" id="add_btn" data-loading-text="Loading..."><strong>Approv</strong></button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white" data-dismiss="modal" id='close1'>Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal inmodal" id="penomoran_modal2" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" id='close2'><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Form Penomoran</h4>
        <span class="info"></span>
      </div>
      <div class="modal-body" id="modal-body">
        <form role="form" id="last_acc_form" onsubmit="return false;" type="multipart" autocomplete="off">
          <input type="hidden" id="id_pengiriman" name="id_pengiriman">
          <div class="form-group">
            <label for="output_no_dokumen">Nomor</label>
            <input type="text" placeholder="Nomor" class="form-control" id="output_no_dokumen" name="output_no_dokumen">
          </div>
          <div class="form-group">
            <label for="catatan_4">Catatan</label>
            <textarea rows="3" type="text" placeholder="Catatan" class="form-control" id="catatan_4" name="catatan_4"></textarea>
          </div>

          <button class="btn btn-info my-1 mr-sm-2" type="submit" id="add_btn" data-loading-text="Loading..."><strong>Selesai</strong></button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white" data-dismiss="modal" id='close1'>Close</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade modal_files" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id='title_file_modal'></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id='freame_file_modal'>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>


<script>
  $(document).ready(function() {
    // $('#cagar_dan_budaya').addClass('active');
    // $('#cagarbudaya').addClass('active');
    var id_pengiriman = "<?= $contentData['id_pengiriman'] ?>";
    var n_role = "<?= $this->session->userdata()['nama_role'] ?>";
    var tabThree = $('#contact-tab-three');
    var approv_btn = $('#approv_btn');
    var de_approv_btn = $('#de_approv_btn');
    var not_approv_btn = $('#not_approv_btn');
    var title_file_modal = $('#title_file_modal');
    var freame_file_modal = $('#freame_file_modal');
    var f_pdf = $('#dok_permohonan');
    approv_btn.hide();
    de_approv_btn.hide();
    not_approv_btn.hide();
    var dataProfil = [];
    var dataSurvey;
    var dataTahun;
    var valTabs3 = false;

    var Layout = {
      // 'nama': $('#layout_pengiriman').find('#user_form'),
      'id_pengiriman': $('#layout_pengiriman').find('#id_pengiriman'),
      'nama': $('#layout_pengiriman').find('#nama'),
      'no_dokumen': $('#layout_pengiriman').find('#no_dokumen'),
      'alamat': $('#layout_pengiriman').find('#alamat'),
      'nama_badan': $('#layout_pengiriman').find('#nama_badan'),
      'tujuan': $('#layout_pengiriman').find('#tujuan'),
      'survey': $('#layout_pengiriman').find('#survey'),
      'nib': $('#layout_pengiriman').find('#nib'),
      'nib_file': $('#layout_pengiriman').find('#nib_file'),
      'file_pendukung': $('#layout_pengiriman').find('#file_pendukung'),
      'ktp': $('#layout_pengiriman').find('#ktp'),
      'npwp': $('#layout_pengiriman').find('#npwp'),
      'dok_service': $('#layout_pengiriman').find('#dok_service'),

      'deskripsi': $('#layout_pengiriman').find('#deskripsi'),
      'status_proposal': $('#layout_pengiriman').find('#status_proposal'),
      'created_at': $('#layout_pengiriman').find('#created_at'),
      'btn_word': $('#layout_pengiriman').find('#btn_word'),


    }

    var TolakModal = {
      'self': $('#tolak_modal'),
      'info': $('#tolak_modal').find('.info'),
      'form': $('#tolak_modal').find('#tolak_form'),
      'addBtn': $('#tolak_modal').find('#add_btn'),
      'catatan': $('#tolak_modal').find('#catatan'),
      'output_no_dokumen': $('#tolak_modal').find('#output_no_dokumen'),
      'close2': $('#tolak_modal').find('#close2'),
      'close1': $('#tolak_modal').find('#close1'),
      'id_pengiriman': $('#tolak_modal').find('#id_pengiriman'),
    }
    TolakModal.close1.on('click', function() {
      TolakModal.self.hide();
    })

    TolakModal.close2.on('click', function() {
      TolakModal.self.hide();
    })

    var AccModal = {
      'self': $('#acc_modal'),
      'info': $('#acc_modal').find('.info'),
      'form': $('#acc_modal').find('#penomoran_form'),
      'addBtn': $('#acc_modal').find('#add_btn'),
      'catatan': $('#acc_modal').find('#catatan'),
      // 'output_no_dokumen': $('#acc_modal').find('#output_no_dokumen'),
      'close2': $('#acc_modal').find('#close2'),
      'close1': $('#acc_modal').find('#close1'),
      'id_pengiriman': $('#acc_modal').find('#id_pengiriman'),
    }
    AccModal.close1.on('click', function() {
      AccModal.self.hide();
    })

    AccModal.close2.on('click', function() {
      AccModal.self.hide();
    })


    var SurveyModal = {
      'self': $('#survey_modal'),
      'info': $('#survey_modal').find('.info'),
      'form': $('#survey_modal').find('#survey_form'),
      'addBtn': $('#survey_modal').find('#add_btn'),
      'survey_fm': $('#survey_modal').find('#survey_fm'),
      'close2': $('#survey_modal').find('#close2'),
      'close1': $('#survey_modal').find('#close1'),
      'id_pengiriman': $('#survey_modal').find('#id_pengiriman'),
    }
    SurveyModal.close1.on('click', function() {
      SurveyModal.self.hide();
    })

    SurveyModal.close2.on('click', function() {
      SurveyModal.self.hide();
    })


    var PenomoranModal = {
      'self': $('#penomoran_modal2'),
      'info': $('#penomoran_modal2').find('.info'),
      'form': $('#penomoran_modal2').find('#last_acc_form'),
      'addBtn': $('#penomoran_modal2').find('#add_btn'),
      'output_no_dokumen': $('#penomoran_modal2').find('#output_no_dokumen'),
      'close2': $('#penomoran_modal2').find('#close2'),
      'close1': $('#penomoran_modal2').find('#close1'),
      'id_pengiriman': $('#penomoran_modal2').find('#id_pengiriman'),
    }
    PenomoranModal.close1.on('click', function() {
      PenomoranModal.self.hide();
    })

    PenomoranModal.close2.on('click', function() {
      PenomoranModal.self.hide();
    })
    approv_btn.on('click', function() {
      if (n_role == 'kasi_umum') {
        SurveyModal.self.show();
        SurveyModal.id_pengiriman.val(id_pengiriman);

        return;
      }
      if (n_role == 'kasi_usaha') {
        SurveyModal.self.show();
        SurveyModal.id_pengiriman.val(id_pengiriman);
        return;
      }

      if (n_role == 'kabid' || n_role == 'kasi_survey') {
        AccModal.self.show();
        AccModal.id_pengiriman.val(id_pengiriman);
        return;
      }



      <?php if (!empty($this->session->userdata()['level']) && $this->session->userdata()['level'] == '4') {
      ?>
        PenomoranModal.self.show();
        PenomoranModal.id_pengiriman.val(id_pengiriman);
      <?php   } else  if ($this->session->userdata()['nama_role'] == 'frontoffice') {  ?>

        swal(swalKirimConfigure).then((result) => {
          if (!result.value) {
            return;
          }
          $.ajax({
            url: `<?= site_url('PengirimanController/approv') ?>`,
            'type': 'get',
            data: {
              id_pengiriman: id_pengiriman
            },
            success: function(data) {
              getProfil();
            },
            error: function(e) {}
          });
        });
      <?php   } else {  ?>

        AccModal.self.show();
        AccModal.id_pengiriman.val(id_pengiriman);
      <?php
      }  ?>
    })

    not_approv_btn.on('click', function() {
      TolakModal.self.show();
      TolakModal.id_pengiriman.val(id_pengiriman);
      TolakModal.catatan.val(dataProfil['catatan']);
      // TolakModal.output_no_dokumen.val(dataProfil['output_no_dokumen']);
    })

    TolakModal.form.on('submit', function() {
      swal(swalNotApprovConfigure).then((result) => {
        if (!result.value) {
          return;
        }
        $.ajax({
          url: `<?= site_url('PengirimanController/not_approv') ?>`,
          'type': 'post',
          data: TolakModal.form.serialize(),
          success: function(data) {
            getProfil();
            TolakModal.self.hide();
          },
          error: function(e) {}
        });
      })

    })

    PenomoranModal.form.on('submit', function() {
      swal(swalApprovConfigure).then((result) => {
        if (!result.value) {
          return;
        }
        $.ajax({
          url: `<?= site_url('PengirimanController/approv') ?>`,
          'type': 'post',
          data: PenomoranModal.form.serialize(),
          success: function(data) {
            getProfil();
            PenomoranModal.self.hide();
          },
          error: function(e) {}
        });
      })
    })

    AccModal.form.on('submit', function() {
      swal(swalApprovConfigure).then((result) => {
        if (!result.value) {
          return;
        }
        $.ajax({
          url: `<?= site_url('PengirimanController/approv') ?>`,
          'type': 'post',
          data: AccModal.form.serialize(),
          success: function(data) {
            getProfil();
            AccModal.self.hide();
          },
          error: function(e) {}
        });
      })
    })

    SurveyModal.form.on('submit', function() {
      swal(swalApprovConfigure).then((result) => {
        if (!result.value) {
          return;
        }
        $.ajax({
          url: `<?= site_url('PengirimanController/approv') ?>`,
          'type': 'post',
          data: SurveyModal.form.serialize(),
          success: function(data) {
            getProfil();
            SurveyModal.self.hide();
          },
          error: function(e) {}
        });
      })

    })

    var FDataTable = $('#FDataTable').DataTable({
      'columnDefs': [],
      deferRender: true,
      'paging': false,
      'searching': false,
      'ordering': false
    });

    de_approv_btn.on('click', function() {
      swal(swalDeApprovConfigure).then((result) => {
        if (!result.value) {
          return;
        }
        $.ajax({
          url: `<?= site_url('PengirimanController/de_approv') ?>`,
          'type': 'get',
          data: {
            id_pengiriman: id_pengiriman
          },
          success: function(data) {
            getProfil();
          },
          error: function(e) {}
        });
      });
    })

    function statusPermohonan(status) {
      if (status == 'DRAFT')
        return `<i class='fa fa-edit text-warning'> Draft</i>`;
      else if (status == 'DIPROSES')
        return `<i class='fa fa-hourglass-start text-primary'> Diproses</i>`;
      else if (status == 'DITERIMA')
        return `<i class='fa fa-check text-success'> Diterima</i>`;
      return `<i class='fa fa-times text-danger'> Ditolak</i>`;
    }

    function statusSelf(status, labels = '') {
      if (status == '1')
        return `<i class='fa fa-edit text-warning'> Diterima</i>`;
      else if (status == '2')
        return `<i class='fa fa-check text-success'> Approv</i>`;
      else if (status == '3')
        return `<i class='fa fa-hourglass-start text-primary'> Menunggu Aksi</i>`;
      else if (status == '4')
        return `<i class='fa fa-hourglass-start text-primary'> Menunggu</i>`;
      else if (status == '5')
        return `<i class='fa fa-times text-danger'> Ditolak </i>`;
      else if (status == '6')
        return `<i class='fa fa-check text-success'> Selesai </i>`;
      else if (status == '7')
        return `<i class='fa fa-check text-success'> Dikirim </i>`;
      else if (status == '8')
        return `<i class='fa fa-check text-success'> Penjadwalan </i>`;
      else if (status == '9')
        return `<i class='fa fa-hourglass text-primary'> Survey </i>`;
      else if (status == 'ok')
        return `<i class='fa fa-check text-success'> ${labels} </i>`;
      else if (status == 'wait')
        return `<i class='fa fa-hourglass-start text-primary'> ${labels} </i>`;
      else if (status == 'x')
        return `<i class='fa fa-times text-danger'> ${labels} </i>`;
    }

    var swalKirimConfigure = {
      title: "Konfirmasi Kirim",
      text: "Yakin akan Kirim data ini?",
      type: "info",
      showCancelButton: true,
      confirmButtonColor: "#18a689",
      confirmButtonText: "Ya, Kirim!",
    };
    var swalApprovConfigure = {
      title: "Konfirmasi Approv",
      text: "Yakin akan Approv data ini?",
      type: "info",
      showCancelButton: true,
      confirmButtonColor: "#18a689",
      confirmButtonText: "Ya, Approv!",
    };
    var swalDeApprovConfigure = {
      title: "Konfirmasi Batal Approv",
      text: "Yakin akan Batal Approv data ini?",
      type: "info",
      showCancelButton: true,
      confirmButtonColor: "#18a689",
      confirmButtonText: "Ya, Batalkan!",
    };
    var swalNotApprovConfigure = {
      title: "Konfirmasi Tolak",
      text: "Yakin akan Tolak Approv data ini?",
      type: "info",
      showCancelButton: true,
      confirmButtonColor: "red",
      confirmButtonText: "Ya, Tolak!",
    };
    var swalSaveConfigure = {
      title: "Konfirmasi simpan",
      text: "Yakin akan menyimpan data ini?",
      type: "info",
      showCancelButton: true,
      confirmButtonColor: "#18a689",
      confirmButtonText: "Ya, Simpan!",
    };
    var swalSaveConfigure2 = {
      title: "Konfirmasi Approv",
      text: "Yakin Approv data ini?",
      type: "info",
      showCancelButton: true,
      confirmButtonColor: "#18a689",
      confirmButtonText: "Ya, Approv!",
    };
    var swalNotApprov = {
      title: "Konfirmasi simpan",
      text: "Yakin akan menyimpan data ini?",
      type: "info",
      showCancelButton: true,
      confirmButtonColor: "#red",
      confirmButtonText: "Ya, Simpan!",
    };


    // function renderpdf(file) {
    //   ht = `<div class="ibox">
    //       <div class="ibox-content">
    //         <div>
    //           <iframe id="iframepdf" width="100%" height="400px" src="<?= base_url() ?>/upload/dokumen_permohonan/${file}"></iframe>
    //         </div>

    //       </div>
    //     </div>`;
    //   f_pdf.html(ht);
    // }

    // function renderpdf2(label, dir, filename) {
    //   return ` <div class="iq-card col-lg-6">
    //               <div class="iq-card-header d-flex justify-content-between">
    //                   <div class="iq-header-title">
    //                       <h4 class="card-title">${label}</h4>
    //                   </div>
    //                 </div>
    //                 <div class="iq-card-body">
    //                   <iframe id="iframepdf" width="100%" height="400px" src="<?= base_url() ?>upload/${dir}/${filename}"></iframe>
    //               </div>
    //             </div>
    //       `;
    // }



    function renderImg(label, dir, filename) {
      return ` <div class="iq-card" col-lg-6>
            <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
            <h4 class="card-title"> ${label}</h4>
             </div> </div> <div class="iq-card-body">
            <img src="<?= base_url() ?>upload/${dir}/${filename}" class="img-fluid" alt="Responsive image">
            </div> </div> `
    }

    tabThree.on('click', (ev) => {
      if (valTabs3 == false) {
        $.ajax({
          url: `<?= site_url('Service/getServiceCategory') ?>`,
          'type': 'GET',
          data: {
            id_service: dataProfil['id_service']
          },
          success: function(data) {
            json = JSON.parse(data);

            if (json['error']) {
              swal("Gagal", json['message'], "error");
              return;
            } else {
              service = json['data'];
              renderTabThree(service);
            }
          }
        })
      }
    })

    function renderTabThree(service) {
      $.ajax({
        url: `<?= site_url('Service/service_') ?>${dataProfil['id_service']}`,
        'type': 'GET',
        data: {
          id_sub_service: dataProfil['id_sub_service']
        },
        success: function(data) {
          json = JSON.parse(data);
          if (json['error']) {
            swal("Gagal", json['message'], "error");
            return;
          } else {
            my_service = json['data'][0];
            valTabs3 = true;
            console.log(my_service)
            Object.values(service).forEach((d) => {
              if (my_service[d['direktori']]) {
                Layout.dok_service.append(render_files(d['label'], `<?= base_url('upload/') ?>${d['direktori']}`, my_service[d['direktori']], my_service[d['direktori']].split('.').pop(), 'col-lg-6'))
              }

            })
          }
        }
      })
    }

    getProfil();

    function getProfil() {
      $.ajax({
        url: `
          <?= site_url('PengirimanController/getAllPengiriman') ?> `,
        'type': 'POST',
        data: {
          id_pengiriman: id_pengiriman
        },
        success: function(data) {
          var json = JSON.parse(data);
          dataProfil = json['data'][id_pengiriman];
          if (n_role == 'kabid') {
            if (dataProfil['act_2'] != '0') {
              if (dataProfil['survey'] == 'ya') {
                document.getElementById("kabid_act_survey").innerHTML = "Melalui Survey (Rekomendasi Kasi)";
                document.getElementById("kabid_act_survey").selected = "select";
              } else {
                document.getElementById("kabid_act_xsurvey").selected = "select";
                document.getElementById("kabid_act_xsurvey").innerHTML = "Tanpa Survey (Rekomendasi Kasi)";
              }
            }
          }
          if (dataProfil['role_sending'] != '99') {
            // console.log('dumy')
            $.when(getDataDumy()).done(function(a1) {
              if (dataProfil['id_tahap_proposal'] >= '4' && dataProfil['survey'] == 'ya') {
                $.when(getTimSurveyDetail()).done(function(a1) {
                  renderProfile()
                })
              } else {
                renderProfile()

              }
            })
          } else {
            if (dataProfil['id_tahap_proposal'] >= '4' && dataProfil['survey'] == 'ya') {
              $.when(getTimSurveyDetail()).done(function(a1) {
                renderProfile()
              })
            } else {
              renderProfile()

            }
          }


        },
        error: function(e) {}
      });
    }

    function renderProfile() {
      // Layout.nama.html(dataProfil['nama'])
      Layout.no_dokumen.html(dataProfil['no_dokumen'])
      Layout.alamat.html(dataProfil['alamat_user'] ? dataProfil['alamat_user'] : dataProfil['alamat'])
      Layout.deskripsi.html(dataProfil['deskripsi'].replace('\n', ' <br> '))
      Layout.nama.html(dataProfil['nama'])
      Layout.nama_badan.html(dataProfil['nama_badan'])
      Layout.nib.html(dataProfil['nib'])
      Layout.tujuan.html(dataProfil['tujuan'] == 'usaha' ? "Perizinan Usaha" : "Perizinan Umum")
      Layout.status_proposal.html(statusPermohonan(dataProfil['status_proposal']))
      dwn = ` < a type = ""
          class = "btn btn-light my-1 mr-sm-2"
          id = "export_btn"
          href = "<?= site_url() ?>PengirimanController/word?id_pengiriman=${id_pengiriman}"
          data - loading - text = "Loading..." > < i class = "fal fa-download" > < /i> Download Docx</a >
            `;
      Layout.btn_word.html(dwn)
      $.get(`<?= base_url('upload/') ?>accept_npwp/${dataProfil['npwp']}`)
        .done(function() {
          Layout.npwp.html(render_files('NPWP', '<?= base_url('upload/') ?>accept_npwp', dataProfil['npwp'], dataProfil['npwp'].split('.').pop()))
        })

      $.get(`<?= base_url('upload/') ?>accept_ktp/${dataProfil['ktp']}`)
        .done(function() {
          Layout.ktp.html(render_files('KTP', '<?= base_url('upload/') ?>accept_ktp', dataProfil['ktp'], dataProfil['ktp'].split('.').pop()))
        })
      $.get(`<?= base_url('upload/') ?>nib_file/${dataProfil['nib_file']}`)
        .done(function() {
          Layout.nib_file.html(render_files('NIB', '<?= base_url('upload/') ?>nib_file', dataProfil['nib_file'], dataProfil['nib_file'].split('.').pop(), 'col-lg-6'))
        })
      $.get(`<?= base_url('upload/') ?>file_pendukung/${dataProfil['file_pendukung']}`)
        .done(function() {
          Layout.file_pendukung.html(render_files('File Pendukung', '<?= base_url('upload/') ?>file_pendukung', dataProfil['file_pendukung'], dataProfil['file_pendukung'].split('.').pop(), 'col-lg-6'))
        })

      Layout.created_at.html(renderDate2(dataProfil['created_at']) + ' <br>Oleh : ' + dataProfil['nama_sending'])

      dataProfil['output_no_dokumen'] ? Layout.status_proposal.append("<br>No Dokumen: " + dataProfil['output_no_dokumen']) : '';

      if (typeof dataProfil['dokumen_permohonan'] === 'undefined' || dataProfil['dokumen_permohonan'] === null || dataProfil['dokumen_permohonan'] === '') {} else {
        renderpdf(dataProfil['dokumen_permohonan']);
      }

      renderData = renderUserApprov();
      console.log('renderData')
      FDataTable.clear().rows.add(renderData).draw('full-hold');



      approv_btn.hide();
      de_approv_btn.hide();
      not_approv_btn.hide();
      console.log(n_role)
      if (n_role == 'admin') {
        approv_btn.hide();
        de_approv_btn.hide();
      } else if (n_role == 'kasi_usaha' || n_role == 'kasi_umum') {
        if (dataProfil['id_tahap_proposal'] == '1') {
          if (dataProfil['status_proposal'] == 'DIPROSES') {
            approv_btn.show();
            not_approv_btn.show();
          }
        }
        return;
      } else if (n_role == 'kabid') {
        if (dataProfil['id_tahap_proposal'] == '2') {
          if (dataProfil['status_proposal'] == 'DIPROSES') {
            approv_btn.show();
            not_approv_btn.show();
          }
        }
        return;
      } else if (n_role == 'kasi_survey') {
        if (dataProfil['id_tahap_proposal'] == '3') {
          if (dataProfil['status_proposal'] == 'DIPROSES') {

            approv_btn.show();
            not_approv_btn.show();
          }
        }
        return;
      } else if (n_role == 'kadin') {
        if (dataProfil['id_tahap_proposal'] == '6') {
          if (dataProfil['status_proposal'] == 'DIPROSES') {
            approv_btn.show();
            not_approv_btn.show();
          }
          if (dataProfil['status_proposal'] == 'DITOLAK') {
            approv_btn.show();
            // not_approv_btn.show();
          }
        }
        return;
      } else if (n_role == 'frontoffice') {
        if (dataProfil['status_proposal'] == 'DRAFT') {
          approv_btn.show();
          de_approv_btn.hide();
        }
        if (dataProfil['id_tahap_proposal'] == '1') {
          // console.log(dataProfil['id_tahap_proposal'])
          approv_btn.hide();
          de_approv_btn.show();
        }
        if (dataProfil['id_tahap_proposal'] > '1') {}
        return;
      } else if (n_role == 'backoffice') {
        your_level = "<?= $this->session->userdata()['level'] ?>";
        if (dataProfil['id_tahap_proposal'] == your_level) {
          approv_btn.show();
          // not_approv_btn.show();
          de_approv_btn.hide();

          if (dataProfil['status_proposal'] == 'DITOLAK') {
            //               approv_btn.hide();
            // not_approv_btn.hide();
            // de_approv_btn.hide();
          }
        }
      };

    }

    function renderUserApprov() {
      data = dataProfil;
      var i = 0;
      var renderData = [];
      if (data['id_role'] == '99') {
        console.log(data)
        renderData.push([renderDate(data['created_at']), data['nama_sending'], 'Customer', '', statusSelf(7)]);
        // renderData.push([renderDate(data['date_sending']), data['nama_sending'], 'Front Office', data['catatan_fo'], statusSelf(1)]);
      }
      if (data['status_proposal'] == 'DIPROSES' || data['status_proposal'] == 'DITERIMA') {

        if (data['id_tahap_proposal'] == '0') {
          renderData.push(['-', '-', 'Front Office', '-', statusSelf(3)]);
          return renderData;
        } else {
          if (n_role == 'frontoffice') {
            document.getElementById('btn_act').style.visibility = 'hidden';
          }
          renderData.push([renderDate(data['date_acc_1']), data['nama_acc_1'], 'Front Office', data['catatan_1'], statusSelf(6)]);
        }

        if (data['id_tahap_proposal'] == '1') {
          renderData.push(['-', '-', data['tujuan'] == 'usaha' ? 'Kasi Usaha' : 'Kasi Umum', '-', statusSelf(3)]);
          if (n_role == 'kasi_umum' || n_role == "kasi_usaha") {
            document.getElementById('btn_act').style.display = 'block';
          }
          return renderData;
        } else {
          renderData.push([renderDate(data['date_acc_2']), data['nama_acc_2'], data['tujuan'] == 'usaha' ? 'Kasi Usaha' : 'Kasi Umum', (data['survey'] == 'ya' ? 'Melalui Tahap Survey <br>' : 'Tanpa Survey <br>') + data['catatan_2'], statusSelf(6)]);
        }


        if (data['id_tahap_proposal'] == '2') {
          renderData.push(['-', '-', 'Kabid', '-', statusSelf(3)]);
          if (n_role == 'kabid') {
            document.getElementById('btn_act').style.display = 'block';
          }
          return renderData;
        } else {
          if (data['survey'] == 'ya') {
            renderData.push([renderDate(data['date_acc_3']), data['nama_acc_3'], 'Kabid', data['catatan_3'], statusSelf(6)]);
          }
        }

        if (data['id_tahap_proposal'] == '3') {
          renderData.push(['-', '-', 'Kasi Survey', '-', statusSelf(3)]);
          document.getElementById('btn_act').style.display = 'block';
          return renderData;
        } else {
          if (data['survey'] == 'ya') {
            if (data['id_tahap_proposal'] == '4') {
              document.getElementById('btn_act_b').style.display = 'block';
              renderData.push([renderDate(data['date_acc_4']), data['nama_acc_4'], 'Kasi Survey', data['catatan_4'] + '<br><hr>Anggota Tim :' + dataSurvey, statusSelf(8) + '<br>' + statusSelf(9)]);
              return renderData;
            } else {
              renderData.push([renderDate(data['date_acc_4']), data['nama_acc_4'], 'Kasi Survey', data['catatan_4'] + '<br><hr>Anggota Tim :' + dataSurvey, statusSelf(8)]);
              renderData.push([renderDate(data['date_acc_5']), data['nama_acc_5'], 'Kasi Survey', data['catatan_5'], statusSelf(6)]);
            }
          }
        }

        if (data['id_tahap_proposal'] == '5') {
          renderData.push(['-', '-', data['tujuan'] = "umum" ? 'Kasi Umum ' : "Kasi Usaha", '-', statusSelf('wait', 'Draft')]);
          if (n_role == 'kasi_umum') {
            document.getElementById('btn_act_b').style.display = 'block';
          }
          return renderData;
        } else {
          if (data['file_draft'] != '') {

            btn = `<button type="button" onclick="myFunctionRenderFiles('file_draft','${data['file_draft']}','Draft')" class="btn btn-primary" data-toggle="modal" data-target=".modal_files"><i class="ri-search-eye-line"></i> Draft</button><br>`
          }
          renderData.push([renderDate(data['date_acc_6']), data['nama_acc_6'], data['tujuan'] = "umum" ? 'Kasi Umum ' : "Kasi Usaha", btn + data['catatan_6'], statusSelf('ok', 'Draft')]);
        }

        if (data['id_tahap_proposal'] == '6') {
          renderData.push(['-', '-', "Operator", '-', statusSelf('wait', 'Cetak')]);
          if (n_role == 'backoffice') {
            document.getElementById('btn_act').style.display = 'block';
          }
          return renderData;
        } else {
          renderData.push([renderDate(data['date_acc_7']), data['nama_acc_7'], "Operator", data['catatan_7'], statusSelf('ok', 'Cetak')]);
        }

        if (data['id_tahap_proposal'] == '7') {
          renderData.push(['-', '-', "Kabid", '-', statusSelf('wait', 'Tembusan')]);
          if (n_role == 'kabid') {
            document.getElementById('btn_act_b').style.display = 'block';
          }
          return renderData;
        } else {
          renderData.push([renderDate(data['date_acc_8']), data['nama_acc_8'], "Kabid", data['catatan_8'], statusSelf('ok', 'Tembusan')]);
        }

        if (data['id_tahap_proposal'] == '8') {
          renderData.push(['-', '-', "Kepala Dinas", '-', statusSelf('wait', 'Tembusan')]);
          if (n_role == 'kadin') {
            document.getElementById('btn_act').style.display = 'block';
          }
          return renderData;
        } else {
          renderData.push([renderDate(data['date_acc_9']), data['nama_acc_9'], "Kepala Dinas", data['catatan_9'], statusSelf('ok', 'Tembusan')]);
        }


        if (data['id_tahap_proposal'] == '9') {
          renderData.push(['-', '-', "Operator", '-', statusSelf('wait', 'Penomoran')]);
          if (n_role == 'backoffice') {
            document.getElementById('btn_act_b').style.display = 'block';
          }
          return renderData;
        } else {
          renderData.push([renderDate(data['date_acc_10']), data['nama_acc_10'], "Operator", 'No Surat : ' + data['no_dokumen'] + '<br>' + data['catatan_10'], statusSelf('ok', 'Penomoran')]);
        }


      }
      return renderData;
    }



    function getTimSurveyDetail() {
      return $.ajax({
        url: `<?php echo site_url('Service/getTimSurveyDetail/') ?>`,
        'type': 'GET',
        data: {
          'id_pengiriman': id_pengiriman
        },
        success: function(data) {
          var json = JSON.parse(data);
          if (json['error']) {
            return;
          }
          data = json['data'][0];
          tx = '';
          // console.log(tx)
          data['pupr'] != 0 ? (tx += ' <br>PUPR (' + data['nama_pupr'] + ')') : '';
          data['lingkunganhidup'] != 0 ? (tx += ' <br>LH (' + data['nama_lingkunganhidup'] + ')') : '';
          data['pariwisata'] != 0 ? (tx += ' <br>Pariwisata (' + data['nama_pariwisata'] + ')') : '';
          data['disperindag'] != 0 ? (tx += ' <br>DISPERINDAG (' + data['nama_disperindag'] + ')') : '';
          data['diknas'] != 0 ? (tx += ' <br>DIKNAS (' + data['nama_diknas'] + ')') : '';
          data['pertanian'] != 0 ? (tx += ' <br>Pertanian (' + data['nama_pertanian'] + ')') : '';
          data['perikanan'] != 0 ? (tx += ' <br>Perikanan (' + data['nama_perikanan'] + ')') : '';
          data['perkim'] != 0 ? (tx += ' <br>Perkim (' + data['nama_perkim'] + ')') : '';
          data['kesra'] != 0 ? (tx += ' <br>Kesra (' + data['nama_kesra'] + ')') : '';
          console.log(tx);
          dataSurvey = tx;
        },
        error: function(e) {}
      });

    }

    function getDataDumy() {
      return $.ajax({
        url: `<?php echo site_url('Service/getDataDumy/') ?>`,
        'type': 'GET',
        data: {
          'id_pengiriman': id_pengiriman
        },
        success: function(data) {
          var json = JSON.parse(data);
          if (json['error']) {
            return;
          }
          data = json['data'];
          dataProfil['alamat'] = data['alamat']
          dataProfil['nama'] = data['nama']
          dataProfil['no_telp'] = data['no_telp']
          dataProfil['email'] = data['email']
        },
        error: function(e) {}
      });

    }
  });
</script>
<script>
  function myFunctionRenderFiles(dir, filename, label) {
    $('#freame_file_modal').html(render_files(label, `<?= base_url('upload/') ?>${dir}`, filename, filename.split('.').pop()))
  }
</script>