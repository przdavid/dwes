<?php
namespace App\Controllers;

 class BaseController {
    protected $templateEngine;

    public function renderHTML($fileName, $data=[]) {
        echo $templateEngine->render($fileName, $data);
    }

    public function __construct() {
        $loader = new \Twig\Loader\FilesystemLoader('../views');
        $templateEngine = new \Twig\Environment($loader, []);
    }

 }
?>