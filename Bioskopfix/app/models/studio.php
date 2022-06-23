<?php

class studio {
    private $app;
    function __construct()
    {
        $this->app = new database;
    }
    public function get_studio(){
 
        if(isset($_POST['cari'])){
            $judul = $_POST['cari'];
            $studio = $this->app->getAll("select * from studio where nama_studio like '%$judul%'");
        }else{$studio = $this->app->getAll('select studio.*,film.judul_film from studio left join film on studio.film_id = film.id_film');}
        return $studio;
    }
    public function update_studio($idfilm,$idstudio){
        $this->app->query("update studio set film_id = '$idfilm' where id_studio = '$idstudio'");
    }
}
?>