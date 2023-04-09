<?php
namespace controllers;
use controllers\Controller;
use models\MainModel;

require_once(__DIR__ . '/../models/MainModel.php');
require_once(__DIR__ . '/Controller.php');
//echo "Это файл AboutController<br>\n";
class AboutController extends Controller
{
    public function index()
    {
        $model = new MainModel();
        $data = $model->getData();
        $this->view('about', ['data' => $data]);
    }
}
