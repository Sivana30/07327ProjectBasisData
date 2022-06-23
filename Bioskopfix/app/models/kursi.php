<?php

class kursi {
    public function getAll_kursia(){
        $app = new database;
        $pegawai = $app->getAll("select * from kursi where nama_kursi like '%A'");
        return $pegawai;
    }
    public function getAll_kursib(){
        $app = new database;
        $pegawai = $app->getAll("select * from kursi where nama_kursi like '%B'");
        return $pegawai;
    }

    public function update_kursi($id){
        $app = new database;

        $app->query("update kursi set status = 'Tidak Tersedia' where id_kursi = '$id'");
    }
}
?>