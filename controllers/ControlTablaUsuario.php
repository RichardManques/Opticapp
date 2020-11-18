<?php

namespace controllers;

use models\UsuarioModel as UsuarioModel;

require_once("../models/UsuarioModel.php");

class ControlTablaUsuario{
    public $bt_edit;
    
    public function __construct()
    {
        $this->bt_edit = $_POST['bt_edit'];
    }
    public function editar(){
        if(isset($this->bt_edit)){
            session_start();
            $_SESSION['edit']="edit";
            $modelo = new UsuarioModel();
            $usuario = $modelo->buscarUsuario($this->bt_edit);
            $_SESSION['lista']=$usuario[0];
            header("Location:../views/gestionusuario.php");
        }
    }
}
$obj = new ControlTablaUsuario();
$obj->editar();