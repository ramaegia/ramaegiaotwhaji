<?php

class KategoriController extends Controller
{
    private $kategoriModel;

    public function __construct()
    {
        if (!isset($_SESSION['login'])) {
            header("Location: " . BASE_URL . "/auth/login");
            exit;
        }

        if ($_SESSION['role'] != "admin") {
            die("Akses Ditolak");
        }

        $this->kategoriModel = $this->model("Kategori");
    }

    public function index()
    {
        $data['kategori'] = $this->kategoriModel->getAll();

        $this->view("kategori/index", $data);
    }

    public function tambah()
    {
        $this->view("kategori/tambah");
    }

    public function simpan()
{
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        header("Location: " . BASE_URL . "/kategori");
        exit;
    }

    try {

        if (!Validator::required($_POST['nama_kategori'])) {

            die("Nama kategori wajib diisi.");

        }

        $this->kategoriModel->tambah($_POST);

        header("Location: " . BASE_URL . "/kategori");

        exit;

    } catch (Exception $e) {

        die("Terjadi Kesalahan : " . $e->getMessage());

    }
}

    public function edit($id)
    {
        $data['kategori'] = $this->kategoriModel->getById($id);

        $this->view("kategori/edit",$data);
    }

   public function update()
{
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {

        header("Location: " . BASE_URL . "/kategori");

        exit;
    }

    try {

        if (!Validator::required($_POST['nama_kategori'])) {

            die("Nama kategori wajib diisi.");

        }

        $this->kategoriModel->update($_POST);

        header("Location: " . BASE_URL . "/kategori");

        exit;

    } catch (Exception $e) {

        die("Terjadi Kesalahan : " . $e->getMessage());

    }
}

    public function hapus($id)
    {
        $this->kategoriModel->hapus($id);

        header("Location: ".BASE_URL."/kategori");
        exit;
    }
}