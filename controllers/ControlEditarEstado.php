<?php

namespace controllers;

use models\UsuarioModel as UsuarioModel;

require_once("../models/UsuarioModel.php");

class ControlEditarEstado{
    public $rut;
    public $nombre;
    public $estado;

    public function __construct()
    {
        $this->rut = $_POST['rut'];
        $this->nombre = $_POST['nombre'];
        $this->estado = $_POST['estado'];
    }

    public function editarEstado(){
        session_start();
        if($this->estado==""){
            $_SESSION['aaa']="Elige una opcion";
            header("Location:../views/gestionusuario.php");
            return;
        }
        $data = ['rut'=>$this->rut,'nombre'=>$this->nombre,'estado'=>$this->estado];
        $modelo = new UsuarioModel();
        $count = $modelo->actualizarEstadoUsuario($this->rut,$data);

        if($count==1){
            $_SESSION['editt']="Estado actualizado";
        }else{
            $_SESSION['aaa']="Hubo un error en la bd";
        }
        header("Location:../views/gestionusuario.php");
    }
}
$obj = new ControlEditarEstado();
$obj->editarEstado();