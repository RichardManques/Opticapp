<?php
namespace controllers;

use models\UsuarioModel as UsuarioModel;

require_once("../models/UsuarioModel.php");

class ControlNuevoUsuario{
    public $rut;
    public $nombre;

    public function __construct()
    {
        $this->rut = $_POST['rut'];
        $this->nombre = $_POST['nombre'];
    }

    public function registrarUsuario(){
        session_start();

        if($this->rut=="" || $this->nombre==""){
            $_SESSION['error']="Campos vacíos";
            header("Location:../views/gestionusuario.php");
            return;
        }

        $modelo = new UsuarioModel();
        $data = ['rut'=>$this->rut,'nombre'=>$this->nombre];
        $count = $modelo->nuevoUsuario($data);

        if($count==1){
            $_SESSION['answer']="Usuario creado";
        }else{
            $_SESSION['error']="Error en la base de datos :(";
        }
        header("Location:../views/gestionusuario.php");
    }
}
$obj = new ControlNuevoUsuario();
$obj->registrarUsuario();