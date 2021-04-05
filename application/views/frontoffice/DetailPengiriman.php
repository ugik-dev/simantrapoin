<div id="content-page" class="content-page">
  <div class="container">
    <div class="col-lg-12" id='layout_pengiriman'>
      <div class="iq-card">
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
                  <?php
                  if ($this->session->userdata('nama_role') != 'customer') $this->load->view('action/' . $this->session->userdata('nama_role'))
                  ?> </li>
              </ul>
              <div class="tab-content" id="myTabContent-4">
                <div class="tab-pane fade " id="tab-disposisi" role="tabpanel" aria-labelledby="profile-tab-three">
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
                <div class="tab-pane fade  active show" id="home-three" role="tabpanel" aria-labelledby="home-tab-three">
                  <form>
                    <div class="row">
                      <div class="col-lg-6 list-group list-group-horizontal">
                        <label class="list-group-item" style="border: none" for="formGroupExampleInput">Tanggal Terdata</label>
                        <h6 id='created_at' class="list-group-item" style="border: none"> </h6>
                      </div>
                      <div class="col-lg-6 list-group list-group-horizontal">
                        <label class="list-group-item" style="border: none" for="formGroupExampleInput">Status </label>
                        <h4 id='status_proposal' class="list-group-item" style="border: none"> </h4>
                      </div>
                    </div>

                    <div class=" form-card text-left">
                      <div class="row">
                        <div class="col-12">
                          <hr>
                          <hr>
                        </div>

                      </div>
                      <div class="row">
                        <div class="form-group col-lg-6">
                          <label for="nama" class="">Nama Perseorangan</label>
                          <strong>
                            <h4> <strong id='nama'></strong></h4>
                          </strong>

                          <hr>
                        </div>
                        <div class="form-group col-lg-6">
                          <label for="nik">NIK</label>
                          <h4>
                            <strong id='nik'> </strong>
                          </h4>
                          <hr>
                        </div>
                        <div class="form-group col-lg-6">
                          <label for="no_telp">No Telp <small></small></label>
                          <!-- <div class="row col-lg-12"> -->
                          <a id="wa_to" href="" class="btn btn-outline-success  btn-sm mr-2" target="_blank"><i class='fa fa-whatsapp'></i>chat via Whatsapp</a>
                          <h4><strong id='no_telp'>-</strong></h4>
                          <!-- </div> -->

                          <hr>
                        </div>
                        <div class="form-group col-lg-6">
                          <label for="email">Email</label>
                          <a id="mail_to" href="" class="btn btn-outline-success  btn-sm mr-2" target="_blank"><i class='fa fa-envelope'></i>chat via Email</a>
                          <h4><strong id='email'>-</strong>
                          </h4>

                          <hr>
                        </div>
                        <div class="form-group col-lg-6">
                          <label for="alamat">Alamat Perseorangan</label>
                          <h4><strong id='alamat'> </strong>
                          </h4>
                          <hr>
                        </div>

                      </div>
                      <!-- END SLIDE 1 -->
                    </div>
                    <div class="form-card text-left">
                      <div class="row">
                        <div class="col-12">
                          <hr>
                          <hr>
                          <!-- <h3 class="mb-4">Informasi Layanan:</h3> -->
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-lg-12">
                          <label for="id_service">Layanan</label>
                          <h4><strong id='id_service'> </strong>
                          </h4>
                          <hr>
                        </div>
                        <div class="form-group col-lg-6">
                          <label for="nama_badan">Nama Badan Usaha</label>
                          <h4><strong id='nama_badan'> </strong>
                          </h4>
                          <hr>
                        </div>
                        <div class="form-group col-lg-6">
                          <label for="nib">NIB</label>
                          <h4><strong id='nib'> </strong>
                          </h4>
                          <hr>
                        </div>
                        <div class="form-group col-lg-6">
                          <label for="exampleFormControlTextarea1">Alamat / Lokasi Perizinan</label>
                          <h4><strong id='lokasi_perizinan'> </strong>
                          </h4>
                          <hr>
                        </div>
                        <div class="form-group col-lg-6">
                          <label for="exampleFormControlTextarea1">Deskripsi Lainnya</label>
                          <h4><strong id='deskripsi'> </strong>
                          </h4>
                          <hr>
                        </div>
                      </div>
                    </div>
                    <div id="categorySideMap" style="height: 380px; width: 100% ; display: none"></div>


                  </form>
                </div>
                <div class="tab-pane fade" id="profile-three" role="tabpanel" aria-labelledby="profile-tab-three">
                  <div class="row">
                    <div id="ktp"></div>
                    <div id="npwp"></div>
                  </div>
                  <div id="nib_file"></div>
                  <div id="file_pendukung"></div>
                </div>


              </div>
            </div>

            <div class="iq-card-body">


              <button class="btn btn-warning my-1 mr-sm-2" type="submit" id="de_approv_btn" data-loading-text="Loading..."><strong>Batalkan Aksi</strong></button>
            </div>
          </div>
        </div>
      </div>


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
    var id_pengiriman = "<?= $contentData['id_pengiriman'] ?>";
    var n_role = "<?= $this->session->userdata()['nama_role'] ?>";
    var tabThree = $('#contact-tab-three');
    var approv_btn = $('#approv_btn');
    var de_approv_btn = $('#de_approv_btn');
    var not_approv_btn = $('#not_approv_btn');
    var title_file_modal = $('#title_file_modal');
    var freame_file_modal = $('#freame_file_modal');


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
      'no_telp': $('#layout_pengiriman').find('#no_telp'),
      'email': $('#layout_pengiriman').find('#email'),
      'nik': $('#layout_pengiriman').find('#nik'),
      'lokasi_perizinan': $('#layout_pengiriman').find('#lokasi_perizinan'),
      'id_service': $('#layout_pengiriman').find('#id_service'),
      'survey': $('#layout_pengiriman').find('#survey'),
      'nib': $('#layout_pengiriman').find('#nib'),
      'nib_file': $('#layout_pengiriman').find('#nib_file'),
      'file_pendukung': $('#layout_pengiriman').find('#file_pendukung'),
      'ktp': $('#layout_pengiriman').find('#ktp'),
      'npwp': $('#layout_pengiriman').find('#npwp'),
      'dok_service': $('#layout_pengiriman').find('#dok_service'),
      'wa_to': $('#layout_pengiriman').find('#wa_to'),
      'mail_to': $('#layout_pengiriman').find('#mail_to'),

      'deskripsi': $('#layout_pengiriman').find('#deskripsi'),
      'status_proposal': $('#layout_pengiriman').find('#status_proposal'),
      'created_at': $('#layout_pengiriman').find('#created_at'),
      'btn_word': $('#layout_pengiriman').find('#btn_word'),
    }
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

    var swalDeApprovConfigure = {
      title: "Konfirmasi Batal Approv",
      text: "Yakin akan Batal Approv data ini?",
      type: "info",
      showCancelButton: true,
      confirmButtonColor: "#18a689",
      confirmButtonText: "Ya, Batalkan!",
    };

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
      Layout.no_dokumen.html(dataProfil['no_dokumen'])
      Layout.alamat.html(dataProfil['alamat_user'] ? dataProfil['alamat_user'] : dataProfil['alamat'])
      Layout.deskripsi.html(dataProfil['deskripsi'].replace('\n', ' <br> '))
      Layout.nama.html(dataProfil['nama'])
      Layout.nama_badan.html(dataProfil['nama_badan'])
      Layout.nib.html(dataProfil['nib'])
      Layout.nik.html(dataProfil['nik'])
      Layout.email.html(dataProfil['email'])
      Layout.lokasi_perizinan.html(dataProfil['lokasi_perizinan'])
      Layout.no_telp.html(dataProfil['no_telp'])
      Layout.id_service.html(dataProfil['nama_service'])
      Layout.tujuan.html(dataProfil['tujuan'] == 'usaha' ? "Perizinan Usaha" : "Perizinan Umum")
      Layout.status_proposal.html(statusPermohonan(dataProfil['status_proposal']))
      dwn = ` <a type=""  class="btn btn-light my-1 mr-sm-2"   id="export_btn"  href="<?= site_url() ?>PengirimanController/word?id_pengiriman=${id_pengiriman}" data-loading-text="Loading...">
      <i class="fal fa-download"> </i> Download Docx</a>`;
      // Layout.btn_word.html(dwn)
      var str = dataProfil['no_telp'];
      str = str.replace(/[^0-9]/ig, "");;
      var res = str.substring(0, 2);
      if (res == 08) {
        var res2 = str.substring(2, 16);
        res = '628';
        fx = res + res2;
      } else {
        fx = str;
      }
      if (dataProfil['longitude'] && dataProfil['latitude']) {
        document.getElementById('categorySideMap').style.display = 'block';
        var map = L.map('categorySideMap').setView({
          lon: dataProfil['longitude'],
          lat: dataProfil['latitude']
        }, 13)

        L.tileLayer("http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
          attribution: "",
          minZoom: 1,
          maxZoom: 19,
        }).addTo(map);

        var marker = L.marker([dataProfil['latitude'], dataProfil['longitude']]).bindPopup(`<a href="<?= base_url() ?>PengirimanController/DetailPengiriman?id_pengiriman=${dataProfil['id_pengiriman']}">${dataProfil['nama_badan']} </a>`).addTo(map)


        // createListingsMap({
        //   mapId: 'categorySideMap',
        // }, dataProfil);
      }

      var formattedBody = `Salam Sejahterah! \nHalo ${dataProfil['nama']} \nkami Dinas Penanaman Modal, Pelayanan Terpadu Satu Pintu, Koperasi Usaha Mikro Kecil dan Menengah Kabupaten Bangka \nMenyampaikan bahwa :`;
      var waToLink = `https://api.whatsapp.com/send?phone=${fx}&text=` + encodeURIComponent(formattedBody);
      var mailToLink = `mailto:${dataProfil['email']}?body=` + encodeURIComponent(formattedBody);

      Layout.wa_to.prop('href', waToLink);
      Layout.mail_to.prop('href', mailToLink);
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

      Layout.created_at.html(renderDate2(dataProfil['created_at']) + '(' + dataProfil['nama_sending'] + ' / ' + (dataProfil['role_sending'] == '99' ? 'Customer' : 'Front Office') + ' )')

      dataProfil['output_no_dokumen'] ? Layout.status_proposal.append("<br>No Dokumen: " + dataProfil['output_no_dokumen']) : '';

      if (typeof dataProfil['dokumen_permohonan'] === 'undefined' || dataProfil['dokumen_permohonan'] === null || dataProfil['dokumen_permohonan'] === '') {} else {
        renderpdf(dataProfil['dokumen_permohonan']);
      }

      renderData = renderUserApprov();
      FDataTable.clear().rows.add(renderData).draw('full-hold');
      de_approv_btn.hide();

      if (n_role == 'frontoffice') {
        if (dataProfil['status_proposal'] == 'DRAFT') {
          approv_btn.show();
          de_approv_btn.hide();
        }
        if (dataProfil['id_tahap_proposal'] == '1') {
          approv_btn.hide();
          de_approv_btn.show();
        }
        if (dataProfil['id_tahap_proposal'] > '1') {}
        return;
      };

    }

    function renderUserApprov() {
      data = dataProfil;
      var i = 0;
      var renderData = [];
      if (data['id_role'] == '99') {
        renderData.push([renderDate(data['created_at']), data['nama_sending'], 'Customer', '', statusSelf(7)]);
      }

      if (data['status_proposal'] == 'DIPROSES' || data['status_proposal'] == 'DITERIMA' || data['status_proposal'] == 'DRAFT') {

        if (data['id_tahap_proposal'] == '0') {
          renderData.push(['-', '-', 'Front Office', '-', statusSelf(3)]);
          if (n_role == 'frontoffice') {
            document.getElementById('btn_act').style.display = 'block';
            document.getElementById('btn_act_b').style.display = 'block';
          }
          return renderData;
        } else {
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
          if (n_role == 'kasi_survey') {

            document.getElementById('email_user_survey').value = data['email'];
            document.getElementById('btn_act').style.display = 'block';
          }
          return renderData;
        } else {
          if (data['survey'] == 'ya') {
            if (data['id_tahap_proposal'] == '4') {
              document.getElementById('btn_act_b').style.display = 'block';
              renderData.push([renderDate(data['date_acc_4']), data['nama_acc_4'], 'Kasi Survey', data['catatan_4'] + '<br><hr>' + dataSurvey, statusSelf(8) + '<br>' + statusSelf(9)]);
              return renderData;
            } else {
              renderData.push([renderDate(data['date_acc_4']), data['nama_acc_4'], 'Kasi Survey', data['catatan_4'] + '<br><hr>' + dataSurvey, statusSelf(8)]);
              renderData.push([renderDate(data['date_acc_5']), data['nama_acc_5'], 'Kasi Survey', data['catatan_5'], statusSelf(6)]);
            }
          }
        }
        // NEW HERE
        if (data['id_tahap_proposal'] == '5') {
          renderData.push(['-', '-', 'Kabid', '-', statusSelf(3)]);
          if (n_role == 'kabid') {
            document.getElementById('btn_act_c').style.display = 'block';
          }
          return renderData;
        } else {
          renderData.push([renderDate(data['date_acc_6']), data['nama_acc_6'], 'Kabid', data['catatan_6'], statusSelf(6)]);
        }


        if (data['id_tahap_proposal'] == '6') {
          renderData.push(['-', '-', data['tujuan'] = "umum" ? 'Kasi Umum ' : "Kasi Usaha", '-', statusSelf('wait', 'Draft')]);
          if (n_role == 'kasi_umum') {
            document.getElementById('btn_act_b').style.display = 'block';
          }
          return renderData;
        } else {
          if (data['file_draft'] != '') {

            btn = `<button type="button" onclick="myFunctionRenderFiles('file_draft','${data['file_draft']}','Draft')" class="btn btn-primary" data-toggle="modal" data-target=".modal_files"><i class="ri-search-eye-line"></i> Draft</button><br>`
          } else {

          }
          renderData.push([renderDate(data['date_acc_7']), data['nama_acc_7'], data['tujuan'] = "umum" ? 'Kasi Umum ' : "Kasi Usaha", btn + data['catatan_7'], statusSelf('ok', 'Draft')]);
        }

        if (data['id_tahap_proposal'] == '7') {
          renderData.push(['-', '-', "Operator", '-', statusSelf('wait', 'Cetak')]);
          if (n_role == 'backoffice') {
            document.getElementById('btn_act').style.display = 'block';
          }
          return renderData;
        } else {
          renderData.push([renderDate(data['date_acc_8']), data['nama_acc_8'], "Operator", data['catatan_8'], statusSelf('ok', 'Cetak')]);
        }

        if (data['id_tahap_proposal'] == '8') {
          renderData.push(['-', '-', "Kabid", '-', statusSelf('wait', 'Paraf')]);
          if (n_role == 'kabid') {
            document.getElementById('btn_act_b').style.display = 'block';
          }
          return renderData;
        } else {
          renderData.push([renderDate(data['date_acc_9']), data['nama_acc_9'], "Kabid", data['catatan_9'], statusSelf('ok', 'Selesai')]);
        }

        if (data['id_tahap_proposal'] == '9') {
          renderData.push(['-', '-', "Kepala Dinas", '-', statusSelf('wait', 'Tanda Tangan')]);
          if (n_role == 'kadin') {
            document.getElementById('btn_act').style.display = 'block';
          }
          return renderData;
        } else {
          renderData.push([renderDate(data['date_acc_10']), data['nama_acc_10'], "Kepala Dinas", data['catatan_10'], statusSelf('ok', 'Selesai')]);
        }


        if (data['id_tahap_proposal'] == '10') {
          renderData.push(['-', '-', "Operator", '-', statusSelf('wait', 'Penomoran')]);
          if (n_role == 'backoffice') {
            document.getElementById('btn_act_b').style.display = 'block';
          }
          return renderData;
        } else {
          renderData.push([renderDate(data['date_acc_11']), data['nama_acc_11'], "Operator", 'No Surat : ' + data['no_dokumen'] + '<br>' + data['catatan_11'], statusSelf('ok', 'Penomoran')]);
        }
      }

      if (data['status_proposal'] == 'DITOLAK') {

        if (data['tolak_in'] == '1') {
          renderData.push([renderDate(data['date_acc_1']), data['nama_acc_1'], 'Front Office', data['catatan_1'], statusSelf(5)]);
          return renderData;
        }

        if (data['tolak_in'] == '2') {
          renderData.push([renderDate(data['date_acc_1']), data['nama_acc_1'], 'Front Office', data['catatan_1'], statusSelf(6)]);
          renderData.push([renderDate(data['date_acc_2']), data['nama_acc_2'], data['tujuan'] == 'usaha' ? 'Kasi Usaha' : 'Kasi Umum', data['catatan_2'], statusSelf(5)]);
        }

        if (data['tolak_in'] == '3') {
          renderData.push([renderDate(data['date_acc_1']), data['nama_acc_1'], 'Front Office', data['catatan_1'], statusSelf(6)]);
          renderData.push([renderDate(data['date_acc_2']), data['nama_acc_2'], data['tujuan'] == 'usaha' ? 'Kasi Usaha' : 'Kasi Umum', data['catatan_2'], statusSelf(6)]);
          renderData.push([renderDate(data['date_acc_3']), data['nama_acc_3'], 'Kabid', data['catatan_3'], statusSelf(5)]);
        }

        //pemilihan tim
        if (data['tolak_in'] == '4') {
          renderData.push([renderDate(data['date_acc_1']), data['nama_acc_1'], 'Front Office', data['catatan_1'], statusSelf(6)]);
          renderData.push([renderDate(data['date_acc_2']), data['nama_acc_2'], data['tujuan'] == 'usaha' ? 'Kasi Usaha' : 'Kasi Umum', data['catatan_2'], statusSelf(6)]);
          renderData.push([renderDate(data['date_acc_3']), data['nama_acc_3'], 'Kabid', data['catatan_3'], statusSelf(6)]);
          renderData.push([renderDate(data['date_acc_4']), data['nama_acc_4'], 'Kasi Survey', data['catatan_4'], statusSelf(5)]);
        }

        //evaluasi survey
        if (data['tolak_in'] == '5') {
          renderData.push([renderDate(data['date_acc_1']), data['nama_acc_1'], 'Front Office', data['catatan_1'], statusSelf(6)]);
          renderData.push([renderDate(data['date_acc_2']), data['nama_acc_2'], data['tujuan'] == 'usaha' ? 'Kasi Usaha' : 'Kasi Umum', data['catatan_2'], statusSelf(6)]);
          renderData.push([renderDate(data['date_acc_3']), data['nama_acc_3'], 'Kabid', data['catatan_3'], statusSelf(6)]);
          // renderData.push([renderDate(data['date_acc_4']), data['nama_acc_4'], 'Kasi Survey', data['catatan_4'], statusSelf(6)]);
          renderData.push([renderDate(data['date_acc_4']), data['nama_acc_4'], 'Kasi Survey', data['catatan_4'] + '<br><hr>' + dataSurvey, statusSelf(8)]);

          renderData.push([renderDate(data['date_acc_5']), data['nama_acc_5'], 'Kasi Survey', data['catatan_5'], statusSelf(5)]);
        }

        if (data['id_tahap_proposal'] == '5') {
          renderData.push(['-', '-', 'Kabid', '-', statusSelf(3)]);
          if (n_role == 'kabid') {
            document.getElementById('btn_act_c').style.display = 'block';
          }
          return renderData;
        } else {
          renderData.push([renderDate(data['date_acc_6']), data['nama_acc_6'], 'Kabid', data['catatan_6'], statusSelf(6)]);
        }


        if (data['id_tahap_proposal'] == '6') {
          renderData.push(['-', '-', data['tujuan'] = "umum" ? 'Kasi Umum ' : "Kasi Usaha", '-', statusSelf('wait', 'Draft')]);
          if (n_role == 'kasi_umum') {
            document.getElementById('btn_act_b').style.display = 'block';
          }
          return renderData;
        } else {
          if (data['file_draft'] != '') {

            btn = `<button type="button" onclick="myFunctionRenderFiles('file_draft','${data['file_draft']}','Draft')" class="btn btn-primary" data-toggle="modal" data-target=".modal_files"><i class="ri-search-eye-line"></i> Draft</button><br>`
          } else {

          }
          renderData.push([renderDate(data['date_acc_7']), data['nama_acc_7'], data['tujuan'] = "umum" ? 'Kasi Umum ' : "Kasi Usaha", btn + data['catatan_7'], statusSelf('ok', 'Draft')]);
        }

        if (data['id_tahap_proposal'] == '7') {
          renderData.push(['-', '-', "Operator", '-', statusSelf('wait', 'Cetak')]);
          if (n_role == 'backoffice') {
            document.getElementById('btn_act').style.display = 'block';
          }
          return renderData;
        } else {
          renderData.push([renderDate(data['date_acc_8']), data['nama_acc_8'], "Operator", data['catatan_8'], statusSelf('ok', 'Cetak')]);
        }

        if (data['id_tahap_proposal'] == '8') {
          renderData.push(['-', '-', "Kabid", '-', statusSelf('wait', 'Paraf')]);
          if (n_role == 'kabid') {
            document.getElementById('btn_act_b').style.display = 'block';
          }
          return renderData;
        } else {
          renderData.push([renderDate(data['date_acc_9']), data['nama_acc_9'], "Kabid", data['catatan_9'], statusSelf('ok', 'Selesai')]);
        }

        if (data['id_tahap_proposal'] == '9') {
          renderData.push(['-', '-', "Kepala Dinas", '-', statusSelf('wait', 'Tanda Tangan')]);
          if (n_role == 'kadin') {
            document.getElementById('btn_act').style.display = 'block';
          }
          return renderData;
        } else {
          renderData.push([renderDate(data['date_acc_10']), data['nama_acc_10'], "Kepala Dinas", data['catatan_10'], statusSelf('ok', 'Selesai')]);
        }
        if (data['id_tahap_proposal'] == '10') {
          renderData.push(['-', '-', "Operator", '-', statusSelf('wait', 'Penomoran')]);
          if (n_role == 'backoffice') {
            document.getElementById('btn_act_b').style.display = 'block';
          }
          return renderData;
        } else {
          renderData.push([renderDate(data['date_acc_11']), data['nama_acc_11'], "Operator", 'No Surat : ' + data['no_dokumen'] + '<br>' + data['catatan_11'], statusSelf('ok', 'Penomoran')]);
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
          title = '';
          tx = 'Tanggal : ' + renderDate2(data['date_survey']) + '';
          for (i = 1; i <= data['count_tim']; i++) {
            if (data['nama_tim_' + i]) {


              if (title != data['title_role_' + i]) {
                tx += ' <br><hr><strong>' + data['title_role_' + i] + '</strong>';
                title = data['title_role_' + i];
              }
              tx += ' <br>' + data['nama_tim_' + i];
            }
          }
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