<?php

class About extends Controller
{
    public function index()
    {
        $data = [
            'judul' => "Halaman About",
            'nama' => $this->model("User_model")->getUser()
        ];
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer', $data);
    }

    public function contoh($satu)
    {
        echo "wah tenan $satu";
    }
}
