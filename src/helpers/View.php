<?php

namespace App\helpers;


class View {

    static function render($view, $data = []) {

        $viewFile = $view."View.php";
        
        require_once __DIR__."/../View/" . $viewFile;
    }
}