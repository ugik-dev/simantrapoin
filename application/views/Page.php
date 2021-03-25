<?php
$this->load->view('Fragment2/HeaderFragment');
$this->load->view('Fragment2/TopNavbar'); ?>
<div class="wrapper">
      <?php $this->load->view($content) ?>

</div>
<?php
if ($this->session->userdata()['nama_role'] == 'customer') {
      $this->load->view('Fragment/whatsapp');
}

$this->load->view('Fragment2/Footer') ?>