<?php

namespace controllers;

use models\ClienteModel as ClienteModel;

require_once("../models/ClienteModel.php");

class ControlNuevoCliente{
    public $rut;
    public $nombre;
    public $direccion;
    public $telefono;
    public $fecha;
    public $email;
    public $error="";

    public function __construct()
    {
        //rescatar los campos desde el formulario
        $this->rut = $_POST['rut'];
        $this->nombre = $_POST['nombre'];
        $this->direccion = $_POST['direccion'];
        $this->telefono = $_POST['telefono'];
        $this->fecha = $_POST['fecha'];
        $this->email = $_POST['email'];
    }
    
    public function ingresarCliente(){
        session_start();
        if($this->rut=="" || $this->nombre=="" || $this->direccion=="" || $this->telefono=="" || $this->fecha=="" || $this->email==""){
            $_SESSION['error']="Los campos están vacíos";
            header("Location:../views/crearcliente.php");
            return;
        }
            $model = new ClienteModel();
            $data = ['rut'=>$this->rut,'nombre'=>$this->nombre,'direccion'=>$this->direccion
                    ,'telefono'=>$this->telefono,'fecha'=>$this->fecha,'email'=>$this->email];
            $count = $model->nuevoCliente($data);

            if($count==1){
                $_SESSION['resp']="Cliente agregado correctamente";
            }else{
                $_SESSION['error']="Hubo un error en la base de datos";
            }
            header("Location:../views/crearcliente.php");
        
    }
}

$obj = new ControlNuevoCliente();
$obj->ingresarCliente();
