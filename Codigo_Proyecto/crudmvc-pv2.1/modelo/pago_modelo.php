<?php 
class pago_modelo{

    public static function mdlRegistrar($datos){
        $i = new Conexion();
        $c = $i->getConexion();
        $sql = "INSERT INTO pago
                (pag_id_pago, pag_forma_pago, pag_valor, pag_comprobante)
                VALUES
                (? , ? , ? , ? )";
        $s = $c->prepare($sql);
        $v = array( $datos["pag_id_pago"]    , 
                    $datos["pag_forma_pago"]    , 
                    $datos["pag_valor"]  , 
                    $datos["pag_comprobante"]  );
        return $s->execute($v);
        //return $r;
    }

    public static function mdlListado(){
        $i   = new Conexion();
        $c   = $i->getConexion();
        $sql = "SELECT * FROM pago";
        $s   = $c->prepare($sql);
        $s->execute();
        return $s->fetchAll();
    }
    public static function mdlEliminar($cod){
        $i   = new Conexion();
        $c   = $i->getConexion();
        $sql = "DELETE FROM pago WHERE pag_id_pago = ? ";
        $s   = $c->prepare($sql);
        $v   = array($cod);
        return $s->execute($v);
    }
    
public static function mdlConsultarXcod($cod){
    $i   = new Conexion();
    $c   = $i->getConexion();
    $sql = "SELECT * FROM pago where pag_id_pago = ? ";
    $s   = $c->prepare($sql);
    $v   = array($cod);
    $s->execute($v);
    return $s->fetch();
}
public static function mdlEditar($datos){
    $i = new Conexion();
    $c = $i->getConexion();
    $sql = "update pago set pag_id_pago     =  ? ,
                            pag_forma_pago  =  ? ,
                            pag_valor       =  ? ,
                            pag_comprobante = ?
                          where pag_id_pago = ? ";
    $s = $c->prepare($sql);
    $v = array( $datos["pag_id_pago"]    , 
                $datos["pag_forma_pago"]    , 
                $datos["pag_valor"]  , 
                $datos["pag_comprobante"]  , 
                $datos["pag_id_pago"]     
             );
    return $s->execute($v);
}


}

?>