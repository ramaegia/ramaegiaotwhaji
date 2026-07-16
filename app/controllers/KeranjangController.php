<?php

class KeranjangController extends Controller
{
    private $keranjangModel;

    public function __construct()
    {
        if (!isset($_SESSION['login'])) {
            header("Location: " . BASE_URL . "/auth/login");
            exit;
        }

        $this->keranjangModel = $this->model("Keranjang");
    }

    // Tampilkan Keranjang
    public function index()
    {
        $data['keranjang'] = $this->keranjangModel->getAll($_SESSION['id']);

        $this->view("keranjang/index", $data);
    }

    // Tambah ke Keranjang
    public function tambah($produkId)
    {
        $this->keranjangModel->tambah($_SESSION['id'], $produkId);

        header("Location: " . BASE_URL . "/keranjang");
        exit;
    }

    // Hapus
    public function hapus($id)
    {
        $this->keranjangModel->hapus($id);

        header("Location: " . BASE_URL . "/keranjang");
        exit;
    }
    public function tambahQty($id)
{
    $this->keranjangModel->tambahQty($id);

    header("Location: ".BASE_URL."/keranjang");
}

public function kurangQty($id)
{
    $this->keranjangModel->kurangQty($id);

    header("Location: ".BASE_URL."/keranjang");
}
}