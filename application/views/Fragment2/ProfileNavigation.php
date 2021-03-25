<ul class="navbar-list">
   <?php if (!empty($this->session->userdata()['photo'])) {
      // echo 'ssssssssssssssssssssss;';
      $ph = $this->session->userdata()['photo'];
   } else {
      // echo 'kosoong';
      $ph = 'profile_small.jpg';
   } ?>
   <li>
      <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
         <img src="<?= base_url('upload/profile/') . $ph ?>" class="img-fluid rounded mr-3" alt="user">
         <div class="caption">
            <h6 class="mb-0 line-height"><?= $this->session->userdata()['nama'] ?></h6>
            <!-- <span class="font-size-12">Available</span> -->
         </div>
      </a>
      <div class="iq-sub-dropdown iq-user-dropdown">
         <div class="iq-card shadow-none m-0">
            <div class="iq-card-body p-0 ">
               <div class="bg-primary p-3">
                  <h5 class="mb-0 text-white line-height"><?= $this->session->userdata()['nama'] ?></h5>
                  <span class="text-white font-size-12"><?= $this->session->userdata()['title_role'] ?></span>
               </div>
               <!-- <a href="profile.html" class="iq-sub-card iq-bg-primary-hover">
                  <div class="media align-items-center">
                     <div class="rounded iq-card-icon iq-bg-primary">
                        <i class="ri-file-user-line"></i>
                     </div>
                     <div class="media-body ml-3">
                        <h6 class="mb-0 ">My Profile</h6>
                        <p class="mb-0 font-size-12">View personal profile details.</p>
                     </div>
                  </div>
               </a> -->
               <a href="profile-edit.html" class="iq-sub-card iq-bg-primary-hover">
                  <div class="media align-items-center">
                     <div class="rounded iq-card-icon iq-bg-primary">
                        <i class="ri-profile-line"></i>
                     </div>
                     <div class="media-body ml-3">
                        <h6 class="mb-0 ">Edit Profile</h6>
                        <p class="mb-0 font-size-12">Modify your personal details.</p>
                     </div>
                  </div>
               </a>
               <a href="account-setting.html" class="iq-sub-card iq-bg-primary-hover">
                  <div class="media align-items-center">
                     <div class="rounded iq-card-icon iq-bg-primary">
                        <i class="ri-account-box-line"></i>
                     </div>
                     <div class="media-body ml-3">
                        <h6 class="mb-0 ">Account settings</h6>
                        <p class="mb-0 font-size-12">Manage your account parameters.</p>
                     </div>
                  </div>
               </a>
               <div class="d-inline-block w-100 text-center p-3">
                  <a class="bg-primary iq-sign-btn" href="<?= base_url('logout') ?>" role="button">Sign out<i class="ri-login-box-line ml-2"></i></a>
               </div>
            </div>
         </div>
      </div>
   </li>
</ul>