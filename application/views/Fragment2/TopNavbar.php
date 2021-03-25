<div class="iq-top-navbar">
   <div class="top-menu">
      <div class="container">
         <div class="row">
            <div class="col-sm-12">
               <div class="iq-navbar-custom-menu d-flex align-items-center justify-content-between">
                  <div class="iq-sidebar-logo">
                     <div class="top-logo">
                        <a href="index.html" class="logo">
                           <img src="<?= base_url('assets/') ?>images/logo-bangka.png" class="img-fluid" alt="">
                           <span>SIMANTRAPOIN</span>
                        </a>
                     </div>
                  </div>
                  <nav class="navbar navbar-expand-lg navbar-light p-0">
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ri-menu-3-line"></i>
                     </button>
                     <div class="iq-menu-bt align-self-center">
                        <div class="wrapper-menu">
                           <div class="main-circle"><i class="ri-arrow-left-s-line"></i></div>
                           <div class="hover-circle"><i class="ri-arrow-right-s-line"></i></div>
                        </div>
                     </div>
                     <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto navbar-list">
                           <?php $this->load->view('Fragment2/Notification') ?>
                        </ul>
                     </div>
                     <?php $this->load->view('Fragment2/ProfileNavigation') ?>

                  </nav>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php $this->load->view('Fragment2/' . $this->session->userdata()['nama_role'] . '/Menu') ?>
</div>