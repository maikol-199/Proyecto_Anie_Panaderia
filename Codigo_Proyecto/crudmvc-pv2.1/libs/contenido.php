<?php

class Contenido{
    public function estructura($contenido){
        require_once "vista/header.php";
        require_once "vista/$contenido.php";
        require_once "vista/footer.php";
    }
}