<?php 
require_once "modelo/pago_modelo.php";
class pago_controlador{

    public function __construct(){
        $this->vista = new Contenido();
    }

    public function index(){
            $this->vista->datos= pago_modelo::mdlListado();
            $this->vista->estructura("pago/index");
    }







}




?>