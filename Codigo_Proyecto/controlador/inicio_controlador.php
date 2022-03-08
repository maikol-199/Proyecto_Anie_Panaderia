<?php

class inicio_controlador{

    public function __construct(){
        $this->vista = new Contenido();
    }
    
    public function index(){
        $this->vista->estructura("inicio/principal");
    }

    public function frmLogin(){
        $this->vista->estructura("inicio/frmlogin");
    }
}

?>