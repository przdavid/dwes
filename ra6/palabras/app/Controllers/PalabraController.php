<?php 

namespace App\Controllers;

use App\Models\Palabra;

class PalabraController {
    public function Index($request) {
        $palabras = Palabra::getInstancia()->get();
        print_r($palabras);
        $this->renderHTML('palabras.twig', ['palabras' => $palabras]);
    }
}
?>