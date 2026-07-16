<?php

class TransaksiController extends Controller
{
    private $transaksiModel;

    public function __construct()
    {
        if (!isset($_SESSION['login'])) {
            header("Location: " . BASE_URL . "/auth/login");
            exit;
        }

        $this->transaksiModel = $this->model("Transaksi");
    }

    // ===========================
    // DAFTAR TRANSAKSI
    // ===========================
    public function index()
    {
        try {

            $data['transaksi'] = $this->transaksiModel->getAll();

            $this->view("transaksi/index", $data);

        } catch (Exception $e) {

            die($e->getMessage());

        }
    }

    // ===========================
    // HALAMAN CHECKOUT
    // ===========================
    public function checkout()
    {
        try {

            $data['produk'] = $this->transaksiModel->getProduk();

            $this->view("transaksi/checkout", $data);

        } catch (Exception $e) {

            die($e->getMessage());

        }
    }

    // ===========================
    // SIMPAN TRANSAKSI
    // ===========================
    public function simpan()
    {
        if ($_SERVER['REQUEST_METHOD'] != "POST") {
            header("Location: " . BASE_URL . "/transaksi");
            exit;
        }

        try {

            if (!Validator::number($_POST['total_harga'])) {
                throw new Exception("Total harga tidak valid.");
            }

            $_POST['user_id'] = $_SESSION['id'];

            $this->transaksiModel->tambah($_POST);

            $_SESSION['success'] = "Checkout berhasil.";

            header("Location: " . BASE_URL . "/transaksi/riwayat");
            exit;

        } catch (Exception $e) {

            $_SESSION['error'] = $e->getMessage();

            header("Location: " . BASE_URL . "/transaksi/checkout");
            exit;

        }
    }

    // ===========================
    // UPLOAD BUKTI TRANSFER
    // ===========================
    public function upload()
    {
        if ($_SERVER['REQUEST_METHOD'] != "POST") {
            header("Location: " . BASE_URL . "/transaksi/riwayat");
            exit;
        }

        try {

            if (empty($_FILES['bukti']['name'])) {
                throw new Exception("Pilih bukti transfer.");
            }

            if (!Validator::image($_FILES['bukti']['name'])) {
                throw new Exception("Format gambar harus JPG, PNG, JPEG, GIF atau WEBP.");
            }

            if (!Validator::maxSize($_FILES['bukti']['size'])) {
                throw new Exception("Ukuran maksimal 2 MB.");
            }

            $namaFile = time() . "_" . basename($_FILES['bukti']['name']);

            move_uploaded_file(
                $_FILES['bukti']['tmp_name'],
                "public/uploads/" . $namaFile
            );

            $this->transaksiModel->uploadBukti(
                $_POST['id'],
                $namaFile
            );

            $_SESSION['success'] = "Bukti transfer berhasil diupload.";

            header("Location: " . BASE_URL . "/transaksi/riwayat");
            exit;

        } catch (Exception $e) {

            $_SESSION['error'] = $e->getMessage();

            header("Location: " . BASE_URL . "/transaksi/riwayat");
            exit;

        }
    }

    // ===========================
    // UPDATE STATUS
    // ===========================
    public function status($id, $status)
    {
        if ($_SESSION['role'] != "admin") {

            header("Location: " . BASE_URL . "/dashboard/user");
            exit;

        }

        try {

            $statusValid = [
                "Pending",
                "Diproses",
                "Dikirim",
                "Selesai",
                "Dibatalkan"
            ];

            if (!in_array($status, $statusValid)) {
                throw new Exception("Status tidak valid.");
            }

            $this->transaksiModel->updateStatus($id, $status);

            $_SESSION['success'] = "Status transaksi berhasil diperbarui.";

            header("Location: " . BASE_URL . "/transaksi");
            exit;

        } catch (Exception $e) {

            $_SESSION['error'] = $e->getMessage();

            header("Location: " . BASE_URL . "/transaksi");
            exit;

        }
    }

    // ===========================
    // RIWAYAT USER
    // ===========================
    public function riwayat()
    {
        try {

            $data['transaksi'] = $this->transaksiModel->getByUser($_SESSION['id']);

            $this->view("transaksi/riwayat", $data);

        } catch (Exception $e) {

            die($e->getMessage());

        }
    }
    public function detail($id)
{
    $data['transaksi'] = $this->transaksiModel->getDetail($id);

    $this->view("transaksi/detail",$data);
}
}