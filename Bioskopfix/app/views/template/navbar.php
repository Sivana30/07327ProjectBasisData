<?php
if(isset($data['log'])){
if($data['log'] == "logout"){
  $_SESSION['login'] = "false";
}}
?>
<nav style="background-color: #BC85A3;" class="navbar navbar-expand-lg">
<h4 class="text-light ms-5"><i class="bi bi-person-circle"> <?= $_SESSION['user']['nama_pegawai']?></i></h4>
  <div class="container">
    <a class="navbar-brand text-light" href="<?=BASEURL?>home/home"><i class="bi bi-film"></i> Tiket Bioskop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-light" aria-current="page" href="<?=BASEURL?>home/kelolah"><i class="bi bi-gear-wide-connected"></i> Kelolah</a>
        </li>
      </ul>
    </div>
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link text-light" aria-current="page" href="<?=BASEURL?>home/home/logout"><i class="bi bi-gear-wide-connected"></i> Logout</a>
      </li>
    </ul>
  </div>
</nav>
