<?php
namespace controllers;

use models\UsuarioModel as UsuarioModel;

require_once("../models/UsuarioModel.php");

class ControlLoginAdmin{
    public $nombre;
    public $clave;

    public function __construct()
    {
        $this->nombre = $_POST['nombre'];
        $this->clave = $_POST['clave'];
    }
    public function iniciarSesionAdmin(){
        session_start();
        
        if($this->nombre=="" || $this->clave==""){
            $_SESSION['errora']="Los campos están vacíos";
            header("Location:../admin.php");
            return;
        }
        $modelo = new UsuarioModel();
        $arreglo = $modelo->iniciarSesionAdmin($this->nombre,$this->clave);

        if(count($arreglo)==0){
            $_SESSION['errora']="Rut o clave no coinciden, intente nuevamente :(";
            header("Location:../admin.php");
            return;
        }
        $_SESSION['admin']=$arreglo[0];//guardar el admin en la pos 0 
        header("Location:../views/gestionusuario.php");
    }
}
$obj = new ControlLoginAdmin();
$obj->iniciarSesionAdmin();