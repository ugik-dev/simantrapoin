<div id="content-page" class="content-page">
  <div class="container">
    <div class="iq-card iq-card-block iq-card-stretch iq-card-height iq-border-box iq-border-box-1 text-primary">
      <div class="iq-card-body">
        <form id="registerForm" class="m-t" role="form">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="nik">Username</label>
                <input type="text" placeholder="Username" class="form-control" value="<?= $this->session->userdata('username') ?>" name="username" required="required" autocomplete="username">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" placeholder="Nama" class="form-control" value="<?= $this->session->userdata('nama') ?>" id="nama" name="nama" required="required" autocomplete="nama">
              </div>
            </div>
          </div>
          <div class="row">
            <!-- <div class="col-md-6">
              <div class="form-group">
                <label for="password">Password <small>kosongkan jika tidak berubah</small></label>
                <input type="password" placeholder="Password" class="form-control" id="password" name="password" required="required" autocomplete="new-password">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="repassword">
                  Konfirmasi Password
                </label>
                <input type="password" placeholder="Konfirmasi Password" class="form-control" id="repassword" name="repassword" required="required" autocomplete="new-password">
              </div>
            </div> -->
            <!-- </div> -->
            <!-- <div class="row"> -->
            <div class="col-sm-6">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" placeholder="Email" value="<?= $this->session->userdata('email') ?>" class="form-control" id="email" name="email" required="required">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="no_telp">No Telepon / HP</label>
                <input type="text" class="form-control" id="no_telp" value="<?= $this->session->userdata('no_telp') ?>" name="no_telp" placeholder="No Telepon / HP" required="required">
              </div>
            </div>
          </div>
          <!-- </div> -->
          <div class="col-sm-6">
            <label for="">Photo <small>kosongkan jika tidak berubah</small></label>

            <p class="no-margins"><span id="photo">-</span></p>
          </div>
          <button type="submit" id="registerBtn" style="width: 100px;" class="btn btn-primary block full-width m-b" data-loading-text="Registering In...">
            Simpan</button>

        </form>

      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {

    var registerForm = $('#registerForm');
    var password = $('#password');
    var repassword = $('#repassword');

    var submitBtn = registerForm.find('#registerBtn');
    photo = new FileUploader($('#photo'), "", 'photo', ".png , .jpg , .jpeg", false, false);

    registerForm.on('submit', (ev) => {
      ev.preventDefault();
      if (password.val() != repassword.val()) {
        swal("Password Salah", 'Periksa Password dan Re-Password', "error");

      } else {
        swal.fire({
          title: 'Loading .. ',
          allowOutsideClick: false,
          onBeforeOpen: () => {
            Swal.showLoading()
          },
        });
        $.ajax({
          url: "<?= base_url() . 'UserController/edit_my_data' ?>",
          type: "POST",
          // data: registerForm.serialize(),
          data: new FormData(registerForm[0]),
          contentType: false,
          processData: false,
          success: (data) => {
            // buttonIdle(submitBtn);
            json = JSON.parse(data);
            if (json['error']) {
              swal("Edit Profile Gagal", json['message'], "error");
              return;
            } else {
              swal("Edit Profile Berhasil", '', "success").then((result) => {
                location.reload()
                // if (!result.value) {;
                //  return;
                // $(location).attr('href', '<?= base_url() ?>');
                // }
              })
            }
          },
          error: () => {
            buttonIdle(submitBtn);
          }
        });
      }

    });
  });
</script>