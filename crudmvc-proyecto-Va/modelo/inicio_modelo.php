<?php 
class inicio_modelo{

public static function mdlValidar($usuario, $contrasena){
 $i   = new Conexion();
 $c   = $i->getConexion();
 $sql = "SELECT * FROM usuarios where usu_usuario = ? and 
                                      usu_contraseña = ?";
 $s   = $c->prepare($sql);
 $v  = array($usuario, sha1($contrasena));
 $s->execute($v);
 return $s->fetch();

}








}




?>