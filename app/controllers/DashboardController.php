<?php

class DashboardController extends Controller
{
    private $dashboardModel;

    public function __construct()
    {
        if (!isset($_SESSION['login'])) {
            header("Location: " . BASE_URL . "/auth/login");
            exit;
        }

        $this->dashboardModel = $this->model("Dashboard");
    }

    // ===================================================
    // DASHBOARD ADMIN
    // ===================================================
   public function admin()
{
    if ($_SESSION['role'] != "admin") {
        header("Location: " . BASE_URL . "/dashboard/user");
        exit;
    }

    $data = [];

    $data['title'] = "Dashboard Admin";

    $data['totalUser']      = $this->dashboardModel->totalUser();
    $data['totalProduk']    = $this->dashboardModel->totalProduk();
    $data['totalKategori']  = $this->dashboardModel->totalKategori();
    $data['totalTransaksi'] = $this->dashboardModel->totalTransaksi();
    $data['pendapatan']     = $this->dashboardModel->totalPendapatan();
    $data['grafik']         = $this->dashboardModel->grafikPenjualan();

    // WAJIB menggunakan nama "transaksi"
    $data['transaksi'] = $this->dashboardModel->transaksiTerbaru();

    $this->view("dashboard/admin", $data);
}

    // ===================================================
    // DASHBOARD USER
    // ===================================================
    public function user()
    {
        $produkModel    = $this->model("Produk");
        $transaksiModel = $this->model("Transaksi");
        $favoritModel   = $this->model("Favorit");

        $data = [];

        $data['title'] = "Dashboard User";

        // Produk terbaru
        $data['produkTerbaru'] = array_slice(
            $produkModel->getAll(),
            0,
            8
        );

        // Riwayat transaksi user
        $data['riwayat'] = $transaksiModel->getByUser($_SESSION['id']);

        // Statistik
        $data['jumlahProduk']    = count($produkModel->getAll());
        $data['jumlahTransaksi'] = count($data['riwayat']);
        $data['jumlahFavorit']   = $favoritModel->jumlahFavorit($_SESSION['id']);

        // Status transaksi
        $data['pending'] = 0;
        $data['diproses'] = 0;
        $data['selesai'] = 0;

        foreach ($data['riwayat'] as $trx) {

            if ($trx['status'] == "Pending") {
                $data['pending']++;
            }

            if ($trx['status'] == "Diproses") {
                $data['diproses']++;
            }

            if ($trx['status'] == "Selesai") {
                $data['selesai']++;
            }
        }

        $this->view("dashboard/user", $data);
    }
}