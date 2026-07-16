<?php

class AuthController extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

   public function login()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        try {

            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            // Validasi Email
            if (!Validator::required($email)) {
                $data['error'] = "Email wajib diisi.";
                $this->view("auth/login", $data);
                return;
            }

            if (!Validator::email($email)) {
                $data['error'] = "Format email tidak valid.";
                $this->view("auth/login", $data);
                return;
            }

            // Validasi Password
            if (!Validator::required($password)) {
                $data['error'] = "Password wajib diisi.";
                $this->view("auth/login", $data);
                return;
            }

            // Ambil data user
            $user = $this->userModel->login($email);

            if (!$user) {
                $data['error'] = "Email tidak ditemukan.";
                $this->view("auth/login", $data);
                return;
            }

            // Cek password
            if (!password_verify($password, $user['password'])) {
                $data['error'] = "Password salah.";
                $this->view("auth/login", $data);
                return;
            }

            // Session
            $_SESSION['login'] = true;
            $_SESSION['id'] = $user['id'];
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['role'] = $user['role'];

            // Redirect
            if ($user['role'] == 'admin') {
                header("Location: " . BASE_URL . "/dashboard/admin");
            } else {
                header("Location: " . BASE_URL . "/dashboard/user");
            }

            exit;

        } catch (Exception $e) {

            $data['error'] = "Terjadi kesalahan sistem.";

            $this->view("auth/login", $data);
        }
    }

    $this->view("auth/login");
}

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->userModel->register($_POST);

            header("Location: " . BASE_URL . "/auth/login");
            exit;
        }

        $this->view("auth/register");
    }

    public function logout()
    {
        session_destroy();

        header("Location: " . BASE_URL . "/auth/login");
        exit;
    }
}