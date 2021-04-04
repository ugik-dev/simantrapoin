<div id="content-page" class="content-page">
  <div class="container">
    <div class="iq-card iq-card-block iq-card-stretch iq-card-height iq-border-box iq-border-box-1 text-primary">
      <div class="iq-card-body">
        <form id="registerForm" class="m-t col-lg-6 " role="form">
          <div class="form-group">
            <label for="old_password">Password Lama</label>
            <input type="password" placeholder="" class="form-control" id="nama" name="old_password" required="required">
          </div>
          <div class="form-group">
            <label for="password">Password Baru<small></small></label>
            <input type="password" placeholder="" class="form-control" id="password" name="password" required="required" autocomplete="new-password">
          </div>
          <div class="form-group">
            <label for="repassword">
              Konfirmasi Password Baru
            </label>
            <input type="password" placeholder="" class="form-control" id="repassword" name="repassword" required="required" autocomplete="new-password">
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
          url: "<?= base_url() . 'UserController/edit_my_pass' ?>",
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