<?php

namespace controllers;

use models\RecetaModel as RecetaModel;

require_once("../models/RecetaModel.php");

class ControlBuscarPorRut{
    public $rut;
    public function __construct()
    {
        $this->rut = $_POST['rut'];
    }
    public function buscarPorRut(){
        //session_start();
        //if (isset($_SESSION['usuario'])) {
            $modelo = new RecetaModel();
            $arr = $modelo->buscarRecetaRut($this->rut);
            echo json_encode($arr);
        //} else {
          //  echo json_encode(["msg" => "Acceso Denegado"]);
        //}
    }
}
$obj = new ControlBuscarPorRut();
$obj->buscarPorRut();