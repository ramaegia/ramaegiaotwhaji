<?php

class HomeController extends Controller
{
    private $produkModel;

    public function __construct()
    {
        $this->produkModel = $this->model("Produk");
    }

    public function index()
    {
        $data['produk'] = $this->produkModel->getAll();

        $this->view("home/index",$data);
    }
}