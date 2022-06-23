<?php

class About extends Controller{
    public function index($nama = '1',$npm = '2'){
        echo "nama : $nama<br>npm : $npm<br>";
    }
    public function page(){
        $this->view('template/header',$data =['title' => 'About']);
        $this->view('about/index');
        $this->view('template/footer');
    }
}