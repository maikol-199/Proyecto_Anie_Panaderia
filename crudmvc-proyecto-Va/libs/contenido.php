<?php

class Contenido{
    public function estructura($contenido, $vistaAdmin = false){
        if($vistaAdmin == false){
            require_once "vista/header.php";
            require_once "vista/$contenido.php";
            require_once "vista/footer.php";
        }else{
            require_once "vista/admin/header.php";
            require_once "vista/admin/$contenido.php";
            require_once "vista/admin/footer.php";  
        }
    }
}