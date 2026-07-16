<?php

class UserController extends Controller
{
    private $userModel;

    public function __construct()
    {
        if (!isset($_SESSION['login'])) {
            header("Location: " . BASE_URL . "/auth/login");
            exit;
        }

        if ($_SESSION['role'] != "admin") {
            die("Akses Ditolak");
        }

        $this->userModel = $this->model("UserManagement");
    }

    public function index()
    {
        $data['users'] = $this->userModel->getAll();

        $this->view("user/index", $data);
    }

    public function edit($id)
    {
        $data['user'] = $this->userModel->getById($id);

        $this->view("user/edit", $data);
    }
    public function simpan()
{
    if($_SERVER['REQUEST_METHOD']!='POST')
    {
        header("Location: ".BASE_URL."/user");
        exit;
    }

    try{

        if(!Validator::required($_POST['nama']))
            die("Nama wajib diisi");

        if(!Validator::email($_POST['email']))
            die("Email tidak valid");

        if(!Validator::required($_POST['password']))
            die("Password wajib diisi");

        $this->userModel->tambah($_POST);

        header("Location: ".BASE_URL."/user");

    }catch(Exception $e){

        die($e->getMessage());

    }
}

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $this->userModel->update($_POST);

            header("Location: " . BASE_URL . "/user");
            exit;
        }
    }

    public function hapus($id)
    {
        $this->userModel->hapus($id);

        header("Location: " . BASE_URL . "/user");
        exit;
    }
}