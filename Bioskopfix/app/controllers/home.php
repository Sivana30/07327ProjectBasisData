<?php

class Home extends Controller{
    function __construct()
    {
        $this->film();
        $this->studio();
        $this->postkursi();
    }
    public function kursi($log = "no"){
        $data['title'] = "Kursi";
        $data['log'] = $log;
        $this->view('template/header',$data);
        $this->view('template/navbar',$data);
        $data['kursia'] = $this->model('kursi')->getAll_kursia();
        $data['kursib'] = $this->model('kursi')->getAll_kursib();
        $data['film'] = $this->model('film')->get_film();
        $data['studio'] = $this->model('studio')->get_studio();
        $this->view('home/kursi',$data);
        $this->view('template/footer');
    }
    public function index(){ 
        $data['title'] = "home";
        $this->view('template/header',$data);
        $this->view('login',$data);
        $this->view('template/footer');
     }

    public function home($log =  "no"){
        $data['title'] = "film";
        $data['log'] = $log;
        $this->view('template/header',$data);
        $data['film'] = $this->model('film')->get_film();
        if(isset($_POST['user'])){
        $data['login'] = $this->model('pegawai')->login($_POST['user'],$_POST['pass']);}
        $this->view('template/navbar',$data);
        $this->view('home/index',$data);
        $this->view('template/footer');
    }

    public function film(){
        if(isset($_POST['judul_film'])&&isset($_POST['durasi_film'])&&isset($_FILES['sampul_film'])){
            $this->model('film')->tambah_film($_POST['judul_film'],$_POST['durasi_film']);
        }
        if(isset($_POST['setjudul_film'])&&isset($_POST['setdurasi_film'])){
            $this->model('film')->update_film($_POST['id_film'],$_POST['setjudul_film'],$_POST['setdurasi_film']);
        }
        if(isset($_POST['hapusfilm'])){
            $this->model('film')->hapus_film($_POST['hapusfilm']);
        }

    }

    public function postkursi(){
        for($i = 0;$i <= 20;$i++){
            if(isset($_POST["kursi$i"])){
                $this->model('kursi')->update_kursi($_POST["kursi$i"]);
            }
        }
    }

    public function studio(){
        if(isset($_POST['setidstudio'])&&isset($_POST['setfilmstudio'])){
            $this->model('studio')->update_studio($_POST['setfilmstudio'],$_POST['setidstudio']);
        }
    }
    public function kelolah($log = "no"){
        $data['title'] = "Pengelolahan";
        $data['log'] = $log;
        $this->view('template/header',$data);
        $data['film'] = $this->model('film')->get_film();
        $data['studio'] = $this->model('studio')->get_studio();
        $this->view('template/navbar',$data);
        $this->view('home/admin',$data);
        $this->view('template/footer');
    }


}