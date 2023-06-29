<?php

class Mahasiswa extends Controller
{
    public function index()
    {
        $data = [
            'judul' => "Daftar Mahasiswa",
            'mhs' => $this->model('Mahasiswa_model')->getAllMahasiswa()
        ];
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer', $data);
    }

    public function detail($id)
    {
        $data = [
            'judul' => "Detail Mahasiswa",
            'mhs' => $this->model('Mahasiswa_model')->getMahasiswaById($id)
        ];
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer', $data);
    }

    function tambah()
    {
        if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
        Flasher::setFlash('gagal', 'ditambahkan', 'danger');
        header('Location: ' . BASEURL . '/mahasiswa');
    }

    function hapus($id)
    {
        if ($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
        Flasher::setFlash('gagal', 'dihapus', 'danger');
        header('Location: ' . BASEURL . '/mahasiswa');
    }
}
