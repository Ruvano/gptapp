<?php
namespace controllers;
use models\MainModel;
require_once(__DIR__ . '/Controller.php');
class HomeController extends Controller
{
    public function index()
    {
        $model = new MainModel();
        $text = $model->getText();
        $this->view('home', ['text' => $text]);
    }
}
