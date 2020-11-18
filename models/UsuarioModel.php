<?php

namespace models;

require_once("Conexion.php");

class UsuarioModel{
    //funciones o metodos
    public function nuevoUsuario($data){
        $stm = Conexion::conector()->prepare("INSERT INTO usuario VALUES(:A,:B,'vendedor',md5(123456),1)");
        $stm->bindParam(":A",$data['rut']);
        $stm->bindParam(":B",$data['nombre']);
        return $stm->execute();
    }
    
    public function iniciarSesionUser($rut,$clave){
        //SELECT * FROM `usuario` WHERE rut='16.731.765-0' AND clave=md5('123456') AND rol='vendedor' para iniciar solamente como vendedor, si tiene estado 0 no puede iniciar sesion
        $stm = Conexion::conector()->prepare("SELECT * FROM usuario WHERE rut=:A AND clave=:B AND estado=1");
        $stm->bindParam(":A",$rut);
        $stm->bindParam(":B",md5($clave));
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function iniciarSesionAdmin($rut,$clave){
        //SELECT * FROM `usuario` WHERE rut='admin' AND clave=md5('admin') AND rol='administrador' para iniciar sesion solo como administrador
        $stm = Conexion::conector()->prepare("SELECT * FROM usuario WHERE rut=:A AND clave=:B AND rol='administrador' AND estado=1");
        $stm->bindParam(":A",$rut);
        $stm->bindParam(":B",md5($clave));
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function actualizarEstadoUsuario($rut,$data){//se actualizará el estado del usuario, 1 habilitado y 0 bloqueado
        $stm = Conexion::conector()->prepare("UPDATE usuario SET estado=:A WHERE rut=:B");
        $stm->bindParam(":A",$data['estado']);
        $stm->bindParam(":B",$rut);
        return $stm->execute();
    }

    public function listaUsuarios(){
        $stm = Conexion::conector()->prepare("SELECT * FROM usuario WHERE rol='vendedor'");
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public function buscarUsuario($rut){
        $stm = Conexion::conector()->prepare("SELECT * FROM usuario WHERE rut=:A");
        $stm->bindParam(":A",$rut);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
}