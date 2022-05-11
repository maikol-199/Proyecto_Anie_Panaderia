<?php 
class pedido_modelo{

    public static function mdlListado()
    {
        $i   = new Conexion();
        $c   = $i->getConexion();
        $sql = "SELECT * FROM pedido";
        $s   = $c->prepare($sql);
        $s->execute();
        return $s->fetchAll();
    }

    public static function mdlListadoxCod($codu)
    {
        $i   = new Conexion();
        $c   = $i->getConexion();
        $sql = "SELECT * FROM pedido where Ped_Usu_Cedula = '$codu'";
        $s   = $c->prepare($sql);
        $s->execute();
        return $s->fetchAll();
    }

    public static function mdlRegistrar($datos)
    {
        $i = new Conexion();
        $c = $i->getConexion();
        $sql = "INSERT INTO pedido
                (Ped_Fecha_Pedido, Ped_Fecha_Entrega, Ped_Direccion, Ped_Usu_Cedula, Ped_Estado)
                VALUES
                (? ,? , ? , ?, ? )";
        $s = $c->prepare($sql);
        $v = array(
            $datos["ped_fecha_pedido"],
            $datos["ped_fecha_entrega"],
            $datos["ped_direccion"],
            $datos["ped_usu_cedula"],
            $datos["ped_estado"]
        );
        $s->execute($v);
        return $c->lastInsertId();
        
        //return $r;
    }

    public static function mdlRegistrarDetalle($idPedido, $idPro, $cantidad){

        $i = new Conexion();
        $c = $i->getConexion();
        $sql =  "INSERT INTO pedido_producto
                (Ped_Pro_Id_Producto, Ped_Pro_Id_Pedido, Ped_Pro_Cantidad)
                VALUES
                (? , ?, ? )";
        $s = $c->prepare($sql);
        $v = array(
            $idPro,
            $idPedido,
            $cantidad
        );
       
        return $s->execute($v);
    }

    public static function mdlEliminar($cod)
    {
        $i   = new Conexion();
        $c   = $i->getConexion();
        $sql = "DELETE FROM pedido WHERE Ped_Id_Pedido = ? ";
        $s   = $c->prepare($sql);
        $v   = array($cod);
        return $s->execute($v);
    }

    public static function mdlConsultarXcod($cod)
    {
        $i   = new Conexion();
        $c   = $i->getConexion();
        $sql = "SELECT * FROM pedido where Ped_Id_Pedido = ? ";
        $s   = $c->prepare($sql);
        $v   = array($cod);
        $s->execute($v);
        return $s->fetch();
    }

    public static function mdlconsultadetalle($cod){
        $i   = new Conexion();
        $c   = $i->getConexion();
        $sql = "SELECT * FROM pedido_producto where Ped_Pro_Id_Pedido = ? ";
        $s   = $c->prepare($sql);
        $v   = array($cod);
        $s->execute($v);
        return $s->fetch();

    }
    public static function mdlconsultadetalleprodu($id)
    {
        $i   = new Conexion();
        $c   = $i->getConexion();
        $sql = "SELECT * FROM productos where Pro_Id_Producto = ? ";
        $s   = $c->prepare($sql);
        $v   = array($id);
        $s->execute($v);
        return $s->fetchAll();
    }

    public static function mdlEditar($datos)
    {
        $i = new Conexion();
        $c = $i->getConexion();
        $sql = "update pedido set Ped_Id_Pedido     =  ? ,
                                  Ped_Fecha_Pedido     =  ? ,
                                  Ped_Fecha_Entrega  =  ? ,
                                  Ped_Direccion       =  ? ,
                                  Ped_Estado = ? 

                          where Ped_Id_Pedido = ? ";
        $s = $c->prepare($sql);
        $v = array(
            $datos["ped_id_pedido"],
            $datos["ped_fecha_pedido"],
            $datos["ped_fecha_entrega"],
            $datos["ped_direccion"],
            $datos["ped_estado"],
            $datos["ped_id_pedido"]
        );
        return $s->execute($v);
    }
    
}




?>