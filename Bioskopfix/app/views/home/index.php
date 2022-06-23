<?php
if($_SESSION['login'] == "false"){
  $url = BASEURL;
  header("Location: $url");
}
?>
<div id="content"></div>
<div class="container mt-4" id="home">
  <div class="row mb-3">
    <div class="col-3">
      <form action="#" method="post">
      <label for="cari" class="form-label text-light fs-5 fw-bold">Cari <i class="bi bi-search"></i></label>
      <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="" id="cari" name="cari" aria-describedby="btn-cari">
  <button class="btn text-light" style="background-color: #BC85A3;" type="submit" value="submit" id="btn-cari">Cari</button>
</div>
    </div>
  </div>

    <h3 class="mb-4 text-light"><i class="bi bi-card-list"></i> Daftar Film</h3>
  <div class="row row-cols-2 row-cols-lg-6 g-2 g-lg-3">
    <?php $i=0; foreach($data['film'] as $film): $i++;?>
    <div class="col">
      <button type="button" class="btn shadow-lg p-1 mb-3 bg-body rounded" data-bs-toggle="modal" data-bs-target="#detail_film<?=$i?>"><img src="http://localhost/Bioskopfix/public/img/<?=$film["sampul_film"]?>" width="160" height="240"></button>

            <!-- Modal -->
      <div class="modal fade" id="detail_film<?=$i?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div style="background-color: #BC85A3;" class="modal-content text-light">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><?=$film['judul_film']?></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <p class="btn shadow-lg p-1 mb-3 bg-body rounded"><img src="http://localhost/Bioskopfix/public/img/<?=$film["sampul_film"]?>" width="160" height="240"></p>
              <p class="mb-3">Judul Film : <?=$film['judul_film']?></p>
              <p class="mb-3">Durasi Film : <?=$film['durasi_film']?> Menit</p>
              <p class="mb-3">Harga Tiket : Rp.20.000</p>
            </div>
            <div class="modal-footer">
              <button type="button" style="background-color: #FEADB9;" class="btn text-light" data-bs-dismiss="modal">Tutup</button>
              <a href="<?=BASEURL?>home/kursi" style="background-color: #FEADB9;" class="btn text-light stretched-link">Lihat Kursi</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach?>
</div> 