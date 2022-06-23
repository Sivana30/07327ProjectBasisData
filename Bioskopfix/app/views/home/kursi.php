
<div class="container mt-5 align-items-center text-center">
<form action="<?=BASEURL?>print.php" method="post">
<div class="mb-3" style="width: 50vh;">
    <label class="fw-bold fs-5 text-light" for="nama_pelanggan">Nama Pelanggan</label>
    <div class="mb-3 mt-3">
    <input type="text" name="nama_pelanggan" class="form-control" id="nama_pelanggan" required>
    </div>
    <label class="fw-bold fs-5 text-light" for="film">Judul Film</label>
    <div class="mb-3 mt-3">
    <select name="judul_film" class="form-select" id="judul_film" required>
        <?php foreach($data['studio'] as $studio):
            if($studio['film_id'] != ""){
            ?>
            <option value="<?=$studio['id_studio']?>"><?=$studio['judul_film']." | ".$studio['jadwal']?></option>
            <?php } ?>
            <?php endforeach?>
    </select>
    </div>
    <label class="fw-bold fs-5 text-light" for="bayar">Bayar</label>
    <div class="mb-3 mt-3">
    <input type="text" name="bayar" class="form-control" id="bayar" required>
    </div>
  </div>
    <h1 class="text-light mb-5">Pilih Kursi</h1>
<div class="row">
    <div class="col">
        <div class="container">
  <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3 text-center">
    <?php $i=0; foreach($data['kursia'] as $kursi): $i++;?>
    <div class="col">
      <div class="p-3 border">
      <?php if($kursi['status']=="Tidak Tersedia"){?>
        <input class="form-check-input" id="<?=$kursi['id_kursi']?>" type="checkbox" name="kursi<?=$i?>" value="<?=$kursi['id_kursi']?>" id="defaultCheck1" disabled>
        <?php }else{ ?>
            <input class="form-check-input" id="<?=$kursi['id_kursi']?>" type="checkbox" name="kursi<?=$i?>" value="<?=$kursi['id_kursi']?>" id="defaultCheck1">
        <?php } ?>
        <br><label class="text-light" for="<?=$kursi['id_kursi']?>"><?=$kursi['nama_kursi']?></label>
    </div>
    </div>
    <?php endforeach?>
  </div>
</div>
    </div>
    
    <div class="col">
    <div class="container">
  <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3 text-center">
    <?php foreach($data['kursib'] as $kursi): $i++;?>
    <div class="col">
      <div class="p-3 border">
        <?php if($kursi['status']=="Tidak Tersedia"){?>
        <input class="form-check-input" id="<?=$kursi['id_kursi']?>" type="checkbox" name="kursi<?=$i?>" value="<?=$kursi['id_kursi']?>" id="defaultCheck1" disabled>
        <?php }else{ ?>
            <input class="form-check-input" id="<?=$kursi['id_kursi']?>" type="checkbox" name="kursi<?=$i?>" value="<?=$kursi['id_kursi']?>" id="defaultCheck1">
        <?php } ?>
        <br><label class="text-light" for="<?=$kursi['id_kursi']?>"><?=$kursi['nama_kursi']?></label>
    </div>
    </div>
    <?php endforeach?>
  </div>
</div>
  </div>

</div>
<button type="submit" style="background-color: #BC85A3; width: 150px;" class="btn text-light mt-5">Beli Tiket</button>
</form>
</div>