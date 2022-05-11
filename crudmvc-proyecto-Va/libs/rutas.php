<?php

class Rutas{

    public static function cargarContenido($controlador, $accion){
        
        if(file_exists("controlador/".$controlador."_controlador.php")){
            require_once "controlador/".$controlador."_controlador.php";
            $cnt = $controlador."_controlador";
            $obj= new $cnt;
            if(method_exists($obj, $accion)){
                $obj->$accion();   
            }else{
                //echo"<br>Metodo no existe";
                header("Location: /crudmvc-proyecto-Va");
            }
        }else{
            //echo "<br>Controlador no existe"; 
            header("Location: /crudmvc-proyecto-Va");
        }
    }
}