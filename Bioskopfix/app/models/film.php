<?php

class film {
    private $p;
    function __construct()
    {
        $this->p = new database;
    }
    public function get_film(){
        if(isset($_POST['cari'])){
            $judul = $_POST['cari'];
            $film = $this->p->getAll("select * from film where judul_film like '%$judul%'");
        }else{$film = $this->p->getAll('select * from film');}
        return $film;
    }

    public function tambah_film($judul,$durasi){
        $last_id = $this->p->get("select max(id_film) as last_id from film");
        $last_id['last_id'] = trim($last_id['last_id'],"FLM");
        $id_film = (int) $last_id['last_id'];
        $id_film = $id_film+1;
        if (strlen($id_film) == 1){
            $id_film = "FLM0000" .$id_film;
         }
         else if (strlen($id_film) == 2){
            $id_film = "FLM000" .$id_film;
         }
         else if(strlen($id_film) == 3){
            $id_film = "FLM00".$id_film;   
         }
         else if (strlen($id_film) == 4){
            $id_film = "FLM0" .$id_film;
         }
         else if(strlen($id_film) == 5){
            $id_film = "FLM".$id_film;   
         }
         $_FILES['sampul_film']['name'] = $id_film.".jpg";
         $File_Name = $_FILES['sampul_film']['name'];
         $TmpName = $_FILES['sampul_film']['tmp_name'];
       
         move_uploaded_file($TmpName,'img/'.$File_Name);
        $this->p->query("insert into film(id_film,judul_film,durasi_film,sampul_film) values ('$id_film','$judul','$durasi','$File_Name')");
    }

    public function update_film($id,$judul,$durasi){
        if(!unlink("img/$id.jpg")){
            echo 'File tidak Ada';
        }else{

        }
        $this->p->query("update film set judul_film = '$judul',durasi_film = '$durasi' where id_film = '$id'");
        $_FILES['setsampul_film']['name'] = $id.".jpg";
        $File_Name = $_FILES['setsampul_film']['name'];
        $TmpName = $_FILES['setsampul_film']['tmp_name'];
    
        move_uploaded_file($TmpName,'img/'.$File_Name);
        echo "<script type='text/javascript'>alert('Data Berhasil Di update');</script>";
    }

    public function hapus_film($id){
        if(!unlink("img/$id.jpg")){
            echo 'File tidak Ada';
        }else{

        }
        $this->p->query("delete from film where id_film = '$id'");
        echo "<script type='text/javascript'>alert('Data Berhasil Terhapus');</script>";
        header('Location: '.BASEURL."home/kelolah");
    }
    }
?>