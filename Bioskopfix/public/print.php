<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
      <div class="container mt-5">
  <?php 
    require_once '../app/config/config.php';
    require_once '../app/config/database.php';
    $db = new database;
    $nama = $_POST['nama_pelanggan'];
    $bayar = $_POST['bayar'];
    $jumlahtkt = count($_POST)-3;
    $total = $jumlahtkt*20000;
    $kembalian = $bayar-$total;
    $id = $_POST['judul_film'];
    $kursi = "";
    $studio = $db->get("select studio.*,film.* from studio inner join film on studio.film_id = film.id_film where studio.id_studio = '$id'");
    $last_id = $db->get("select max(id) as last_id from transaksi");
$last_id['last_id'] = trim($last_id['last_id'],"TK");
$id = (int) $last_id['last_id'];
$id = $id+1;
if (strlen($id) == 1){
    $id = "TK0000" .$id;
 }
 else if (strlen($id) == 2){
    $id = "TK000" .$id;
 }
 else if(strlen($id) == 3){
    $id = "TK00".$id;   
 }
 else if (strlen($id) == 4){
    $id = "TK0" .$id;
 }
 else if(strlen($id) == 5){
    $id = "TK".$id;   
 }?>

<div style="width:50vh; height: 50vh;background-color:darksalmon;" class="shadow-lg p-3 rounded">
   <div class="row">
    <div class="col ms-3"><h3>Struk Pembayaran</h3>
    <p class="fs-6">ID : <?=$id?></p>
    <p class="fs-6">Nama Pelanggan : <?=$nama?></p>
    <p class="fs-6">Jumlah Tiket : <?=$jumlahtkt?></p>
    <p class="fs-6">Bayar : Rp.<?=$bayar?></p>
    <p class="fs-6">Total : Rp.<?=$total?></p>
    <p class="fs-6">___________________-</p>
    <p class="fs-6">Kembalian : Rp.<?=$kembalian?></p>
    </div>
</div>
</div>

<?php
 
    for($i = 0;$i <= 20;$i++){
        if(isset($_POST["kursi$i"])){
            $krs = $_POST["kursi$i"];
            $kursi = $db->get("select * from kursi where id_kursi = '$krs'");
?>
    <br>
   <div style="width:70vh; height: 30vh;background-color:darksalmon;" class="shadow-lg p-3 rounded">
   <div class="row">
    <div class="col-4 text-center"><br><br><h3>Tiket</h3>
    <p class="fs-6">ID : TK<?=trim($krs,"KRS").trim($id,"TK")?></p>
    </div>
    <div class="col-8">
    <br><p class="fw-bold">Judul Film : <?=$studio['judul_film']?></p>
    <p class="fw-bold">Durasi film : <?=$studio['durasi_film']?> Menit</p>
    <p class="fw-bold">Studio : <?=$studio['nama_studio']?></p>
    <p class="fw-bold">Tempat Duduk : <?=$kursi['nama_kursi']?></p>
    </div>
  </div></div>
  <?php
}
}
 $db->query("insert into transaksi(id,nama_pelanggan,total,bayar,kembalian,jumlah_tiket) values ('$id','$nama','$total','$bayar','$kembalian','$jumlahtkt')");

?>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script>
        window.print();
    </script>
  </body>
</html>