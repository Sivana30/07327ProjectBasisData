<?php
if($_SESSION['login'] == "false"){
  $url = BASEURL;
  header("Location: $url");
}

?>
<div class="row justify-content-center mt-5">
    <div class="col-4 pe-5">
    <table class="table table-hover">
  <thead>
<!-- Button trigger modal -->
<button type="button" style="background-color: #BC85A3;" class="btn mb-3 text-light" data-bs-toggle="modal" data-bs-target="#tambahfilm"> Tambah </button>
    <tr class="text-light" style="background-color: #BC85A3;">
      <th scope="col">ID</th>
      <th scope="col">Judul</th>
      <th scope="col">Durasi</th>
      <th scope="col">Sampul</th>
      <th scope="col">Edit</th>
      <th scope="col">Hapus</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i = 0;
    foreach($data['film'] as $film): 
    $i++?>
    <tr class="text-light" style="background-color: #BC85A3;">
      <th scope="row"><br><br><?= $i?></th>
      <td style="background-color: #BC85A3;"><br><br><?= $film['judul_film']?></td>
      <td style="background-color: #BC85A3;"><br><br><?= $film['durasi_film']?> Menit</td>
      <td style="background-color: #BC85A3;"><img class="shadow-none bg-light rounded" src="http://localhost/Bioskopfix/public/img/<?=$film["sampul_film"]?>" width="80" height="120" srcset=""></td>
      <td style="background-color: #BC85A3;"><br><br><button type="button" style="background-color: #FEADB9;" class="btn text-light" data-bs-toggle="modal" data-bs-target="#editfilm<?=$i?>"><i class="bi bi-pencil-square"></button></i></td>
      <form action="" method="post">
      <td style="background-color: #BC85A3;"><br><br><button name="hapusfilm" value="<?=$film['id_film']?>" style="background-color: #FEADB9;" class="btn text-light">Hapus</button></td>
      </form>
            <!-- Edit Modal -->
            <div class="modal fade" id="editfilm<?=$i?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Film</h5>
              <button type="button" style="background-color: #BC85A3;"  class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="" method="post" enctype="multipart/form-data">
                <input type="text" name="id_film" value="<?=$film['id_film']?>" hidden>
            <div class="mb-3">
              <label for="judul_film" class="form-label">Judul Film</label>
              <input type="text" class="form-control" value="<?=$film['judul_film']?>" name="setjudul_film" id="judul_film">
            </div>
            <div class="mb-3">
              <label for="durasi_film" class="form-label">Durasi Film</label>
              <div class="input-group mb-3">
              <input type="number" value="<?=$film['durasi_film']?>" id="durasi_film" name="setdurasi_film" min="60" max="120">
            <span class="input-group-text" id="basic-addon2">Menit</span>
          </div>
            </div>
            <div class="mb-3">
            <label for="setsampul_film" class="form-label">Sampul Film</label>
            <div class="input-group mb-3">
              <input type="file" class="form-control" name="setsampul_film" id="setsampul_film" accept="image/*">
            </div>
            </div>
            </div>
            <div class="modal-footer">
              <button type="button" style="background-color: #BC85A3;" class="btn text-light" data-bs-dismiss="modal">Close</button>
              <button type="submit" style="background-color: #BC85A3;" class="btn text-light" >Save changes</button>
              </form>
            </div>
          </div>
        </div>
      </div>

    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
    </div>
    <div class="col-4 ps-5">
      <table class="table table-hover">
  <thead>
    <tr class="text-light" style="background-color: #BC85A3;">
      <th scope="col">ID</th>
      <th scope="col">Nama</th>
      <th scope="col">Jadwal</th>
      <th scope="col">Film</th>
      <th scope="col">Set Film</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $i = 0;
    foreach($data['studio'] as $studio): 
    $i++?>
    <tr class="text-light" style="background-color: #BC85A3;">
      <th scope="row"><?= $i?></th>
      <td style="background-color: #BC85A3;"><?= $studio['nama_studio']?></td>
      <td style="background-color: #BC85A3;"><?= $studio['jadwal']?></td>
      <td style="background-color: #BC85A3;"><?= $studio['judul_film']?></td>
      <td style="background-color: #BC85A3;"><button type="button" style="background-color: #FEADB9;" class="btn text-light" data-bs-toggle="modal" data-bs-target="#setfilm<?=$i?>"><i class="bi bi-pencil-square"></i></button></td>

      <!-- Modal -->
      <div class="modal fade" id="setfilm<?=$i?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Jadwal</h5>
              <button type="button" style="background-color: #BC85A3;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="" method="POST">
              <input type="text" name="setidstudio" value="<?=$studio['id_studio']?>" hidden>
              <label for="selectfilm" class="mb-3">Pilih Film</label>
              <select id="selectfilm" name="setfilmstudio" class="form-select">
              <?php if($studio['judul_film'] == ""){}else{?>
              <option value="<?=$studio['film_id']?>"><?=$studio['judul_film']?></option>
              <?php
              }
                foreach($data['film'] as $film): 
                if($film['judul_film'] == $studio['judul_film']){
                }else{
                ?>
                <option value="<?=$film['id_film']?>"><?=$film['judul_film']?></option>
                <?php } endforeach; ?>
                <option value="">Kosong</option>
              </select>
            </div>
            <div class="modal-footer">
              <button type="button" style="background-color: #BC85A3;" class="btn text-light" data-bs-dismiss="modal">Tutup</button>
              <button type="submit" style="background-color: #BC85A3;" class="btn text-light">Terapkan</button>
              </form>
            </div>
          </div>
        </div>
      </div>

    </tr>
    <?php  $i++;
  endforeach; ?>
  </tbody>
</table>
    </div>
  </div>



      <!-- Modal -->
      <div class="modal fade" id="tambahfilm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Film</h5>
              <button type="button" style="background-color: #BC85A3;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="judul_film" class="form-label">Judul Film</label>
              <input type="text" class="form-control" name="judul_film" id="judul_film">
            </div>
            <div class="mb-3">
              <label for="durasi_film" class="form-label">Durasi Film</label>
              <div class="input-group mb-3">
              <input type="number" id="durasi_film" name="durasi_film" min="60" max="120">
            <span class="input-group-text" id="basic-addon2">Menit</span>
          </div>
            </div>
            <div class="mb-3">
            <label for="sampul_film" class="form-label">Sampul Film</label>
            <div class="input-group mb-3">
              <input type="file" class="form-control" name="sampul_film" id="sampul_film" accept="image/*">
            </div>
            </div>
            </div>
            <div class="modal-footer">
              <button type="button" style="background-color: #BC85A3;" class="btn text-light" data-bs-dismiss="modal">Tutup</button>
              <button type="submit" style="background-color: #BC85A3;" class="btn text-light">Simpan</button>
              </form>
            </div>
          </div>
        </div>
      </div>