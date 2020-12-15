<?php

namespace controllers;

use models\RecetaModel as RecetaModel;

require_once("../models/RecetaModel.php");

class ControlBuscarPorFecha{
    public $fecha;
    public function __construct(){
        $this->fecha = $_POST['fecha'];
    }

    public function recetas(){
        session_start();
        if (isset($_SESSION['usuario'])) {
            $modelo = new RecetaModel();
            $arr = $modelo->buscarRecetaFecha($this->fecha);
            echo json_encode($arr);
        } else {
            echo json_encode(["msg" => "Acceso Denegado"]);
        }
    }
}

$obj = new ControlBuscarPorFecha();
$obj->recetas();