<?php

namespace controllers;

use models\UsuarioModel as UsuarioModel;

require_once("../models/UsuarioModel.php");

class ControlListaUsuario{
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
            $lista = $modelo->listaUsuarios($this->bt_edit);
            header("Location:../views/gestionusuario.php");
            $_SESSION['lista']=$lista[0];
        }
    }
}
$obj = new ControlListaUsuario();
$obj->editar();