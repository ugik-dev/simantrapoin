<div id="wrapper">

<nav class="navbar-default navbar-static-side" role="navigation">
  <div class="sidebar-collapse">
    <ul class="nav metismenu" id="side-menu">
      <?= $this->load->view('Fragment/SidebarHeaderFragment', NULL, TRUE);?>
      <li id="dashboard">
        <a href="<?=site_url('FOController/')?>"><i class="fa fa-home"></i> <span class="nav-label">Beranda</span></a>
      </li>
      
      <!-- <li id="pengajuan">
        <a href="<?=site_url('FOController/pengajuan')?>"><i class="fa fa-archive"></i> <span class="nav-label">Pengajuan</span></a>
      </li> -->
      <!-- <li id="kalender">
        <a href="<?=site_url('FOController/kalender')?>"><i class="fas fa-calendar-alt"></i> <span class="nav-label">Event</span></a>
      </li>
      <li id="tenagakerja">
        <a href="<?=site_url('FOController/tenagakerja')?>"><i class="fas fa-user-tie"></i><span class="nav-label">Tenaga Kerja</span></a>
      </li>
      <li id="pariwisata">
        <a href="#"><i class="fas fa-bus"></i><span class="nav-label">Pariwisata</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse" aria-expanded="false">
              <li id="objek">
                <a href="<?=site_url('FOController/objek')?>"> <span class="nav-label">Daya Tarik Wisata</span></a>
              </li>
              <li id="penginapan">
                <a href="<?=site_url('FOController/penginapan')?>"> <span class="nav-label">Penginapan</span></a>
              </li>
              </li>
              <li id="biro">
                <a href="<?=site_url('FOController/biro')?>"> <span class="nav-label">Biro Wisata</span></a>
              </li>
              </li>
              <li id="usaha">
                <a href="<?=site_url('FOController/usaha')?>"> <span class="nav-label">Usaha dan Jasa</span></a>
              </li>
        </ul>
      </li>
      <li id="seni_dan_budaya">
        <a href="#"><i class="fas fa-american-sign-language-interpreting"></i> <span class="nav-label">Seni Dan Budaya</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse" aria-expanded="false">
          <li id="senibudaya">
            <a href="<?=site_url('FOController/senibudaya')?>"><span class="nav-label">Seni Dan Budaya</span></a>
          </li>
          <li id="pagelaran">
            <a href="<?=site_url('FOController/pagelaran')?>"><span class="nav-label">Pagelaran dan Pameran</span></a>
          </li>
          <li id="saranaprasarana">
            <a href="<?=site_url('FOController/saranaprasarana')?>"><span class="nav-label">Sarana Dan Prasarana</span></a>
          </li>
        </ul>
      </li>
      
      <li id="cagar_dan_budaya">
        <a href="#"><i class="fas fa-camera-retro"></i><span class="nav-label">Cagar Dan Budaya</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse" aria-expanded="false">   
          <li id="cagarbudaya">
            <a href="<?=site_url('FOController/cagarbudaya')?>"> <span class="nav-label">Cagar Budaya</span></a>
          </li>
          <li id="pemugaran">
            <a href="<?=site_url('FOController/pemugaran')?>"> <span class="nav-label">Pemugaran</span></a>
          </li>    
        </ul>
      </li>
      <li id="museum">
        <a href="<?=site_url('FOController/museum')?>"><i class="fas fa-ethernet"></i> <span class="nav-label">Museum</span></a>
      </li>
      <li id="desawisata">
        <a href="<?=site_url('FOController/desawisata')?>"><i class="fab fa-accusoft"></i> <span class="nav-label">Desa Wisata</span></a>
      </li> -->
      <!-- <li id="panduan">
        <a href="<?=site_url('FOController/panduan')?>"><i class="fa fa-question"></i> <span class="nav-label">Panduan</span></a>
      </li> -->
      <li id="logout">
        <a href="<?=site_url('UserController')?>" class="logout"><i class="fa fa-sign-out"></i> <span class="nav-label">Logout</span></a>
      </li>
    </li>
  </div>
</nav>
<script>
$(document).ready(function() {});
</script>