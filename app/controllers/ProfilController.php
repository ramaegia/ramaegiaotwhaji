<?php

class ProfilController extends Controller
{
    private $profilModel;

    public function __construct()
    {
        if (!isset($_SESSION['login'])) {
            header("Location: " . BASE_URL . "/auth/login");
            exit;
        }

        $this->profilModel = $this->model("Profil");
    }

    // ==========================
    // HALAMAN PROFIL
    // ==========================
    public function index()
    {
        $id = $_SESSION['id'];

        $data['user'] = $this->profilModel->getById($id);

        $this->view("profil/index", $data);
    }

    // ==========================
    // FORM EDIT
    // ==========================
    public function edit()
    {
        $id = $_SESSION['id'];

        $data['user'] = $this->profilModel->getById($id);

        $this->view("profil/edit", $data);
    }

    // ==========================
    // UPDATE PROFIL
    // ==========================
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] != "POST") {
            header("Location: " . BASE_URL . "/profil");
            exit;
        }

        $data = [];

        $data['id'] = $_SESSION['id'];
        $data['nama'] = $_POST['nama'];
        $data['email'] = $_POST['email'];

        // upload foto
        if (!empty($_FILES['foto']['name'])) {

            $namaFile = time() . "_" . basename($_FILES['foto']['name']);

            move_uploaded_file(
                $_FILES['foto']['tmp_name'],
                "public/uploads/" . $namaFile
            );

            $data['foto'] = $namaFile;

        } else {

            $data['foto'] = "";

        }

        $this->profilModel->update($data);

        $_SESSION['nama'] = $data['nama'];

        header("Location: " . BASE_URL . "/profil");
        exit;
    }

    // ==========================
    // GANTI PASSWORD
    // ==========================
    public function password()
    {
        $this->view("profil/password");
    }

    public function updatePassword()
    {
        if ($_SERVER['REQUEST_METHOD'] != "POST") {
            header("Location: " . BASE_URL . "/profil/password");
            exit;
        }

        $passwordBaru = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $this->profilModel->updatePassword(
            $_SESSION['id'],
            $passwordBaru
        );

        header("Location: " . BASE_URL . "/profil");
        exit;
    }
}