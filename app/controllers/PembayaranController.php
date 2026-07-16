<?php

class PembayaranController extends Controller
{
    private $pembayaranModel;

    public function __construct()
    {
        if (!isset($_SESSION['login'])) {
            header("Location: " . BASE_URL . "/auth/login");
            exit;
        }

        $this->pembayaranModel = $this->model("Pembayaran");
    }

    public function index()
    {
        $data['pembayaran'] = $this->pembayaranModel->getAll();

        $this->view("pembayaran/index", $data);
    }

   public function simpan()
{
    if ($_SERVER['REQUEST_METHOD'] != "POST") {
        header("Location: " . BASE_URL . "/transaksi");
        exit;
    }

    try {

        if (empty($_FILES['bukti']['name'])) {
            throw new Exception("Bukti pembayaran wajib diupload.");
        }

        if (!Validator::image($_FILES['bukti']['name'])) {
            throw new Exception("Format gambar tidak valid.");
        }

        // PERBAIKAN DI SINI
        if (!Validator::maxFile($_FILES['bukti']['size'])) {
            throw new Exception("Ukuran maksimal 2 MB.");
        }

        $namaFile = time() . "_" . basename($_FILES['bukti']['name']);

        move_uploaded_file(
            $_FILES['bukti']['tmp_name'],
            "public/uploads/" . $namaFile
        );

        $_POST['bukti'] = $namaFile;
        $_POST['user_id'] = $_SESSION['id'];

        $this->pembayaranModel->tambah($_POST);

        $_SESSION['success'] = "Pembayaran berhasil dikirim.";

        header("Location: " . BASE_URL . "/transaksi/riwayat");
        exit;

    } catch (Exception $e) {

        $_SESSION['error'] = $e->getMessage();

        header("Location: " . BASE_URL . "/transaksi/riwayat");
        exit;
    }
}

    public function status($id, $status)
    {
        if ($_SESSION['role'] != "admin") {
            header("Location: " . BASE_URL . "/dashboard/user");
            exit;
        }

        $statusValid = [
            "Menunggu",
            "Diterima",
            "Ditolak"
        ];

        if (!in_array($status, $statusValid)) {
            $_SESSION['error'] = "Status tidak valid.";
            header("Location: " . BASE_URL . "/pembayaran");
            exit;
        }

        $this->pembayaranModel->updateStatus($id, $status);

        $_SESSION['success'] = "Status pembayaran diperbarui.";

        header("Location: " . BASE_URL . "/pembayaran");
        exit;
    }
}