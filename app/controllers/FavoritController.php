<?php

class FavoritController extends Controller
{
    private $model;

    public function __construct()
    {
        if(!isset($_SESSION['login'])){
            header("Location: ".BASE_URL."/auth/login");
            exit;
        }

        $this->model=$this->model("Favorit");
    }

    public function index()
    {
        $data['favorit']=$this->model->getAll($_SESSION['id']);

        $this->view("favorit/index",$data);
    }

    public function tambah($id)
    {
        $this->model->tambah($_SESSION['id'],$id);

        header("Location: ".$_SERVER['HTTP_REFERER']);
    }

    public function hapus($id)
    {
        $this->model->hapus($_SESSION['id'],$id);

        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
}