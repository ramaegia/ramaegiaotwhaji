<?php

class LaporanController extends Controller
{
    private $laporanModel;

    public function __construct()
    {
        if (!isset($_SESSION['login'])) {
            header("Location: " . BASE_URL . "/auth/login");
            exit;
        }

        if ($_SESSION['role'] != 'admin') {
            die("Akses Ditolak");
        }

        $this->laporanModel = $this->model("Laporan");
    }

    public function index()
    {
        $data['laporan']=$this->laporanModel->getAll();

        $this->view("laporan/index",$data);
    }

    public function pdf()
    {
        $data['laporan']=$this->laporanModel->getAll();

        $this->view("laporan/pdf",$data);
    }
}