<?php 
class pago_modelo{

    public static function mdlListado(){
        $i   = new Conexion();
        $c   = $i->getConexion();
        $sql = "SELECT * FROM pago";
        $s   = $c->prepare($sql);
        $s->execute();
        return $s->fetchAll();
    }
}

?>