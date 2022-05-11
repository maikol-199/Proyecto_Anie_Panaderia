<?php 
class pedidoproducto_controlador{

    public function __construct(){
        $this->vista = new Contenido();
    }

    public function index(){

            $this->vista->datos= pedido_modelo::mdlListado();
            $this->vista->estructura("pedidoproducto/index",true);
    }








}

?>