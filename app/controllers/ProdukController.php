<?php

class ProdukController extends Controller
{
    private $produkModel;

    public function __construct()
    {
        if (!isset($_SESSION['login'])) {
            header("Location: " . BASE_URL . "/auth/login");
            exit;
        }

        if ($_SESSION['role'] != 'admin') {
            header("Location: " . BASE_URL . "/dashboard/user");
            exit;
        }

        $this->produkModel = $this->model("Produk");
    }

    // =====================
    // TAMPIL DATA PRODUK
    // =====================
    public function index()
{
    $keyword=$_GET['keyword'] ?? "";

    $data['keyword']=$keyword;

    $data['produk']=$this->produkModel->getAll($keyword);

    $this->view("produk/index",$data);
}

    // =====================
    // FORM TAMBAH
    // =====================
    public function tambah()
    {
        $data['kategori'] = $this->produkModel->getKategori();

        $this->view("produk/tambah", $data);
    }

    // =====================
    // SIMPAN PRODUK
    // =====================
    public function simpan()
    {
        if ($_SERVER['REQUEST_METHOD'] != "POST") {
            header("Location: " . BASE_URL . "/produk");
            exit;
        }

        try {

            if (!Validator::required($_POST['nama_produk'])) {
                throw new Exception("Nama produk wajib diisi.");
            }

            if (!Validator::number($_POST['harga'])) {
                throw new Exception("Harga harus berupa angka.");
            }

            if ($_POST['harga'] <= 0) {
                throw new Exception("Harga harus lebih besar dari 0.");
            }

            if (!Validator::number($_POST['stok'])) {
                throw new Exception("Stok harus berupa angka.");
            }

            if ($_POST['stok'] < 0) {
                throw new Exception("Stok tidak boleh negatif.");
            }

            $_POST['gambar'] = "";

            if (!empty($_FILES['gambar']['name'])) {

                if (!Validator::image($_FILES['gambar']['name'])) {
                    throw new Exception("Format gambar harus JPG, JPEG, PNG, GIF atau WEBP.");
                }

                if (!Validator::maxSize($_FILES['gambar']['size'])) {
                    throw new Exception("Ukuran gambar maksimal 2 MB.");
                }

                $namaFile = time() . "_" . basename($_FILES['gambar']['name']);

                move_uploaded_file(
                    $_FILES['gambar']['tmp_name'],
                    "public/uploads/" . $namaFile
                );

                $_POST['gambar'] = $namaFile;
            }

            $this->produkModel->tambah($_POST);

            $_SESSION['success'] = "Produk berhasil ditambahkan.";

            header("Location: " . BASE_URL . "/produk");
            exit;

        } catch (Exception $e) {

            $_SESSION['error'] = $e->getMessage();

            header("Location: " . BASE_URL . "/produk/tambah");
            exit;
        }
    }

    // =====================
    // FORM EDIT
    // =====================
    public function edit($id)
    {
        $data['produk'] = $this->produkModel->getById($id);
        $data['kategori'] = $this->produkModel->getKategori();

        $this->view("produk/edit", $data);
    }

    // =====================
    // UPDATE PRODUK
    // =====================
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] != "POST") {
            header("Location: " . BASE_URL . "/produk");
            exit;
        }

        try {

            if (!Validator::required($_POST['nama_produk'])) {
                throw new Exception("Nama produk wajib diisi.");
            }

            if (!Validator::number($_POST['harga'])) {
                throw new Exception("Harga harus berupa angka.");
            }

            if (!Validator::number($_POST['stok'])) {
                throw new Exception("Stok harus berupa angka.");
            }

            $_POST['gambar'] = "";

            if (!empty($_FILES['gambar']['name'])) {

                if (!Validator::image($_FILES['gambar']['name'])) {
                    throw new Exception("Format gambar harus JPG, JPEG, PNG, GIF atau WEBP.");
                }

                if (!Validator::maxSize($_FILES['gambar']['size'])) {
                    throw new Exception("Ukuran gambar maksimal 2 MB.");
                }

                $namaFile = time() . "_" . basename($_FILES['gambar']['name']);

                move_uploaded_file(
                    $_FILES['gambar']['tmp_name'],
                    "public/uploads/" . $namaFile
                );

                $_POST['gambar'] = $namaFile;
            }

            $this->produkModel->update($_POST);

            $_SESSION['success'] = "Produk berhasil diupdate.";

            header("Location: " . BASE_URL . "/produk");
            exit;

        } catch (Exception $e) {

            $_SESSION['error'] = $e->getMessage();

            header("Location: " . BASE_URL . "/produk/edit/" . $_POST['id']);
            exit;
        }
    }

    // =====================
    // HAPUS PRODUK
    // =====================
    public function hapus($id)
{
    try {

        $this->produkModel->hapus($id);

        $_SESSION['success'] = "Produk berhasil dihapus.";

    } catch (PDOException $e) {

        $_SESSION['error'] = "Produk tidak bisa dihapus karena sudah pernah digunakan pada transaksi.";

    }

    header("Location: " . BASE_URL . "/produk");
    exit;
}   
}