<?php
namespace Controllers;
require_once(__DIR__ . '/../models/MainModel.php');
class Controller
{
    public function view(string $viewName, array $data = []): void
    {
        extract($data);
        require_once(__DIR__ . '/../views/' . $viewName . '.php');
    }
}