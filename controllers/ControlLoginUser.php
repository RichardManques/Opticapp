<?php

namespace controllers;

use models\UsuarioModel as UsuarioModel;

require_once("../models/UsuarioModel.php");

class ControlLoginUser{
    public $nombre;
    public $clave;

    public function __construct()
    {
        $this->nombre = $_POST['nombre'];
        $this->clave = $_POST['clave'];
    }
    public function iniciarSesion(){
        session_start();
        if($this->nombre=="" || $this->clave==""){
            $_SESSION['error']="Los campos están vacíos";
            header("Location:../index.php");
            return;
        }
        $modelo = new UsuarioModel();
        $array = $modelo->iniciarSesionUser($this->nombre,$this->clave);
        if(count($array)==0){
            $_SESSION['error']="Rut o clave no coinciden, intente nuevamente :(";
            header("Location:../index.php");
            return;
        }
        $_SESSION['usuario']=$array[0];//voy a guardar todo en la posicion 0 un usuario
        header("Location:../views/crearcliente.php");
    }
}
$obj = new ControlLoginUser();
$obj->iniciarSesion();