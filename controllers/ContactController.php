<?php
namespace controllers;
use controllers\Controller;
use models\MainModel;

require_once(__DIR__ . '/../models/MainModel.php');
require_once(__DIR__ . '/Controller.php');
//echo "Это файл ContactController<br>\n";
class ContactController extends Controller
{
    public function index()
    {
        $model = new MainModel();
        $data = $model->getData();
        $this->view('contact', ['data' => $data]);
    }
}